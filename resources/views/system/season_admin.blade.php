@extends('system.index')

@section('content')
    <div class="admin-base-grid">
        @include('system.include.header')

        <div class="admin-title">
            <div class="admin-title-text">
                <h1>Administrácia sezón</h1>
            </div>
            <div class="admin-title-user">
                <p>Eduard Gábel</p>
                <img src="{{ asset('img/cat.png') }}" alt="">
            </div>
        </div>

        <div class="admin-content">

            <div class="admin-season-table">
                <div class="admin-season-title">
                    <h2>Správca sezón</h2>
                    <a href="{{ action('system\SeasonController@newSeasonShow') }}">
                        <button type="button" class="btn btn-outline-primary">Pridať novú sezónu</button>
                    </a>
                </div>
                <table class="table admin-table">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Začiatok registrácie</th>
                        <th scope="col">koniec registrácie</th>
                        <th scope="col">Limit študentov</th>
                        <th scope="col">Limit registrácií</th>
                        <th scope="col">Mobilita</th>
                        <th scope="col">Dátum začiatku mobility</th>
                        <th scope="col">Dátum konca mobility</th>
                        <th scope="col" class="user-form-actions">Akcie</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($seasons as $season)
                        <tr>
                            <th scope="row">{{ $season->ID }}</th>
                            <td>{{ $season->date_start_reg }}</td>
                            <td>{{ $season->date_end_reg }}</td>
                            <td>{{ $season->count_students }}</td>
                            <td>{{ $season->count_registrations }}</td>
                            <td>{{ $season->mobility_ID }}</td>
                            <td>{{ $season->date_start_mobility }}</td>
                            <td>{{ $season->date_end_mobility }}</td>
                            <th scope="row">
                                {{--                                        {{ action('system\CountryController@countryEditShow',['id' => $season->ID]) }}--}}
                                <a href="">
                                    <button type="button" class="btn btn-outline-warning">Upraviť</button>
                                </a>
                                <a href="#">
                                    <button type="button" class="btn btn-outline-danger">Odstrániť</button>
                                </a>
                            </th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <nav class="admin-users-pagination">
                    <nav class="admin-users-pagination">

                    </nav>
                </nav>
            </div>

        </div>

        @include('system.include.footer')

    </div>
@endsection

