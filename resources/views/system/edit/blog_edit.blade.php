@extends('system.index')

@section('content')
    <div class="admin-base-grid">
        @include('system.include.header')

        <div class="admin-title">
            <div class="admin-title-text">
                <h1>Editácia blogu</h1>
            </div>
            <div class="admin-title-user">
                <p>Eduard Gábel</p>
                <img src="{{ asset('img/cat.png') }}" alt="">
            </div>
        </div>

        <div class="admin-content">
            <div class="admin-edit-div">
                <form class="form-edit-mobility-category" id=formNewMobilityCategory method="post" action="">
                    <h3>Editácia</h3>
                    <div class="form-group">
                        <label for="editBlogStatus">Status:</label>
                        <input type="text" class="form-control admin-form-input" id="editBlogStatus" placeholder=""
                               name="blogStatus" value="">
                    </div>
                    <div class="form-group">
                        <label for="editBlogUser">Používateľ:</label>
                        <input type="text" class="form-control admin-form-input" id="editBlogUser" placeholder=""
                               name="blogUser" value="">
                    </div>
                    <div class="form-group">
                        <label for="editBlogAffirmation">Potvrdené od:</label>
                        <input type="text" class="form-control admin-form-input" id="editBlogAffirmation" placeholder=""
                               name="blogAffirmation" value="">
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

