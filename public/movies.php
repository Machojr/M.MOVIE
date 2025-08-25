<?php
require_once '../src/controllers/MovieController.php';

$movieController = new MovieController();
$movies = $movieController->getAllMovies();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Movies - M.Movie</title>
</head>
<body>
    <?php include 'partials/header.php'; ?>
    
    <div class="container mx-auto my-8">
        <h1 class="text-3xl font-bold mb-6">Available Movies</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($movies as $movie): ?>
                <div class="bg-white rounded-lg shadow-lg p-4">
                    <h2 class="text-xl font-semibold"><?php echo htmlspecialchars($movie['title']); ?></h2>
                    <p class="text-gray-700"><?php echo htmlspecialchars($movie['description']); ?></p>
                    <p class="text-gray-500">Duration: <?php echo htmlspecialchars($movie['duration']); ?> mins</p>
                    <p class="text-gray-500">Rating: <?php echo htmlspecialchars($movie['rating']); ?>/10</p>
                    <a href="booking.php?movie_id=<?php echo $movie['id']; ?>" class="mt-4 inline-block bg-blue-500 text-white rounded-lg px-4 py-2">Book Now</a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <?php include 'partials/footer.php'; ?>
    <script src="assets/js/scripts.js"></script>
</body>
</html>