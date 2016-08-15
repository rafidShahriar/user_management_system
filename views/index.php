<?php
session_start();
include_once '../vendor/autoload.php';
use App\registration\Profile;

$obj = new Profile();
$allData = $obj->index();
print_r($allData);
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
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                </tr>
            </thead>
            <?php foreach ($allData as $singleData) { ?>
            <tbody>
                <tr>
                    <td><?php echo $singleData['first_name']; ?></td>
                </tr>
            </tbody>
            <?php } ?>
        </table>
    </div>
    </body>
    </html>
<?php } else {
    $_SESSION['Message'] = "Login for continue";
    header('location:login.php');
} ?>
