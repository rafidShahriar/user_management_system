<?php
session_start();
if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
    ?>


    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8"/>
        <title>Registration form Template | PrepBootstrap</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css"/>

        <script type="text/javascript" src="bootstrap/js/jquery.min.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    </head>
    <body>

    <?php include_once 'includes/dashboard_menu.php';?>
    <div class="container">
        <h1>Welcome to My Application......This is admin area.</h1>
    </div>
    </body>
    </html>
<?php } else {
    $_SESSION['Message'] = "Login for continue";
    header('location:login.php');
} ?>
