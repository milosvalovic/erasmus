@extends('system.index')

@section('content')
    <div class="admin-base-grid">
        @include('system.include.header')

        <div class="admin-title">
            <div class="admin-title-text">
                <h1>Administrácia zamestnancov (kontaktov)</h1>
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

            <div class="row">
                <div class="col-xs-12 col-md-8">
                    <div class="admin-contact-table">
                        <div class="admin-contact-title">
                            <h2>Tabuľka kontaktov</h2>
                        </div>
                        <table class="table admin-table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Meno</th>
                                <th scope="col">Priezvisko</th>
                                <th scope="col">Pracovisko</th>
                                <th scope="col">Miestnosť</th>
                                <th scope="col" class="user-form-actions">Akcie</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($contacts as $contact)
                                <tr>
                                    <th scope="row">{{ $contact->ID }}</th>
                                    <td>{{ $contact->firstname }}</td>
                                    <td>{{ $contact->lastname }}</td>
                                    <td>{{ $contact->workplace }}</td>
                                    <td>{{ $contact->room }}</td>
                                    <th scope="row">
                                        <a href="{{ action('system\ContactController@contactsEditShow',['id' => $contact->ID]) }}">
                                            <button type="button" class="btn btn-outline-warning admin-edit-button small-button">Upraviť</button>
                                        </a>
                                        <a href="{{route('deleteContact',['id'=>$contact->ID])}}">
                                            <button type="button" class="btn btn-outline-danger admin-edit-button small-button">Odstrániť</button>
                                        </a>
                                    </th>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <nav class="admin-users-pagination">
                            {{$contacts->links()}}
                        </nav>
                    </div>
                </div>

                <div class="col-xs-12 col-md-3 admin-add-new-item-div">
                    <form id="formAddContact" method="post" action="{{route('addContact')}}">
                        <h3 class="form-title">Pridať zamestnanca</h3>
                        @if (session('error'))
                            <div class="alert alert-danger">
                                <h5>{{session('error')}}</h5>
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="addContactFirstName">Meno:</label>
                            <input type="hidden" value="" name="">
                            <input type="text" class="form-control admin-form-input" id="addContactFirstName"
                                   name="contactFirstName" placeholder="Daniela">
                        </div>
                        <div class="form-group">
                            <label for="addContactLastName">Priezvisko:</label>
                            <input type="hidden" value="" name="">
                            <input type="text" class="form-control admin-form-input" id="addContactLastName"
                                   name="contactLastName" placeholder="Sympatická">
                        </div>
                        <div class="form-group">
                            <label for="addContactTitleBefore">Titul pred menom:</label>
                            <input type="hidden" value="" name="">
                            <input type="text" class="form-control admin-form-input" id="addContactTitleBefore"
                                   name="contactTitleBefore" placeholder="Mgr.">
                        </div>
                        <div class="form-group">
                            <label for="addContactTitleAfter">Titul za menom:</label>
                            <input type="hidden" value="" name="">
                            <input type="text" class="form-control admin-form-input" id="addContactTitleAfter"
                                   name="contactTitleAfter" placeholder="PhD.">
                        </div>
                        <div class="form-group">
                            <label for="addContactWorkPlace">Pracovisko:</label>
                            <input type="hidden" value="" name="">
                            <input type="text" class="form-control admin-form-input" id="addContactWorkPlace"
                                   name="contactWorkPlace" placeholder="Katedra informatiky">
                        </div>
                        <div class="form-group">
                            <label for="addContactRoom">Miestnosť:</label>
                            <input type="hidden" value="" name="">
                            <input type="text" class="form-control admin-form-input" id="addContactRoom"
                                   name="contactRoom" placeholder="THC208">
                        </div>
                        <div class="form-group">
                            <label for="addContactEmail">Email:</label>
                            <input type="hidden" value="" name="">
                            <input type="text" class="form-control admin-form-input" id="addContactEmail"
                                   name="contactEmail" placeholder="daniela.sympaticka@gmail.com">
                        </div>
                        <div class="form-group">
                            <label for="addContactPhoneNumberWork">Telefónne číslo pracovné:</label>
                            <input type="hidden" value="" name="">
                            <input type="text" class="form-control admin-form-input" id="addContactPhoneNumberWork"
                                   name="contactPhoneNumberWork" placeholder="0917666666">
                        </div>
                        <div class="form-group">
                            <label for="addContactPhoneNumberPersonal">Telefónne číslo súkromné:</label>
                            <input type="hidden" value="" name="">
                            <input type="text" class="form-control admin-form-input" id="addContactPhoneNumberPersonal"
                                   name="contactPhoneNumberPersonal" placeholder="0917666666">
                        </div>
                        <div class="form-group-button">
                            <button type="submit" class="btn btn-outline-primary btn-add">Uložiť</button>
                        </div>
                        {{csrf_field()}}
                    </form>
                </div>
            </div>

        </div>

        @include('system.include.footer')

    </div>
@endsection

