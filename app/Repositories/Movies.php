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

    protected function createUri(string $method, $query = null, $page = null, $lang = 'en-US', $adult = false)
    {
        $baseUri = env('TMDB_BASE_URI');
        $key = env('TMDB_APIKEY');

        $res = "$baseUri$method?api_key=$key&language=$lang";

        if (!is_null($query)) {
            $res .= "&query=$query";
        }

        if (!is_null($page)) {
            $res .= "&page=$page";
        }

        $adult = ($adult) ? 'true' : 'false';

        $res .= "&include_adult=$adult";

        return $res;
    }

    public function getUpcomingMovies(int $page = 1)
    {
        $res = $this->fetchAPI($this->createUri('movie/upcoming', null, $page));

        return $res->results;
    }

    public function movieDetails(int $id)
    {
        return $this->fetchAPI($this->createUri('movie/' . $id));
    }

    public function search($query, int $page = 1)
    {
        return $this->fetchAPI($this->createUri('search/movie', $query, $page, 'en-US', true));
    }


}