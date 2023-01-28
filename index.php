<?php
/*
Creare una o più classi a vostro piacimento, che rappresentino degli oggetti comuni.
Dichiarate le sue proprietà e quindi il costruttore per istruire la classe su come, appunto, creare l'oggetto.
Instanziare almeno 3 oggetti per ciascuna classe.
Bonus: Provare a far interagire due oggetti. Per esempio, come abbiamo visto in classe, dove nella Biblioteca aggiungevamo il libro (oggetto Book).
Quindi nel bonus, il consiglio è quello di creare una classe che "contenga" un'altra. Es: Il Frigorifero con il Cibo, Il Concessionario con l'Automobile, Il Giradischi con il Vinile... etc..
*/

class Catalog {
    private $name;
    private $tvShows = [];
    private $movies = [];

    public function __construct(string $name) {
        $this->name = $name;
    }

    // Getters
    public function getName() {
        return $this->name;
    }
    public function getTvShows() {
        return $this->tvShows;
    }
    public function getMovies() {
        return $this->movies;
    }

    // Add Items
    public function addTvShow(TvShow $el) {
        $this->tvShows[] = $el;
    }
    public function addMovie(Movie $el) {
        $this->movies[] = $el;
    }
    public function addItem($el) {
        if (get_class($el) === 'Movie') {
            $this->movies[] = $el;
            return true;
        }
        if (get_class($el) === 'TvShow') {
            $this->tvShows[] = $el;
            return true;
        }
        return false;
    }
}


class TvShow {
    private $name;
    private $releaseYear;
    private $seasons;
    private $director;
    private $cast;
    private $genres;

    public function __construct(string $name, int $releaseYear, int $seasons, string $director, array $cast, array $genres)
    {
        $this->name = $name;
        $this->releaseYear = $releaseYear;
        $this->seasons = $seasons;
        $this->director = $director;
        $this->cast = $cast;
        $this->genres = $genres;
    }

    // Getters
    public function getName() {
        return $this->name;
    }
    public function getReleaseYear() {
        return $this->releaseYear;
    }
    public function getSeasons() {
        return $this->seasons;
    }
    public function getDirector() {
        return $this->director;
    }
    public function getCast() {
        return $this->cast;
    }
    public function getGenres() {
        return $this->genres;
    }
}


class Movie {
    private $name;
    private $releaseYear;
    private $director;
    private $cast;
    private $genres;

    public function __construct(string $name, int $releaseYear, string $director, array $cast, array $genres)
    {
        $this->name = $name;
        $this->releaseYear = $releaseYear;
        $this->director = $director;
        $this->cast = $cast;
        $this->genres = $genres;
    }

    // Getters
    public function getName() {
        return $this->name;
    }
    public function getReleaseYear() {
        return $this->releaseYear;
    }
    public function getDirector() {
        return $this->director;
    }
    public function getCast() {
        return $this->cast;
    }
    public function getGenres() {
        return $this->genres;
    }
}


/* Version 1.0 */
/*
$boolflix = new Catalog('Boolflix');

$avatar = new Movie('Avatar', 2009, 'Rob Zohrab', ['Sam Worthington', 'Zoe Saldaña', 'Sigourney Weaver', 'Stephen Lang', 'Michelle Rodriguez'], ['Action', 'Adventure', 'Fantasy', 'Science Fiction']);
$theGoodTheBadAndTheUgly = new Movie('The Good, the Bad and the Ugly', 1966, 'Serena Canevari', ['Clint Eastwood', 'Eli Wallach', 'Lee Van Cleef', 'Aldo Giuffrè', 'Luigi Pistilli'], ['Western']);
$theShawshankRedemption = new Movie('The Shawshank Redemption', 1994, 'Micheal Greenwood', ['Tim Robbins', 'Morgan Freeman', 'Bob Gunton', 'William Sadler', 'Clancy Brown'], ['Drama', 'Crime']);

$breakingBad = new TvShow('Breaking Bad', 2008, 5, 'Michelle MacLaren', ['Bryan Cranston', 'Aaron Paul', 'Anna Gunn', 'Dean Norris', 'Jonathan Banks'], ['drama']);
$arcane = new TvShow('Arcane', 2021, 1, 'Arnaud Delord', ['Hailee Steinfeld', 'Ella Purnell', 'Kevin Alejandro', 'Jason Spisak', 'Toks Olagundoye'], ['Animation', 'Sci-Fi & Fantasy', 'Action & Adventure', 'Drama']);
$peakyBlinders = new TvShow('Peaky Blinders', 2013, 6, '', ['Cillian Murphy', 'Paul Anderson', 'Sophie Rundle', 'Natasha O\'Keeffe'], ['Drama', 'Crime']);

$movies = [$avatar, $theGoodTheBadAndTheUgly, $theShawshankRedemption];
$tvShows = [$breakingBad, $arcane, $peakyBlinders];

foreach ($movies as $k => $v) {
    $boolflix->addMovie($v);
}
foreach ($movies as $k => $v) {
    $boolflix->addMovie($v);
}

var_dump($boolflix->getMovies());
var_dump($boolflix->getMovies());
*/


/* Version 2.0 */
/*
$boolflix = new Catalog('Boolflix');

$avatar = new Movie('Avatar', 2009, 'Rob Zohrab', ['Sam Worthington', 'Zoe Saldaña', 'Sigourney Weaver', 'Stephen Lang', 'Michelle Rodriguez'], ['Action', 'Adventure', 'Fantasy', 'Science Fiction']);
$theGoodTheBadAndTheUgly = new Movie('The Good, the Bad and the Ugly', 1966, 'Serena Canevari', ['Clint Eastwood', 'Eli Wallach', 'Lee Van Cleef', 'Aldo Giuffrè', 'Luigi Pistilli'], ['Western']);
$theShawshankRedemption = new Movie('The Shawshank Redemption', 1994, 'Micheal Greenwood', ['Tim Robbins', 'Morgan Freeman', 'Bob Gunton', 'William Sadler', 'Clancy Brown'], ['Drama', 'Crime']);

$breakingBad = new TvShow('Breaking Bad', 2008, 5, 'Michelle MacLaren', ['Bryan Cranston', 'Aaron Paul', 'Anna Gunn', 'Dean Norris', 'Jonathan Banks'], ['drama']);
$arcane = new TvShow('Arcane', 2021, 1, 'Arnaud Delord', ['Hailee Steinfeld', 'Ella Purnell', 'Kevin Alejandro', 'Jason Spisak', 'Toks Olagundoye'], ['Animation', 'Sci-Fi & Fantasy', 'Action & Adventure', 'Drama']);
$peakyBlinders = new TvShow('Peaky Blinders', 2013, 6, '', ['Cillian Murphy', 'Paul Anderson', 'Sophie Rundle', 'Natasha O\'Keeffe'], ['Drama', 'Crime']);

$movies = [$avatar, $theGoodTheBadAndTheUgly, $theShawshankRedemption];
$tvShows = [$breakingBad, $arcane, $peakyBlinders];
$all = [...$movies, ...$tvShows];

foreach($all as $k => $v) {
    $boolflix->addItem($v);
}
var_dump($boolflix->getMovies());
var_dump($boolflix->getTvShows());
*/

$boolflix = new Catalog('Boolflix');

$all = [
    new Movie('Avatar', 2009, 'Rob Zohrab', ['Sam Worthington', 'Zoe Saldaña', 'Sigourney Weaver', 'Stephen Lang', 'Michelle Rodriguez'], ['Action', 'Adventure', 'Fantasy', 'Science Fiction']),
    new TvShow('Breaking Bad', 2008, 5, 'Michelle MacLaren', ['Bryan Cranston', 'Aaron Paul', 'Anna Gunn', 'Dean Norris', 'Jonathan Banks'], ['drama']),
    new Movie('The Good, the Bad and the Ugly', 1966, 'Serena Canevari', ['Clint Eastwood', 'Eli Wallach', 'Lee Van Cleef', 'Aldo Giuffrè', 'Luigi Pistilli'], ['Western']),
    new TvShow('Arcane', 2021, 1, 'Arnaud Delord', ['Hailee Steinfeld', 'Ella Purnell', 'Kevin Alejandro', 'Jason Spisak', 'Toks Olagundoye'], ['Animation', 'Sci-Fi & Fantasy', 'Action & Adventure', 'Drama']),
    new Movie('The Shawshank Redemption', 1994, 'Micheal Greenwood', ['Tim Robbins', 'Morgan Freeman', 'Bob Gunton', 'William Sadler', 'Clancy Brown'], ['Drama', 'Crime']),
    new TvShow('Peaky Blinders', 2013, 6, '', ['Cillian Murphy', 'Paul Anderson', 'Sophie Rundle', 'Natasha O\'Keeffe'], ['Drama', 'Crime'])
];

foreach ($all as $k => $v) {
    $boolflix->addItem($v);
}

var_dump($boolflix->getMovies());
var_dump($boolflix->getTvShows());