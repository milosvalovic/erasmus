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

            <div class="row">
                <div class="col-xs-12 col-md-8">
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
                        <nav class="admin-users-pagination">
                            {{$users->links()}}
                        </nav>
                    </div>
                </div>

                <div class="col-xs-12 col-md-3 admin-add-new-item-div">

                    <form method="post" class="form-add-new-user" id="formAddNewUser" action="{{route('addUser')}}">
                        <h3 class="form-title">Pridať člena</h3>
                        @if (session('error'))
                            <div class="alert alert-danger">
                                <h5>{{session('error')}}</h5>
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="addUserFirstName">Meno:</label>
                            <input type="text" class="form-control admin-form-input" id="addUserFirstName" placeholder="Filip" name="first_name">
                        </div>
                        <div class="form-group">
                            <label for="addUserLastName">Priezvisko:</label>
                            <input type="text" class="form-control admin-form-input" id="addUserLastName" placeholder="Dobrovoľný" name="last_name">
                        </div>
                        <div class="form-group">
                            <label for="addUserEmail">Email:</label>
                            <input type="text" class="form-control admin-form-input" id="addUserEmail" placeholder="filip.d@gmail.com" name="email">
                        </div>
                        <div class="form-group">
                            <label for="addUserRole">Rola:</label>
                            <select name="role_id" class="form-control admin-form-input" id="addUserRole" required>
                                @foreach($roles as $role)
                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="addUserPassword">Heslo:</label>
                            <input type="text" class="form-control admin-form-input" id="addUserPassword" placeholder="******" name="password" required>
                            <a id="generateRandomPassBtn" class="btn btn-outline-info">Vygenerovať heslo</a>
                        </div>
                        <input type="hidden" name="length" value="6">
                        <div class="form-group-button">
                            <button type="submit" class="btn btn-outline-primary btn-add">Pridať</button>
                        </div>
                        {{csrf_field()}}

                    </form>
                </div>

            </div>

        </div>
        @include('system.include.footer')
    </div>
@endsection

