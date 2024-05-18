<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header("Location: index.php");
    exit();
}

if (!isset($_COOKIE['reservation_data']) || !isset($_COOKIE['guest_data'])) {
    header("Location: reservation.php");
    exit();
}

$reservation_data = json_decode($_COOKIE['reservation_data'], true);
$guest_data = json_decode($_COOKIE['guest_data'], true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reservation Summary</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<h1>Reservation Summary</h1>
<p>Name: <?php echo htmlspecialchars($reservation_data['name']); ?></p>
<p>Surname: <?php echo htmlspecialchars($reservation_data['surname']); ?></p>
<p>Address: <?php echo htmlspecialchars($reservation_data['address']); ?></p>
<p>Email: <?php echo htmlspecialchars($reservation_data['email']); ?></p>
<p>Check-in Date: <?php echo htmlspecialchars($reservation_data['checkin_date']); ?></p>
<p>Check-in Time: <?php echo htmlspecialchars($reservation_data['checkin_time']); ?></p>
<p>Extra Bed for Child: <?php echo isset($reservation_data['extra_bed']) ? 'Yes' : 'No'; ?></p>
<p>Amenities: <?php echo implode(", ", $reservation_data['amenities']); ?></p>

<h2>Guest Details</h2>
<?php for ($i = 1; $i <= $reservation_data['guests']; $i++): ?>
    <h3>Guest <?php echo $i; ?></h3>
    <p>Name: <?php echo htmlspecialchars($guest_data["guest_name_$i"]); ?></p>
    <p>Surname: <?php echo htmlspecialchars($guest_data["guest_surname_$i"]); ?></p>
<?php endfor; ?>

<a href="reservation.php">Back to Form</a>
<a href="logout.php">Logout</a>
</body>
</html>
