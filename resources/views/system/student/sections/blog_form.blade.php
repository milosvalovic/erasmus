<section class="resume-section p-3 p-lg-5 " id="blog-title">
    <div class="row my-auto">
        <div class="col-12">
            <h2 class="  text-center">@lang('app.profil_blog')</h2>
            <div class="mb-5 heading-border"></div>
        </div>
        <div class="row input-items">
            <div class="col-lg-12">
                <form action="{{ action('blog\BlogController@insertArticle') }}" method="POST" enctype="application/x-www-form-urlencoded" id="new-blog-post">
                    <label for="name">@lang('app.profil_blog_title')</label>
                    <input type="text" name="title" id="title" value=""
                           placeholder="@lang('app.profil_article_title')">
                    @if ($errors->any())
                        @foreach ($errors->get('title') as $error)
                            <div class="error text-danger">{{$error}}</div>
                        @endforeach
                    @endif
                    <label for="place">@lang('app.profil_blog_place')</label>
                    <input type="text" name="place" id="place" readonly
                           value="USA">
                    @if ($errors->any())
                        @foreach ($errors->get('place') as $error)
                            <div class="error text-danger">{{$error}}</div>
                        @endforeach
                    @endif
                    <label for="date">@lang('app.profil_blog_date')</label>
                    <input type="text" name="date" id="date"
                           value="{{ date("d.m.Y") }}">
                    @if ($errors->any())
                        @foreach ($errors->get('date') as $error)
                            <div class="error text-danger">{{$error}}</div>
                        @endforeach
                    @endif
                    <label for="send"></label>
                    <label for="standalone-container">@lang('app.profil_blog_story')</label>
                    <div id="standalone-container">
                        <div id="toolbar-container">
                            <span class="ql-formats">
                              <button class="ql-bold"></button>
                              <button class="ql-italic"></button>
                              <button class="ql-underline"></button>
                            </span>
                            <span class="ql-formats">
                              <button class="ql-header" value="1"></button>
                              <button class="ql-header" value="2"></button>
                            </span>
                            <span class="ql-formats">
                              <button class="ql-list" value="ordered"></button>
                              <button class="ql-list" value="bullet"></button>
                            </span>
                            <span class="ql-formats">
                              <button class="ql-image"></button>
                            </span>
                        </div>
                        <div id="editor-blog"></div>
                    </div>
                    @if ($errors->any())
                        @foreach ($errors->get('article') as $error)
                            <div class="error text-danger">{{$error}}</div>
                        @endforeach
                    @endif
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="submit-button">
                        <input type="submit" name="send" id="send" value="@lang('app.profil_send')">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>