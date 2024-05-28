<?php
session_start();

$connect = mysqli_connect("localhost", "root", "", "placement"); // Establishing Connection with Server and Selecting Database
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

$USN = $_POST['USN'];
$Question = $_POST['Question'];
$Answer = $_POST['Answer'];

$check = mysqli_query($connect, "SELECT * FROM plogin WHERE Username='" . $USN . "'");
if (!$check) {
    die("Check Query: " . mysqli_error($connect));
}

if (mysqli_num_rows($check) != 0) {
    $row = mysqli_fetch_assoc($check);
    $dbQuestion = $row['Question'];
    $dbAnswer = $row['Answer'];
    if ($dbQuestion == $Question && $dbAnswer == $Answer) {
        $_SESSION['reset'] = $USN;
        header("location: Reset password.php");
    } else {
        echo "<center>Failed! Incorrect Credentials</center>";
    }
} else {
    echo "<center>Enter Something Correctly!!!</center>";
}

mysqli_close($connect); // Close the database connection when done
?>
