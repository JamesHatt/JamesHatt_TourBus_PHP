<?php
require_once 'Connection.php';
require_once 'GarageTableGateway.php';
require_once 'Garage.php';

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
                    <th>Name</th>
                    <th>Address</th>
                    <th>Phone Number</th>
                    <th>Name Of Garage</th>
                    <th>Manager</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $row = $garages->fetch(PDO::FETCH_ASSOC);
                while($row)
                {
                    echo '<td>' .$row['garageID'] .  '</td>';
                    echo '<td>' .$row['name'] .  '</td>';
                    echo '<td>' .$row['address'] .  '</td>';
                    echo '<td>' .$row['phoneNo'] .  '</td>';
                    echo '<td>' .$row['nameOfGarage'] .  '</td>';
                    echo '<td>' .$row['manager'] .  '</td>';               
                    echo '<td>'
                    . '<a href="viewGarage.php?id='.$row['garageID'].'">View</a> '
                    . '<a href="editGarageForm.php?id='.$row['garageID'].'">Edit</a> '
                    . '<a href="deleteGarage.php?id='.$row['garageID'].'">Delete</a> '
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