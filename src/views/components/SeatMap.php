<?php
class SeatMap {
    private $seats;
    private $totalSeats;
    private $bookedSeats;

    public function __construct($totalSeats) {
        $this->totalSeats = $totalSeats;
        $this->seats = array_fill(0, $totalSeats, true); // true means available
        $this->bookedSeats = [];
    }

    public function bookSeat($seatNumber) {
        if ($this->isSeatAvailable($seatNumber)) {
            $this->seats[$seatNumber] = false; // mark as booked
            $this->bookedSeats[] = $seatNumber;
            return true;
        }
        return false;
    }

    public function isSeatAvailable($seatNumber) {
        return isset($this->seats[$seatNumber]) && $this->seats[$seatNumber];
    }

    public function getAvailableSeats() {
        return array_keys(array_filter($this->seats));
    }

    public function getBookedSeats() {
        return $this->bookedSeats;
    }

    public function renderSeatMap() {
        echo '<div class="seat-map">';
        foreach ($this->seats as $index => $available) {
            $class = $available ? 'seat available' : 'seat booked';
            echo "<div class='$class' data-seat-number='$index'></div>";
        }
        echo '</div>';
    }
}
?>