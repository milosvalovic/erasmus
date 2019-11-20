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
            <div class="admin-universities-table">
                <div class="admin-universities-title">
                    <h2>Správa univerzít</h2>
                    <a href="#">
                        <button type="button" class="btn btn-outline-primary btn-add">Pridať univerzitu</button>
                    </a>
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
                    <tr>
                        <th scope="row">1</th>
                        <td>Univerzita Konštantína Filozofa</td>
                        <td>Slovenská republika</td>
                        <td>Nitra</td>
                        <td>Tr. A. Hlinku 1</td>
                        <td><img src="{{ asset('img/curtin_university_australia.jpg') }}" alt=""
                            class="image-in-table"></td>
                        <th scope="row">
                            <a href="/edit-role/'number'">
                                <button type="button" class="btn btn-outline-warning">Upraviť</button>
                            </a>
                            <a href="/edit-role/'number'">
                                <button type="button" class="btn btn-outline-danger">Odstrániť</button>
                            </a>
                        </th>
                    </tr>
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




        @include('system.include.footer')
    </div>
@endsection

