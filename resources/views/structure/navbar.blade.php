<nav class="navbar navbar-expand-md navbar-bg-color white-text fixed-top">
    <a class="navbar-brand" href="{{url('/')}}">IMDB Touch</a>
    <button class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault"
            aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
            </li>
        </ul>
        {!! Form::open(['route' => 'movie.search', 'method' => 'POST', 'class' => 'form-inline my-2 my-lg-0']) !!}
            <input class="form-control mr-sm-2" type="text" name="query" value="{{old('query')}}" required minlength="3" placeholder="Search" aria-label="Search">
            <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
        {!! Form::close() !!}
    </div>
</nav>