@extends('system.index')

@section('content')
    <div class="admin-base-grid">
        @include('system.include.header')

        <div class="admin-title">
            <div class="admin-title-text">
                <h1>Administrácia otváracích hodín</h1>
            </div>
            <div class="admin-title-user">
                <p>Eduard Gábel</p>
                <img src="{{ asset('img/cat.png') }}" alt="">
            </div>
        </div>

        <div class="admin-content">
            <div class="admin-office-hours-table">
                <div class="admin-office-hours-title">
                    <h2>Spravovanie rolí</h2>
                </div>
                <table class="table admin-table">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Deň</th>
                        <th scope="col">Od</th>
                        <th scope="col">Do</th>
                        <th scope="col" class="user-form-actions">Akcie</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($office_hours as $item)
                    <tr>
                        <th scope="row">{{ $item->ID }}</th>
                        <td>{{ $item->day }}</td>
                        <td>{{ $item->from }}</td>
                        <td>{{ $item->to }}</td>
                        <th scope="row">
                            <a href="{{ action('system\OfficeHourController@office_hourEditShow',['id' => $item->ID]) }}">
                                <button type="button" class="btn btn-outline-warning">Upraviť</button>
                            </a>
                        </th>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        @include('system.include.footer')
    </div>
@endsection

