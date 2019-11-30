@extends('system.index')

@section('content')
    <div class="admin-base-grid">
        @include('system.include.header')

        <div class="admin-title">
            <div class="admin-title-text">
                <h1>Editácia mobility</h1>
            </div>
            <div class="admin-title-user">
                <p>Eduard Gábel</p>
                <img src="{{ asset('img/cat.png') }}" alt="">
            </div>
        </div>

        <div class="admin-content">

            <div class="admin-edit-div">
                <form class="form-edit-mobility" id="formEditMobility" method="post" action="">
                    <h3 class="form-title">Editovanie</h3>
                    <div class="form-group">
                        <label for="editMobilityPartnerUniversity">Partnerská univerzita: </label>
                        <select name="universityId" class="form-control admin-form-input" id="editMobilityPartnerUniversity" required>
{{--                            @foreach($universities as $university)--}}
{{--                                <option value="{{$university->ID}}"--}}
{{--                                        @if($university->ID == $mobility->partner_university_ID) selected="selected" @endif>{{$university->name}}</option>--}}
{{--                            @endforeach--}}
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="editMobilityCountry">Krajina:</label>
                        <select name="countryId" class="form-control admin-form-input" id="editMobilityCountry" required>
                            {{--                            @foreach($universities as $university)--}}
                            {{--                                <option value="{{$university->ID}}"--}}
                            {{--                                        @if($university->ID == $mobility->partner_university_ID) selected="selected" @endif>{{$university->name}}</option>--}}
                            {{--                            @endforeach--}}
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="editMobilityType">Typ mobility:</label>
                        <select name="mobilityTypeId" class="form-control admin-form-input" id="editMobilityType" required>
                            {{--                            @foreach($universities as $university)--}}
                            {{--                                <option value="{{$university->ID}}"--}}
                            {{--                                        @if($university->ID == $mobility->partner_university_ID) selected="selected" @endif>{{$university->name}}</option>--}}
                            {{--                            @endforeach--}}
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="editMobilityCategory">Kategória mobility:</label>
                        <select name="mobilityCategoryId" class="form-control admin-form-input" id="editMobilityCategory" required>
                            {{--                            @foreach($universities as $university)--}}
                            {{--                                <option value="{{$university->ID}}"--}}
                            {{--                                        @if($university->ID == $mobility->partner_university_ID) selected="selected" @endif>{{$university->name}}</option>--}}
                            {{--                            @endforeach--}}
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="editMobilityGrand">Výška štipendia</label>
                        <input type="text" class="form-control admin-form-input" id="editMobilityGrand" placeholder="725€"
                               name="mobilityGrand" value="">
                    </div>
                    <div class="form-group-button">
                        <button type="submit" class="btn btn-outline-primary btn-add">Uložiť</button>
                    </div>
                </form>
            </div>

        </div>

        @include('system.include.footer')

    </div>
@endsection

