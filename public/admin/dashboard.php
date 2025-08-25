<?php
session_start();
require_once '../../src/controllers/AdminController.php';

$adminController = new AdminController();

if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: ../login.php');
    exit();
}

$movies = $adminController->getAllMovies();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - M.Movie</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <?php include '../views/partials/header.php'; ?>
    <?php include '../views/partials/sidebar.php'; ?>

    <div class="container mx-auto mt-10">
        <h1 class="text-2xl font-bold mb-5">Admin Dashboard</h1>
        <div class="bg-white p-5 rounded shadow">
            <h2 class="text-xl font-semibold mb-3">Movies Overview</h2>
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">Title</th>
                        <th class="py-2 px-4 border-b">Genre</th>
                        <th class="py-2 px-4 border-b">Showtimes</th>
                        <th class="py-2 px-4 border-b">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($movies as $movie): ?>
                        <tr>
                            <td class="py-2 px-4 border-b"><?php echo htmlspecialchars($movie['title']); ?></td>
                            <td class="py-2 px-4 border-b"><?php echo htmlspecialchars($movie['genre']); ?></td>
                            <td class="py-2 px-4 border-b"><?php echo htmlspecialchars($movie['showtimes']); ?></td>
                            <td class="py-2 px-4 border-b">
                                <a href="manage_movies.php?id=<?php echo $movie['id']; ?>" class="text-blue-500">Edit</a>
                                <a href="manage_movies.php?action=delete&id=<?php echo $movie['id']; ?>" class="text-red-500 ml-3">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="mt-5">
                <a href="manage_movies.php" class="bg-blue-500 text-white px-4 py-2 rounded">Add New Movie</a>
            </div>
        </div>
    </div>

    <script src="../assets/js/scripts.js"></script>
</body>
</html>