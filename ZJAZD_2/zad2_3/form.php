<!DOCTYPE html>
<html>
<head>
    <title>Hotel Reservation</title>
</head>
<body>
<form action="summary.php" method="post">
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name" required><br>
    <label for="surname">Surname:</label><br>
    <input type="text" id="surname" name="surname" required><br>
    <label for="address">Address:</label><br>
    <input type="text" id="address" name="address" required><br>
    <label for="creditCard">Credit Card Number</label><br>
    <input type="text" id="creditCard" name="creditCard" required><br>
    <label for="email">E-mail:</label><br>
    <input type="email" id="email" name="email" required><br>
    <label for="checkIn">Check-In Date</label><br>
    <input type="date" id="checkIn" name="checkIn" required><br>
    <label for="checkOUt">Check-Out Date</label><br>
    <input type="date" id="checkOut" name="checkOut" required><br>
    <label for="arrivalHour">Arrival Hour:</label><br>
    <input type="time" id="arrivalHour" name="arrivalHour" required><br>
    <label for="guests">Ilość osób:</label><br>
    <select id="guests" name="guests" required>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
    </select><br>
    <label for="childBed">Do you need a bed for your child?</label><br>
    <input type="checkbox" id="childBed" name="childBed"><br>
    <label for="amenities">Choose Amenities:</label><br>
    <input type="checkbox" id="airConditioning" name="amenities[]" value="Air Conditioning">
    <label for="airConditioning">Air Conditioning</label><br>
    <input type="checkbox" id="ashtray" name="amenities[]" value="Ashtray">
    <label for="ashtray">Ashtray</label><br>
    <input type="submit" value="Submit">
</form>
</body>
</html>