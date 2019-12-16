<header class="masthead" style="background-image: url({{ asset($background) }})">
    <div class="overlay"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 text-left">
                <div class="title">
                    @if(strlen($title)> 60)
                    @php $pieces = explode(":", $title);@endphp
                    <h1>{{$pieces[0]}}:</h1>
                    <h1>{{$pieces[1]}}</h1>
                    @else
                        <h1>{{$title}}</h1>
                    @endif
                </div>
            </div>
        </div>
    </div>
</header>