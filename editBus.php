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

$busesID             = filter_input(INPUT_POST, 'busesID',          FILTER_SANITIZE_NUMBER_INT);
$regNo               = filter_input(INPUT_POST, 'regNo',          FILTER_SANITIZE_NUMBER_INT);
$make                = filter_input(INPUT_POST, 'make',          FILTER_SANITIZE_NUMBER_INT);
$model               = filter_input(INPUT_POST, 'model',          FILTER_SANITIZE_NUMBER_INT);
$noOfSeats           = filter_input(INPUT_POST, 'noOfSeats',          FILTER_SANITIZE_NUMBER_INT);
$engineSize          = filter_input(INPUT_POST, 'engineSize',          FILTER_SANITIZE_NUMBER_INT);
$dateBusBought       = filter_input(INPUT_POST, 'dateBusBought',          FILTER_SANITIZE_NUMBER_INT);
$nextService         = filter_input(INPUT_POST, 'nextService',          FILTER_SANITIZE_NUMBER_INT);
$garageID            = filter_input(INPUT_POST, 'garageID', FILTER_SANITIZE_NUMBER_INT);
if ($garageID == -1) {
    $garageID = NULL;
}

$gateway->updateBus($busesID, $regNo, $make, $model, $noOfSeats, $engineSize, $dateBusBought, $nextService, $garageID);
echo '<pre>';
        print_r($_POST);
        print_r($params);
        print_r($sqlQuery);
        echo '</pre>';

header('Location: home.php');
