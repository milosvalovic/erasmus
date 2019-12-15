@extends('system.index')

@section('content')
    <div class="admin-base-grid">
        @include('system.include.header')

        <div class="admin-title">
            <div class="admin-title-text">
                <h1>Editácia hodnotenia</h1>
            </div>
            <div class="admin-title-user">
                <p><a href="{{ action('system\ProfileController@my_profile')}}">{{ Auth::user()->first_name . ' '. Auth::user()->last_name }}</a> <span> {{ Auth::user()->roles->name }} </span></p>
                <img src="{{ asset('img/icon_logout.png') }}" alt="" class="logout-admin-button">
            </div>
        </div>

        <div class="admin-content">
            <div class="detail-review-content">
                <h3>Autor: <span>{{ $review->user_season->user->first_name . ' ' .$review->user_season->user->last_name }} </span></h3>
                <h3>Email autora: <span>{{ $review->user_season->user->email }}</span></h3>
                <h3>Text: <span>{{ $review->review }}</span></h3>
            </div>

            <div class="detail-review-images-container">
                <h2>Fotografie</h2>
                <div class="detail-review-images">
                    @foreach($images as $image)
                        <div class="review--image">
                            <img src="{{ asset($image->url) }}" alt="" class="review-image-item">
                            @if($image->deleted_at!=null && Auth::user()->roles->id == 3)
                                <img src="{{ asset('img/icon_undo.png') }}" alt="" class="review-revert-icon"
                                     data-id="{{ $image->ID }}">
                            @else
                                <img src="{{ asset('img/icon_delete_red.png') }}" alt="" class="review-delete-icon"
                                     data-id="{{ $image->ID }}">
                                <div class="spinner-border loading-primary" id="spinnerDeleteReviewImage">
                                </div>
                                <img src="{{ asset('img/icon_success.png') }}" class="success-delete-image" id="successDeleteReviewImage">
                                <img src="{{ asset('img/icon_error.png') }}" class="error-delete-image" id="errorDeleteReviewImage">
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        @include('system.include.footer')

    </div>
@endsection

