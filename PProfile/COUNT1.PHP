<?php
session_start();
if (isset($_SESSION['pusername'])) {
    // Proceed with the code
} else {
    header("location: index.php");
    exit(); // Terminate script to prevent further execution
}

if (isset($_POST['submit'])) {
    $cname = $_POST['cname'];
    $date = $_POST['date'];

    // Create a MySQLi connection
    $mysqli = new mysqli('localhost', 'root', '', 'details');

    // Check the connection
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Function to fetch count from the result
    function fetchCount($result)
    {
        return $result->fetch_assoc()["count"];
    }

    $query = "SELECT COUNT(Attendence) as count FROM updatedrive WHERE Attendence=1 AND CompanyName='$cname' AND Date='$date'";
    $result = $mysqli->query($query);
    $attendedCount = fetchCount($result);

    $query = "SELECT COUNT(WT) as count FROM updatedrive WHERE WT=1 AND CompanyName='$cname' AND Date='$date'";
    $result = $mysqli->query($query);
    $clearedWTCount = fetchCount($result);

    $query = "SELECT COUNT(GD) as count FROM updatedrive WHERE GD=1 AND CompanyName='$cname' AND Date='$date'";
    $result = $mysqli->query($query);
    $clearedGDCount = fetchCount($result);

    $query = "SELECT COUNT(Techical) as count FROM updatedrive WHERE Techical=1 AND CompanyName='$cname' AND Date='$date'";
    $result = $mysqli->query($query);
    $clearedTechnicalCount = fetchCount($result);

    $query = "SELECT COUNT(Placed) as count FROM updatedrive WHERE Placed=1 AND CompanyName='$cname' AND Date='$date'";
    $result = $mysqli->query($query);
    $placedCount = fetchCount($result);

    // Close the MySQLi connection
    $mysqli->close();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Placement Statistics</title>
    <!-- Add your CSS styles here -->
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            margin: 20px;
        }

        h1 {
            text-align: center;
        }

        .result {
            text-align: center;
            margin-top: 20px;
            padding: 10px;
            background-color: #f0f0f0;
            border-radius: 5px;
        }
       
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
    }

    .container {
        margin: 20px auto;
        max-width: 600px;
        padding: 20px;
        background-color: #ffffff;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        text-align: center;
        color: #333;
    }

    form {
        text-align: center;
    }

    .form-group {
        margin: 10px 0;
    }

    label {
        font-weight: bold;
        display: block;
    }

    input[type="text"],
    input[type="date"] {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    button[type="submit"] {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
    }

    .result {
        text-align: center;
        margin-top: 20px;
        padding: 10px;
        background-color: #f0f0f0;
        border-radius: 5px;
    }

    .result h2 {
        color: #333;
    }

    .result p {
        margin: 10px 0;
    }


    </style>
</head>
<body>
<div class="container">
    <h1>Placement Statistics</h1>
    <form action="COUNT1.php" method="POST">
        <div class="form-group">
            <label for="cname">Company Name:</label>
            <input type="text" name="cname" id="cname" required>
        </div>
        <div class="form-group">
            <label for="date">Date:</label>
            <input type="date" name="date" id="date" required>
        </div>
        <div class="form-group">
            <button type="submit" name="submit">Submit</button>
        </div>
    </form>

    <?php if (isset($attendedCount)): ?>
        <div class="result">
            <h2>Placement Statistics for <?php echo $cname; ?> on <?php echo $date; ?></h2>
            <p>Number of Students Attended: <?php echo $attendedCount; ?></p>
            <p>Number of Students Cleared WT: <?php echo $clearedWTCount; ?></p>
            <p>Number of Students Cleared GD: <?php echo $clearedGDCount; ?></p>
            <p>Number of Students Cleared Technical: <?php echo $clearedTechnicalCount; ?></p>
            <p>Number of Students Placed: <?php echo $placedCount; ?></p>
        </div>
    <?php endif; ?>
</div>
</body>
</html>
