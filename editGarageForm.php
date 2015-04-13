<?php
require_once 'Connection.php';
require_once 'GarageTableGateway.php';

/* "require_once" means that a stored piece of data
  will remain as an output by having to load it just once*/

$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';

if (!isset($_GET) || !isset($_GET['garageID'])) {
    die('Invalid request');
}
$id = $_GET['garageID'];

$connection = Connection::getInstance();
$garageGateway = new GarageTableGateway($connection);

$statement = $gateway->getGarageById($id);
if ($statement->rowCount() !== 1) {
    die("Illegal request");
}
$row = $statement->fetch(PDO::FETCH_ASSOC);

$garages = $garageGateway->getGarages();
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
         <?php require 'header.php' ?>
          <?php require 'MainMenu.php' ?>
        <h1>Edit Garage Form</h1>
        <?php
        if (isset($errorMessage)) {
            echo '<p>Error: ' . $errorMessage . '</p>';
        }
        ?>
        <form id="editGarageForm" name="editGarageForm" action="editGarage.php" method="POST">
            <input type="hidden" name="editID" value="<?php echo $id; ?>" />
            <table border="0">
                <tbody>
                    <tr>
                        <td>Name</td>
                        <td>
                            <input type="text" name="name" value="<?php
                                if (isset($_POST) && isset($_POST['name'])) {
                                    echo $_POST['name'];
                                }
                                else echo $row['name'];
                            ?>" />
                            <span id="nameError" class="error">
                                <?php
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
                                else echo $row['address'];
                            ?>" />
                            <span id="addressError" class="error">
                                <?php
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
                                else echo $row['phoneNo'];
                            ?>" />
                            <span id="phoneNoError" class="error">
                                <?php
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
                                else echo $row['nameOfGarage'];
                            ?>" />
                            <span id="nameOfGarageError" class="error">
                                <?php
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
                                else echo $row['manager'];
                            ?>" />
                            <span id="managerError" class="error">
                                <?php
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
                            <input type="submit" value="Update Garage" name="updateGarage" />
                        </td>
                    </tr>
                </tbody>
            </table>

        </form>
          <?php require 'footer.php';
          echo '<pre>';
        print_r($_POST);
        print_r($params);
        print_r($sqlQuery);
        echo '</pre>';
          
          
          
          
          
          ?>
         
    </body>
</html>