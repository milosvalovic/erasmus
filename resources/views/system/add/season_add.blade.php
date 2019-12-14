@extends('system.index')

@section('content')
    <div class="admin-base-grid">
        @include('system.include.header')

        <div class="admin-title">
            <div class="admin-title-text">
                <h1>Pridanie novej sezóny</h1>
            </div>
            <div class="admin-title-user">
                <p>{{Auth::user()->roles->name . ' | '.Auth::user()->first_name . ' '. Auth::user()->last_name }}</p>
            </div>
        </div>

        <div class="admin-content">

            <div class="admin-add-new-item-div">
                <form id="addNewSeasonForm" method="post" action="">
                    <h3 class="form-title">Pridať sezónu</h3>

                    @if (session('error'))
                        <div class="alert alert-danger">
                            <h5>{{session('error')}}</h5>
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="addNewSeasonStartDate">Dátum začiatku registrácie:</label>
                        <input type="text" class="form-control admin-form-input" id="addNewSeasonStartDate"
                               placeholder="1.1.2019" data-provide="datepicker" data-date-format="dd.mm.yyyy"
                               name="date_start_reg" required>
                    </div>

                    <div class="form-group">
                        <label for="addNewSeasonEndDate">Dátum ukončenia registrácie:</label>
                        <input type="text" class="form-control admin-form-input" id="addNewSeasonEndDate"
                               placeholder="30.6.2019" data-provide="datepicker" data-date-format="dd.mm.yyyy"
                               name="date_end_reg" required>
                    </div>

                    <div class="form-group">
                        <label for="addNewSeasonStudentLimit">Maximálny limit študentov:</label>
                        <input type="number" class="form-control admin-form-input" id="addNewSeasonStudentLimit"
                               placeholder="20" name="count_students" required>
                    </div>

                    <div class="form-group">
                        <label for="addNewSeasonRegistrationLimit">Maximálny limit registrácii:</label>
                        <input type="number" class="form-control admin-form-input" id="addNewSeasonRegistrationLimit"
                               placeholder="70" name="count_registrations" required>
                        <label for="addNewSeasonRegistrationLimit">Bez obmedzenia</label>
                        <input type="checkbox" id="addNewSeasonRegistrationLimitInfinite">
                    </div>

                    <div class="form-group">
                        <label for="addNewSeasonMobility">Mobilita:</label>
                        <select name="mobility_ID" class="form-control admin-form-input" required>
                            <option disabled selected>Vybrať mobilitu</option>
                            @foreach($mobilities as $mobility)
                                <option value="{{$mobility->ID}}">{{$mobility->university->name . ' ('. $mobility->mobility_type->name . ' - '. $mobility->category->name .')'}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="addNewSeasonDateStartMobility">Dátum začiatku mobility:</label>
                        <input type="text" class="form-control admin-form-input" id="addNewSeasonDateStartMobility" data-provide="datepicker" data-date-format="dd.mm.yyyy"
                               placeholder="20.1.2019" name="date_start_mobility" required>
                    </div>

                    <div class="form-group">
                        <label for="addNewSeasonDateEndMobility">Dátum ukončenia mobility:</label>
                        <input type="text" class="form-control admin-form-input" id="addNewSeasonDateEndMobility" data-provide="datepicker" data-date-format="dd.mm.yyyy"
                               placeholder="30.3.2019" name="date_end_mobility" required>
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
    <script>
        var registrationLimit = 0;
        $('#addNewSeasonRegistrationLimitInfinite').change(function () {
            if ($('#addNewSeasonRegistrationLimitInfinite').is(":checked")) {
                registrationLimit = $('#addNewSeasonRegistrationLimit').val();
                $('#addNewSeasonRegistrationLimit').val(-1);
                $('#addNewSeasonRegistrationLimit').hide();
            } else {

                $('#addNewSeasonRegistrationLimit').val(registrationLimit);
                $('#addNewSeasonRegistrationLimit').show();
            }
        });
    </script>
@endsection

