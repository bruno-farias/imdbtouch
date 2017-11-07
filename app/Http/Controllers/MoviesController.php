<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\MoviesInterface;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
    protected $movies;

    public function __construct(MoviesInterface $movies)
    {
        $this->movies = $movies;
    }

    public function detail($id)
    {
        return view('movies.details', [
            'movie' => $this->movies->movieDetails($id)
        ]);
    }

    public function search(Request $request, $page = 1)
    {
        if ($request->post('query')) {
            $query = $request->post('query');
            $request->session()->put('query', $query);
        } elseif (!is_null($request->get('query'))) {
            $query = $request->get('query');
            $request->session()->put('query', $query);
        } else {
            $query = session('query');
        }

        $page = (!is_null($page) ? $page : 1);

        $res = $this->movies->search($query, $page);

        $pages = range(($page == 1) ? $page : $page - 1, ($page == $res->total_pages) ? $page : $res->total_pages);

        return view('movies.search_result', [
            'result' => $res->results,
            'query' => $query,
            'current' => $res->page,
            'pages' => $pages
        ]);
    }
}
