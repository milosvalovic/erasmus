@extends('system.index')

@section('content')
    <div class="admin-base-grid">
        @include('system.include.header')

        <div class="admin-title">
            <div class="admin-title-text">
                <h1>Editácia záznamu otváracích hodín</h1>
            </div>
            <div class="admin-title-user">
                <p>Eduard Gábel</p>
                <img src="{{ asset('img/cat.png') }}" alt="">
            </div>
        </div>

        <div class="admin-content">
            <div class="admin-edit-div">
                <form class="form-edit-hour" id="formEditOfficeHour" method="post" action="">
                    <h3>Editovať deň - <span>'{{ $item->day }}'</span></h3>
                    <div class="form-group">
                        <label for="editHourFrom">Od:</label>
                        <input type="text" class="form-control admin-form-input" id="editHourFrom" placeholder=""
                               name="hourFrom" value="">
                    </div>
                    <div class="form-group">
                        <label for="editHourTo">Do:</label>
                        <input type="text" class="form-control admin-form-input" id="editHourTo" placeholder=""
                               name="hourTo" value="">
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

