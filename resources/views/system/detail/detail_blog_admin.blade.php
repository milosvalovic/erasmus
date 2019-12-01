@extends('system.index')

@section('content')
    <div class="admin-base-grid">
        @include('system.include.header')

        <div class="admin-title">
            <div class="admin-title-text">
                <h1>Detail</h1>
            </div>
            <div class="admin-title-user">
                <p>Eduard Gábel</p>
                <img src="{{ asset('img/cat.png') }}" alt="">
            </div>
        </div>

        <div class="admin-content">
            <div class="detail-container">
                <div class="blog-detail-title">
                    <div class="blog-detail--title left-side-title">
                        <h1>{{ $blog->title }}</h1>
{{--                        <a class="a" href="#">--}}
{{--                            <p>{{ $blog->users_season_ID }}</p>--}}
{{--                        </a>--}}
                    </div>

                    <div class="blog-detail--title">
                        <p>Zverejnený dňa / {{ $blog->publish_date }}</p>
                        @if( $blog->status==1 )
                        <div class="blog-detail-active-status"></div>
                        @else
                        <div class="blog-detail-active-not-status"></div>
                        @endif
                    </div>

                </div>
                <div class="blog-detail-content">
                    {!! $blog->article !!}
                </div>
            </div>
        </div>

        @include('system.include.footer')
    </div>

    <script>
        $('#summernote').summernote({
            height: 'auto'
        });
    </script>
@endsection

