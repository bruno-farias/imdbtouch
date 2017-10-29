@extends('structure.base')

@section('content')

    @include('structure.page_header', [
        'title' => 'Upcoming Movies',
        'content' => "See the next's on Hollywood"
    ])

    <div class="album text-muted">
        <div class="container-fluid">

            @include('partials.movie_list', ['movies' => $upcoming])
            @include('structure.pagination', [
                'pages' => $pages,
                'current' => $current
            ])

        </div>
    </div>

@endsection