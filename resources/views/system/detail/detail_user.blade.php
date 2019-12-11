@extends('system.index')

@section('content')
    <div class="admin-base-grid">
        @include('system.include.header')

        <div class="admin-title">
            <div class="admin-title-text">
                <h1>Detail používateľa <span>{{ $user->first_name }}</span></h1>
            </div>
            <div class="admin-title-user">
                <p>Eduard Gábel</p>
                <img src="{{ asset('img/cat.png') }}" alt="">
            </div>
        </div>

        <div class="admin-content">
            <div class="detail-user-content">
                <h3>Meno a priezvisko: <span>{{ $user->first_name }} {{ $user->last_name }}</span></h3>
                <h3>Email: <span>{{ $user->email }}</span></h3>
                <h3>Rola: <span>{{ $user->roles_ID }}</span></h3>
                <h3>Registrovananý dňa: <span>{{ $user->created_at }}</span></h3>
                <h3>Potvrdená registrácia: <span>@if( $user->verified==1 ) áno @else nie  @endif </span></h3>
            </div>

            <div class="detail-user-event-history">
                <h2>Aktivita používateľa</h2>
                <table class="table history-table">
                    <thead>
                    <tr>
                        <th scope="col">ID prihlášky</th>
                        <th scope="col">Názov univerzity</th>
                        <th scope="col">Dátum začiatku</th>
                        <th scope="col">Dátum konca</th>
                        <th scope="col">Stav</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>UNIVERSITY OF SHEFFIELD (UOS)</td>
                        <td>25.9.2019</td>
                        <td>20.12.2019</td>
                        <td><span class="user-detail-mobility-state-cell">Ukončená</span></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        @include('system.include.footer')

    </div>
@endsection

