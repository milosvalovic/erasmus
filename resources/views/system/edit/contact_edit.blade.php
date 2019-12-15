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
                        <label for="editContactFirstName">Meno:</label>
                        <input type="hidden" value="" name="">
                        <input type="text" class="form-control admin-form-input" id="editContactFirstName" name="contactFirstName" placeholder="Daniela" value="{{$contact->firstname}}">
                    </div>
                    <div class="form-group">
                        <label for="editContactLastName">Priezvisko:</label>
                        <input type="hidden" value="" name="">
                        <input type="text" class="form-control admin-form-input" id="editContactLastName" name="contactLastName" placeholder="Sympatická" value="{{$contact->lastname}}">
                    </div>
                    <div class="form-group">
                        <label for="editContactTitleBefore">Titul pred menom:</label>
                        <input type="hidden" value="" name="">
                        <input type="text" class="form-control admin-form-input" id="editContactTitleBefore" name="contactTitleBefore" placeholder="Mgr." value="{{$contact->title_before_name}}">
                    </div>
                    <div class="form-group">
                        <label for="editContactTitleAfter">Titul za menom:</label>
                        <input type="hidden" value="" name="">
                        <input type="text" class="form-control admin-form-input" id="editContactTitleAfter" name="contactTitleAfter" placeholder="PhD." value="{{$contact->title_after_name}}">
                    </div>
                    <div class="form-group">
                        <label for="editContactWorkPlace">Pracovisko:</label>
                        <input type="hidden" value="" name="">
                        <input type="text" class="form-control admin-form-input" id="editContactWorkPlace" name="contactWorkPlace" placeholder="Katedra informatiky" value="{{$contact->workplace}}">
                    </div>
                    <div class="form-group">
                        <label for="editContactEmail">Email:</label>
                        <input type="hidden" value="" name="">
                        <input type="text" class="form-control admin-form-input" id="editContactEmail" name="contactEmail" placeholder="daniela.sympaticka@gmail.com" value="{{$contact->email}}">
                    </div>
                    <div class="form-group">
                        <label for="editContactPhoneNumberWork">Telefónne číslo pracovné:</label>
                        <input type="hidden" value="" name="">
                        <input type="text" class="form-control admin-form-input" id="editContactPhoneNumberWork" name="contactPhoneNumberWork" placeholder="0917666666" value="{{$contact->telephone_work}}">
                    </div>
                    <div class="form-group">
                        <label for="editContactPhoneNumberPersonal">Telefónne číslo súkromné:</label>
                        <input type="hidden" value="" name="">
                        <input type="text" class="form-control admin-form-input" id="editContactPhoneNumberPersonal" name="contactPhoneNumberPersonal" placeholder="0917666666" value="{{$contact->phone}}">
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

