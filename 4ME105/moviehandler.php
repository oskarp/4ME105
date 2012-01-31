<?php

require_once 'moviedao.php';
require_once 'movie.php';

/**
 * Description of example
 *
 * @author Oskar Pettersson <oskar@derived.se>
 */

/**
 * @uri /movie/{movieId}
 */
class MovieHandler extends Resource {

    public function get($request, $movieId) {
        $result = moviedao::getById($movieId);

        $response = new Response($request);
        $response->addHeader('Content-type', 'text/plain');

        if ($result) {
            $response->code = Response::FOUND;
            $tr = "Movie: $movieId \n";
            $tr .= "Name: " . $result->getTitle() . "\n";
            $tr .= "Description: " . $result->getYear() . "\n";
            $tr .= "Grade: " . $result->getGrade() . "\n";
            $response->body = $tr;
            return $response;
        }

        $response->code = Response::NOTFOUND;
        $response->body = "Movie $movieId not found.";

        return $response;
    }

    public function put($request, $movieId) {
        parse_str($request->data, $input);
        if (!moviedao::getById($movieId)) {
            $movie = new movie($movieId, $input['title'], $input['year'], $input['grade']);
            moviedao::insert($movie);

            $response = new Response($request);
            $response->code = Response::CREATED;
            $response->addHeader('Content-type', 'text/plain');
            $response->body = "Movie  " . $input['title'] . " created.";
            return $response;
        } else {
            $response = new Response($request);
            $response->code = Response::BADREQUEST;
            $response->addHeader('Content-type', 'text/plain');
            $response->body = "Movie  " . $input['title'] . " already exists";
            return $response;
        }
    }

    public function post($request, $movieId) {
        parse_str($request->data, $input);

        $response = new Response($request);
        $response->addHeader('Content-type', 'text/plain');

        if (moviedao::getById($movieId)) {
            $movie = new movie($movieId, $input['title'], $input['year'], $input['grade']);
            moviedao::update($movie);
            $response->code = Response::OK;
            $response->body = "Movie $movieId updated.";
            return $response;
        }
        $response->code = Response::NOTFOUND;
        $response->body = "Movie $movieId not found.";

        return $response;
    }

    public function delete($request, $movieId) {
moviedao::delete(moviedao::getById($movieId));
        $response = new Response($request);
        $response->addHeader('Content-type', 'text/plain');
        $response->code = Response::OK;
        $response->body = "Movie $movieId deleted";
        return $response;
    }

}

