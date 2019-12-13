@extends('system.index')

@section('content')
    <div class="admin-base-grid">
        @include('system.include.header')

        <div class="admin-title">
            <div class="admin-title-text">
                <h1>Editácia kategórie</h1>
            </div>
            <div class="admin-title-user">
                <p>{{Auth::user()->roles->name . ' | '.Auth::user()->first_name . ' '. Auth::user()->last_name }}</p>
            </div>
        </div>

        <div class="admin-content">
            <div class="admin-edit-div">
                <form class="form-edit-mobility-category" id=formEditMobilityCategory method="post" action="{{route('editCategory')}}">
                    <h3>Editácia</h3>
                    <div class="form-group">
                        <label for="addMobilityCategory"> Názov:</label>
                        <input type="hidden" value="{{$id}}" name="id">
                        <input type="text" class="form-control admin-form-input" id="addMobilityCategory" name="name" placeholder="Študijný pobyt" value="{{$category->name}}">
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

