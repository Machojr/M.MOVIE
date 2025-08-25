<?php
session_start();
require_once '../../src/controllers/AdminController.php';

$adminController = new AdminController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_schedule'])) {
        $movie_id = $_POST['movie_id'];
        $show_time = $_POST['show_time'];
        $adminController->addSchedule($movie_id, $show_time);
    } elseif (isset($_POST['update_schedule'])) {
        $schedule_id = $_POST['schedule_id'];
        $movie_id = $_POST['movie_id'];
        $show_time = $_POST['show_time'];
        $adminController->updateSchedule($schedule_id, $movie_id, $show_time);
    } elseif (isset($_POST['delete_schedule'])) {
        $schedule_id = $_POST['schedule_id'];
        $adminController->deleteSchedule($schedule_id);
    }
}

$schedules = $adminController->getSchedules();
$movies = $adminController->getMovies();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <title>Manage Schedule</title>
</head>
<body>
    <div class="container">
        <h1>Manage Movie Schedule</h1>
        <form method="POST">
            <select name="movie_id" required>
                <option value="">Select Movie</option>
                <?php foreach ($movies as $movie): ?>
                    <option value="<?= $movie['id'] ?>"><?= $movie['title'] ?></option>
                <?php endforeach; ?>
            </select>
            <input type="datetime-local" name="show_time" required>
            <button type="submit" name="add_schedule">Add Schedule</button>
        </form>

        <h2>Current Schedules</h2>
        <table>
            <thead>
                <tr>
                    <th>Movie</th>
                    <th>Show Time</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($schedules as $schedule): ?>
                    <tr>
                        <td><?= $schedule['movie_title'] ?></td>
                        <td><?= $schedule['show_time'] ?></td>
                        <td>
                            <form method="POST" style="display:inline;">
                                <input type="hidden" name="schedule_id" value="<?= $schedule['id'] ?>">
                                <button type="submit" name="delete_schedule">Delete</button>
                            </form>
                            <form method="POST" style="display:inline;">
                                <input type="hidden" name="schedule_id" value="<?= $schedule['id'] ?>">
                                <input type="hidden" name="movie_id" value="<?= $schedule['movie_id'] ?>">
                                <input type="datetime-local" name="show_time" value="<?= $schedule['show_time'] ?>" required>
                                <button type="submit" name="update_schedule">Update</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>