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
        <script type="text/javascript" src="js/garage.js"></script>
        <link rel="stylesheet" type ="style/css" href =css/style.css>
    </head>
    <body>
       
       <?php  require 'toolbar.php' ?>
       <?php  require 'header.php' ?>
       <?php   require 'MainMenu.php' ?>
     
        <h1>Create Garage Form</h1>
        <?php
        if (isset($errorMessage)) {
            echo '<p>Error: ' . $errorMessage . '</p>';
        }
        ?>
        <form id="createGarageForm" name="createGarageForm" action="createGarage.php" method="POST">
            <table border="0">
                <tbody>
                    <tr>
                        <td>Name</td>
                        <td>
                            <input type="text" name="name" value="<?php
                                if (isset($_POST) && isset($_POST['name'])) {
                                    echo $_POST['name'];
                                }
                            ?>" />
                            <span id="nameError" class="error"><?php
                                if (isset($errorMessage) && isset($errorMessage['name'])) {
                                    echo $errorMessage['name'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>
                            <input type="text" name="address" value="<?php
                                    if (isset($_POST) && isset($_POST['address'])) {
                                        echo $_POST['address'];
                                    }
                                ?>" />
                            <span id="addressError" class="error"> <?php
                                if (isset($errorMessage) && isset($errorMessage['address'])) {
                                    echo $errorMessage['address'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Phone Number</td>
                        <td>
                            <input type="text" name="phoneNo" value="<?php
                                    if (isset($_POST) && isset($_POST['phoneNo'])) {
                                        echo $_POST['phoneNo'];
                                    }
                                ?>" />
                            <span id="phoneNoError" class="error"><?php
                                if (isset($errorMessage) && isset($errorMessage['phoneNo'])) {
                                    echo $errorMessage['phoneNo'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Name Of Garage</td>
                        <td>
                            <input type="text" name="nameOfGarage" value="<?php
                                    if (isset($_POST) && isset($_POST['nameOfGarage'])) {
                                        echo $_POST['nameOfGarage'];
                                    }
                                ?>" />
                            <span id="nameOfGarageError" class="error"><?php
                                if (isset($errorMessage) && isset($errorMessage['nameOfGarage'])) {
                                    echo $errorMessage['nameOfGarage'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Manager</td>
                        <td>
                            <input type="text" name="manager" value="<?php
                                    if (isset($_POST) && isset($_POST['manager'])) {
                                        echo $_POST['manager'];
                                    }
                                ?>" />
                            <span id="managerError" class="error"><?php
                                if (isset($errorMessage) && isset($errorMessage['manager'])) {
                                    echo $errorMessage['manager'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                   
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" value="Create Garage" name="createGarage" />
                        </td>
                    </tr>
                </tbody>
            </table>

        </form>
         <?php require 'footer.php' ?>
    </body>
</html>
