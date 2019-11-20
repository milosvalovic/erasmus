@extends('system.index')

@section('content')
    <div class="admin-base-grid">
        @include('system.include.header')

        <div class="admin-title">
            <div class="admin-title-text">
                <h1>Mobility</h1>
            </div>
            <div class="admin-title-user">
                <p>Eduard Gábel</p>
                <img src="{{ asset('img/cat.png') }}" alt="">
            </div>
        </div>

        <div class="admin-content">
            <div class="admin-mobilities-table">
                <div class="admin-mobilities-title">
                    <h2>Správa mobilít</h2>
                    <a href="#">
                        <button type="button" class="btn btn-outline-primary btn-add">Pridať mobilitu</button>
                    </a>
                </div>

                <table class="table users-table">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Názov partnerskej university</th>
                        <th scope="col">Krajina</th>
                        <th scope="col">Erasmus/Ceepus</th>
                        <th scope="col">Kategória</th>
                        <th scope="col" class="user-form-actions">Akcie</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Paris Sciences et Lettres</td>
                        <td>Francúzsko</td>
                        <td>Erazmus</td>
                        <td>Študijný pobyt</td>
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

            </div>
        </div>




        @include('system.include.footer')
    </div>
@endsection

