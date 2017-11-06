<?php

namespace App\Repositories;


use App\Repositories\Contracts\MoviesInterface;
use GuzzleHttp\Client;

class Movies implements MoviesInterface
{

    protected $client;

    public function __construct()
    {
        $this->client = new Client();
    }


    protected function fetchAPI($uri, $method = 'GET')
    {
        try {
            $res = $this->client->request($method, $uri);
            return \GuzzleHttp\json_decode($res->getBody());
        } catch (\Exception $exception) {
            return abort($exception->getCode());
        }
    }

    public function getUpcomingMovies(int $page = 1)
    {

        $uri = env('TMDB_BASE_URI') . 'movie/upcoming?api_key=' . env('TMDB_APIKEY') . '&language=en-US&page=' . $page;

        $res = $this->fetchAPI($uri);

        return $res->results;
    }

    public function movieDetails(int $id)
    {
        $uri = env('TMDB_BASE_URI') . 'movie/' . $id . '?api_key=' . env('TMDB_APIKEY') . '&language=en-US';

        $res = $this->fetchAPI($uri);

        return $res;
    }

    public function search($query, int $page = 1)
    {
        $uri = env('TMDB_BASE_URI') . 'search/movie?api_key=' . env('TMDB_APIKEY') . '&language=en-US&query=' . $query .
            '&page=' . $page . '&include_adult=false';

        $res = $this->fetchAPI($uri);

        return $res;
    }


}