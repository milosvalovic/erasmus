@extends('system.index')

@section('content')
    <div class="admin-base-grid">
        @include('system.include.header')

        <div class="admin-title">
            <div class="admin-title-text">
                <h1>Administrácia blogov</h1>
            </div>
            <div class="admin-title-user">
                <p>
                    <a href="{{ action('system\ProfileController@my_profile')}}">{{ Auth::user()->first_name . ' '. Auth::user()->last_name }}</a>
                    <span> {{ Auth::user()->roles->name }} </span></p>
                <a href="{{ route('logout')}}" class="logout-admin-button">
                    <img src="{{ asset('img/icon_logout.png') }}" alt="" class="logout-admin-button">
                </a>
            </div>
        </div>

        <div class="admin-content">

            <div class="admin-blogs-table">
                <div class="admin-blogs-title">
                    <h2>Tabuľka blogov</h2>
                </div>
                <table class="table admin-table">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Titulok</th>
                        <th scope="col">Dátum zverejnenia</th>
                        <th scope="col">Autor</th>
                        <th scope="col">Potvrdené od</th>
                        <th scope="col">Status</th>
                        <th scope="col" class="user-form-actions">Akcie</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($blogs as $blog)
                        <tr>
                            <th scope="row">{{ $blog->ID }}</th>
                            <td>
                                <a class="admin-blog-table"
                                        href="{{ action('system\BlogController@blogDetail',['id' => $blog->ID]) }}">
                                    {{ $blog->title }}
                                </a>
                            </td>
                            <td>{{ $blog->publish_date }}</td>
                            <td>{{ $blog->user->email }}</td>
                            <td>{{ $blog->user_2->email }}</td>

                            <form method="post" class="form-add-blogs" id="formChangeBlogStatus"
                                  action="{{route('changeBlogStatus')}}">
                                <td>
                                    <div class="form-check">
                                        <input @if($blog->status == 1) checked="checked" @endif
                                        type="checkbox" class="form-check-input" id="setBlogStatus" name="status">
                                        <label for="">@if($blog->status == 1) Akceptovaný @else
                                                Neakceptovaný @endif</label>
                                    </div>
                                </td>
                                <th scope="row">
                                    <button type="submit" class="btn btn-outline-primary button wider-button">Uložiť</button>
                                    <a href="{{route('deleteBlog',['id'=>$blog->ID])  }}">
                                        <button type="button" class="btn btn-outline-danger wider-button">Odstrániť</button>
                                    </a>
                                </th>
                                {{csrf_field()}}
                                <input type="hidden" name="id" value="{{$blog->ID}}">
                            </form>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <nav class="admin-users-pagination">
                    {{$blogs->links()}}
                </nav>
            </div>

        </div>

        @include('system.include.footer')
    </div>
@endsection

