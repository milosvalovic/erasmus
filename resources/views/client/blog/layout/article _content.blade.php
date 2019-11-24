@foreach( $article as $content)
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="c">
                    {!! $content->article !!}
                    </div>
                </div>
            </div>
        </div>
    </article>
@endforeach