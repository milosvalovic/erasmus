<section class="resume-section p-3 p-lg-5 " id="blog-title">
    <div class="row my-auto">
        <div class="col-12">
            <h2 class="  text-center">@lang('app.profil_blog')</h2>
            <div class="mb-5 heading-border"></div>
        </div>
        <div class="row input-items">
            <div class="col-lg-12">
                <form action="{{ url('/') }}" method="POST" enctype="application/x-www-form-urlencoded">
                    <label for="name">@lang('app.profil_blog_title')</label>
                    <input type="text" name="name" id="name" readonly
                           value="Prvý článok">
                    <div class="error text-danger">Some Errors related to something</div>
                    <label for="place">@lang('app.profil_blog_place')</label>
                    <input type="text" name="place" id="place" readonly
                           value="USA">
                    <div class="error text-danger">Some Errors related to something</div>
                    <label for="date">@lang('app.profil_blog_date')</label>
                    <input type="text" name="date" id="date" readonly
                           value="02.02.2019">
                    <div class="error text-danger">Some Errors related to something</div>
                    <label for="send"></label>
                    <label for="standalone-container">@lang('app.profil_blog_story')</label>
                    <div id="standalone-container">
                        <div id="toolbar-container">
                            <span class="ql-formats">
                              <select class="ql-font"></select>
                              <select class="ql-size"></select>
                            </span>
                            <span class="ql-formats">
                              <button class="ql-bold"></button>
                              <button class="ql-italic"></button>
                              <button class="ql-underline"></button>
                              <button class="ql-strike"></button>
                            </span>
                            <span class="ql-formats">
                              <select class="ql-color"></select>
                              <select class="ql-background"></select>
                            </span>
                            <span class="ql-formats">
                              <button class="ql-script" value="sub"></button>
                              <button class="ql-script" value="super"></button>
                            </span>
                            <span class="ql-formats">
                              <button class="ql-header" value="1"></button>
                              <button class="ql-header" value="2"></button>
                              <button class="ql-blockquote"></button>
                              <button class="ql-code-block"></button>
                            </span>
                            <span class="ql-formats">
                              <button class="ql-list" value="ordered"></button>
                              <button class="ql-list" value="bullet"></button>
                              <button class="ql-indent" value="-1"></button>
                              <button class="ql-indent" value="+1"></button>
                            </span>
                            <span class="ql-formats">
                              <button class="ql-direction" value="rtl"></button>
                              <select class="ql-align"></select>
                            </span>
                            <span class="ql-formats">
                              <button class="ql-link"></button>
                              <button class="ql-image"></button>
                              <button class="ql-video"></button>
                              <button class="ql-formula"></button>
                            </span>
                            <span class="ql-formats">
                              <button class="ql-clean"></button>
                            </span>
                        </div>
                        <div id="editor-blog"></div>
                    </div>
                    <div class="error text-danger">Some Errors related to something</div>
                    <div class="sending-button">
                        <input type="submit" name="send" id="send" value="@lang('app.profil_send')">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>