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
                        <th scope="col">Email</th>
                        <th scope="col">Tel. kontakt</th>
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
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->phone }}</td>
                            <th scope="row">
                                <a href="{{ action('system\OfficeHourController@office_hourEditShow',['id' => $contact->ID]) }}">
                                    <button type="button" class="btn btn-outline-warning">Upraviť</button>
                                </a>
                                <a href="">
                                    <button type="button" class="btn btn-outline-danger">Odstrániť</button>
                                </a>
                            </th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <nav class="admin-users-pagination">
                    {{--TODO Here pagination--}}
                </nav>
            </div>
        </div>

        @include('system.include.footer')

    </div>
@endsection

