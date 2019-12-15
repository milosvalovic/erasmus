@extends('system.index')

@section('content')
    <div class="admin-base-grid">
        @include('system.include.header')

        <div class="admin-title">
            <div class="admin-title-text">
                <h1>Detail zamestnanca </h1>
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
            <h2>Celým menom - {{ $contact->title_before_name .' '. $contact->firstname .' '. $contact->lastname .' '. $contact->title_after_name }}</h2>
            <div class="admin-edit-div">
                <form id="formEditContact" method="post" action="">
                    <h3 class="form-title">Editácia</h3>
                    <div class="form-group">
                        <label for="addContactFirstName">Meno:</label>
                        <input type="hidden" value="" name="">
                        <input type="text" class="form-control admin-form-input" id="addContactFirstName" name="contactFirstName" placeholder="Daniela" value="{{$contact->firstname}}">
                    </div>
                    <div class="form-group">
                        <label for="addContactLastName">Priezvisko:</label>
                        <input type="hidden" value="" name="">
                        <input type="text" class="form-control admin-form-input" id="addContactLastName" name="contactLastName" placeholder="Sympatická" value="{{$contact->lastname}}">
                    </div>
                    <div class="form-group">
                        <label for="addContactTitleBefore">Titul pred menom:</label>
                        <input type="hidden" value="" name="">
                        <input type="text" class="form-control admin-form-input" id="addContactTitleBefore" name="contactTitleBefore" placeholder="Mgr." value="{{$contact->title_before_name}}">
                    </div>
                    <div class="form-group">
                        <label for="addContactTitleAfter">Titul za menom:</label>
                        <input type="hidden" value="" name="">
                        <input type="text" class="form-control admin-form-input" id="addContactTitleAfter" name="contactTitleAfter" placeholder="PhD." value="{{$contact->title_after_name}}">
                    </div>
                    <div class="form-group">
                        <label for="addContactWorkPlace">Pracovisko:</label>
                        <input type="hidden" value="" name="">
                        <input type="text" class="form-control admin-form-input" id="addContactWorkPlace" name="contactWorkPlace" placeholder="Katedra informatiky" value="{{$contact->workplace}}">
                    </div>
                    <div class="form-group">
                        <label for="addContactEmail">Email:</label>
                        <input type="hidden" value="" name="">
                        <input type="text" class="form-control admin-form-input" id="addContactEmail" name="contactEmail" placeholder="daniela.sympaticka@gmail.com" value="{{$contact->email}}">
                    </div>
                    <div class="form-group">
                        <label for="addContactPhoneNumberWork">Telefónne číslo pracovné:</label>
                        <input type="hidden" value="" name="">
                        <input type="text" class="form-control admin-form-input" id="addContactPhoneNumberWork" name="contactPhoneNumberWork" placeholder="0917666666" value="{{$contact->telephone_work}}">
                    </div>
                    <div class="form-group">
                        <label for="addContactPhoneNumberPersonal">Telefónne číslo súkromné:</label>
                        <input type="hidden" value="" name="">
                        <input type="text" class="form-control admin-form-input" id="addContactPhoneNumberPersonal" name="contactPhoneNumberPersonal" placeholder="0917666666" value="{{$contact->phone}}">
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

