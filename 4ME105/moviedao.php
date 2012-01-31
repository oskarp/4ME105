<?php
/**
 * Description of moviedao
 *
 * @author Oskar Pettersson <oskar@derived.se>
 */
class moviedao {

    public static $dataFile = "movies.moo";

    public static function insert($movie) {
        $movies = moviedao::getAll();
        if (is_array($movies)) {
            array_push($movies, $movie);
        } else {
            $movies = array();
            array_push($movies, $movie);
        }
        file_put_contents(moviedao::$dataFile, serialize($movies));
    }

    public static function update($movie) {
        moviedao::delete(moviedao::getById($movie->getId()));
        moviedao::insert($movie);
    }

    public static function delete($movie) {
        $movies = moviedao::getAll();
        if (is_array($movies)) {
            $key = array_search($movie, $movies);

            if (isset($key)) {

                unset($movies[$key]);
                file_put_contents(moviedao::$dataFile, serialize($movies));
            }
        }
    }

    public static function getById($id) {
        $movies = moviedao::getAll();
        if (is_array($movies)) {
            foreach ($movies as $movie) {
                if ($movie->getId() == $id) {
                    return $movie;
                }
            }
        }
        return false;
    }

    public static function getAll() {
        if (file_exists(moviedao::$dataFile)) {
            return unserialize(file_get_contents(moviedao::$dataFile));
        }
        return false;
    }

}

?>
