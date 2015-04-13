<html>
    <?php
    require_once 'Connection.php';
    require_once 'GarageTableGateway.php';
    require_once 'BusTableGateway.php';
    require 'toolbar.php';
    require 'header.php' ;
    require 'MainMenu.php';
    /* "require_once" means that a stored piece of data
    will remain as an output by having to load it just once*/

    $id = session_id();
    if ($id == "") {
    session_start();
    }

    require 'ensureUserLoggedIn.php';

    if (!isset($_GET) || !isset($_GET['id'])) {
    die('Invalid request');
    }
    $id = $_GET['id'];

    $connection = Connection::getInstance();
    $garageGateway = new GarageTableGateway($connection);
    $busGateway = new BusTableGateway($connection);

    $garages = $garageGateway->getGarageById($id);
    $buses = $busGateway->getBusesByGarageId($id);
    ?>
    <!DOCTYPE html>

    <head>
        <meta charset="UTF-8">
        <script type="text/javascript" src="js/garage.js"></script>
        <title></title>
    </head>
    <body>       

        <h2> View Garage Details</h2>
        <div class="container">
            <?php
            if (isset($message)) {
            echo '<p>'.$message.'</p>';
            }
            ?>
            <table>
                <tbody>
                    <?php
                    /* echo = prints out */
                    $garage = $garages->fetch(PDO::FETCH_ASSOC);
                    echo '<tr>';
                    echo '<td>Name:</td>'
                    . '<td>' . $garage['name'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Address:</td>'
                    . '<td>' . $garage['address'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Phone Number:</td>'
                    . '<td>' . $garage['phoneNo'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Name of Garage:</td>'
                    . '<td>' . $garage['nameOfGarage'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Manager:</td>'
                    . '<td>' . $garage['manager'] . '</td>';
                    echo '</tr>';
                    ?>
                </tbody>
            </table>
            <p>
                <a href="editGarageForm.php?id=<?php echo $Bus['busesID']; ?>">
                    Edit Garage</a>
                <a class="deleteGarage" href="deleteGarage.php?id=<?php echo $garage['busesID']; ?>">
                    Delete Garage</a>
            </p>
            <h3>Buses Assigned to <?php echo $garage['garageName']; ?> </h3>
            <?php if($buses->rowCount() != 0) { ?>

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
                        <th>Garage</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $row = $buses->fetch(PDO::FETCH_ASSOC);
                    while($row)
                    {
                    echo '<td>' .$row['regNo'] . '</td>';
                    echo '<td>' .$row['Make'] . '</td>';
                    echo '<td>' .$row['Model'] . '</td>';
                    echo '<td>' .$row['NoOfSeats'] . '</td>';
                    echo '<td>' .$row['engineSize'] . '</td>';
                    echo '<td>' .$row['dateBusBought'] . '</td>';
                    echo '<td>' .$row['nextService'] . '</td>';
                    echo '<td>' .$row['garageName'] . '</td>';
                    echo '<td>'
                    . '<a href="viewBus.php?id='.$row['busesID'].'">View</a> '
                    . '<a href="editBusForm.php?id='.$row['busesID'].'">Edit</a> '
                    . '<a href="deleteBus.php?id='.$row['busesID'].'">Delete</a> '
                    . '</td>';

                    echo ' </tr>';

                    $row = $buses->fetch(PDO::FETCH_ASSOC);
                    }
                    ?>
                </tbody>
            </table>
            <?php } else { ?>
            <p> There are no busses signed to this Garage</p>
            <?php } ?>
            <?php require 'toolbar.php' ?>
        </div>-->
    </body>
</html>