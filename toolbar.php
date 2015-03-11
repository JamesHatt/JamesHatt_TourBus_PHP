<?php
$session_id = session_id();
if ($session_id == "") {
    session_start();
}
echo '<ul>';
if (isset($_SESSION['username'])) {
    echo '<li><a href="home.php">Home</a></li>';
    echo '<li><a href="logout.php">Logout</a></li>';
}
else {
    echo '<li><a href="index.php">Home</a></li>';
    echo '<li><a href="loginForm.php">Login</a></li>';
}
echo '</ul>';