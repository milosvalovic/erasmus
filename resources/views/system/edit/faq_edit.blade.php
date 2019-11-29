@extends('system.index')

@section('content')
    <div class="admin-base-grid">
        @include('system.include.header')

        <div class="admin-title">
            <div class="admin-title-text">
                <h1>Editácia FAQ</h1>
            </div>
            <div class="admin-title-user">
                <p>Eduard Gábel</p>
                <img src="{{ asset('img/cat.png') }}" alt="">
            </div>
        </div>

        <div class="admin-content">
            <div class="admin-edit-div">
                <form class="form-edit-faq" id=formNewMobilityCategory method="post" action="">
                    <h3>Editácia</h3>
                    <div class="form-group">
                        <label for="editFaqName">Názov:</label>
                        <input type="text" class="form-control admin-form-input" id="editFaqName" placeholder=""
                               name="faqName" value="">
                    </div>
                    <div class="form-group">
                        <label for="editFaqDescription">Popis:</label>
                        <textarea type="text" class="form-control admin-form-input" id="editFaqDescription" placeholder=""
                                  name="faqDescription"></textarea>
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

