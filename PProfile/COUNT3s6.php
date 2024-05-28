<?php
session_start();
if (isset($_SESSION['pusername'])) {
    echo "Welcome, " . $_SESSION['pusername'] . "!";
} else {
    header("location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!--favicon-->
    <link rel="shortcut icon" href="favicon.ico" type="image/icon">
    <link rel="icon" href="favicon.ico" type="image/icon">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manage Students</title>
    <meta name="description" content="">
    <meta name="author" content="templatemo">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,700' rel='stylesheet'
        type='text/css'>
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/templatemo-style.css" rel="stylesheet">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="bg">
        <div class="templatemo-content-container">
            <div class="templatemo-content-widget no-padding">
                <div class="panel panel-default table-responsive">
                    <table class="table table-striped table-bordered templatemo-user-table">
                        <thead>
                            <tr>
                                <td><a class="white-text templatemo-sort-by">First Name</a></td>
                                <td><a class="white-text templatemo-sort-by">Last Name</a></td>
                                <td><a class="white-text templatemo-sort-by">USN</a></td>
                                <td><a class="white-text templatemo-sort-by">Mobile</a></td>
                                <td><a class="white-text templatemo-sort-by">Email</a></td>
                                <td><a class="white-text templatemo-sort-by">DOB</a></td>
                                <td><a class="white-text templatemo-sort-by">Sem</a></td>
                                <td><a class="white-text templatemo-sort-by">Branch</a></td>
                                <td><a class="white-text templatemo-sort-by">SSLC</a></td>
                                <td><a class="white-text templatemo-sort-by">PU/Dip</a></td>
                                <td><a class="white-text templatemo-sort-by">BE</a></td>
                                <td><a class="white-text templatemo-sort-by">Backlogs</a></td>
                                <td><a class="white-text templatemo-sort-by">History Of Backlogs</a></td>
                                <td><a class="white-text templatemo-sort-by">Detain Years</a></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $mysqli = new mysqli('localhost', 'root', '', 'details');
                            if ($mysqli->connect_error) {
                                die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
                            }

                            if (isset($_POST['s6'])) {
                                $Cpu = $_POST['cpu'];
                                $sql = "SELECT * FROM basicdetails WHERE `Approve`='1' AND `PU/Dip`>='$Cpu'";
                                $result = $mysqli->query($sql);

                                echo "<br><h3>Students Scored Above '$Cpu' in PU/Diploma&nbsp:&nbsp" . $result->num_rows . "</h3>";

                                while ($row = $result->fetch_assoc()) {
                                    echo '<tr>';
                                    echo '<td>' . $row['FirstName'] . '</td>';
                                    echo '<td>' . $row['LastName'] . '</td>';
                                    echo '<td>' . $row['USN'] . '</td>';
                                    echo '<td>' . $row['Mobile'] . '</td>';
                                    echo '<td>' . $row['Email'] . '</td>';
                                    echo '<td>' . $row['DOB'] . '</td>';
                                    echo '<td>' . $row['Sem'] . '</td>';
                                    echo '<td>' . $row['Branch'] . '</td>';
                                    echo '<td>' . $row['SSLC'] . '</td>';
                                    echo '<td>' . $row['PU/Dip'] . '</td>';
                                    echo '<td>' . $row['BE'] . '</td>';
                                    echo '<td>' . $row['Backlogs'] . '</td>';
                                    echo '<td>' . $row['HofBacklogs'] . '</td>';
                                    echo '<td>' . $row['DetainYears'] . '</td>';
                                    echo '</tr>';
                                }
                            }

                            $mysqli->close();
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <footer class="text-right">
            <p>Copyright &copy; 2023 nec | Developed by
                <a href="http://nec.edu.in" target="_parent">NEC</a>
            </p>
        </footer>
    </div>
</body>

</html>
