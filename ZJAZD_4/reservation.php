<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    setcookie('reservation_data', json_encode($_POST), time() + (86400 * 30), "/"); // 30 days
    header("Location: guests.php");
    exit();
}

if (isset($_COOKIE['reservation_data'])) {
    $reservation_data = json_decode($_COOKIE['reservation_data'], true);
} else {
    $reservation_data = [];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hotel Reservation Form</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<h1>Hotel Reservation Form</h1>
<p>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></p>
<form method="POST" action="">


    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required value="<?php if(isset($reservation_data['name'])) echo htmlspecialchars($reservation_data['name']); ?>">

    <label for="surname">Surname:</label>
    <input type="text" id="surname" name="surname" required value="<?php if(isset($reservation_data['surname'])) echo htmlspecialchars($reservation_data['surname']); ?>">

    <label for="address">Address:</label>
    <input type="text" id="address" name="address" required value="<?php if(isset($reservation_data['address'])) echo htmlspecialchars($reservation_data['address']); ?>">

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required value="<?php if(isset($reservation_data['email'])) echo htmlspecialchars($reservation_data['email']); ?>">

    <label for="credit_card">Credit Card:</label>
    <input type="text" id="credit_card" name="credit_card" required pattern="\d{16}" value="<?php if(isset($reservation_data['credit_card'])) echo htmlspecialchars($reservation_data['credit_card']); ?>">

    <label for="checkin_date">Check-in Date:</label>
    <input type="date" id="checkin_date" name="checkin_date" required value="<?php if(isset($reservation_data['checkin_date'])) echo htmlspecialchars($reservation_data['checkin_date']); ?>">

    <label for="checkin_time">Check-in Time:</label>
    <input type="time" id="checkin_time" name="checkin_time" required value="<?php if(isset($reservation_data['checkin_time'])) echo htmlspecialchars($reservation_data['checkin_time']); ?>">

    <label for="guests">Number of Guests:</label>
    <select id="guests" name="guests" required>
        <option value="1" <?php if(isset($reservation_data['guests']) && $reservation_data['guests'] == '1') echo 'selected'; ?>>1</option>
        <option value="2" <?php if(isset($reservation_data['guests']) && $reservation_data['guests'] == '2') echo 'selected'; ?>>2</option>
        <option value="3" <?php if(isset($reservation_data['guests']) && $reservation_data['guests'] == '3') echo 'selected'; ?>>3</option>
        <option value="4" <?php if(isset($reservation_data['guests']) && $reservation_data['guests'] == '4') echo 'selected'; ?>>4</option>
    </select>

    <label for="extra_bed">Extra Bed for Child:</label>
    <input type="checkbox" id="extra_bed" name="extra_bed" <?php if(isset($reservation_data['extra_bed'])) echo 'checked'; ?>>

    <label for="amenities">Amenities:</label>
    <label for="air_conditioning">Air Conditioning</label>
    <input type="checkbox" id="air_conditioning" name="amenities[]" value="air_conditioning" <?php if(isset($reservation_data['amenities']) && in_array('air_conditioning', $reservation_data['amenities'])) echo 'checked'; ?>>

    <label for="smoking">Smoking</label>
    <input type="checkbox" id="smoking" name="amenities[]" value="smoking" <?php if(isset($reservation_data['amenities']) && in_array('smoking', $reservation_data['amenities'])) echo 'checked'; ?>>

    <button type="submit">Submit Reservation</button>
    <button type="button" onclick="clearCookies()">Clear Form</button>
</form>

<a href="logout.php">Logout</a>

<script>
    function clearCookies() {
        document.cookie = 'reservation_data=; Max-Age=0; path=/';
        location.reload();
    }
</script>
</body>
</html>
