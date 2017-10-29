@extends('structure.base')

@section('content')

    @include('structure.page_header', [
        'title' => 'Upcoming Movies',
        'content' => "See the next's on Hollywood"
    ])

    <div class="album text-muted">
        <div class="container-fluid">

            <div class="row">
                @foreach($upcoming as $item)
                    <div class="col-xs-12 col-md-3">
                        <div class="card" style="width: 100%; min-height: 40rem">
                            <a href="{{route('movie.detail', ['id' => $item->id])}}">
                                <img class="card-img-top" src="https://image.tmdb.org/t/p/w500{{$item->poster_path}}" alt="{{$item->title}}">
                            </a>
                            <div class="card-body">
                                <h4 class="card-title" style="min-height: 2em">{{$item->title}}</h4>
                                <p class="card-text">{{str_limit($item->overview, 100)}}</p>
                                <a href="{{route('movie.detail', ['id' => $item->id])}}" class="btn btn-primary">See more</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>

@endsection