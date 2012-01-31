<?php
/**
 * Description of roothandler
 *
 * @author Oskar Pettersson <oskar@derived.se>
 */

/**
 * @uri /
 */
class Roothandler extends Resource {

    //put your code here
    public function get($request) {

        $response = new Response($request);
        $response->addHeader('Content-type', 'text/html');
        $bod = "<img src='database.png'>";
        $movies = moviedao::getAll();
        $bod .= "<h2>Movies</h2>";
        $bod .= "<ul>";
        foreach($movies as $movie) {
            $bod .= "<li><a href='movie/".$movie->getId() ."'> ". $movie->getTitle() . "</a></li>";
        }
        echo "</ul>";
        $response->body = $bod;

        return $response;
    }

}

?>
