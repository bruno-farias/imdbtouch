<?php

namespace Tests\Feature;

use Tests\TestCase;

class MoviesTest extends TestCase
{
    protected $movies;

    public function setUp()
    {

        parent::setUp();

        $this->movies = $this->app->make('App\Repositories\Contracts\MoviesInterface');
    }

    public function testGetUpcomingMovies()
    {
        $response = $this->movies->getUpcomingMovies();

        $this->assertGreaterThan(0, $response);
    }

    public function testMoviesDetails()
    {
        $response = $this->movies->movieDetails(11);

        $this->assertObjectHasAttribute('original_title', $response);
        $this->assertObjectHasAttribute('release_date', $response);
        $this->assertObjectHasAttribute('poster_path', $response);
    }

    public function testMovieSearch()
    {
        $response = $this->movies->search('Captain Ph');

        $this->assertObjectHasAttribute('page', $response);
        $this->assertObjectHasAttribute('total_pages', $response);
        $this->assertGreaterThan(1, count($response->results));
    }
}
