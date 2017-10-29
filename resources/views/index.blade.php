@extends('structure.base')

@section('content')

    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Upcoming Movies</h1>
            <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.</p>
        </div>
    </section>

    <div class="album text-muted">
        <div class="container-fluid">

            <div class="row">
                @foreach($upcoming as $item)
                    <div class="col-xs-12 col-md-3">
                        <div class="card" style="width: 100%; min-height: 40rem">
                            <img class="card-img-top" src="https://image.tmdb.org/t/p/w500{{$item->poster_path}}" alt="{{$item->title}}">
                            <div class="card-body">
                                <h4 class="card-title" style="min-height: 2em">{{$item->title}}</h4>
                                <p class="card-text">{{str_limit($item->overview, 100)}}</p>
                                <a href="#" class="btn btn-primary">See more</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>

@endsection