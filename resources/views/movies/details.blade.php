@extends('structure.base')

@section('content')

    @include('structure.page_header', [
            'title' => $movie->title,
            'content' => $movie->tagline
        ])

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-6">
                <img src="https://image.tmdb.org/t/p/w500{{$movie->poster_path}}" alt="{{$movie->title}}">
            </div>
            <div class="col-xs-12 col-md-6">
                <img src="https://image.tmdb.org/t/p/w500{{$movie->backdrop_path}}" alt="">
                @foreach($movie->genres as $genre)
                    <span class="badge badge-secondary">{{$genre->name}}</span>
                @endforeach
                <div class="alert alert-primary release-date" role="alert">
                    Release date: {{\Carbon\Carbon::parse($movie->release_date)->format('jS \\of F Y')}}
                </div>
                <p style="margin-top: 1em">{{$movie->overview}}</p>
            </div>
        </div>
    </div>

@endsection