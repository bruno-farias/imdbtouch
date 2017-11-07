@extends('structure.base')

@section('content')

    @include('structure.page_header', [
        'title' => 'Search for: ' . $query,
        'content' => "Find what you are looking for"
    ])

    <div class="album text-muted">
        <div class="container-fluid">

            @include('partials.movie_list', ['movies' => $result])
            @include('structure.pagination', [
                'pages' => $pages,
                'current' => $current,
                'route' => 'movie.search'
            ])

        </div>
    </div>

@endsection