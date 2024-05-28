<?php
session_start();

$USN1 = $_POST['USN'];
$password = $_POST['PASSWORD'];
$confirm = $_POST['repassword'];

$connect = mysqli_connect("localhost", "root", "", "placement");

// Check the connection
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($password == $confirm) {
    $sql = "UPDATE `hlogin` SET `Password` = '$password' WHERE `Username` = '$USN1'";
    
    if (mysqli_query($connect, $sql)) {
        echo "<center>Password Reset Complete</center>";
        session_unset();
    } else {
        echo "Update Failed: " . mysqli_error($connect);
    }
} else {
    echo "Passwords do not match";
}

mysqli_close($connect); // Close the database connection when done
?>
