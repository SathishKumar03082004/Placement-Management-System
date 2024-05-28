<?php
session_start();

$USN1 = $_POST['USN'];
$password = $_POST['PASSWORD'];
$confirm = $_POST['repassword'];

$connect = mysqli_connect("localhost", "root", "", "placement"); // Establishing Connection with Server and Selecting Database
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($password == $confirm) {
    $sql = "UPDATE `placement`.`plogin` SET `Password` ='$password' WHERE `plogin`.`Username` = '$USN1'";
    if (mysqli_query($connect, $sql)) {
        echo "<center>Password Reset Complete</center>";
        session_unset();
    } else {
        echo "Update Failed: " . mysqli_error($connect);
    }
} else {
    echo "Password and confirmation do not match";
}

mysqli_close($connect); // Close the database connection when done
?>
