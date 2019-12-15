@extends('system.index')

@section('content')
    <div class="admin-base-grid">
        @include('system.include.header')

        <div class="admin-title">
            <div class="admin-title-text">
                <h1>Administrácia kategórií mobilít</h1>
            </div>
            <div class="admin-title-user">
                <p>{{Auth::user()->roles->name . ' | '.Auth::user()->first_name . ' '. Auth::user()->last_name }}</p>
            </div>
        </div>

        <div class="admin-content">
            <div class="row">
                <div class="col-xs-12 col-md-8">
                    <div class="admin-mobility-category-table">
                        <div class="admin-mobility-category-title">
                            <h2>TabuLka kategórií</h2>
                        </div>
                        <table class="table admin-table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Názov</th>
                                <th scope="col" class="user-form-actions">Akcie</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($mobilityCategories as $category)
                            <tr>
                                <th scope="row">{{$category->ID}}</th>
                                <td>{{$category->name}}</td>
                                <th scope="row">
                                    <a href="{{ action('system\CategoryMobilityController@mobilityCategoryShow',['id' => $category->ID]) }}">
                                        <button type="button" class="btn btn-outline-warning">Upraviť</button>
                                    </a>
                                    <a href="{{route('deleteCategory',['id'=>$category->ID])}}">
                                        <button type="button" class="btn btn-outline-danger">Odstrániť</button>
                                    </a>
                                </th>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <nav class="admin-users-pagination" aria-label="Page navigation example">
                            {{--TODO Here pagination--}}
                        </nav>
                    </div>
                </div>

                <div class="col-xs-12 col-md-3 admin-add-new-item-div">
                    <form method="post" class="form-add-mobility-type" id="formNewMobilityCategory" action="{{action('system\CategoryMobilityController@addNewCategory')}}">
                        <h3>Pridať kategóriu</h3>
                        <div class="form-group">
                            <label for="addMobilityType"> Názov:</label>
                            <input type="text" class="form-control admin-form-input" id="addMobilityType" placeholder="Ceepus" name="name">
                        </div>
                        <div class="form-group-button">
                            <button type="submit" class="btn btn-outline-primary btn-add">Pridať</button>
                        </div>
                        {{csrf_field()}}
                    </form>
                </div>
            </div>
        </div>

        @include('system.include.footer')
    </div>
@endsection

