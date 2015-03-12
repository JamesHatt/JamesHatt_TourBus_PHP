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

$connection = Connection::getInstance();
$gateway = new BusTableGateway($connection);



//Comment in code
$regNo     = filter_input(INPUT_POST, 'regNo',    FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$make     = filter_input(INPUT_POST, '$make',    FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$model     = filter_input(INPUT_POST, '$model',    FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$noOfSeats     = filter_input(INPUT_POST, '$noOfSeats',    FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$engineSize     = filter_input(INPUT_POST, '$engineSize',    FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$dateBusBought     = filter_input(INPUT_POST, '$dateBusBought',    FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$nextService     = filter_input(INPUT_POST, '$nextService',    FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$garageID     = filter_input(INPUT_POST, 'garageID',    FILTER_SANITIZE_FULL_SPECIAL_CHARS);
if ($garageID == -1) {
    $garageID = NULL;
}


$id = $gateway->insertBus($regNo, $make, $model, $noOfSeats, $engineSize, $dateBusBought, $nextService, $garageID);

$message = " Your Bus was Created Successfully ";

header('Location: home.php');

