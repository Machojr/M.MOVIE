<?php

class Schedule {
    private $db;

    public function __construct($database) {
        $this->db = $database;
    }

    public function getAllSchedules() {
        $query = "SELECT * FROM schedules";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getScheduleById($id) {
        $query = "SELECT * FROM schedules WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createSchedule($movieId, $showTime) {
        $query = "INSERT INTO schedules (movie_id, show_time) VALUES (:movie_id, :show_time)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':movie_id', $movieId);
        $stmt->bindParam(':show_time', $showTime);
        return $stmt->execute();
    }

    public function updateSchedule($id, $movieId, $showTime) {
        $query = "UPDATE schedules SET movie_id = :movie_id, show_time = :show_time WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':movie_id', $movieId);
        $stmt->bindParam(':show_time', $showTime);
        return $stmt->execute();
    }

    public function deleteSchedule($id) {
        $query = "DELETE FROM schedules WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}