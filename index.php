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
        <title>Howdy !</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
        
        
        <link rel="icon" type="image/x-icon" href="images/TourBusCompany.jpeg">
    </head>
    <body>
         <?php require_once 'toolbar.php' ?>
        <a href="home.php"><img src="images/TourBusCompany.jpg"></a>
        <h2>Welcome !</h2>
       
        <?php require_once 'header.php' ?>
        <?php require_once 'MainMenu.php' ?>
        <?php 
        if (isset($message)) {
            echo '<p>'.$message.'</p>';
        }
        ?>
        <table border = "1" style = "width:100% "id="t01">       
            <thead>
                <tr>
                    <th>Buses ID</th>
                    <th>Registration Number</th>
                    <th>Make</th>
                    <th>Model</th>
                    <th>Number of Seats</th>
                    <th>Engine Size</th>
                    <th>Date Bought</th>
                    <th>Next Service</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $row = $statement->fetch(PDO::FETCH_ASSOC);
                while ($row) {

                    echo '<td>' . $row['busesID'] . '</td>';
                    echo '<td>' . $row['regNo'] . '</td>';
                    echo '<td>' . $row['Make'] . '</td>';
                    echo '<td>' . $row['Model'] . '</td>';
                    echo '<td>' . $row['NoOfSeats'] . '</td>';
                    echo '<td>' . $row['engineSize'] . '</td>';
                    echo '<td>' . $row['dateBusBought'] . '</td>';
                    echo '<td>' . $row['nextService'] . '</td>';
                    echo '</tr>';
                    
                    $row = $statement->fetch(PDO::FETCH_ASSOC);
                }
                ?>
            </tbody>
        </table>
        <ul>
            <li><a href="createBusForm.php">create bus</a></li>
</ul>
        <?php require_once 'footer.php' ?>
    </body>
</html>