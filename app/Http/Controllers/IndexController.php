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


    public function index()
    {
        return view('index', [
            'upcoming' => $this->movies->getUpcomingMovies()
        ]);
    }
}
