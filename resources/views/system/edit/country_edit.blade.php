@extends('system.index')

@section('content')
    <div class="admin-base-grid">
        @include('system.include.header')

        <div class="admin-title">
            <div class="admin-title-text">
                <h1>Editácia krajiny</h1>
            </div>
            <div class="admin-title-user">
                <p>Eduard Gábel</p>
                <img src="{{ asset('img/cat.png') }}" alt="">
            </div>
        </div>

        <div class="admin-content">
            <div class="admin-edit-div">
                <form class="form-edit-country" id="formEditCountry" method="post" action="">
                    <h3 class="form-title">Editovať </h3>
                    <div class="form-group">
                        <label for="editCountryName">Názov krajiny:</label>
                        <input type="text" class="form-control admin-form-input" id="editCountryName" placeholder=""
                               name="countryName" value="">
                    </div>
                    <div class="form-group">
                        <label for="editCountryCode">Kód krajiny:</label>
                        <input type="text" class="form-control admin-form-input" id="editCountryCode" placeholder=""
                               name="countryCode" value="">
                    </div>
                    <div class="form-group">
                        <label for="editCountryErasmusCode">Erazmus kód:</label>
                        <input type="text" class="form-control admin-form-input" id="editCountryErasmusCode" placeholder=""
                               name="countryCodeErasmus" value="">
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

