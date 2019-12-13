@extends('system.index')

@section('content')
    <div class="admin-base-grid">
        @include('system.include.header')

        <div class="admin-title">
            <div class="admin-title-text">
                <h1>Editácia mobility</h1>
            </div>
            <div class="admin-title-user">
                <p>{{Auth::user()->roles->name . ' | '.Auth::user()->first_name . ' '. Auth::user()->last_name }}</p>
            </div>
        </div>

        <div class="admin-content">

            <div class="admin-edit-div">
                <form class="form-edit-mobility" id="formEditMobility" method="post" action="{{route('editMobility')}}">
                    <h3 class="form-title">Editovanie</h3>
                    @if (session('error'))
                        <div class="alert alert-danger">
                            <h5>{{session('error')}}</h5>
                        </div>
                    @endif
                    <input type="hidden" name="id" value="{{$mobility->ID}}">
                    <div class="form-group">
                        <label for="editMobilityPartnerUniversity">Partnerská univerzita: </label>
                        <select name="university_ID" class="form-control admin-form-input"
                                id="editMobilityPartnerUniversity" required>
                            @foreach($universities as $university)
                                <option value="{{$university->ID}}"
                                        @if($university->ID == $mobility->partner_university_ID) selected="selected" @endif>{{$university->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="editMobilityType">Typ mobility:</label>
                        <select name="type_ID" class="form-control admin-form-input" id="editMobilityType"
                                required>
                            @foreach($types as $type)
                                <option value="{{$type->ID}}"
                                        @if($type->ID == $mobility->mobility_types_ID) selected="selected" @endif>{{$type->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="editMobilityCategory">Kategória mobility:</label>
                        <select name="category_ID" class="form-control admin-form-input"
                                id="editMobilityCategory" required>
                            @foreach($categories as $category)
                                <option value="{{$category->ID}}"
                                        @if($category->ID == $mobility->category_ID) selected="selected" @endif>{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="addNewUniversityInfo">Popis:</label>
                        <textarea class="form-control admin-form-input" id="addNewUniversityInfo"
                                  placeholder="" name="info" form="formEditMobility" required>{{$mobility->info}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="editMobilityGrand">Výška štipendia (€):</label>
                        <input type="text" class="form-control admin-form-input" id="editMobilityGrant"
                               placeholder="725€"
                               name="grant" value="{{$mobility->grant}}">
                    </div>
                    <div class="form-group-button">
                        <button type="submit" class="btn btn-outline-primary btn-add">Uložiť</button>
                    </div>

                    {{csrf_field()}}
                </form>
            </div>

        </div>

        @include('system.include.footer')

    </div>
@endsection

