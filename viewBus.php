<?php
require_once 'Bus.php';
require_once 'Connection.php';
require_once 'BusTableGateway.php';
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
$busGateway = new BusTableGateway($connection);

$buses = $busGateway->getBusById($id);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <script type="text/javascript" src="js/bus.js"></script>
        <title></title>
    </head>
    <body>
        <?php require 'toolbar.php' ?>
        <?php require 'header.php' ?>
        <?php require 'MainMenu.php' ?>
        <?php
        if (isset($message)) {
            echo '<p>'.$message.'</p>';
        }
        ?>
        <table>
            <tbody>
                <?php
                /*echo = prints out*/
                $row = $statement->fetch(PDO::FETCH_ASSOC);
                    echo '<tr>';
                    echo '<td>Registration Number:</td>'
                    . '<td>' . $bus['regNo'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Make:</td>'
                    . '<td>' . $bus['Make'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Model:</td>'
                    . '<td>' . $bus['Model'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Number of Seats:</td>'
                    . '<td>' . $bus['NoOfSeats'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Engine Size:</td>'
                    . '<td>' . $bus['engineSize'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Date Bus Bought:</td>'
                    . '<td>' . $bus['dateBusBought'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Next Bus Service:</td>'
                    . '<td>' . $bus['nextService'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Garage:</td>'
                    . '<td>' . $bus['garageName'] . '</td>';
                    echo '</tr>';
                ?>
            </tbody>
        </table>
        <p>
            <a href="editBusForm.php?id=<?php echo $row['busesID']; ?>">
                Edit Bus</a>
            <a class="deleteBus" href="deleteBus.php?id=<?php echo $row['busesID']; ?>">
                Delete Bus</a>
        </p>
        <?php require 'toolbar.php' ?>
    </body>
</html>

