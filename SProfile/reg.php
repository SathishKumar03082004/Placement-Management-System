<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "placement";

// Create a MySQLi connection
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['submit'])) {
    $Name = $_POST['Fullname'];
    $USN = $_POST['USN'];
    $password = $_POST['PASSWORD'];
    $repassword = $_POST['repassword'];
    $Email = $_POST['Email'];
    $Question = $_POST['Question'];
    $Answer = $_POST['Answer'];
    
    // Check if the USN already exists
    $check = $conn->query("SELECT * FROM slogin WHERE USN='$USN'");
    if($check->num_rows == 0) {
        if($repassword == $password) {
            // Hash the password for security
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            
            // Insert the user data into the database
            $query = "INSERT INTO slogin(Name, USN, PASSWORD, Email, Question, Answer) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ssssss", $Name, $USN, $hashedPassword, $Email, $Question, $Answer);
            
            if ($stmt->execute()) {
                echo "<center>You have registered successfully...!! Go back to </center>";
                echo "<center><a href='index.php'>Login here</a> </center>";
            } else {
                echo "<center>Error: " . $stmt->error . "</center>";
            }
        } else {
            echo "<center>Your password do not match</center>";
        }
    } else {
        echo "<center>This USN already exists</center>"; 
    }
    
    // Close the database connection
    $conn->close();
}
?>
