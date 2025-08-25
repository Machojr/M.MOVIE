<?php
session_start();
require_once '../../src/controllers/AdminController.php';

$adminController = new AdminController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_movie'])) {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $release_date = $_POST['release_date'];
        $duration = $_POST['duration'];
        $genre = $_POST['genre'];
        $adminController->addMovie($title, $description, $release_date, $duration, $genre);
    } elseif (isset($_POST['update_movie'])) {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $release_date = $_POST['release_date'];
        $duration = $_POST['duration'];
        $genre = $_POST['genre'];
        $adminController->updateMovie($id, $title, $description, $release_date, $duration, $genre);
    } elseif (isset($_POST['delete_movie'])) {
        $id = $_POST['id'];
        $adminController->deleteMovie($id);
    }
}

$movies = $adminController->getAllMovies();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <title>Manage Movies</title>
</head>
<body>
    <?php include '../partials/sidebar.php'; ?>
    <div class="main-content">
        <h1>Manage Movies</h1>
        <form method="POST">
            <input type="hidden" name="id" id="movie_id">
            <input type="text" name="title" placeholder="Movie Title" required>
            <textarea name="description" placeholder="Movie Description" required></textarea>
            <input type="date" name="release_date" required>
            <input type="number" name="duration" placeholder="Duration (min)" required>
            <input type="text" name="genre" placeholder="Genre" required>
            <button type="submit" name="add_movie">Add Movie</button>
            <button type="submit" name="update_movie">Update Movie</button>
        </form>

        <h2>Current Movies</h2>
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Release Date</th>
                    <th>Duration</th>
                    <th>Genre</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($movies as $movie): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($movie['title']); ?></td>
                        <td><?php echo htmlspecialchars($movie['description']); ?></td>
                        <td><?php echo htmlspecialchars($movie['release_date']); ?></td>
                        <td><?php echo htmlspecialchars($movie['duration']); ?></td>
                        <td><?php echo htmlspecialchars($movie['genre']); ?></td>
                        <td>
                            <button onclick="editMovie(<?php echo $movie['id']; ?>)">Edit</button>
                            <form method="POST" style="display:inline;">
                                <input type="hidden" name="id" value="<?php echo $movie['id']; ?>">
                                <button type="submit" name="delete_movie">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="../assets/js/scripts.js"></script>
</body>
</html>