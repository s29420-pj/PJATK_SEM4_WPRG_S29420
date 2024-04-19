<?php
session_start();

$data = $_SESSION['data'];
$guests = $_SESSION['guests'];

echo 'Name: ' . $data['name'] . '<br>';
echo 'Surname: ' . $data['surname'] . '<br>';
echo 'Address: ' . $data['address'] . '<br>';
echo 'Credit Card Number: ' . $data['creditCard'] . '<br>';
echo 'E-mail: ' . $data['email'] . '<br>';
echo 'Check-In: ' . $data['checkIn'] . '<br>';
echo 'Check-Out: ' . $data['checkOut'] . '<br>';
echo 'Arrival Hour: ' . $data['arrivalHour'] . '<br>';
echo 'Guests Number: ' . $data['guests'] . '<br>';
echo 'Do you need a bed for your child? ' . (isset($data['childBed']) ? 'Yes' : 'No') . '<br>';
echo 'Amenities: ' . implode(', ', $data['amenities']) . '<br>';

for ($i = 1; $i <= $data['guests']; $i++) {
    echo "Osoba $i:<br>";
    echo 'Imię: ' . $guests['guest' . $i . '_name'] . '<br>';
    echo 'Nazwisko: ' . $guests['guest' . $i . '_surname'] . '<br>';
}