<?php

namespace App\Repositories;


use App\Repositories\Contracts\MoviesInterface;
use GuzzleHttp\Client;

class Movies implements MoviesInterface
{

    public function getUpcomingMovies(int $page = 1)
    {
        $base_uri = 'https://api.themoviedb.org/3/';
        $uri = $base_uri . 'movie/upcoming?api_key=' . env('TMDB_APIKEY') . '&language=en-US&page=' . $page;

        $client = new Client();
        $res = $client->request('GET', $uri);

        $res = \GuzzleHttp\json_decode($res->getBody());

        return $res->results;
    }
}