<?php

class Booking {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Create a new booking
    public function createBooking($data) {
        $stmt = $this->pdo->prepare(
            "INSERT INTO bookings (user_id, schedule_id, seat_number, booking_time) VALUES (?, ?, ?, ?)"
        );
        return $stmt->execute([
            $data['user_id'],
            $data['schedule_id'],
            $data['seat_number'],
            date('Y-m-d H:i:s')
        ]);
    }

    // Get all bookings
    public function getAllBookings() {
        $stmt = $this->pdo->query("SELECT * FROM bookings");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Find a booking by ID
    public function findBooking($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM bookings WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Delete a booking by ID
    public function deleteBooking($id) {
        $stmt = $this->pdo->prepare("DELETE FROM bookings WHERE id = ?");
        return $stmt->execute([$id]);
    }

    // Cancel a booking (optional, can be same as delete)
    public function cancel($id) {
        return $this->deleteBooking($id);
    }
}