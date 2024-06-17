<?php

require_once 'C:\xampp\htdocs\GHW-PROJECT\Config\Connection.php';
require_once 'C:\xampp\htdocs\GHW-PROJECT\Models\Tickets.php';

$TicketModel = new TicketCRUD();
$Connection = new MySQL();

if (isset($_GET['action'])) 
        {
            $action = $_GET['action'];
            switch ($action) 
            {
                case 'Register':
                Register($TicketModel, $Connection);
                break;

                case 'Update':
                Update($TicketModel, $Connection);
                break;
            }
        }

function Register($TicketModel, $Connection)
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') 
    {
        if (
            isset($_POST['Title']) && !empty($_POST['Title']) &&
            isset($_POST['Description']) && !empty($_POST['Description']) &&
            isset($_POST['Category']) && !empty($_POST['Category']) &&
            isset($_POST['Problems']) && !empty($_POST['Problems']) 
        ) 
        {
            $idTicket = null;
            $Title = $_POST['Title'];
            $Description = $_POST['Description'];
            $idStatus = 1;
            $idUser = $_SESSION["Id_User"];
            $Problems = $_POST["Problems"];

            $PrioritySQL = "SELECT ID_Priority FROM problems WHERE ID_Problem = $Problems"; 
            $PriorityResult = mysqli_query($Connection->ConnectionMySQL(), $PrioritySQL);
            $PriorityRow = mysqli_fetch_assoc($PriorityResult);
            $idPriority = $PriorityRow['ID_Priority'];

            $idDifficulty = 1;
            $SendTicket = $TicketModel->RegisterTicket($idTicket, $Title, $Description, $idStatus, $idUser, $idPriority, $idDifficulty);

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

function Update($TicketModel, $Connection)
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if (
            isset($_POST['ID_Ticket']) && !empty($_POST['ID_Ticket']) &&
            isset($_POST['Title']) && !empty($_POST['Title']) &&
            isset($_POST['Description']) && !empty($_POST['Description']) &&
            isset($_POST['Status']) && !empty($_POST['Status']) &&
            isset($_POST['Difficulty']) && !empty($_POST['Difficulty'])
        )
        {
            $idTicket = $_POST['ID_Ticket'];
            $Title = $_POST['Title'];
            $Description = $_POST['Description'];
            $idStatus = $_POST['Status'];
            $idDifficulty = $_POST['Difficulty'];
            $idUser = $_POST["ID_User"];
            $CreateDate = $_POST['CreateDate'];
            $UpdateDate = null;
            $idPriority = $_POST['ID_Priority'];
 
 
            $UpdateTicket = $TicketModel->UpdateTicket($idTicket, $Title, $Description, $CreateDate, $UpdateDate, $idStatus, $idUser, $idPriority, $idDifficulty);
 
            if ($UpdateTicket == True)
            {
                $_SESSION['Message'] = "Data updated correctly.";
                $_SESSION['MessageType'] = 'success';
                header("Location: " . $Connection->Route() . "./Views/Forms/EditTicket.php");
                exit();
            }
            else
            {
                $_SESSION['Message'] = "Data Not Entered, An error occurred at layer 8.";
                $_SESSION['MessageType'] = "error";
                header("Location: " . $Connection->Route() . "./Views/Forms/EditTicket.php");
                exit();
            }
 
        }
        else
        {
            $_SESSION['Message'] = "Empty Fields";
            $_SESSION['MessageType'] = 'error';
            header("Location: " . $Connection->Route() . "./Views/Forms/EditTicket.php");
            exit();
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    if (isset($_POST["key"])) 
    {
        $key = $_POST["key"];
        $Problems = null;
        switch ($key) 
        {
            case 'Problems':
                $Problems = $TicketModel->ProblemsHTML($_POST['ID_Category'], $Connection->ConnectionMySQL());
                break;
        }
        echo $Problems;
    } 
}

?>
