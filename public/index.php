<?php
// Start the session
session_start();

// Include necessary files
require_once '../src/config/database.php';
require_once '../src/controllers/AuthController.php';
require_once '../src/controllers/MovieController.php';
require_once '../src/controllers/BookingController.php';
require_once '../src/controllers/AdminController.php';
require_once '../src/models/Movie.php';
require_once '../src/models/Schedule.php';
require_once '../src/models/Booking.php';

// Initialize controllers
$authController = new AuthController($pdo);
$movieController = new MovieController($pdo);
$bookingController = new BookingController($pdo);

// Instantiate models
$movieModel = new Movie($pdo);
$scheduleModel = new Schedule($pdo);
$bookingModel = new Booking($pdo);

// Instantiate AdminController with models
$adminController = new AdminController($movieModel, $scheduleModel, $bookingModel);

// Define routes
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

switch ($page) {
    case 'login':
        $authController->login();
        break;
    case 'register':
        $authController->register();
        break;
    case 'movies':
        $movieController->listMovies();
        break;
    case 'booking':
        $bookingController->bookSeats();
        break;
    case 'admin':
        $adminController->dashboard();
        break;
    case 'manage_movies':
        $adminController->manageMovies();
        break;
    case 'manage_schedule':
        $adminController->manageSchedule();
        break;
    case 'manage_bookings':
        $adminController->manageBookings();
        break;
    default:
        // Load home page or default view
        // include '../src/views/partials/header.php';
        include '../src/views/home.php'; // Assuming a home.php file exists
        // include '../src/views/partials/footer.php';
        break;
}
?>