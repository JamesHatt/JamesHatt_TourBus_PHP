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

echo '<pre>';
        print_r($_POST);
        print_r($params);
        print_r($sqlQuery);
        echo '</pre>';

//Comment in code
$regNo          = filter_input(INPUT_POST, 'regNo',    FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$Make           = filter_input(INPUT_POST, '$Make',    FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$Model          = filter_input(INPUT_POST, '$Model',    FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$NoOfSeats      = filter_input(INPUT_POST, '$NoOfSeats',    FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$engineSize     = filter_input(INPUT_POST, '$engineSize',    FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$dateBusBought  = filter_input(INPUT_POST, '$dateBusBought',    FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$nextService    = filter_input(INPUT_POST, '$nextService',    FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$garageID       = filter_input(INPUT_POST, 'garageID',    FILTER_SANITIZE_FULL_SPECIAL_CHARS);
if ($garageID == -1) {
    $garageID = NULL;
}


$id = $gateway->insertBus($regNo, $Make, $Model, $NoOfSeats, $engineSize, $dateBusBought, $nextService, $garageID);

$message = " Your Bus was Created Successfully ";


header('Location: viewBuses.php');

