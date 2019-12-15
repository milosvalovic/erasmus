@extends('system.index')

@section('content')
    <div class="admin-base-grid">
        @include('system.include.header')

        <div class="admin-title">
            <div class="admin-title-text">
                <h1>Administrácia otváracích hodín</h1>
            </div>
            <div class="admin-title-user">
                <p><a href="{{ action('system\ProfileController@my_profile')}}">{{ Auth::user()->first_name . ' '. Auth::user()->last_name }}</a> <span> {{ Auth::user()->roles->name }} </span></p>
                <img src="{{ asset('img/icon_logout.png') }}" alt="" class="logout-admin-button">
            </div>
        </div>

        <div class="admin-content">
            <div class="admin-office-hours-table">
                <div class="admin-office-hours-title">
                    <h2>Tabuľka hodín</h2>
                </div>
                <table class="table admin-table">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Deň</th>
                        <th scope="col">Od</th>
                        <th scope="col">Do</th>
                        <th scope="col">Úradný deň</th>
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
                        <td>@if($item->off==0)áno @else nie  @endif</td>
                        <th scope="row">
                            <a href="{{ action('system\OfficeHourController@office_hourEditShow',['id' => $item->ID]) }}">
                                <button type="button" class="btn btn-outline-warning">Upraviť</button>
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

