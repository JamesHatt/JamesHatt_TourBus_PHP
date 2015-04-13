<?php
require_once 'Bus.php';
require_once 'Connection.php';
require_once 'BusTableGateway.php';
/* "require_once" means that a stored piece of data
  will remain as an output by having to load it just once*/

require_once 'ensureUserLoggedIn.php';

if (isset($_GET) && isset($_GET['sortOrder'])) {
    $sortOrder = $_GET['sortOrder'];
    $columnNames = array("regNo", "Make", "Model", "NoOfSeats", "engineSize", "dateBusBought", "nextService", "garageName");
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

                    <th><a href="viewBuses.php?sortOrder=regNo">Registration Number</a></th>
                    <th><a href="viewBuses.php?sortOrder=Make">Make</a></th>
                    <th><a href="viewBuses.php?sortOrder=Model">Model</a></th>
                    <th><a href="viewBuses.php?sortOrder=NoOfSeats">Number of Seats</a></th>
                    <th><a href="viewBuses.php?sortOrder=engineSize">Engine Size</a></th>
                    <th><a href="viewBuses.php?sortOrder=dateBusBought">Date Bought</a></th>
                    <th><a href="viewBuses.php?sortOrder=nextService">Next Service</a></th>
                    <th><a href="viewBuses.php?sortOrder=garageName">Garage</a></th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $row = $statement->fetch(PDO::FETCH_ASSOC);
                while($row)
                {

                    echo '<td>' .$row['regNo'] .  '</td>';
                    echo '<td>' .$row['Make'] .  '</td>';
                    echo '<td>' .$row['Model'] .  '</td>';
                    echo '<td>' .$row['NoOfSeats'] .  '</td>';
                    echo '<td>' .$row['engineSize'] .  '</td>';
                    echo '<td>' .$row['dateBusBought'] .  '</td>';
                    echo '<td>' .$row['nextService'] .  '</td>'; 
                    echo '<td>' .$row['garageName'] .  '</td>';
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
            <?php require_once 'footer.php'?>
    </body>
</html>
