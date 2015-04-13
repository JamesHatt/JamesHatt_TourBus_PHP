<?php
require_once 'Bus.php';
require_once 'Connection.php';
require_once 'BusTableGateway.php';
/* "require_once" means that a stored piece of data
  will remain as an output by having to load it just once*/

require_once 'ensureUserLoggedIn.php';

if (isset($_GET) && isset($_GET['sortOrder'])) {
    $sortOrder = $_GET['sortOrder'];
    $columnNames = array("regNo", "make", "model", "noOfSeats", "engineSize", "dateBusBought", "nextService", "garageName");
    if (!in_array($sortOrder, $columnNames)) {
        $sortorder = 'regNo';
    }
}
else {
       $sortOrder = 'regNo';
}

$connection = Connection::getInstance();
$gateway = new BusTableGateway($connection);

$statement = $gateway->getBuses($sortOrder);
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
        
        <p>Welcome to the Tour Bus Company</p>
        
        <p> more text goes here</p>
        
        <?php require_once 'footer.php' ?>
        <?php require 'scripts.php'; ?>
    </body>
</html>
