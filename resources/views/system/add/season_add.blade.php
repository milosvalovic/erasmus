@extends('system.index')

@section('content')
    <div class="admin-base-grid">
        @include('system.include.header')

        <div class="admin-title">
            <div class="admin-title-text">
                <h1>Pridanie novej sezóny</h1>
            </div>
            <div class="admin-title-user">
                <p>Eduard Gábel</p>
                <img src="{{ asset('img/cat.png') }}" alt="">
            </div>
        </div>

        <div class="admin-content">

            <div class="admin-add-new-item-div">
                <form id="addNewSeasonForm">
                    <h3 class="form-title">Pridať sezónu</h3>

                    @if (session('error'))
                        <div class="alert alert-danger">
                            <h5>{{session('error')}}</h5>
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="addNewSeasonStartDate">Dátum začiatku registrácie:</label>
                        <input type="text" class="form-control admin-form-input" id="addNewSeasonStartDate"
                               placeholder="1.1.2019"
                               name="seasonStartDate" required>
                    </div>

                    <div class="form-group">
                        <label for="addNewSeasonEndDate">Dátum ukončenia registrácie:</label>
                        <input type="text" class="form-control admin-form-input" id="addNewSeasonEndDate"
                               placeholder="30.6.2019"
                               name="seasonEndDate" required>
                    </div>

                    <div class="form-group">
                        <label for="addNewSeasonStudentLimit">Maximálny limit študentov:</label>
                        <input type="text" class="form-control admin-form-input" id="addNewSeasonStudentLimit"
                               placeholder="20" name="seasonCountStudents" required>
                    </div>

                    <div class="form-group">
                        <label for="addNewSeasonRegistrationLimit">Maximálny limit registrácii:</label>
                        <input type="text" class="form-control admin-form-input" id="addNewSeasonRegistrationLimit"
                               placeholder="70" name="seasonCountRegistrations" required>
                    </div>

                    <div class="form-group">
                        <label for="addNewSeasonMobility">Mobilita:</label>
                        <select name="country_ID" class="form-control admin-form-input" required>
{{--                            @foreach($universities as $university)--}}
{{--                                <option value="{{$university->ID}}">{{$university->name}}</option>--}}
{{--                            @endforeach--}}
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="addNewSeasonDateStartMobility">Dátum začiatku mobility:</label>
                        <input type="text" class="form-control admin-form-input" id="addNewSeasonDateStartMobility"
                               placeholder="20.1.2019" name="seasonDateStartMobility" required>
                    </div>

                    <div class="form-group">
                        <label for="addNewSeasonDateEndMobility">Dátum ukončenia mobility:</label>
                        <input type="text" class="form-control admin-form-input" id="addNewSeasonDateEndMobility"
                               placeholder="30.3.2019" name="seasonDateEndMobility" required>
                    </div>

                    <div class="form-group-button">
                        <button type="submit" class="btn btn-outline-primary btn-add">Pridať</button>
                    </div>
                    {{csrf_field()}}
                </form>
            </div>

        </div>

        @include('system.include.footer')

    </div>
@endsection

