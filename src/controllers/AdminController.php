<?php

class AdminController {
    private $movieModel;
    private $scheduleModel;
    private $bookingModel;

    public function __construct($movieModel, $scheduleModel, $bookingModel) {
        $this->movieModel = $movieModel;
        $this->scheduleModel = $scheduleModel;
        $this->bookingModel = $bookingModel;
    }

    public function addMovie($movieData) {
        // Logic to add a new movie
        return $this->movieModel->create($movieData);
    }

    public function updateMovie($movieId, $movieData) {
        // Logic to update an existing movie
        return $this->movieModel->update($movieId, $movieData);
    }

    public function deleteMovie($movieId) {
        // Logic to delete a movie
        return $this->movieModel->delete($movieId);
    }

    public function manageSchedule($scheduleData) {
        // Logic to manage movie schedules
        return $this->scheduleModel->createOrUpdate($scheduleData);
    }

    public function viewBookings() {
        // Logic to view all bookings
        return $this->bookingModel->getAllBookings();
    }

    public function cancelBooking($bookingId) {
        // Logic to cancel a booking
        return $this->bookingModel->cancel($bookingId);
    }
}