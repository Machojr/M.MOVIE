<?php
class MovieCard {
    private $movie;

    public function __construct($movie) {
        $this->movie = $movie;
    }

    public function render() {
        $title = htmlspecialchars($this->movie['title']);
        $description = htmlspecialchars($this->movie['description']);
        $image = htmlspecialchars($this->movie['image']);
        $schedule = htmlspecialchars($this->movie['schedule']);

        echo "
        <div class='movie-card bg-white rounded-lg shadow-lg overflow-hidden'>
            <img src='$image' alt='$title' class='w-full h-48 object-cover'>
            <div class='p-4'>
                <h2 class='text-xl font-bold'>$title</h2>
                <p class='text-gray-700'>$description</p>
                <p class='text-gray-500'>Schedule: $schedule</p>
                <a href='booking.php?movie_id={$this->movie['id']}' class='mt-2 inline-block bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600'>Book Now</a>
            </div>
        </div>
        ";
    }
}
?>