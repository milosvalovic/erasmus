@extends('system.index')

@section('content')
    <div class="admin-base-grid">
        @include('system.include.header')

        <div class="admin-title">
            <div class="admin-title-text">
                <h1>Editácia univerzity</h1>
            </div>
            <div class="admin-title-user">
                <p>Eduard Gábel</p>
                <img src="{{ asset('img/cat.png') }}" alt="">
            </div>
        </div>

        <div class="admin-content">
            <div class="admin-edit-div">
                <form class="form-add-mobility-type" id=formNewUniversity>
                    <h3>Upraviť univerzitu</h3>
                    <div class="form-group">
                        <label for="editUniversityName">Meno:</label>
                        <input type="text" class="form-control admin-form-input" id="editUniversityName" placeholder="Univerzita Konštantína Filozofa"
                               name="editUniversityName">
                    </div>
                    <div class="form-group">
                        <label for="editUniversityCountry">Krajina:</label>
                        <input type="text" class="form-control admin-form-input" id="editUniversityCountry" placeholder="Slovensko"
                               name="editUniversityCountry">
                    </div>
                    <div class="form-group">
                        <label for="editUniversityInfo">Mesto:</label>
                        <input type="text" class="form-control admin-form-input" id="editUniversityInfo" placeholder="Nitra"
                               name="editUniversityCity">
                    </div>
                    <div class="form-group">
                        <label for="editUniversityInfo">Ulica:</label>
                        <input type="text" class="form-control admin-form-input" id="editUniversityInfo" placeholder="Tr. A. Hlinku 1"
                               name="editUniversityStreet">
                    </div>
                    <div class="form-group">
                        <label for="editUniversityInfo">Info:</label>
                        <textarea type="text" class="form-control admin-form-input" id="editUniversityInfo"
                                  placeholder="Najlepšia univerzita, ktorú môže človek navštevovať, jupí. Nenávidím matematiku" name="editUniversityInfo"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="editUniversityImage">Obrázok:</label>
                        <img src="{{ asset('uploads/universities/curtin_university_australia.jpg') }}" alt="" class="admin-edit-university-image">
                        <input type="file" class="form-control admin-form-input" id="editUniversityImage" name="editUniversityImage">
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

