<?php
$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script type="text/javascript" src="js/bus.js"></script>
        <link rel="stylesheet" type ="style/css" href =Css/style.css>
    </head>
    <body>
        <?php require 'toolbar.php' ?>
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
                            <input type="text" name="regNo" value="" />
                            <span id="regNoError" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Make</td>
                        <td>
                            <input type="text" name="make" value="" />
                            <span id="makeError" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Model</td>
                        <td>
                            <input type="text" name="model" value="" />
                            <span id="modelError" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Number of Seats</td>
                        <td>
                            <input type="text" name="noOfSeats" value="" />
                            <span id="noOfSeatsError" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Engine Size</td>
                        <td>
                            <input type="text" name="engineSize" value="" />
                            <span id="engineSizeError" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Date Bus Bought</td>
                        <td>
                            <input type="text" name="dateBusBought" value="" />
                            <span id="dateBusBoughtError" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Next Bus Service</td>
                        <td>
                            <input type="text" name="nextService" value="" />
                            <span id="nextServiceError" class="error"></span>
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
    </body>
</html>
