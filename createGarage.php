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

echo '<pre>';
        print_r($_POST);
        print_r($params);
        print_r($sqlQuery);
        echo '</pre>';

/*FILTER SSANTIZE meaning it filters out any characters that are not strings*/
$name              = filter_input(INPUT_POST, '$name',          FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$address           = filter_input(INPUT_POST, '$address',       FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$phoneNo           = filter_input(INPUT_POST, '$phoneNo',       FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$nameOfGarage      = filter_input(INPUT_POST, '$nameOfGarage',  FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$manager           = filter_input(INPUT_POST, '$manager',       FILTER_SANITIZE_FULL_SPECIAL_CHARS);

$id = $gateway->insertGarage($name, $address, $phoneNo, $nameOfGarage, $manager);

$message = " Your Garage was Created Successfully ";


header('Location: viewGarages.php');

