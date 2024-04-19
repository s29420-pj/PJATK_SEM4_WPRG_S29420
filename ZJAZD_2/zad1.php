<?php
$result = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $operation = $_POST['operation'];

    switch ($operation) {
        case "Add":
            $result = $num1 + $num2;
            break;
        case "Subtract":
            $result = $num1 - $num2;
            break;
        case "Multiply":
            $result = $num1 * $num2;
            break;
        case "Divide":
            if ($num2 != 0) {
                $result = $num1 / $num2;
            } else {
                $result = "Division by zero!";
            }
            break;
        default:
            $result = "Invalid operation!";
            break;
    }
}
?>

<!DOCTYPE html>
<html lang="EN">
<head>
    <title>Calculator</title>
    <meta charset="UTF-8">
</head>
<body>
<form action="" method="post">
    <input type="text" name="num1" placeholder="Number 1">
    <input type="text" name="num2" placeholder="Number 2">
    <select name="operation">
        <option>None</option>
        <option>Add</option>
        <option>Subtract</option>
        <option>Multiply</option>
        <option>Divide</option>
    </select>
    <br>
    <button type="submit" name="submit" value="submit">Calculate</button>
</form>
<p>Result: <?php echo $result; ?></p>
</body>
</html>