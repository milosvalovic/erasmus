@extends('system.index')

@section('content')
    <div class="admin-base-grid">
        @include('system.include.header')

        <div class="admin-title">
            <div class="admin-title-text">
                <h1>Editácia hodnotenia</h1>
            </div>
            <div class="admin-title-user">
                <p>{{Auth::user()->roles->name . ' | '.Auth::user()->first_name . ' '. Auth::user()->last_name }}</p>
            </div>
        </div>

        <div class="admin-content">
            <div class="detail-review-content">
                <h3>Autor: <span>{{ $review->users_season_ID }} </span></h3>
                <h3>Text: <span>{{ $review->review }}</span></h3>
            </div>

            <div class="detail-review-images-container">
                <h2>Fotografie</h2>
                <div class="detail-review-images">
                    @foreach($review->images as $image)
                        <div class="review--image">
                            <img src="{{ asset($image->url) }}" alt="" class="review-image-item">
                            <img src="{{ asset('img/icon_delete_red.png') }}" alt="" class="review-delete-icon" data-id="{{ $image->ID }}">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        @include('system.include.footer')

    </div>
@endsection

