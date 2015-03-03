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
$gateway = new BusTableGateway($connection);

$statement = $gateway->getBusById($id);
if ($statement->rowCount() !== 1) {
    die("Illegal request");
}
$row = $statement->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script type="text/javascript" src="js/bus.js"></script>
    </head>
    <body>
        <?php require 'toolbar.php' ?>
        <h1>Edit Bus Form</h1>
        <?php
        if (isset($errorMessage)) {
            echo '<p>Error: ' . $errorMessage . '</p>';
        }
        ?>
        <form id="editBusForm" name="editBusForm" action="editBus.php" method="POST">
            <input type="hidden" name="editID" value="<?php echo $id; ?>" />
            <table border="0">
                <tbody>
                    <tr>
                        <td>Registration Number</td>
                        <td>
                            <input type="text" name="regNo" value="<?php
                                if (isset($_POST) && isset($_POST['regNo'])) {
                                    echo $_POST['regNo'];
                                }
                                else echo $row['regNo'];
                            ?>" />
                            <span id="regNoError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['regNo'])) {
                                    echo $errorMessage['regNo'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Make</td>
                        <td>
                            <input type="text" name="make" value="<?php
                                if (isset($_POST) && isset($_POST['make'])) {
                                    echo $_POST['make'];
                                }
                                else echo $row['Make'];
                            ?>" />
                            <span id="makeError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['make'])) {
                                    echo $errorMessage['make'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Model</td>
                        <td>
                            <input type="text" name="model" value="<?php
                                if (isset($_POST) && isset($_POST['model'])) {
                                    echo $_POST['model'];
                                }
                                else echo $row['Model'];
                            ?>" />
                            <span id="modelError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['model'])) {
                                    echo $errorMessage['model'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Number of Seats</td>
                        <td>
                            <input type="text" name="noOfSeats" value="<?php
                                if (isset($_POST) && isset($_POST['noOfSeats'])) {
                                    echo $_POST['noOfSeats'];
                                }
                                else echo $row['NoOfSeats'];
                            ?>" />
                            <span id="noOfSeatsError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['noOfSeats'])) {
                                    echo $errorMessage['noOfSeats'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Engine Size</td>
                        <td>
                            <input type="text" name="engineSize" value="<?php
                                if (isset($_POST) && isset($_POST['engineSize'])) {
                                    echo $_POST['engineSize'];
                                }
                                else echo $row['engineSize'];
                            ?>" />
                            <span id="engineSizeError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['engineSize'])) {
                                    echo $errorMessage['engineSize'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Date Bus Bought</td>
                        <td>
                            <input type="text" name="dateBusBought" value="<?php
                                if (isset($_POST) && isset($_POST['dateBusBought'])) {
                                    echo $_POST['dateBusBought'];
                                }
                                else echo $row['dateBusBought'];
                            ?>" />
                            <span id="dateBusBoughtError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['dateBusBought'])) {
                                    echo $errorMessage['dateBusBought'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Next Bus Service</td>
                        <td>
                            <input type="text" name="nextService" value="<?php
                                if (isset($_POST) && isset($_POST['nextService'])) {
                                    echo $_POST['nextService'];
                                }
                                else echo $row['nextService'];
                            ?>" />
                            <span id="nextServiceError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['nextService'])) {
                                    echo $errorMessage['nextService'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" value="Update Bus" name="updateBus" />
                        </td>
                    </tr>
                </tbody>
            </table>

        </form>
    </body>
</html>