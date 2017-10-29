<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\MoviesInterface;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    protected $movies;

    public function __construct(MoviesInterface $movies)
    {
        $this->movies = $movies;
    }


    public function index($page = 1)
    {

        $pages = range(($page == 1) ? $page : $page -1, $page +1);

        return view('index', [
            'upcoming' => $this->movies->getUpcomingMovies($page),
            'pages' => $pages,
            'current' => $page
        ]);
    }
}
