@extends('system.index')

@section('content')
    <div class="admin-welcome-page">
        @include('system.include.header')
        <div class="admin-welcome-title">
            <div class="admin-welcome-title-title">
                <h1>Používatelia</h1>
            </div>

            <div class="admin-welcome-title-user-profile">
                <p>Eduard Gábel</p>
                <img src="{{ asset('img/cat.png') }}" alt="">
            </div>
        </div>

        <div class="admin-welcome-content">

            <div class="user-table-wrapper">
                <div class="user-table-title">
                    <h2>Správa používateľov</h2>
                    <a href="#">
                        <button type="button" class="btn btn-outline-primary btn-add">Pridať používateľa</button>
                    </a>
                </div>

                <table class="table users-table">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Meno</th>
                        <th scope="col">Priezvisko</th>
                        <th scope="col">Email</th>
                        <th scope="col">Rola</th>
                        <th scope="col" class="user-form-actions">Akcie</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td><a href="/edit-user/#">Eduard</a></td>
                        <td><a href="/edit-user/#">Gábel</a></td>
                        <td>eduard@gmail.com</td>
                        <td>Administrátor</td>
                        <th scope="row">
                            <a href="/edit-user/'number'">
                                <button type="button" class="btn btn-outline-warning">Upraviť</button>
                            </a>
                            <a href="/delete-user/'number'">
                                <button type="button" class="btn btn-outline-danger">Odstrániť</button>
                            </a>
                        </th>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td><a href="/edit-user/#">Bencé</a></td>
                        <td><a href="/edit-user/#">Máte</a></td>
                        <td>bence@gmail.com</td>
                        <td>Administrátor</td>
                        <th scope="row">
                            <a href="/edit-user/'number'">
                                <button type="button" class="btn btn-outline-warning">Upraviť</button>
                            </a>
                            <a href="/delete-user/'number'">
                                <button type="button" class="btn btn-outline-danger">Odstrániť</button>
                            </a>
                        </th>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td><a href="/edit-user/#">Dušan</a></td>
                        <td><a href="/edit-user/#">Orlíček</a></td>
                        <td>dusan@gmail.com</td>
                        <td>Administrátor</td>
                        <th scope="row">
                            <a href="/edit-user/'number'">
                                <button type="button" class="btn btn-outline-warning">Upraviť</button>
                            </a>
                            <a href="/delete-user/'number'">
                                <button type="button" class="btn btn-outline-danger">Odstrániť</button>
                            </a>
                        </th>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td><a href="/edit-user/#">Miloš</a></td>
                        <td><a href="/edit-user/#">Valovič</a></td>
                        <td>milos@gmail.com</td>
                        <td>Administrátor</td>
                        <th scope="row">
                            <a href="/edit-user/'number'">
                                <button type="button" class="btn btn-outline-warning">Upraviť</button>
                            </a>
                            <a href="/delete-user/'number'">
                                <button type="button" class="btn btn-outline-danger">Odstrániť</button>
                            </a>
                        </th>
                    </tr>
                    </tbody>
                </table>

                <nav class="admin-users-pagination" aria-label="Page navigation example">
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

