@extends('system.index')

@section('content')
    <div class="admin-base-grid">
        @include('system.include.header')

        <div class="admin-title">
            <div class="admin-title-text">
                <h1>Typy mobilít</h1>
            </div>
            <div class="admin-title-user">
                <p>Eduard Gábel</p>
                <img src="{{ asset('img/cat.png') }}" alt="">
            </div>
        </div>

        <div class="admin-content">
            <div class="row">
                <div class="col-xs-12 col-md-8">
                    <div class="admin-mobility-type-table">
                        <div class="admin-mobility-type-title">
                            <h2>Spravovanie typov</h2>


                        </div>

                        <table class="table admin-table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Názov</th>
                                <th scope="col" class="user-form-actions">Akcie</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($mobility_types as $mobilityType)
                                <tr>
                                    <th scope="row">{{$mobilityType->ID}}</th>
                                    <td>{{$mobilityType->name}}</td>
                                    <th scope="row">
                                        <a href="{{ action('system\TypeMobilityController@mobilityTypeShowEdit',['id' => $mobilityType->ID]) }}">
                                            <button type="button" class="btn btn-outline-warning">Upraviť</button>
                                        </a>
                                        <a href="{{route('delete_type',['id' => $mobilityType->ID])}}'">
                                            <button type="button" class="btn btn-outline-danger">Odstrániť</button>
                                        </a>
                                    </th>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <nav class="admin-users-pagination" aria-label="Page navigation example">
                            {{$mobility_types->links()}}
                        </nav>
                    </div>
                </div>
                <div class="col-xs-12 col-md-3 admin-add-new-item-div">
                    <form class="form-add-mobility-type" id=formNewMobilityCategory method="post" action="{{route('add_type')}}">
                        <h3>Pridať typ</h3>
                        @if (session('error'))
                            <div class="alert alert-danger">
                                <h5>{{session('error')}}</h5>
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="addMobilityType"> Názov:</label>
                            <input type="text" class="form-control admin-form-input" id="addMobilityType" placeholder="Študijný pobyt" name="name" required>
                        </div>
                        <div class="form-group-button">
                            <button type="submit" class="btn btn-outline-primary btn-add">Pridať</button>
                        </div>
                        {{csrf_field()}}
                    </form>
                </div>
            </div>
        </div>

        @include('system.include.footer')
    </div>
@endsection

