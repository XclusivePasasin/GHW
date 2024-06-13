<?php

require_once 'C:\xampp\htdocs\GHW-PROJECT\Config\Connection.php';
require_once 'C:\xampp\htdocs\GHW-PROJECT\Models\Users.php';

$ModelUser = new UserCRUD();
$Connection = new MySQL();
$ModelUpdate = new UserCRUD();
$ModelDelete = new UserCRUD();

if (isset($_GET['action'])) {
    $action = $_GET['action'];

    switch ($action) {
        case 'Register':
            RegisterUserAndEmployee($ModelUser, $Connection);
            break;
        case 'Update':
            EditUserAndEmployee($ModelUpdate, $Connection);
            break;
        case 'Delete':
            if (isset($_GET['id']) && is_numeric($_GET['id'])) 
            {
                $idUser = $_GET['id'];                 
                DeleteUserAndEmployee($ModelDelete,$Connection,$idUser);             
            } 
            else 
            {                 
                die("Error: ID de usuario no proporcionado o no es válido"); 
            }
            break;
        default:
            break;
    }
}

// Functions CRUD
function RegisterUserAndEmployee($ModelUser, $Connection)
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        if (
            isset($_POST['Email']) && !empty($_POST['Email']) &&
            isset($_POST['Passwd']) && !empty($_POST['Passwd']) &&
            isset($_POST['Rol']) && !empty($_POST['Rol']) &&
            isset($_POST['FirstName']) && !empty($_POST['FirstName']) &&
            isset($_POST['LastName']) && !empty($_POST['LastName']) &&
            isset($_POST['Address']) && !empty($_POST['Address']) &&
            isset($_POST['Phone']) && !empty($_POST['Phone']) &&
            isset($_POST['Dui']) && !empty($_POST['Dui']) &&
            isset($_POST['Department']) && !empty($_POST['Department'])
        ) {
            $Email = $_POST['Email'];
            $Passwd = base64_encode($_POST['Passwd']);
            $Rol = $_POST['Rol'];
            $FirstName = $_POST['FirstName'];
            $LastName = $_POST['LastName'];
            $Address = $_POST['Address'];
            $Phone = $_POST['Phone'];
            $Dui = $_POST['Dui'];
            $Department = $_POST['Department'];
            $SendData = $ModelUser->Register($Email, $Passwd, $Rol, $FirstName, $LastName, $Address, $Phone, $Dui, $Department);
            if ($SendData == True) 
            {
                $_SESSION['Message'] = "Data entered correctly.";
                $_SESSION['MessageType'] = 'success';
                header("Location: " . $Connection->Route() . "./Views/Forms/Users.php");
                exit();
            } 
            else 
            {
                $_SESSION['Message'] = "Data Not Entered, An error occurred at layer 8.";
                $_SESSION['MessageType'] = "error";
                header("Location: " . $Connection->Route() . "./Views/Forms/Users.php");
                exit();
            }
        }
        else
        {
            $_SESSION['Message'] = "Empty Fields";
            $_SESSION['MessageType'] = 'error';
            header("Location: " . $Connection->Route() . "./Views/Forms/Users.php");
            exit();
        }
    }
}


function EditUserAndEmployee($ModelUpdate, $Connection)
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        if (
            isset($_POST['userID']) && !empty($_POST['userID']) &&
            isset($_POST['Email']) && !empty($_POST['Email']) &&
            isset($_POST['Passwd']) && !empty($_POST['Passwd']) &&
            isset($_POST['Rol']) && !empty($_POST['Rol']) &&
            isset($_POST['FirstName']) && !empty($_POST['FirstName']) &&
            isset($_POST['LastName']) && !empty($_POST['LastName']) &&
            isset($_POST['Address']) && !empty($_POST['Address']) &&
            isset($_POST['Phone']) && !empty($_POST['Phone']) &&
            isset($_POST['Dui']) && !empty($_POST['Dui']) &&
            isset($_POST['Department']) && !empty($_POST['Department'])
        ) {
                $idEmployee = $_POST['userID'];
                $idUser = $_POST['userID'];
                $email = $_POST['Email'];
                $Passwd = base64_encode($_POST['Passwd']);
                $Rol = $_POST['Rol'];
                $FirstName = $_POST['FirstName'];
                $LastName = $_POST['LastName'];
                $Address = $_POST['Address'];
                $Phone = $_POST['Phone'];
                $Dui = $_POST['Dui'];
                $Department = $_POST['Department'];

                $UpdateData = $ModelUpdate->Update($idEmployee, $FirstName, $LastName, $Phone, $Dui, $Address, $Rol, $Department, $idUser, $email, $Passwd);

                if ($UpdateData == True) {
                    $_SESSION['Message'] = "Data Update correctly.";
                    $_SESSION['MessageType'] = 'success';
                    header("Location: " . $Connection->Route() . "./Views/Forms/Users.php");
                    exit();
                }else {
                    $_SESSION['Message'] = "Data Not Entered, An error occurred at layer 8.";
                    $_SESSION['MessageType'] = "error";
                    header("Location: " . $Connection->Route() . "./Views/Forms/Users.php");
                    exit();
                }
            }
            else
            {
                $_SESSION['Message'] = "Empty Fields";
                $_SESSION['MessageType'] = 'error';
                header("Location: " . $Connection->Route() . "./Views/Forms/Users.php");
                exit();
        }
    }
}

function DeleteUserAndEmployee($ModelDelete, $Connection, $idUser)

{
        $ModelDelete->Delete($idUser);
        $_SESSION['Message'] = "User successfully deleted.";
        $_SESSION['MessageType'] = 'success';
        header("Location: " . $Connection->Route() . "./Views/Forms/Users.php");
} 



