<?php
require_once 'Garage.php';
require_once 'Connection.php';
require_once 'GarageTableGateway.php';
/* "require_once" means that a stored piece of data
  will remain as an output by having to load it just once*/

$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';

$connection = Connection::getInstance();
$gateway = new GarageTableGateway($connection);

/*FILTER SSANTIZE meaning it filters out any characters that are not strings*/

$garageID             = filter_input(INPUT_POST, 'garageID',          FILTER_SANITIZE_NUMBER_INT);
$name                 = filter_input(INPUT_POST, 'name',              FILTER_SANITIZE_NUMBER_INT);
$address              = filter_input(INPUT_POST, 'address',           FILTER_SANITIZE_NUMBER_INT);
$phoneNo              = filter_input(INPUT_POST, 'phoneNo',           FILTER_SANITIZE_NUMBER_INT);
$nameOfGarage         = filter_input(INPUT_POST, 'nameOfGarage',      FILTER_SANITIZE_NUMBER_INT);
$manager              = filter_input(INPUT_POST, 'manager',           FILTER_SANITIZE_NUMBER_INT);

$gateway->updateGarage($garageID, $name, $address, $phoneNo, $nameOfGarage, $manager);
echo '<pre>';
        print_r($_POST);
        print_r($params);
        print_r($sqlQuery);
        echo '</pre>';

header('Location: home.php');

