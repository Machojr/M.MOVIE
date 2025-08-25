<?php

class Movie {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Fetch all movies
    public function fetchAllMovies() {
        $stmt = $this->pdo->query("SELECT * FROM movies");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Fetch a single movie by ID
    public function fetchMovieById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM movies WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Insert a new movie
    public function insertMovie($data) {
        $stmt = $this->pdo->prepare(
            "INSERT INTO movies (title, description, duration, releaseDate, genre, rating) VALUES (?, ?, ?, ?, ?, ?)"
        );
        return $stmt->execute([
            $data['title'],
            $data['description'],
            $data['duration'],
            $data['releaseDate'],
            $data['genre'],
            $data['rating']
        ]);
    }

    // Update an existing movie
    public function updateMovie($id, $data) {
        $stmt = $this->pdo->prepare(
            "UPDATE movies SET title = ?, description = ?, duration = ?, releaseDate = ?, genre = ?, rating = ? WHERE id = ?"
        );
        return $stmt->execute([
            $data['title'],
            $data['description'],
            $data['duration'],
            $data['releaseDate'],
            $data['genre'],
            $data['rating'],
            $id
        ]);
    }

    // Delete a movie
    public function removeMovie($id) {
        $stmt = $this->pdo->prepare("DELETE FROM movies WHERE id = ?");
        return $stmt->execute([$id]);
    }
}