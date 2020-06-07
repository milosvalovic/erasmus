@extends('system.index')

@section('content')
    <div class="admin-base-grid">
        @include('system.include.header')

        <div class="admin-title">
            <div class="admin-title-text">
                <h1>Editácia člena</h1>
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
            <div class="admin-edit-div">

                <form class="form-edit-user" id=formEditUser method="post" action="{{route('editUser')}}">
                    <h3>Editácia</h3>
                    <div class="form-group">
                        <label for="editUserFirstName">Meno:</label>
                        <input type="hidden" value="{{$user->ID}}" name="id">
                        <input type="text" class="form-control admin-form-input" id="editUserFirstName" name="first_name" placeholder="Filip" value="{{$user->first_name}}">

                    </div>
                    <div class="form-group">
                        <label for="editUserLastName">Priezvisko:</label>
                        <input type="text" class="form-control admin-form-input" id="editUserLastName" placeholder="Dobrovoľný"

                               name="last_name" value="{{$user->last_name}}">

                    </div>
                    <div class="form-group">
                        <label for="editUserEmail">Email:</label>
                        <input type="text" class="form-control admin-form-input" id="editUserEmail" placeholder="filip.d@gmail.com"

                               name="email" value="{{$user->email}}">
                    </div>
                    <div class="form-group">
                        <label for="addNewUniversityCountry">Rola:</label>
                        <select name="role_id" class="form-control admin-form-input" required>
                            @foreach($roles as $role)
                                <option value="{{$role->id}}" @if($role->id == $user->roles_ID) selected="selected" @endif >{{$role->name}}</option>
                            @endforeach
                        </select>

                    </div>

                    <div class="form-group">
                        <label for="editUserEmail">Email:</label>
                        <input type="text" class="form-control admin-form-input" id="editUserEmail" placeholder="filip.d@gmail.com"

                               name="email" value="{{$user->email}}">
                    </div>

                    <div class="form-group admin-switch-div" id="to_input">
                        <label for="editUserActive">Učet aktívny:</label>

                        <label class="switch">
                            <input type="checkbox" name="verified" id="editUserActive" @if($user->verified==1) checked @endif>
                            <span class="slider round" ></span>
                        </label>
                    </div>

                    <div class="form-group-button">
                        <button type="submit" class="btn btn-outline-primary btn-add">Uložiť</button>
                    </div>

                    {{csrf_field()}}

                </form>
            </div>
        </div>

        @include('system.include.footer')

    </div>
@endsection

