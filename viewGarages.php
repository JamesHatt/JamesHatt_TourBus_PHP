<?php
require_once 'Connection.php';
require_once 'GarageTableGateway.php';

require 'ensureUserLoggedIn.php';

$connection = Connection::getInstance();
$garageGateway = new GarageTableGateway($connection);

$garages = $garageGateway->getGarages();
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Irish Tour Bus Company </title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="js/bus.js"></script> 
    </head>
    <body>
        <?php require 'toolbar.php' ?>
        <a href="home.php"><img src="images/TourBusCompany.jpg"></a>   
        <?php require_once 'header.php'?>
        <?php require_once 'MainMenu.php'?>
        <?php
        if (isset($message)) {
            echo '<p>'.$message.'</p>';
        }
        ?>
        <table border ="1" style="width:100%" id="t01">           
            <thead>
                <tr>
                    <th>Garages ID</th>
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
                $row = $garages->fetch(PDO::FETCH_ASSOC);
                while($row)
                {
                    echo '<td>' .$row['garagesID'] .  '</td>';
                    echo '<td>' .$row['regNo'] .  '</td>';
                    echo '<td>' .$row['Make'] .  '</td>';
                    echo '<td>' .$row['Model'] .  '</td>';
                    echo '<td>' .$row['NoOfSeats'] .  '</td>';
                    echo '<td>' .$row['engineSize'] .  '</td>';
                    echo '<td>' .$row['dateBusBought'] .  '</td>';
                    echo '<td>' .$row['nextService'] .  '</td>';                  
                    echo '<td>'
                    . '<a href="viewGarage.php?id='.$row['garagesID'].'">View</a> '
                    . '<a href="editGarageForm.php?id='.$row['garagesID'].'">Edit</a> '
                    . '<a href="deleteGarage.php?id='.$row['garagesID'].'">Delete</a> '
                    . '</td>';                   
                    
                    echo ' </tr>';
                    
                    $row = $garages->fetch(PDO::FETCH_ASSOC);
                }
                ?>
            </tbody>
        </table>
        <p><a href="createGarageForm.php">Create Garage</a></p>
            <?php require_once 'footer.php'?>
    </body>
</html>