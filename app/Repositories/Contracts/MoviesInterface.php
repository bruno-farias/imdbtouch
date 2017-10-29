<?php

namespace App\Repositories\Contracts;


interface MoviesInterface
{

    public function getUpcomingMovies(int $page = 1);

}