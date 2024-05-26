<?php
    require_once 'C:\xampp\htdocs\GHW-PROJECT\Config\Connection.php';
    session_start();
    session_destroy();
    
    $Connection = new Connection();
    
    header("Location: " . $Connection->Route() . "index.php");
    exit();
    
?>