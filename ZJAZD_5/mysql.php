<?php
$host = 'localhost';
$username = 'root';
$password = 'root';
$database = 'WPRG';

// łączenie z bazą danych
$conn = new mysqli($host, $username, $password, $database);

// sprawdzanie połączenia
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SELECT
$sql_select = "SELECT * FROM dane_klientow";
$result_select = $conn->query($sql_select);

// mysqli_fetch_row
if ($result_select->num_rows > 0) {
    while ($row = $result_select->fetch_row()) {
        printf ("%s (%s)\n", $row[0], $row[1]);
    }
} else {
    echo "0 results";
}

// mysqli_fetch_array
$result_select->data_seek(0);
while ($row = $result_select->fetch_array(MYSQLI_ASSOC)) {
    printf ("%s (%s)\n", $row["column1"], $row["column2"]);
}

// mysqli_num_rows
$num_rows = mysqli_num_rows($result_select);
echo "Number of rows: " . $num_rows;

// INSERT INTO
$sql_insert = "INSERT INTO dane_klientow (column1, column2) VALUES ('value1', 'value2')";
if ($conn->query($sql_insert) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql_insert . "<br>" . $conn->error;
}

// zamykanie połączenia z bazą danych
$conn->close();
?>
