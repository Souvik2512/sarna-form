<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "form"; 

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Insert data into the database
    $sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";
    if ($conn->query($sql) === TRUE) {
        // Clear cookies by setting them to expire immediately
        setcookie('name', '', time() - 3600, "/");
        setcookie('email', '', time() - 3600, "/");
        
        // Optionally, you can set new cookies with the current data (if needed)
        setcookie('name', $name, time() + 60, "/"); // 1 minute
        setcookie('email', $email, time() + 60, "/"); // 1 minute

        // Display submitted data
        echo "<h3>Submitted Data:</h3>";
        echo "<p>Name: " . htmlspecialchars($name) . "</p>";
        echo "<p>Email: " . htmlspecialchars($email) . "</p>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
