<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MoviesApiController extends AbstractController
{

    /**
     * @Route ("/movies/search", name="moviesearch")
     */
    public function searchMovie() {

        if(isset($_POST['movietosearch']) && strlen($_POST['movietosearch']) > 0) {
            $_movie = $_POST['movietosearch'];
        } else {
            return $this->redirectToRoute('home');
        }

        $_movies = '{"page":1,"total_results":48,"total_pages":3,"results":[{"popularity":49.559,"vote_count":21062,"video":false,"poster_path":"\/cezWGskPY5x7GaglTTRN4Fugfb8.jpg","id":24428,"adult":false,"backdrop_path":"\/hbn46fQaRmlpBuUrEiFqv0GDL6Y.jpg","original_language":"en","original_title":"The Avengers","genre_ids":[28,12,878],"title":"The Avengers","vote_average":7.7,"overview":"When an unexpected enemy emerges and threatens global safety and security, Nick Fury, director of the international peacekeeping agency known as S.H.I.E.L.D., finds himself in need of a team to pull the world back from the brink of disaster. Spanning the globe, a daring recruitment effort begins!","release_date":"2012-04-25"},{"popularity":40.629,"vote_count":10479,"video":false,"poster_path":"\/or06FN3Dka5tukK1e9sl16pB3iy.jpg","id":299534,"adult":false,"backdrop_path":"\/7RyHsO4yDXtBv1zUU3mTpHeQ0d5.jpg","original_language":"en","original_title":"Avengers: Endgame","genre_ids":[28,12,878],"title":"Avengers: Endgame","vote_average":8.3,"overview":"After the devastating events of Avengers: Infinity War, the universe is in ruins due to the efforts of the Mad Titan, Thanos. With the help of remaining allies, the Avengers must assemble once more in order to undo Thanos\' actions and restore order to the universe once and for all, no matter what consequences may be in store.","release_date":"2019-04-24"},{"popularity":82.669,"vote_count":16029,"video":false,"poster_path":"\/7WsyChQLEftFiDOVTGkv3hFpyyt.jpg","id":299536,"adult":false,"backdrop_path":"\/bOGkgRGdhrBYJSLpXaxhXVstddV.jpg","original_language":"en","original_title":"Avengers: Infinity War","genre_ids":[28,12,878],"title":"Avengers: Infinity War","vote_average":8.3,"overview":"As the Avengers and their allies have continued to protect the world from threats too large for any one hero to handle, a new danger has emerged from the cosmic shadows: Thanos. A despot of intergalactic infamy, his goal is to collect all six Infinity Stones, artifacts of unimaginable power, and use them to inflict his twisted will on all of reality. Everything the Avengers have fought for has led up to this moment - the fate of Earth and existence itself has never been more uncertain.","release_date":"2018-04-25"},{"popularity":32.345,"vote_count":14647,"video":false,"poster_path":"\/t90Y3G8UGQp0f0DrP60wRu9gfrH.jpg","id":99861,"adult":false,"backdrop_path":"\/rFtsE7Lhlc2jRWF7SRAU0fvrveQ.jpg","original_language":"en","original_title":"Avengers: Age of Ultron","genre_ids":[28,12,878],"title":"Avengers: Age of Ultron","vote_average":7.3,"overview":"When Tony Stark tries to jumpstart a dormant peacekeeping program, things go awry and Earth’s Mightiest Heroes are put to the ultimate test as the fate of the planet hangs in the balance. As the villainous Ultron emerges, it is up to The Avengers to stop him from enacting his terrible plans, and soon uneasy alliances and unexpected action pave the way for an epic and unique global adventure.","release_date":"2015-04-22"},{"popularity":9.779,"id":9320,"video":false,"vote_count":375,"vote_average":4.3,"title":"The Avengers","release_date":"1998-08-13","original_language":"en","original_title":"The Avengers","genre_ids":[53,878],"backdrop_path":"\/8YW4rwWQgC2JRlBcpStMNUko13k.jpg","adult":false,"overview":"British Ministry agent John Steed, under direction from \"Mother\", investigates a diabolical plot by arch-villain Sir August de Wynter to rule the world with his weather control machine. Steed investigates the beautiful Doctor Mrs. Emma Peel, the only suspect, but simultaneously falls for her and joins forces with her to combat Sir August.","poster_path":"\/7cJGRajXMU2aYdTbElIl6FtzOl2.jpg"},{"popularity":8.7,"vote_count":155,"video":false,"poster_path":"\/pmNYggLktcWHzQeCru5ywL4OiRH.jpg","id":14609,"adult":false,"backdrop_path":"\/mZO4V0ALx15QTgWr4SaXYGT7i60.jpg","original_language":"en","original_title":"Ultimate Avengers","genre_ids":[28,12,16,878],"title":"Ultimate Avengers","vote_average":6.5,"overview":"When a nuclear missile was fired at Washington in 1945, Captain America managed to detonate it in the upper atmosphere. But then he fell miles into the icy depths of the North Atlantic, where he remained lost for over sixty years. But now, with the world facing the very same evil, Captain America must rise again as our last hope for survival.","release_date":"2006-02-21"},{"popularity":10.279,"vote_count":137,"video":false,"poster_path":"\/u7vvexSU81Qk20yU7Vog23Ogob.jpg","id":14611,"adult":false,"backdrop_path":"\/85NqI4WuCim6dZexmTPUAi13Af0.jpg","original_language":"en","original_title":"Ultimate Avengers 2","genre_ids":[28,12,16,878],"title":"Ultimate Avengers 2","vote_average":6.5,"overview":"Mysterious Wakanda lies in the darkest heart of Africa, unknown to most of the world. An isolated land hidden behind closed borders, fiercely protected by its young king - the Black Panther. But when brutal alien invaders attack, the threat leaves the Black Panther with no option but to go against the sacred decrees of his people and ask for help from outsiders.","release_date":"2006-08-08"},{"popularity":4.816,"vote_count":58,"video":false,"poster_path":"\/egTkpBSKbqBK66nr4G1cORgZT75.jpg","id":323660,"adult":false,"backdrop_path":"\/2tklhhTTGKXZLKdP6VasBbas8Nn.jpg","original_language":"en","original_title":"Avengers Grimm","genre_ids":[28,14],"title":"Avengers Grimm","vote_average":3.9,"overview":"When Rumpelstiltskin destroys the Magic Mirror and escapes to the modern world, the four princesses of \"Once Upon a Time\"-Cinderella, Sleeping Beauty, Snow White, and Rapunzel-are sucked through the portal too. Well-trained and endowed with magical powers, the four women must fight Rumpelstiltskin and his army of thralls before he enslaves everyone on Earth.","release_date":"2015-03-17"},{"popularity":6.086,"vote_count":26,"video":false,"poster_path":"\/xfAcu74DRQXeM9XqFcE5MrSRzYP.jpg","id":521720,"adult":false,"backdrop_path":"\/mdSrxMg4l6a76AFoBWmu7Q1X4Rt.jpg","original_language":"en","original_title":"Avengers Grimm: Time Wars","genre_ids":[28,12,14],"title":"Avengers Grimm: Time Wars","vote_average":4.1,"overview":"When Rumpelstiltskin tries to take over Earth once and for all, The Avengers Grimm must track him down through time in order to defeat him.","release_date":"2018-05-01"},{"popularity":9.001,"vote_count":88,"video":false,"poster_path":"\/nbwvR5cfvxMtvWowIiwazVaaTVz.jpg","id":14613,"adult":false,"backdrop_path":"\/8N91uYwrr1uepEKbmym1tgfXlzS.jpg","original_language":"en","original_title":"Next Avengers: Heroes of Tomorrow","genre_ids":[16,10751],"title":"Next Avengers: Heroes of Tomorrow","vote_average":6.2,"overview":"The children of the Avengers hone their powers and go head to head with the very enemy responsible for their parents\' demise.","release_date":"2008-09-02"},{"popularity":4.475,"vote_count":7,"video":false,"poster_path":"\/ehTYWuPKwl8sXPX0I6LnvJUDaVl.jpg","id":347158,"adult":false,"backdrop_path":null,"original_language":"en","original_title":"Bikini Avengers","genre_ids":[35],"title":"Bikini Avengers","vote_average":6.3,"overview":"When the Jade Empress steals the world\'s largest diamonds, super heroes Bikini Avenger and Thong Girl must stop her before she uses the gems to build a dangerous sci-fi weapon.","release_date":"2015-02-24"},{"popularity":4.341,"vote_count":33,"video":false,"poster_path":"\/pPdB6N9iJjn9GwrNkhMS1FKgx22.jpg","id":368304,"adult":false,"backdrop_path":"\/zvjBC9guJVw32bZu4ODp6wzJ9Vi.jpg","original_language":"en","original_title":"LEGO Marvel Super Heroes: Avengers Reassembled!","genre_ids":[16],"title":"LEGO Marvel Super Heroes: Avengers Reassembled!","vote_average":6.3,"overview":"In \"LEGO Marvel Super Heroes: Avengers Reassembled!,\" the Avengers prepare for a party at Stark Tower and notice that Iron Man is acting strange. After some investigation, they discover that the evil Ultron has taken control of Iron Man and his armor as part of his scheme to take over the world. It\'s up to Captain America, the Hulk, Thor, Vision, Black Widow, Hawkeye and their friends (Spider-Man, Iron Spider, and special guest star Ant-Man) to rescue Iron Man from Ultron\'s clutches and defeat the super villain before he causes even more destruction and chaos.","release_date":"2015-11-16"},{"popularity":1.298,"id":58906,"video":false,"vote_count":2,"vote_average":5.5,"title":"Alien Avengers","release_date":"1996-08-03","original_language":"en","original_title":"Alien Avengers","genre_ids":[35,878],"backdrop_path":"\/boX7D2wHtf01C7AzzPuVZAzc74x.jpg","adult":false,"overview":"Charlie and Rhonda are a sweet and comfortable married couple on vacation with their lovely daughter Daphne. They find a rundown boarding house and its haggard owner, Joseph, an ex-con whose mother has just died and left him the house. He doesn\'t know why this cheerful couple would want to vacation in the worst part of Los Angeles, but he doesn\'t know they\'re vacationing from outer space, and their idea of fun is murdering lowlife out on the streets","poster_path":"\/Akd3Aqrr2q8PLKOCPOkOnB3AoJk.jpg"},{"popularity":4.984,"vote_count":4,"video":false,"poster_path":"\/wEN1BqthrykFvkjwZZo9eU1ti6z.jpg","id":538153,"adult":false,"backdrop_path":"\/7dxHsaSxrkowFFmg7gInn0l9sh2.jpg","original_language":"en","original_title":"Avengers of Justice: Farce Wars","genre_ids":[35,14],"title":"Avengers of Justice: Farce Wars","vote_average":4.3,"overview":"While trying to remain a good husband and father, Superbat and the Avengers of Justice come out of retirement to stop Dark Jokester and Lisp Luthor from freezing the planet.","release_date":"2018-07-20"},{"popularity":0.633,"id":432413,"video":false,"vote_count":1,"vote_average":10,"title":"The Avengers","release_date":"1950-06-10","original_language":"en","original_title":"The Avengers","genre_ids":[12],"backdrop_path":null,"adult":false,"overview":"The attractive Argentine Don Careless is an adventurer and an excellent swordsman. Don is in love with Maria Moreno, since he had to emerge her jewels and had thereby to kill a shark. Don tries to prevent the forced marriage of Mary with the ruthless revolutionary Colonel Luis Corral. An armed clash between Don and Luis seems inevitable.","poster_path":"\/dqDoCzAsYC4W6GHP9eiXtvPoiRh.jpg"},{"popularity":1.468,"id":223291,"video":false,"vote_count":1,"vote_average":10,"title":"Alien Avengers II","release_date":"1997-10-25","original_language":"en","original_title":"Alien Avengers II","genre_ids":[10770,35,878],"backdrop_path":null,"adult":false,"overview":"Weird things are happening in the town of Justice, Arizona: three sheriffs have disappeared, and someone is killing the rancher\'s livestock in a bizarre, ritualistic fashion. Locals believe the incidents were caused by aliens...\r But a visiting couple, Charlie and Rhonda, knows better – because they\'re aliens themselves. When no one else will, Charlie and Rhonda volunteer to be the new sheriffs to get to bottom of the crimes. Hiding behind the power of the badge, the two make their own rules, punishing wrong-doers with their own form of \"eye-for-an-eye\" alien vengeance.\r Follow this twisted, outer space \"Bonnie and Clyde\" as they attempt to bring Justice the justice it deserves.","poster_path":"\/4L3ajGP3ZsnM8xIrXjwEZOLYBjb.jpg"},{"popularity":3.07,"id":448366,"video":true,"vote_count":10,"vote_average":8.5,"title":"Building the Dream: Assembling the Avengers","release_date":"2012-09-25","original_language":"en","original_title":"Building the Dream: Assembling the Avengers","genre_ids":[99],"backdrop_path":null,"adult":false,"overview":"This 90-minute feature will show how the films Iron Man, The Incredible Hulk, Iron Man 2, Thor, and Captain America: The First Avenger were conceived and led to the greatest super hero team ever assembled on screen The Avengers.","poster_path":"\/2RDUQpzhJHVzObkL4ZxwJkbKYSz.jpg"},{"popularity":0.643,"id":377364,"video":false,"vote_count":0,"vote_average":0,"title":"Lesbian Avengers Eat Fire Too","release_date":"1993-01-01","original_language":"en","original_title":"Lesbian Avengers Eat Fire Too","genre_ids":[99],"backdrop_path":null,"adult":false,"overview":"An insider\'s look at the first year of an activist group known as the Lesbian Avengers.","poster_path":"\/51TLL3fkUrM8ib4LmVWigD6mB7s.jpg"},{"popularity":2.187,"id":448368,"video":true,"vote_count":6,"vote_average":8,"title":"The Avengers: A Visual Journey","release_date":"2012-09-25","original_language":"en","original_title":"The Avengers: A Visual Journey","genre_ids":[],"backdrop_path":null,"adult":false,"overview":"Joss Whedon and others in interviews discussing the aims for this new franchise.","poster_path":"\/2kBT7KONKQTIhkMc2ZtPU11E8Ky.jpg"},{"popularity":1.289,"vote_count":3,"video":true,"poster_path":null,"id":448364,"adult":false,"backdrop_path":null,"original_language":"en","original_title":"The Avengers: Assembling the Ultimate Team","genre_ids":[99],"title":"The Avengers: Assembling the Ultimate Team","vote_average":6.7,"overview":"Joss Whedon and others in interviews discussing the aims for this new franchise.","release_date":"2012-09-25"}]}';
        $_genres = '{"genres":[{"id":28,"name":"Action"},{"id":12,"name":"Adventure"},{"id":16,"name":"Animation"},{"id":35,"name":"Comedy"},{"id":80,"name":"Crime"},{"id":99,"name":"Documentary"},{"id":18,"name":"Drama"},{"id":10751,"name":"Family"},{"id":14,"name":"Fantasy"},{"id":36,"name":"History"},{"id":27,"name":"Horror"},{"id":10402,"name":"Music"},{"id":9648,"name":"Mystery"},{"id":10749,"name":"Romance"},{"id":878,"name":"Science Fiction"},{"id":10770,"name":"TV Movie"},{"id":53,"name":"Thriller"},{"id":10752,"name":"War"},{"id":37,"name":"Western"}]}';

        if ($this->getMoviesList($_movie) && $this->getGenres()) {
            $movies = json_decode($this->getMoviesList($_movie));
            $genres = json_decode($this->getGenres());

//            $movies = json_decode($_movies);
//            $genres = json_decode($_genres);

            return $this->render('movies/movieslist.html.twig', ['movies' => $movies, 'genres' => $genres]);
        } else {
            return false;
        }
    }


    public function getMoviesList($_movie) {

        if(strlen($_movie) > 0) {
            $_movie = $_movie;
        } else {
            return $this->redirectToRoute('home');
        }

        $curl = curl_init();

        $url = "https://api.themoviedb.org/3/search/movie?include_adult=false&page=1&query=" . $_movie . "&language=en-US&api_key=8125d567a7173d78f1ed3287871171e4";

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
//            CURLOPT_URL => "https://api.themoviedb.org/3/search/multi?api_key=8125d567a7173d78f1ed3287871171e4&language=en-US&query=" . $_movie . "&include_adult=false",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
//            CURLOPT_POSTFIELDS => "{}",
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            return $response;
        }

        return false;
    }


    public function getGenres() {
        $curl = curl_init();

        $url = "https://api.themoviedb.org/3/genre/movie/list?language=en-US&api_key=8125d567a7173d78f1ed3287871171e4";

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
//            CURLOPT_POSTFIELDS => "{}",
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            return $response;
        }

        return false;
    }


    public function getCredits($_id=null) {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.themoviedb.org/3/movie/" . $_id . "/credits?api_key=8125d567a7173d78f1ed3287871171e4",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
//            CURLOPT_POSTFIELDS => "{}",
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            return json_decode($response);
        }
    }


    /**
     * @Route ("/movies/detail", name="moviedetail")
     */
    public function movieDetail() {

        if(isset($_GET['movieid'])) {
            $_movie = $_GET['movieid'];
        } else {
            $_movie = '';
        }

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.themoviedb.org/3/movie/" . $_movie . "?api_key=8125d567a7173d78f1ed3287871171e4&language=en-US",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
//            CURLOPT_POSTFIELDS => "{}",
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        $credits = $this->getCredits($_movie);
        $user = $this->getUser();
        $lists = $user->getMovieLists();

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $movie = json_decode($response);
            return $this->render('movies/moviesdetails.html.twig', ['movie' => $movie, 'credits' => $credits, 'lists' => $lists]);
        }
    }

    /**
     * @Route ("/movies/advsearch", name="advancedsearch")
     */
    public function advSearch() {

        if (isset($_POST['movieName']) || isset($_POST['movieReleaseDate']) || isset($_POST['movieActor']) || isset($_POST['movieType'])){
            exit(0);
        } else {
            return $this->render('movies/advsearch.html.twig');
        }
    }
}