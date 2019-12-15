@extends('system.index')

@section('content')
    <div class="admin-base-grid">
        @include('system.include.header')

        <div class="admin-title">
            <div class="admin-title-text">
                <h1>Editácia záznamu otváracích hodín</h1>
            </div>
            <div class="admin-title-user">
                <p><a href="{{ action('system\ProfileController@my_profile')}}">{{ Auth::user()->first_name . ' '. Auth::user()->last_name }}</a> <span> {{ Auth::user()->roles->name }} </span></p>
                <img src="{{ asset('img/icon_logout.png') }}" alt="" class="logout-admin-button">
            </div>
        </div>

        <div class="admin-content">
            <div class="admin-edit-div">
                <form class="form-edit-hour" id="formEditOfficeHour" method="post" action="{{route("editHours")}}">
                    <h3>Editovať deň - <span>'{{ $item->day }}'</span></h3>
                    <input type="hidden" name="ID" value="{{$item->ID}}">
                    <input type="hidden" name="day" value="{{$item->day}}">
                    <div class="form-group" id="to_input">
                        <label for="editHourFrom">Od:</label>
                        <input type="text" class="form-control admin-form   -input" id="editHourFrom" placeholder=""
                               name="from" value="{{$item->from}}">
                    </div>
                    <div class="form-group" id="from_input">
                        <label for="editHourTo">Do:</label>
                        <input type="text" class="form-control admin-form-input" id="editHourTo" placeholder=""
                               name="to" value="{{$item->to}}">
                    </div>
                    <div class="form-group admin-switch-div" id="to_input">
                        <label for="editHourOff">Neúradný deň:</label>
                        <label class="switch">
                            <input type="checkbox" name="off" id="editHourOff" @if($item->off==0) checked @endif>
                            <span class="slider round" ></span>
                        </label>
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

