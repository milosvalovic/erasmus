@extends('system.index')

@section('content')
    <div class="admin-base-grid">
        @include('system.include.header')

        <div class="admin-title">
            <div class="admin-title-text">
                <h1>Administrácia otváracích hodín</h1>
            </div>
            <div class="admin-title-user">
                <p>Eduard Gábel</p>
                <img src="{{ asset('img/cat.png') }}" alt="">
            </div>
        </div>

        <div class="admin-content">
            <div class="admin-office-hours-table">
                <div class="admin-office-hours-title">
                    <h2>Spravovanie rolí</h2>
                    <a href="#">
                        <button type="button" class="btn btn-outline-primary btn-add">Pridať rolu</button>
                    </a>
                </div>

                <table class="table admin-table">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Deň</th>
                        <th scope="col">Od</th>
                        <th scope="col">Do</th>
                        <th scope="col" class="user-form-actions">Akcie</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Streda</td>
                        <td>6:30</td>
                        <td>22:00</td>
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

