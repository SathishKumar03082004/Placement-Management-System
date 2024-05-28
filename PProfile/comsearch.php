<?php
session_start();
if (isset($_SESSION['pusername'])) {
    $formBackgroundColor = '#f4f4f4'; // Background color for the form container
    $labelColor = '#333'; // Text color for labels
    $buttonBackgroundColor = '#007bff'; // Background color for the submit button
    $buttonTextColor = '#fff'; // Text color for the submit button
} else {
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Add your CSS styles here -->
    <style>
        .templatemo-login-form {
            background-color: <?php echo $formBackgroundColor; ?>;
            padding: 20px;
            border-radius: 5px;
        }

        .templatemo-login-form label {
            color: <?php echo $labelColor; ?>;
        }

        .templatemo-blue-button {
            background-color: <?php echo $buttonBackgroundColor; ?>;
            color: <?php echo $buttonTextColor; ?>;
        }
    </style>
</head>

<body>
    <form action="COUNT2.php" class="templatemo-login-form" method="POST" enctype="multipart/form-data">
        <div class="col-lg-6 col-md-6 form-group">
            <label for="sslc">Company Name</label>
            <input type="text" name="cname" class="form-control" id="sslc" placeholder="">
        </div>
        <br>
        <div class="form-group text-right">
            <button type="submit" name="submit" class="templatemo-blue-button">Submit</button>
            <button type="reset" class="templatemo-white-button">Reset</button>
        </div>
    </form>

    <footer class="text-right">
        <p>
            Copyright &copy; 2018 nec | Placement
            <a href="http://nec.edu.in" target="_parent">nec</a>
        </p>
    </footer>

    <!-- JS -->
    <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script> <!-- jQuery -->
    <script type="text/javascript" src="js/templatemo-script.js"></script> <!-- Templatemo Script -->
    <script>
        $(document).ready(function () {
            // Content widget with background image
            var imageUrl = $('img.content-bg-img').attr('src');
            $('.templatemo-content-img-bg').css('background-image', 'url(' + imageUrl + ')');
            $('img.content-bg-img').hide();
        });
    </script>
</body>

</html>
