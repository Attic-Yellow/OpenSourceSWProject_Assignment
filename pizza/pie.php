<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pizza";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch and aggregate data from the database
$sql = "SELECT SUM(cheese) as cheese, SUM(olive) as olive, SUM(pepperoni) as pepperoni, SUM(onion) as onion, SUM(sauce) as sauce FROM toppings";
$result = $conn->query($sql);

$data = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
} else {
    echo "No data found";
}

$conn->close();

echo json_encode($data);
?>
