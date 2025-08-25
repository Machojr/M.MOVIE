<?php
session_start();
require_once '../src/controllers/BookingController.php';

$bookingController = new BookingController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $movieId = $_POST['movie_id'];
    $selectedSeats = $_POST['selected_seats'];
    $userId = $_SESSION['user_id'];

    $bookingResult = $bookingController->bookSeats($movieId, $selectedSeats, $userId);

    if ($bookingResult) {
        header("Location: movies.php?booking_success=1");
        exit();
    } else {
        $error = "Failed to book seats. Please try again.";
    }
}

$movieId = $_GET['movie_id'];
$movieDetails = $bookingController->getMovieDetails($movieId);
$availableSeats = $bookingController->getAvailableSeats($movieId);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/styles.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Booking - <?php echo $movieDetails['title']; ?></title>
</head>
<body>
    <?php include 'partials/header.php'; ?>
    <div class="container mx-auto mt-5">
        <h1 class="text-2xl font-bold mb-4">Booking for <?php echo $movieDetails['title']; ?></h1>
        <p><?php echo $movieDetails['description']; ?></p>
        <h2 class="text-xl mt-4">Available Seats</h2>
        <form method="POST" action="">
            <input type="hidden" name="movie_id" value="<?php echo $movieId; ?>">
            <div class="grid grid-cols-5 gap-2 mt-2">
                <?php foreach ($availableSeats as $seat): ?>
                    <label class="seat-label">
                        <input type="checkbox" name="selected_seats[]" value="<?php echo $seat['id']; ?>" class="seat-checkbox">
                        <span class="seat"><?php echo $seat['number']; ?></span>
                    </label>
                <?php endforeach; ?>
            </div>
            <button type="submit" class="mt-4 bg-blue-500 text-white py-2 px-4 rounded">Book Seats</button>
        </form>
        <?php if (isset($error)): ?>
            <div class="mt-4 text-red-500"><?php echo $error; ?></div>
        <?php endif; ?>
    </div>
    <?php include 'partials/footer.php'; ?>
</body>
</html>