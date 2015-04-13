<?php
require_once 'User.php';
require_once 'Connection.php';
require_once 'UserTableGateway.php';
/* "require_once" means that a stored piece of data
  will remain as an output by having to load it just once*/

$connection = Connection::getInstance();

$gateway = new UserTableGateway($connection);

$id = session_id();
if ($id == "") {
    session_start();
}

$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

/*FILTER SSANTIZE meaning it filters out any characters that are not strings*/

/* mainly used against hackers so they wont access system /steal files etc */

$errorMessage = array();
if ($username === FALSE || $username === '') {
    $errorMessage['username'] = 'SORRY, Username must not be blank<br/>';
}

if ($password === FALSE || $password === '') {
    $errorMessage['password'] = 'Excuse me! Password must not be blank<br/>';
}

if (empty($errorMessage)) {
    $statement = $gateway->getUserByUsername($username);
    if ($statement->rowCount() != 1) {
        $errorMessage['username'] = 'Username not registered<br/>';
    }
    else if ($statement->rowCount() == 1) {
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        if ($password !== $row['password']) {
            $errorMessage['password'] = 'Invalid password<br/>';
        }
    }
}

if (empty($errorMessage)) {
    $_SESSION['username'] = $username;
    header('Location: home.php');
}
else {
    require 'login.php';
}


