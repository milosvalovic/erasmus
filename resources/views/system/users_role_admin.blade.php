@extends('system.index')

@section('content')
    <div class="admin-base-grid">
        @include('system.include.header')

        <div class="admin-title">
            <div class="admin-title-text">
                <h1>Administrácia rolí u členov</h1>
            </div>
            <div class="admin-title-user">
                <p>Eduard Gábel</p>
                <img src="{{ asset('img/cat.png') }}" alt="">
            </div>
        </div>

        <div class="admin-content">

            <div class="row">
                <div class="col-xs-12 col-md-8">
                    <div class="admin-roles-table">
                        <div class="admin-roles-title">
                            <h2>Spravovanie rolí</h2>
                        </div>
                        <table class="table admin-table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Názov</th>
                                <th scope="col">Popis</th>
                                <th scope="col" class="user-form-actions">Akcie</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($roles as $role)
                            <tr>
                                <th scope="row">{{ $role->id }}</th>
                                <td>{{ $role->name }}</td>
                                <td>{{ $role->description }}</td>
                                <th scope="row">
                                    <a href="{{ action('system\UserRoleController@userRoleEditShow', ['id' => $role->id]) }}">
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

                <div class="col-xs-12 col-md-3 admin-add-new-item-div">
                    <form class="form-add-user-role" id=formNewUserRole>
                        <h3 class="form-title">Pridať rolu</h3>
                        <div class="form-group">
                            <label for="addUserRole"> Názov:</label>
                            <input type="text" class="form-control admin-form-input" id="addUserRole" placeholder="Študent">
                        </div>
                        <div class="form-group-button">
                            <button type="submit" class="btn btn-outline-primary btn-add">Pridať</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @include('system.include.footer')
    </div>
@endsection

