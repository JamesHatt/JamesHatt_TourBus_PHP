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

if (!isset($_GET) || !isset($_GET['id'])) {
    die('Invalid request');
}
$id = $_GET['id'];

$connection = Connection::getInstance();
$gateway = new GarageTableGateway($connection);

$gateway->deleteGarage($id);

header("Location: viewGarages.php");
?>
