<?php
if (!isset($_SESSION['user'])) {
    header('location:loggin.php');
}
if (strpos($_SERVER['REQUEST_URI'], '/support.php') !== false) {
    if ($_SESSION['type'] != 2) {
        header('location:index.php');
    }
}
