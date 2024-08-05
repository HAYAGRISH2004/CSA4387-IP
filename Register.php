<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "transport_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Form handling
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $name = $_GET['name'];
    $uname = $_GET['uname'];
    $email = $_GET['email'];
    $age = $_GET['age'];
    $password = password_hash($_GET['ps'], PASSWORD_DEFAULT); // Hashing the password

    $sql = "INSERT INTO transport (name, uname, email, age, password) VALUES ('$name', '$uname', '$email', $age, '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "<h2>Registration Successful!</h2>";
        echo "Name: " . htmlspecialchars($name) . "<br>";
        echo "User Name: " . htmlspecialchars($uname) . "<br>";
        echo "Email: " . htmlspecialchars($email) . "<br>";
        echo "Age: " . htmlspecialchars($age) . "<br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
