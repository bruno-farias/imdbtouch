<?php

namespace App\Repositories\Contracts;


interface MoviesInterface
{

    public function getUpcomingMovies(int $page = 1);

    public function movieDetails(int $id);

    public function search($query, int $page = 1);

}