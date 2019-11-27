@extends('system.index')

@section('content')
    <div class="admin-base-grid">
        @include('system.include.header')

        <div class="admin-title">
            <div class="admin-title-text">
                <h1>Editácia typu mobility</h1>
            </div>
            <div class="admin-title-user">
                <p>Eduard Gábel</p>
                <img src="{{ asset('img/cat.png') }}" alt="">
            </div>
        </div>

        <div class="admin-content">
            <div class="admin-edit-div">
                <form class="form-add-mobility-type" id="formEditMobilityType">
                    <h3>Upraviť typ</h3>
                    <div class="form-group">
                        <label for="editMobilityType">Názov:</label>
                        <input type="text" class="form-control admin-form-input" id="editMobilityType" placeholder="Študijný pobyt"
                               name="editMobilityTypeName">
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

