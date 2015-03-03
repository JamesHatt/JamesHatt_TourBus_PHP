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

$busesID = $_POST['editID'];
$regNo = $_POST['regNo'];
$make = $_POST['make'];
$model= $_POST['model'];
$noOfSeats = $_POST['noOfSeats'];
$engineSize = $_POST['engineSize'];
$dateBusBought = $_POST['dateBusBought'];
$nextService = $_POST['nextService'];

$gateway->updateBus($busesID, $regNo, $make, $model, $noOfSeats, $engineSize, $dateBusBought, $nextService);

header('Location: home.php');