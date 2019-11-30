@extends('system.index')

@section('content')
    <div class="admin-base-grid">
        @include('system.include.header')

        <div class="admin-title">
            <div class="admin-title-text">
                <h1>Administrácia FAQ (frequently asked question)</h1>
            </div>
            <div class="admin-title-user">
                <p>Eduard Gábel</p>
                <img src="{{ asset('img/cat.png') }}" alt="">
            </div>
        </div>

        <div class="admin-content">


            <div class="row">
                <div class="col-xs-12 col-md-8">
                    <div class="admin-FAQ-table">
                        <div class="admin-images-title">
                            <h2>Spravovanie faq</h2>
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
                            @foreach($faqData as $item)
                                <tr>
                                    <th scope="row">{{ $item->ID }}</th>
                                    <td>{{ $item->name }}</td>
                                    <th scope="row">
                                        <a href="{{ action('system\FaqController@faqEditShow',['id' => $item->ID]) }}">
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
                        <nav class="admin-users-pagination">
                            {{--TODO Here pagination--}}
                        </nav>
                    </div>
                </div>

                <div class="col-xs-12 col-md-3 admin-add-new-item-div">
                    <form method="post" class="form-add-faq" id="formNewFaq" action="">
                        <h3 class="form-title">Pridať faq</h3>
                        <div class="form-group">
                            <label for="addFaqName">Názov:</label>
                            <input type="text" class="form-control admin-form-input" id="addFaqName" placeholder="Sú v tam pekné žienky?" name="faqName">
                        </div>
                        <div class="form-group">
                            <label for="addFaqDescription">Popis:</label>
                            <textarea type="text" class="form-control admin-form-input" id="addFaqDescription" placeholder="Pre moje fungovanie počas dňa potrebujem pri sebe reprezentantku nežného pohlavia" name="faqName"></textarea>
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

