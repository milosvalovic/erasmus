@foreach( $article as $content)
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    {!! $content->article !!}
                </div>
            </div>
        </div>
    </article>
@endforeach