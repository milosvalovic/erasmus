@extends('system.index')

@section('content')
    <div class="admin-base-grid">
        @include('system.include.header')

        <div class="admin-title">
            <div class="admin-title-text">
                <h1>Administrácia hodnotení</h1>
            </div>
            <div class="admin-title-user">
                <p>Eduard Gábel</p>
                <img src="{{ asset('img/cat.png') }}" alt="">
            </div>
        </div>

        <div class="admin-content">
            <div class="admin-review-table">
                <div class="admin-review-title">
                    <h2>Tabuľka hodnotení</h2>
                </div>
                <table class="table admin-table">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Študent</th>
                        <th scope="col">Text hodnotenia</th>
                        <th scope="col" class="user-form-actions">Akcie</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($reviews as $review)
                        <tr>
                            <th scope="row">{{ $review->ID }}</th>
                            <td>{{ $review->users_season_ID }}</td>
                            <td>{{ $review->review }}</td>
                            <th scope="row">
                                <a href="{{ action('system\ReviewsController@reviewEditShow', ['id' => $review->ID]) }}">
                                    <button type="button" class="btn btn-outline-warning">Upraviť</button>
                                </a>
{{--                                <a href="{{route('deleteReview',['id' => $review->ID])}}">--}}
{{--                                    <button type="button" class="btn btn-outline-danger">Odstrániť</button>--}}
{{--                                </a>--}}
                            </th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <nav class="admin-users-pagination">
{{--                    {{reviews->links()}}--}}
                </nav>
            </div>
        </div>

        @include('system.include.footer')

    </div>
@endsection

