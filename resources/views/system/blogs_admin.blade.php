@extends('system.index')

@section('content')
    <div class="admin-base-grid">
        @include('system.include.header')

        <div class="admin-title">
            <div class="admin-title-text">
                <h1>Blogy</h1>
            </div>
            <div class="admin-title-user">
                <p>Eduard Gábel</p>
                <img src="{{ asset('img/cat.png') }}" alt="">
            </div>
        </div>

        <div class="admin-content">

            <div class="admin-blogs-table">
                <div class="admin-blogs-title">
                    <h2>Správa blogov</h2>
                </div>

                <table class="table admin-table">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Článok</th>
                        <th scope="col">Titulok</th>
                        <th scope="col">Status</th>
                        <th scope="col">Používateľ</th>
                        <th scope="col" class="user-form-actions">Akcie</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Hodnotenie pobytu</td>
                        <td>Môj najlepší študijný pobyt</td>
                        <td>Čakajúci na schválenie</td>
                        <td>Eduard Gábel</td>
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

