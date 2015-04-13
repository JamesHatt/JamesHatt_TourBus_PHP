<?php

require_once 'Connection.php';
require_once 'GarageTableGateway.php';
$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';

$connection = Connection::getInstance();
$garageGateway = new GarageTableGateway($connection);

$garages = $garageGateway->getGarages();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script type="text/javascript" src="js/bus.js"></script>
        <link rel="stylesheet" type ="style/css" href =css/style.css>
    </head>
    <body>
       
       <?php  require 'toolbar.php' ?>
       <?php  require 'header.php' ?>
       <?php   require 'MainMenu.php' ?>
     
        <h1>Create Bus Form</h1>
        <?php
        if (isset($errorMessage)) {
            echo '<p>Error: ' . $errorMessage . '</p>';
        }
        ?>
        <form id="createBusForm" name="createBusForm" action="createBus.php" method="POST">
            <table border="0">
                <tbody>
                    <tr>
                        <td>Registration Number</td>
                        <td>
                            <input type="text" name="regNo" value="<?php
                                if (isset($_POST) && isset($_POST['regNo'])) {
                                    echo $_POST['regNo'];
                                }
                            ?>" />
                            <span id="regNoError" class="error"><?php
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
                            <input type="text" name="Make" value="<?php
                                    if (isset($_POST) && isset($_POST['Make'])) {
                                        echo $_POST['Make'];
                                    }
                                ?>" />
                            <span id="MakeError" class="error"> <?php
                                if (isset($errorMessage) && isset($errorMessage['Make'])) {
                                    echo $errorMessage['Make'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Model</td>
                        <td>
                            <input type="text" name="Model" value="<?php
                                    if (isset($_POST) && isset($_POST['Model'])) {
                                        echo $_POST['Model'];
                                    }
                                ?>" />
                            <span id="ModelError" class="error"><?php
                                if (isset($errorMessage) && isset($errorMessage['Model'])) {
                                    echo $errorMessage['Model'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Number of Seats</td>
                        <td>
                            <input type="text" name="NoOfSeats" value="<?php
                                    if (isset($_POST) && isset($_POST['NoOfSeats'])) {
                                        echo $_POST['NoOfSeats'];
                                    }
                                ?>" />
                            <span id="NoOfSeatsError" class="error"><?php
                                if (isset($errorMessage) && isset($errorMessage['NoOfSeats'])) {
                                    echo $errorMessage['NoOfSeats'];
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
                                ?>" />
                            <span id="engineSizeError" class="error"><?php
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
                                ?>" />
                            <span id="dateBusBoughtError" class="error"><?php
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
                                ?>" />
                            <span id="nextServiceError" class="error"><?php
                                if (isset($errorMessage) && isset($errorMessage['nextService'])) {
                                    echo $errorMessage['nextService'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Garage</td>
                        <td>
                            <select name="garageID">
                                <option value="-1"> No Garage</option>
                                <?php
                                $g = $garages->fetch(PDO::FETCH_ASSOC);
                                while ($g) {
                                    echo '<option value="' . $g['id'] .'">' . $g['nameOfGarage'] .'</option>';
                                    $g = $garages->fetch(PDO::FETCH_ASSOC);
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" value="Create Bus" name="createBus" />
                        </td>
                    </tr>
                </tbody>
            </table>

        </form>
         <?php require 'footer.php' ?>
    </body>
</html>
