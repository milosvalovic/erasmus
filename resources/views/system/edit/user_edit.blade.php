@extends('system.index')

@section('content')
    <div class="admin-base-grid">
        @include('system.include.header')

        <div class="admin-title">
            <div class="admin-title-text">
                <h1>Editácia člena</h1>
            </div>
            <div class="admin-title-user">
                <p>Eduard Gábel</p>
                <img src="{{ asset('img/cat.png') }}" alt="">
            </div>
        </div>

        <div class="admin-content">
            <div class="admin-edit-div">
                <form class="form-edit-user" id=formEditUser method="post" action="">
                    <h3>Editácia</h3>
                    <div class="form-group">
                        <label for="editUserFirstName">Meno:</label>
                        {{--                        <input type="hidden" value="{{$id}}" name="id">--}}
                        <input type="text" class="form-control admin-form-input" id="editUserFirstName" name="userFirstName" placeholder="Filip" value="">
                    </div>
                    <div class="form-group">
                        <label for="editUserLastName">Priezvisko:</label>
                        <input type="text" class="form-control admin-form-input" id="editUserLastName" placeholder="Dobrovoľný"
                               name="userLastName" value="">
                    </div>
                    <div class="form-group">
                        <label for="editUserEmail">Email:</label>
                        <input type="text" class="form-control admin-form-input" id="editUserEmail" placeholder="filip.d@gmail.com"
                               name="userEmail" value="">
                    </div>
                    <div class="form-group">
                        <label for="editUserEmail">Rola:</label>
                        <input type="text" class="form-control admin-form-input" id="editUserRole" placeholder="študent"
                               name="userEmail" value="">
                    </div>

                    <div class="form-group-button">
                        <button type="submit" class="btn btn-outline-primary btn-add">Uložiť</button>
                    </div>
                </form>
            </div>
        </div>

        @include('system.include.footer')

    </div>
@endsection

