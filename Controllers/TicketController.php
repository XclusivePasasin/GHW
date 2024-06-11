<?php

require_once 'C:\xampp\htdocs\GHW-PROJECT\Config\Connection.php';
require_once 'C:\xampp\htdocs\GHW-PROJECT\Models\Tickets.php';
 
session_start();

$TicketModel = new TicketCRUD();


function RegisterTicket($TicketModel, $Connection)
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') 
    {

        if (
            isset($_POST['Title']) && !empty($_POST['Title']) &&
            isset($_POST['Description']) && !empty($_POST['Description']) &&
            isset($_POST['Problems']) && !empty($_POST['Problems']) 
        ) 
        {
            $idTicket = "";
            $Title = $_POST['Title'];
            $Description = $_POST['Description'];
            $CreateDate = date('Y-m-d H:i:s');
            $UpdateDate = date('Y-m-d H:i:s');
            $idStatus = 1;
            $idUser = $_SESSION["Id_User"];
            $Problems = $_POST["Problems"];

            $PrioritySQL = "SELECT ID_Priority FROM problems WHERE ID_Problem = $Problems"; 
            $PriorityResultID = mysqli_query($Connection, $PrioritySQL);

            $idDifficulty = 1;
            $SendTicket = $TicketModel->RegisterTicket($idTicket, $Title, $Description, $CreateDate, $UpdateDate, $idStatus, $idUser, $PriorityResultID, $idDifficulty);

            if ($SendTicket == True) 
            {
                $_SESSION['Message'] = "Data entered correctly.";
                $_SESSION['MessageType'] = 'success';
                header("Location: " . $Connection->Route() . "./Views/Forms/NewTicket.php");
                exit();
            } 
            else 
            {
                $_SESSION['Message'] = "Data Not Entered, An error occurred at layer 8.";
                $_SESSION['MessageType'] = "error";
                header("Location: " . $Connection->Route() . "./Views/Forms/NewTicket.php");
                exit();
            }
        }
        else
        {
            $_SESSION['Message'] = "Empty Fields";
            $_SESSION['MessageType'] = 'error';
            header("Location: " . $Connection->Route() . "./Views/Forms/NewTicket.php");
            exit();
        }
    }
}