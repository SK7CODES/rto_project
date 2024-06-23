<?php
require 'db_connection.php';

if (isset($_GET['phone_number'])) {
    $phone_number = $_GET['phone_number'];

    try {
        $sql = "SELECT * FROM users WHERE phone_number = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$phone_number]);
        $user = $stmt->fetch();

        if ($user) {
            echo "<h2>User Details:</h2>";
            echo "Name: " . $user['name'] . "<br>";
            echo "Phone Number: " . $user['phone_number'] . "<br>";
            echo "Date of Birth: " . $user['date_of_birth'] . "<br>";
            echo "Address: " . $user['address'] . "<br><br>";

            $sql = "SELECT * FROM vehicles WHERE user_id = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$user['id']]);
            $vehicles = $stmt->fetchAll();

            if ($vehicles) {
                echo "<h2>Registered Vehicles:</h2>";
                foreach ($vehicles as $vehicle) {
                    echo "Manufacturer: " . $vehicle['manufacturer'] . "<br>";
                    echo "Model: " . $vehicle['model'] . "<br>";
                    echo "CC: " . $vehicle['cc'] . "<br>";
                    echo "Color: " . $vehicle['color'] . "<br>";
                    echo "Type: " . $vehicle['type'] . "<br>";
                    echo "Seating Capacity: " . $vehicle['seating_capacity'] . "<br>";
                    echo "RTO Location: " . $vehicle['rto_location'] . "<br>";
                    echo "RTO Number: " . $vehicle['rto_number'] . "<br>";
                    echo "Number Plate: " . $vehicle['number_plate'] . "<br><br>";
                }
            } else {
                echo "No vehicles registered.";
            }
        } else {
            echo "No user found with this phone number.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Please provide a phone number.";
}
?>
