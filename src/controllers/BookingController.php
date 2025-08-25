<?php

class BookingController {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function viewBookingPage($movieId) {
        $movieDetails = $this->movieModel->getMovieById($movieId);
        $availableSeats = $this->bookingModel->getAvailableSeats($movieId);
        include '../views/booking.php';
    }

    public function bookSeat($data) {
        $result = $this->bookingModel->createBooking($data);
        if ($result) {
            header('Location: ../public/booking.php?success=1');
        } else {
            header('Location: ../public/booking.php?error=1');
        }
    }

    public function manageBookings() {
        $bookings = $this->bookingModel->getAllBookings();
        include '../views/admin/manage_bookings.php';
    }

    public function cancelBooking($bookingId) {
        $result = $this->bookingModel->deleteBooking($bookingId);
        if ($result) {
            header('Location: ../public/admin/manage_bookings.php?success=1');
        } else {
            header('Location: ../public/admin/manage_bookings.php?error=1');
        }
    }
}