@extends('system.index')

@section('content')
    <div class="admin-base-grid">
        @include('system.include.header')

        <div class="admin-title">
            <div class="admin-title-text">
                <h1>Editácia role</h1>
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
                <form class="form-edit-role" id="formEditUserRole" method="post" action="{{route('editRole')}}">
                    <h3>Editácia</h3>
                    @if (session('error'))
                        <div class="alert alert-danger">
                            <h5>{{session('error')}}</h5>
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="editUserRoleName">Názov:</label>
                        <input type="hidden" value="{{$role->id}}" name="id">
                        <input type="text" class="form-control admin-form-input" id="editUserRoleName" name="name" placeholder="študent" value="{{$role->name}}">
                    </div>

                    <div class="form-group">
                        <label for="editRoleDescription">Popis:</label>
                        <textarea type="text" class="form-control admin-form-input"
                                  placeholder="Krátky popis o tejto roli" id="editRoleDescription" name="description">{{ $role->description }}</textarea>
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

