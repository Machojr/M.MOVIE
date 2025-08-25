// This file contains JavaScript functions for interactive features and animations on the website.

document.addEventListener('DOMContentLoaded', function() {
    // Smooth scrolling for anchor links
    const scrollLinks = document.querySelectorAll('a[href^="#"]');
    scrollLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            const targetElement = document.querySelector(targetId);
            targetElement.scrollIntoView({ behavior: 'smooth' });
        });
    });

    // Movie booking form validation
    const bookingForm = document.getElementById('booking-form');
    if (bookingForm) {
        bookingForm.addEventListener('submit', function(e) {
            const selectedSeats = document.querySelectorAll('input[name="seats"]:checked');
            if (selectedSeats.length === 0) {
                e.preventDefault();
                alert('Please select at least one seat to proceed with the booking.');
            }
        });
    }

    // Admin movie schedule update
    const updateScheduleButtons = document.querySelectorAll('.update-schedule');
    updateScheduleButtons.forEach(button => {
        button.addEventListener('click', function() {
            const movieId = this.dataset.movieId;
            const newSchedule = prompt('Enter new schedule for the movie:');
            if (newSchedule) {
                // Here you would typically make an AJAX call to update the schedule in the backend
                console.log(`Updating schedule for movie ID ${movieId} to ${newSchedule}`);
                // Simulate successful update
                alert('Schedule updated successfully!');
            }
        });
    });

    // Animation for movie cards on hover
    const movieCards = document.querySelectorAll('.movie-card');
    movieCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.classList.add('hover:scale-105', 'transition-transform', 'duration-300');
        });
        card.addEventListener('mouseleave', function() {
            this.classList.remove('hover:scale-105', 'transition-transform', 'duration-300');
        });
    });
});