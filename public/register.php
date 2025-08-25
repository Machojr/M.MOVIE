<?php
session_start();
include '../src/controllers/AuthController.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $authController = new AuthController();
    $result = $authController->register($_POST);

    if ($result) {
        header('Location: login.php?success=Registration successful. Please log in.');
        exit();
    } else {
        $error = 'Registration failed. Please try again.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/styles.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Register - M.Movie</title>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-10">
        <h2 class="text-2xl font-bold text-center">Create an Account</h2>
        <form action="register.php" method="POST" class="bg-white p-6 rounded shadow-md">
            <?php if (isset($error)): ?>
                <div class="bg-red-500 text-white p-2 rounded mb-4"><?php echo $error; ?></div>
            <?php endif; ?>
            <div class="mb-4">
                <label for="username" class="block text-gray-700">Username</label>
                <input type="text" name="username" id="username" required class="border rounded w-full py-2 px-3">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email</label>
                <input type="email" name="email" id="email" required class="border rounded w-full py-2 px-3">
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700">Password</label>
                <input type="password" name="password" id="password" required class="border rounded w-full py-2 px-3">
            </div>
            <div class="mb-4">
                <label for="confirm_password" class="block text-gray-700">Confirm Password</label>
                <input type="password" name="confirm_password" id="confirm_password" required class="border rounded w-full py-2 px-3">
            </div>
            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Register</button>
        </form>
        <p class="mt-4 text-center">Already have an account? <a href="login.php" class="text-blue-500">Login here</a>.</p>
    </div>
</body>
</html>