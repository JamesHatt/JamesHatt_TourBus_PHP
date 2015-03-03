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
        <a href="home.php"><img src="images/TourBusCompany.jpg"></a>
        <?php require 'toolbar.php' ?>
        <?php
        if (isset($message)) {
            echo '<p>'.$message.'</p>';
        }
        ?>
        <table border ="1" style="width:100%" id="t01">           
            <thead>
                <tr>
                    <th>Buses ID</th>
                    <th>Registration Number</th>
                    <th>Make</th>
                    <th>Model</th>
                    <th>Seat Numbers</th>
                    <th>Engine Size</th>
                    <th>Date Bought</th>
                    <th>Next Service</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $row = $statement->fetch(PDO::FETCH_ASSOC);
                while($row)
                {
                    echo '<td>' .$row['busesID'] .  '</td>';
                    echo '<td>' .$row['regNo'] .  '</td>';
                    echo '<td>' .$row['Make'] .  '</td>';
                    echo '<td>' .$row['Model'] .  '</td>';
                    echo '<td>' .$row['NoOfSeats'] .  '</td>';
                    echo '<td>' .$row['engineSize'] .  '</td>';
                    echo '<td>' .$row['dateBusBought'] .  '</td>';
                    echo '<td>' .$row['nextService'] .  '</td>';                  
                    echo '<td>'
                    . '<a href="viewBus.php?id='.$row['busesID'].'">View</a> '
                    . '<a href="editBusForm.php?id='.$row['busesID'].'">Edit</a> '
                    . '<a href="deleteBus.php?id='.$row['busesID'].'">Delete</a> '
                    . '</td>';                   
                    
                    echo ' </tr>';
                    
                    $row = $statement->fetch(PDO::FETCH_ASSOC);
                }
                ?>
            </tbody>
        </table>
        <p><a href="createBusForm.php">Create Bus</a></p>
    </body>
</html>
