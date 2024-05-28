<?php
$connect = mysqli_connect("localhost", "root", "", "details"); // Establishing Connection with Server

if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['submit'])) { 
    $cname = $_POST['compny'];
    $date = $_POST['date'];
    $campool = $_POST['campool'];
    $poolven = $_POST['pcv'];
    $per = $_POST['sslc'];
    $puagg = $_POST['puagg'];
    $beaggregate = $_POST['beagg'];
    $back = $_POST['curback'];
    $hisofbk = $_POST['hob'];
    $breakstud = $_POST['break'];
    $otherdet = $_POST['odetails'];

    if ($cname != '' || $date != '') {
        $query = "INSERT INTO addpdrive (CompanyName, Date, campusPool, poolcampusVenue, SSLCAgg, PUDIPLOMAgg, BEAgg, CurrentBacklogs, HistoryBacklogs, BreakStudies, otherDetails) 
                  VALUES ('$cname', '$date', '$campool', '$poolven', '$per', '$puagg', '$beaggregate', '$back', '$hisofbk', '$breakstud', '$otherdet')";
        
        if (mysqli_query($connect, $query)) {
            echo "<center>Drive Inserted successfully</center>";
        } else {
            echo "Error: " . mysqli_error($connect);
        }
    }
    mysqli_close($connect);
}
?>
