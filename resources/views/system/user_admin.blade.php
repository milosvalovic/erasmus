@extends('system.index')

@section('content')
    <div class="admin-welcome-page">
        @include('system.include.header')

        <div class="admin-title">
            <div class="admin-title-text">
                <h1>Používatelia</h1>
            </div>
            <div class="admin-title-user">
                <p>Eduard Gábel</p>
                <img src="{{ asset('img/cat.png') }}" alt="">
            </div>
        </div>

        <div class="admin-welcome-content">

            <div class="user-table-wrapper">
                <div class="user-table-title">
                    <h2>Spravovanie používateľov</h2>
                    <a href="#">
                        <button type="button" class="btn btn-outline-primary btn-add">Pridať používateľa</button>
                    </a>
                </div>

                <table class="table admin-table">
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
                    @foreach($users as $item)
                        <tr>
                            <th scope="row">{{$item->user_id}}</th>
                            <td>{{$item->first_name}}</td>
                            <td>{{$item->last_name}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->name}}</td>
                            <th scope="row">
                                <a href="/{{route('editUserForm',['id'=>$item->user_id])}}">
                                    <button type="button" class="btn btn-outline-warning">Upraviť</button>
                                </a>
                                <a href="{{route('deleteUser',['id'=>$item->user_id])}}">
                                    <button type="button" class="btn btn-outline-danger">Odstrániť</button>
                                </a>
                            </th>
                        </tr>
                    @endforeach
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

