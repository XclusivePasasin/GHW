<?php

// Credentials
$Server = 'localhost';
$User = 'root';
$Passwd = '';
$DataBase = 'TicketSystem';

// Validations
$Connection = new mysqli($Server,$User,$Passwd,$DataBase);

if($Connection->connect_error){
    die("Connection failed".$Connection->connect_error);
}
