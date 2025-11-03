<?php
$servername = "localhost";
$username = "root";  // default for XAMPP/WAMP
$password = "";      // default is empty
$dbname = "feedback_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect form data
$name = $_POST['name'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$tutorials = isset($_POST['tutorials']) ? implode(", ", $_POST['tutorials']) : '';
$year = $_POST['year'];
$feedback = $_POST['feedback'];

// Insert into database
$sql = "INSERT INTO feedback (name, email, gender, tutorials, year, feedback)
        VALUES ('$name', '$email', '$gender', '$tutorials', '$year', '$feedback')";

if ($conn->query($sql) === TRUE) {
    echo "<h2>Thank you for your feedback, $name!</h2>";
    echo "<p>Your response has been successfully submitted.</p>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
