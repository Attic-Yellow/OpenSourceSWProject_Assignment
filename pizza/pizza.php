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

// Get data from the form
$cheese = $_POST['cheese'];
$olive = $_POST['olive'];
$pepperoni = $_POST['pepperoni'];
$onion = $_POST['onion'];
$sauce = $_POST['sauce'];

// Insert data into the database
$sql = "INSERT INTO toppings (cheese, olive, pepperoni, onion, sauce) VALUES ('$cheese', '$olive', '$pepperoni', '$onion', '$sauce')";

if ($conn->query($sql) === TRUE) {
    echo "데이터 입력 성공하였습니다!";
    header("Location: pie.html");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
