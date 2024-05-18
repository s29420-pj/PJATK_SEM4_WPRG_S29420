<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header("Location: index.php");
    exit();
}

if (!isset($_COOKIE['reservation_data'])) {
    header("Location: reservation.php");
    exit();
}

$reservation_data = json_decode($_COOKIE['reservation_data'], true);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $guest_data = $_POST;
    setcookie('guest_data', json_encode($guest_data), time() + (86400 * 30), "/"); // 30 days
    header("Location: summary.php");
    exit();
}

if (isset($_COOKIE['guest_data'])) {
    $guest_data = json_decode($_COOKIE['guest_data'], true);
} else {
    $guest_data = [];
}

$num_guests = $reservation_data['guests'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Guest Information Form</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<h1>Guest Information</h1>
<form method="POST" action="">
    <?php for ($i = 1; $i <= $num_guests; $i++): ?>
        <h2>Guest <?php echo $i; ?></h2>
        <label for="guest_name_<?php echo $i; ?>">Name:</label>
        <input type="text" id="guest_name_<?php echo $i; ?>" name="guest_name_<?php echo $i; ?>" required value="<?php if(isset($guest_data["guest_name_$i"])) echo htmlspecialchars($guest_data["guest_name_$i"]); ?>">

        <label for="guest_surname_<?php echo $i; ?>">Surname:</label>
        <input type="text" id="guest_surname_<?php echo $i; ?>" name="guest_surname_<?php echo $i; ?>" required value="<?php if(isset($guest_data["guest_surname_$i"])) echo htmlspecialchars($guest_data["guest_surname_$i"]); ?>">
    <?php endfor; ?>
    <button type="submit">Submit Guest Information</button>
</form>

<a href="reservation.php">Back to Reservation Form</a>
<a href="logout.php">Logout</a>
</body>
</html>
