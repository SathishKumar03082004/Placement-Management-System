<?php
session_start();

$USN1 = $_POST['USN'];
$password = $_POST['PASSWORD'];
$confirm = $_POST['repassword'];

// Establish a MySQLi connection
$mysqli = new mysqli("localhost", "root", "", "placement");

// Check the connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if ($password == $confirm) {
    // Use prepared statements to prevent SQL injection
    $stmt = $mysqli->prepare("UPDATE `prilogin` SET `PASSWORD` = ? WHERE `Username` = ?");
    $stmt->bind_param("ss", $password, $USN1);

    if ($stmt->execute()) {
        echo "<center>Password Reset Complete</center>";
        echo "<center><a href='index.php'>Go Back</a></center>";
        session_unset();
    } else {
        echo "Update Failed";
    }

    // Close the prepared statement
    $stmt->close();
} else {
    echo "Passwords do not match.";
}

// Close the database connection
$mysqli->close();
?>
