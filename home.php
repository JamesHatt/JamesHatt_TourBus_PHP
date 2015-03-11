<?php
require_once 'Bus.php';
require_once 'Connection.php';
require_once 'BusTableGateway.php';

/* "require_once" means that a stored piece of data
  will remain as an output by having to load it just once*/

require_once 'ensureUserLoggedIn.php';

$connection = Connection::getInstance();
$gateway = new BusTableGateway($connection);

$statement = $gateway->getBuses();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Irish Tour Bus Company </title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="js/bus.js"></script> 
    </head>
    <body>
        <?php require_once 'toolbar.php' ?>
        <a href="home.php"><img src="images/TourBusCompany.jpg"></a>
        <?php require_once 'header.php' ?>
        <?php require_once 'MainMenu.php' ?>
        if (isset($message)) {
            echo '<p>'.$message.'</p>';
        }
        ?>
        <p>Welcome to the Tour Bus Company</p>
        
        <p> more text goes here</p>
        
        <?php require_once 'footer.php' ?>
    </body>
</html>
