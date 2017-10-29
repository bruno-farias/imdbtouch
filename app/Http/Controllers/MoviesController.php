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
}
