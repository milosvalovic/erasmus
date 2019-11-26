@extends('system.index')

@section('content')
    <div class="admin-base-grid">
        @include('system.include.header')

        <div class="admin-title">
            <div class="admin-title-text">
                <h1>Kategória mobilít</h1>
            </div>
            <div class="admin-title-user">
                <p>Eduard Gábel</p>
                <img src="{{ asset('img/cat.png') }}" alt="">
            </div>
        </div>

        <div class="admin-content">

            <div class="admin-mobility-type-table">
                <div class="admin-mobility-type-title">
                    <h2>Správa kategórií mobilít</h2>
                    <a href="#">
                        <button type="button" class="btn btn-outline-primary btn-add">Pridať kategóriu</button>
                    </a>
                </div>

                <table class="table admin-table">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Názov</th>
                        <th scope="col">Property</th>
                        <th scope="col" class="user-form-actions">Akcie</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Študijný pobyt</td>
                        <td>studijny_pobyt</td>
                        <th scope="row">
                            <a href="/edit_category_type/'number'">
                                <button type="button" class="btn btn-outline-warning">Upraviť</button>
                            </a>
                            <a href="/delete_category_type/'number'">
                                <button type="button" class="btn btn-outline-danger">Odstrániť</button>
                            </a>
                        </th>
                    </tr>
                    <tr>
                        <th scope="row">1</th>
                        <td>Stáž</td>
                        <td>staz</td>
                        <th scope="row">
                            <a href="/edit_category_type/'number'">
                                <button type="button" class="btn btn-outline-warning">Upraviť</button>
                            </a>
                            <a href="/delete_category_type/'number'">
                                <button type="button" class="btn btn-outline-danger">Odstrániť</button>
                            </a>
                        </th>
                    </tr>
                    <tr>
                        <th scope="row">1</th>
                        <td>Prednáškový pobyt</td>
                        <td>prednaskovy_pobyt</td>
                        <th scope="row">
                            <a href="/edit_category_type/'number'">
                                <button type="button" class="btn btn-outline-warning">Upraviť</button>
                            </a>
                            <a href="/delete_category_type/'number'">
                                <button type="button" class="btn btn-outline-danger">Odstrániť</button>
                            </a>
                        </th>
                    </tr>
                    <tr>
                        <th scope="row">1</th>
                        <td>Školenie</td>
                        <td>skolenie</td>
                        <th scope="row">
                            <a href="/edit_category_type/'number'">
                                <button type="button" class="btn btn-outline-warning">Upraviť</button>
                            </a>
                            <a href="/delete_category_type/'number'">
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

