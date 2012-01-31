<?php

/**
 * Description of movie
 *
 * @author Oskar Pettersson <oskar@derived.se>
 */
class movie {

    public $id;
    public $title;
    public $year;
    public $grade;

    function __construct($id, $title, $year, $grade) {
        $this->id = $id;
        $this->title = $title;
        $this->year = $year;
        $this->grade = $grade;
    }

    public function __toString() {
        return $this->id;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function getYear() {
        return $this->year;
    }

    public function setYear($year) {
        $this->year = $year;
    }

    public function getGrade() {
        return $this->grade;
    }

    public function setGrade($grade) {
        $this->grade = $grade;
    }

}

?>
