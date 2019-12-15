@extends('system.index')

@section('content')
    <div class="admin-base-grid">
        @include('system.include.header')

        <div class="admin-title">
            <div class="admin-title-text">
                <h1>Editácia FAQ</h1>
            </div>
            <div class="admin-title-user">
                <p><a href="{{ action('system\ProfileController@my_profile')}}">{{ Auth::user()->first_name . ' '. Auth::user()->last_name }}</a> <span> {{ Auth::user()->roles->name }} </span></p>
                <img src="{{ asset('img/icon_logout.png') }}" alt="" class="logout-admin-button">
            </div>
        </div>

        <div class="admin-content">
            <div class="admin-edit-div">
                <form class="form-edit-faq" id=formEditFaq method="post" action="{{route('editFaq')}}">
                    <h3>Editácia</h3>
                    @if (session('error'))
                        <div class="alert alert-danger">
                            <h5>{{session('error')}}</h5>
                        </div>
                    @endif
                    <input type="hidden" name="id" value="{{$faqData->ID}}" required>
                    <div class="form-group">
                        <label for="editFaqName">Názov:</label>
                        <input type="text" class="form-control admin-form-input" id="editFaqName" placeholder=""
                               name="name" value="{{$faqData->name}}">
                    </div>
                    <div class="form-group">
                        <label for="editor">Popis:</label>
                        <textarea id="summernote" name="description" form="formEditFaq" required>{{$faqData->description}}</textarea>
                    </div>
                    <div class="form-group-button">
                        <button type="submit" class="btn btn-outline-primary btn-add">Uložiť</button>
                    </div>

                        {{csrf_field()}}
                </form>
            </div>
        </div>

        @include('system.include.footer')

    </div>

    <script>
        $('#summernote').summernote({
            height: 'auto'
        });
        $('.dropdown-toggle').dropdown()
    </script>
@endsection

