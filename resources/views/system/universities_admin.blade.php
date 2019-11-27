@extends('system.index')

@section('content')
    <div class="admin-base-grid">
        @include('system.include.header')

        <div class="admin-title">
            <div class="admin-title-text">
                <h1>Administrácia partnerských universít</h1>
            </div>
            <div class="admin-title-user">
                <p>Eduard Gábel</p>
                <img src="{{ asset('img/cat.png') }}" alt="">
            </div>
        </div>

        <div class="admin-content">
            <div class="row">
                <div class="col-xs-12 col-md-8">
                    <div class="admin-universities-table">
                        <div class="admin-universities-title">
                            <h2>Správa univerzít</h2>
                        </div>

                        <table class="table admin-table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Názov univerzity</th>
                                <th scope="col">Krajina</th>
                                <th scope="col">Mesto</th>
                                <th scope="col">Ulica</th>
                                <th scope="col">Obrázok</th>
                                <th scope="col" class="user-form-actions">Akcie</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($universities as $university)
                            <tr>
                                <th scope="row">{{$university->ID}}</th>
                                <td>{{$university->name}}</td>
                                <td>{{$university->country_ID}}</td>
                                <td>{{$university->city}}</td>
                                <td>{{$university->address}}</td>

                                <td><img src="{{ asset('uploads/universities/'.$university->img_url) }}" alt=""
                                         class="image-in-table"></td>
                                <th scope="row">
                                    <a href="{{ action('system\UniversityController@universityEditShow',['id' => $university->ID]) }}">
                                        <button type="button" class="btn btn-outline-warning">Upraviť</button>
                                    </a>
                                    <a href="/edit-role/'number'">
                                        <button type="button" class="btn btn-outline-danger">Odstrániť</button>
                                    </a>
                                </th>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <nav class="admin-users-pagination">
                            <ul class="pagination">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1"><</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#"> > </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <div class="col-xs-12 col-md-3 admin-add-new-item-div">
                    <form class="form-add-mobility-type" id=formNewUniversity>
                        <h3>Pridať univerzitu</h3>
                        <div class="form-group">
                            <label for="addNewUniversityName">Meno:</label>
                            <input type="text" class="form-control admin-form-input" id="addNewUniversityName" placeholder="Univerzita Konštantína Filozofa"
                            name="universityName">
                        </div>
                        <div class="form-group">
                            <label for="addNewUniversityCountry">Krajina:</label>
                            <input type="text" class="form-control admin-form-input" id="addNewUniversityCountry" placeholder="Slovensko"
                            name="universityCountry">
                        </div>
                        <div class="form-group">
                            <label for="addNewUniversityCity">Mesto:</label>
                            <input type="text" class="form-control admin-form-input" id="addNewUniversityCity" placeholder="Nitra"
                            name="universityCity">
                        </div>
                        <div class="form-group">
                            <label for="addNewUniversityStreet">Ulica:</label>
                            <input type="text" class="form-control admin-form-input" id="addNewUniversityStreet" placeholder="Tr. A. Hlinku 1"
                            name="universityStreet">
                        </div>
                        <div class="form-group">
                            <label for="addNewUniversityInfo">Info:</label>
                            <textarea type="text" class="form-control admin-form-input" id="addNewUniversityInfo"
                                      placeholder="Najlepšia univerzita, ktorú môže človek navštevovať, jupí. Nenávidím matematiku" name="universityInfo"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="addNewUniversityImage">Obrázok:</label>
                            <input type="file" class="form-control admin-form-input" id="addNewUniversityImage" name="universityImage">
                        </div>
                        <div class="form-group-button">
                            <button type="submit" class="btn btn-outline-primary btn-add">Uložiť</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>

        @include('system.include.footer')
    </div>
@endsection

