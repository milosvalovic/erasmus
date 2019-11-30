@extends('system.index')

@section('content')
    <div class="admin-base-grid">
        @include('system.include.header')

        <div class="admin-title">
            <div class="admin-title-text">
                <h1>Krajiny</h1>
            </div>
            <div class="admin-title-user">
                <p>Eduard Gábel</p>
                <img src="{{ asset('img/cat.png') }}" alt="">
            </div>
        </div>

        <div class="admin-content">

            <div class="row">
                <div class="col-xs-12 col-md-8">
                    <div class="admin-countries-table">
                        <div class="admin-countries-title">
                            <h2>Spravovanie faq</h2>
                        </div>
                        <table class="table admin-table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Názov</th>
                                <th scope="col">Kód krajiny</th>
                                <th scope="col">Erazmus kód</th>
                                <th scope="col" class="user-form-actions">Akcie</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($countries as $country)
                                <tr>
                                    <th scope="row">{{ $country->ID }}</th>
                                    <th>{{ $country->name }}</th>
                                    <td>{{ $country->country_code }}</td>
                                    <td>{{ $country->erasmus_code }}</td>
                                    <th scope="row">
                                        <a href="{{ action('system\CountryController@countryEditShow',['id' => $country->ID]) }}">
                                            <button type="button" class="btn btn-outline-warning">Upraviť</button>
                                        </a>
                                        <a href="/edit-role/'number'">
                                            <button type="button" class="btn btn-outline-danger">Odstrániť</button>
                                        </a>
                                    </th>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <nav class="admin-users-pagination">
                            <nav class="admin-users-pagination">
                                {{--TODO Here pagination--}}
                            </nav>
                        </nav>
                    </div>
                </div>

                <div class="col-xs-12 col-md-3 admin-add-new-item-div">
                    <form method="post" class="form-add-country" id="formAddCountry" action="">
                        <h3 class="form-title">Pridať krajinu</h3>
                        <div class="form-group">
                            <label for="addCountryName">Názov:</label>
                            <input type="text" class="form-control admin-form-input" id="addCountryName" placeholder="Slovakia" name="countryName">
                        </div>
                        <div class="form-group">
                            <label for="addCountryCode">Kód krajiny:</label>
                            <input type="text" class="form-control admin-form-input" id="addCountryCode" placeholder="sk" name="countryCode">
                        </div>
                        <div class="form-group-button">
                            <button type="submit" class="btn btn-outline-primary btn-add">Pridať</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>

        @include('system.include.footer')

    </div>
@endsection

