<?php
require_once __DIR__ . '/../models/Movie.php';

class MovieController {
    private $movieModel;

    public function __construct($pdo) {
        $this->movieModel = new Movie($pdo);
    }

    public function getAllMovies() {
        return $this->movieModel->fetchAllMovies();
    }

    public function getMovieDetails($movieId) {
        return $this->movieModel->fetchMovieById($movieId);
    }

    public function addMovie($movieData) {
        return $this->movieModel->insertMovie($movieData);
    }

    public function updateMovie($movieId, $movieData) {
        return $this->movieModel->updateMovie($movieId, $movieData);
    }

    public function deleteMovie($movieId) {
        return $this->movieModel->removeMovie($movieId);
    }
}