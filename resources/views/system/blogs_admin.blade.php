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
                    <h2>Spravovanie blogov</h2>
                </div>
                <table class="table admin-table">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Titulok</th>
                        <th scope="col">Dátum zverejnenia</th>
                        <th scope="col">Používateľ</th>
                        <th scope="col">Potvrdené od</th>
                        <th scope="col">Status</th>
                        <th scope="col" class="user-form-actions">Akcie</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($blogs as $blog)
                        <tr>
                            <th scope="row">{{ $blog->ID }}</th>
                            <td>{{ $blog->title }}</td>
                            <td>{{ $blog->publish_date }}</td>
                            <td>{{ $blog->users_ID }}</td>
                            <td>{{ $blog->confirm_by }}</td>
                            <td>
                                <div class="form-check">
                                    <input @if($blog->status == 1) checked="checked" @endif
                                            type="checkbox" class="form-check-input" id="setBlogStatus">
                                    <label for="setBlogStatus">@if($blog->status == 1) Akceptovaný @else Neakceptovaný @endif</label>
                                </div>
                            </td>
                            <th scope="row">
                                <a href="{{--Uložiť zmeny--}}#">
                                    <button type="button" class="btn btn-outline-primary">Uložiť</button>
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
                    {{--TODO Here pagination--}}
                </nav>
            </div>

        </div>

        @include('system.include.footer')
    </div>
@endsection

