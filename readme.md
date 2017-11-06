# IMDB Touch



[logo]: https://scrutinizer-ci.com/g/bruno-farias/imdbtouch/badges/quality-score.png?b=development

#### A small project to fetch TMDb api data

- [Test Drive Link](https://imdb-touch.herokuapp.com/) (be patient on first run)

#### Architecture:
- PHP 7.1
- [Laravel 5.5 LTS](https://laravel.com/)

The choice for Laravel was made basically because is actually the most complete 
and productive php framework these days.
It have a complete ecosystem to create from a basic project to the most complex 
requirements a piece of cake.

- This project uses dependency injection to decouple and is one form of the broader 
technique of inversion of control
    - You can see this on app/Repositories folder, we have an interface and a class
    that do the implementation of the required methods and api calls;
    - We bind the interface and concrete class on app/Providers/AppServiceProvider.php file
    on register method
    - Once we need to call anything related to movie we simply inject the interface
    dependency on the desired class, in these project are used on:
        - app/Http/Controllers/IndexController.php
        - app/Http/Controllers/MoviesController.php

Example of use of dependency injection
```php
    // class variable that will be used 
    protected $movies;

    // On class constructor we define the dependencies
    public function __construct(MoviesInterface $movies)
    {
        // and here gives the all dependencies from interface to the class var
        $this->movies = $movies;
    }
```    

#### Assumptions

It's important to tell that, since this is a backend oriented test this was made 
to show the backend development practices instead of use a brand new JS 
framework launched yesterday on top of a fancy frontend style consuming from an
api of the application.

#### Build Instructions

1. Clone this repo on your local environment
2. Make a copy of the file .env.example as .env and add those keys:
    - TMDB_APIKEY=1f54bd990f1cdfb230adb312546d765d
    - TMDB_BASE_URI=https://api.themoviedb.org/3/
    - HTTPS=false (or true if app are on an https)
3. add this key to APP_KEY on your .env file:
    - base64:KBC4HVVpspBnIlVg8PoduM98eSYhzwRLi97RE6Vf9sA=          
4. Will find a folder "laradock", here you have a pre-packaged Docker Images to run
the project
    - Run docker-compose up -d nginx
    - Make sure that port 80 is free to use
    - Wait to download the image   
    - Run "docker-compose exec workspace bash" to access server bash
    - On server bash run: "composer install" to install php dependencies
    - Access on your browser http://localhost/ or 127.0.0.1 
    - Profit ;)
    
#### Third-party​ libraries​ used​ and why
- guzzlehttp/guzzle: HTTP client that makes it easy to send HTTP requests and 
trivial to integrate with web services.
- nesbot/carbon: Make your life easier to work with dates and everything related.
- barryvdh/laravel-ide-helper: only for dev, provides a efficient autocomplete for
ide that helps to work with third party libs and much more.
- laravelcollective/html: Laravel is focusing more on provide a strong backend structure, 
and removed all classes related to frontend to this optional package that provides helpers
to work with abstraction of Forms (with csrf protection) and HTML.

Sure that this project can be easily made without any of these libs, but all of these
make us have time to drink **more** coffee, so why not use? 