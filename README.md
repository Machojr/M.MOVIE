<<<<<<< HEAD
# m.movie - Movie Booking System

Welcome to the m.movie project! This is a web application designed for booking movie tickets at Mlimani City Moving Cinema. Users can view movie schedules, book seats, and manage their accounts, while admins can manage movie listings and schedules.

## Features

- **User Features:**
  - User registration and login
  - View available movies and their details
  - Book seats for selected movies
  - Check available seating options

- **Admin Features:**
  - Admin dashboard for quick access to management tools
  - Manage movie listings (add, update, delete)
  - Manage movie schedules
  - View and manage user bookings

## Technologies Used

- PHP for server-side logic
- MySQL for database management
- HTML, CSS, and JavaScript for front-end development
- Tailwind CSS for modern styling
- AJAX for dynamic content loading

## Project Structure

```
m.movie
├── public
│   ├── index.php
│   ├── login.php
│   ├── register.php
│   ├── movies.php
│   ├── booking.php
│   ├── admin
│   │   ├── dashboard.php
│   │   ├── manage_movies.php
│   │   ├── manage_schedule.php
│   │   └── manage_bookings.php
│   ├── assets
│   │   ├── css
│   │   │   └── styles.css
│   │   ├── js
│   │   │   └── scripts.js
│   │   └── tailwind.config.js
├── src
│   ├── controllers
│   │   ├── AuthController.php
│   │   ├── MovieController.php
│   │   ├── BookingController.php
│   │   └── AdminController.php
│   ├── models
│   │   ├── User.php
│   │   ├── Movie.php
│   │   ├── Schedule.php
│   │   └── Booking.php
│   ├── views
│   │   ├── partials
│   │   │   ├── header.php
│   │   │   ├── footer.php
│   │   │   └── sidebar.php
│   │   └── components
│   │       ├── MovieCard.php
│   │       └── SeatMap.php
│   └── config
│       └── database.php
├── .gitignore
├── composer.json
├── package.json
├── tailwind.config.js
└── README.md
```

## Installation

1. Clone the repository:
   ```
   git clone https://github.com/yourusername/m.movie.git
   ```

2. Navigate to the project directory:
   ```
   cd m.movie
   ```

3. Set up the database:
   - Create a MySQL database and import the necessary SQL scripts (to be provided).

4. Install dependencies:
   - For PHP dependencies, run:
     ```
     composer install
     ```
   - For JavaScript dependencies, run:
     ```
     npm install
     ```

5. Configure your database settings in `src/config/database.php`.

6. Start the server and access the application via your web browser.

## Contributing

Contributions are welcome! Please feel free to submit a pull request or open an issue for any suggestions or improvements.

## License

This project is licensed under the MIT License. See the LICENSE file for more details.
=======
# M.MOVIE
movie booking website especially desined for MLIMANI CITY moving cinema
>>>>>>> cef5874c16df4d28279685996df62f6500f42098
