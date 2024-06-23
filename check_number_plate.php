<?php
require 'db_connection.php';

$number_plate = $_POST['number_plate'];

// Check if the number plate already exists in the database
$sql = "SELECT * FROM vehicles WHERE number_plate = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$number_plate]);

if ($stmt->rowCount() > 0) {
    echo 'exists';
} else {
    echo 'unique';
}
?>
