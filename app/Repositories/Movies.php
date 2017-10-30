<?php

namespace App\Repositories;


use App\Repositories\Contracts\MoviesInterface;
use GuzzleHttp\Client;

class Movies implements MoviesInterface
{

    protected $base_uri = 'https://api.themoviedb.org/3/';
    protected $client;

    public function __construct()
    {
        $this->client = $client = new Client();
    }

    public function getUpcomingMovies(int $page = 1)
    {

        $uri = $this->base_uri . 'movie/upcoming?api_key=' . env('TMDB_APIKEY') . '&language=en-US&page=' . $page;

        $res = $this->client->request('GET', $uri);
        $res = \GuzzleHttp\json_decode($res->getBody());

        return $res->results;
    }

    public function movieDetails(int $id)
    {
        $uri = $this->base_uri . 'movie/' . $id . '?api_key=' . env('TMDB_APIKEY') . '&language=en-US';

        $res = $this->client->request('GET', $uri);
        $res = \GuzzleHttp\json_decode($res->getBody());

        return $res;
    }

    public function search($query, int $page = 1)
    {
        $uri = $this->base_uri . 'search/movie?api_key=' . env('TMDB_APIKEY') . '&language=en-US&query=' . $query .
            '&page=' . $page .'&include_adult=false';

        $res = $this->client->request('GET', $uri);
        $res = \GuzzleHttp\json_decode($res->getBody());

        return $res;
    }


}