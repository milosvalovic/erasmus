@extends('system.index')

@section('content')
    <div class="admin-welcome-page">
        @include('system.include.header')

        <div class="admin-title">
            <div class="admin-title-text">
                <h1>Používatelia</h1>
            </div>
            <div class="admin-title-user">
                <p>Eduard Gábel</p>
                <img src="{{ asset('img/cat.png') }}" alt="">
            </div>
        </div>

        <div class="admin-welcome-content">

            <div class="user-table-wrapper">
                <div class="user-table-title">
                    <h2>Spravovanie používateľov</h2>
                </div>
                <table class="table admin-table">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Meno</th>
                        <th scope="col">Priezvisko</th>
                        <th scope="col">Email</th>
                        <th scope="col">Rola</th>
                        <th scope="col" class="user-form-actions">Akcie</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <th scope="row">{{$user->id}}</th>
                            <td>{{$user->first_name}}</td>
                            <td>{{$user->last_name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->roles->name}}</td>
                            <th scope="row">
                                <a href="{{ action('system\UserController@userEditShow', ['id' => $user->id]) }}">
                                    <button type="button" class="btn btn-outline-warning">Upraviť</button>
                                </a>
                                <a href="{{route('deleteUser',['id'=>$user->id])}}">
                                    <button type="button" class="btn btn-outline-danger">Odstrániť</button>
                                </a>
                            </th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <nav class="admin-users-pagination" aria-label="Page navigation example">
                    {{$users->links()}}

                </nav>
            </div>
        </div>

        @include('system.include.footer')
    </div>
@endsection

