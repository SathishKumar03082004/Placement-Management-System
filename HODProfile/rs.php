<?php
session_start();

$connect = mysqli_connect("localhost", "root", "", "placement");

// Check the connection
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

$USN = $_POST['USN'];
$Question = $_POST['Question'];
$Answer = $_POST['Answer'];

$check = mysqli_query($connect, "SELECT * FROM hlogin WHERE Username='$USN'");

if (mysqli_num_rows($check) != 0) {
    $row = mysqli_fetch_assoc($check);
    $dbQuestion = $row['Question'];
    $dbAnswer = $row['Answer'];
    
    if ($dbQuestion == $Question && $dbAnswer == $Answer) {
        $_SESSION['reset'] = $USN;
        header("location: Reset password.php");
        exit();
    } else {
        echo "<center>Failed! Incorrect Credentials</center>";
    }
} else {
    echo "<center>Enter Something Correctly!!!</center>";
}

mysqli_close($connect); // Close the database connection when done
?>
