
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>M.Movie | Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-purple-700 via-indigo-600 to-blue-400 min-h-screen flex flex-col">

    <!-- Header -->
    <header class="bg-white shadow-md py-4 px-6 flex justify-between items-center">
        <h1 class="text-3xl font-extrabold text-indigo-700">🎬 M.Movie</h1>
        <nav>
            <a href="?page=login" class="text-indigo-700 font-semibold hover:underline mr-4">Login</a>
            <a href="?page=register" class="bg-indigo-700 text-white px-4 py-2 rounded hover:bg-indigo-800 transition">Sign Up</a>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="flex-1 flex flex-col md:flex-row items-center justify-center px-6 py-12">
        <div class="md:w-1/2 mb-8 md:mb-0">
            <h2 class="text-4xl md:text-5xl font-bold text-white mb-4 drop-shadow-lg">Book Your Favorite Movies Instantly!</h2>
            <p class="text-lg text-indigo-100 mb-6">Discover the latest blockbusters, reserve your seat, and enjoy a seamless movie experience. Fast, secure, and user-friendly.</p>
            <a href="?page=movies" class="inline-block bg-yellow-400 text-indigo-900 font-bold px-6 py-3 rounded shadow hover:bg-yellow-300 transition">Browse Movies</a>
        </div>
        <div class="md:w-1/2 flex justify-center">
            <img src="https://images.unsplash.com/photo-1517602302552-471fe67acf66?auto=format&fit=crop&w=500&q=80" alt="Cinema" class="rounded-2xl shadow-2xl w-full max-w-xs md:max-w-md">
        </div>
    </section>

    <!-- Features Section -->
    <section class="bg-white py-10 px-6">
        <div class="max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-indigo-50 p-6 rounded-xl shadow hover:shadow-lg transition">
                <div class="text-4xl mb-3 text-indigo-700">🎟️</div>
                <h3 class="font-bold text-lg mb-2">Easy Booking</h3>
                <p class="text-gray-600">Book your seat in just a few clicks with our intuitive interface.</p>
            </div>
            <div class="bg-indigo-50 p-6 rounded-xl shadow hover:shadow-lg transition">
                <div class="text-4xl mb-3 text-indigo-700">🛡️</div>
                <h3 class="font-bold text-lg mb-2">Secure Payments</h3>
                <p class="text-gray-600">Your transactions are protected with top-notch security.</p>
            </div>
            <div class="bg-indigo-50 p-6 rounded-xl shadow hover:shadow-lg transition">
                <div class="text-4xl mb-3 text-indigo-700">📱</div>
                <h3 class="font-bold text-lg mb-2">Mobile Friendly</h3>
                <p class="text-gray-600">Enjoy a seamless experience on any device, anywhere, anytime.</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-indigo-800 text-indigo-100 text-center py-4 mt-10">
        &copy; <?php echo date('Y'); ?> M.Movie. All rights reserved.
    </footer>