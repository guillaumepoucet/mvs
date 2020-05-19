<?php
    if(!isset($_SESSION['admin']) && !isset($_SESSION['user'])){
        header('location:loggin.php');
    }
?>