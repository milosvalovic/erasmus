@extends('system.index')

@section('content')
    <div class="admin-base-grid">
        @include('system.include.header')

        <div class="admin-title">
            <div class="admin-title-text">
                <h1>Detail používateľa <span>{{ $user->first_name . ' ' . $user->last_name}}</span></h1>
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
            <div class="detail-user-content">
                <h3>Meno a priezvisko: <span>{{ $user->first_name }} {{ $user->last_name }}</span></h3>
                <h3>Email: <span>{{ $user->email }}</span></h3>
                <h3>Rola: <span>{{ $user->roles->name }}</span></h3>
                <h3>Registrovananý dňa: <span>{{ date("d.m.Y H:i:s", strtotime($user->created_at))}}</span></h3>
                <h3>Potvrdená registrácia: <span>@if( $user->verified==1 ) áno @else nie  @endif </span></h3>
                <h3>Odoberá newsletter: <span>@if( $user->newsletter==1 ) áno @else nie  @endif </span></h3>
            </div>

            <div class="detail-user-event-history">
                <h2>Aktivita používateľa</h2>
                <table class="table history-table">
                    <thead>
                    <tr>
                        <th scope="col">ID prihlášky</th>
                        <th scope="col">Mobilita</th>
                        <th scope="col">Dátum začiatku pobytu</th>
                        <th scope="col">Dátum konca pobytu</th>
                        <th scope="col">Stav</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($seasons as $season)
                        <tr>
                            <th scope="row">{{$season->ID}}</th>
                            <td>{{$season->season->mobility->university->name . ' | ' . $season->season->mobility->mobility_type->name . ' | ' . $season->season->mobility->category->name}}</td>
                            <td>{{date("d.m.Y", strtotime($season->season->date_start_mobility))}}</td>
                            <td>{{date("d.m.Y", strtotime($season->season->date_end_mobility))}}</td>
                            <td><span class="user-detail-mobility-state-cell">{{$season->status_season[0]->season_status->name}}</span></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <nav class="admin-users-pagination">
                    {{$seasons->links()}}
                </nav>
            </div>
        </div>

        @include('system.include.footer')

    </div>
@endsection

