<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "placement";

// Create a MySQLi connection
$connect = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}

$USN = $_POST['USN'];
$Question = $_POST['Question'];
$Answer = $_POST['Answer'];

$check = $connect->query("SELECT * FROM prilogin WHERE Username='".$USN."'") or die("Check Query");

if ($check->num_rows != 0) {
    $row = $check->fetch_assoc();
    $dbQuestion = $row['Question'];
    $dbAnswer = $row['Answer'];

    if ($dbQuestion == $Question && $dbAnswer == $Answer) {
        $_SESSION['reset'] = $USN;
        header("location: Reset password.php");
    } else {
        echo "<center>Failed! Incorrect Credentials</center>";
    }
} else {
    echo "<center> Enter Something Correctly Champ!!! </center>";
}

// Close the MySQLi connection
$connect->close();
?>
