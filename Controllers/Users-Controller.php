<?php

require_once 'C:\xampp\htdocs\GHW-PROJECT\Config\Connection.php';
require_once 'C:\xampp\htdocs\GHW-PROJECT\Models\Users.php';

$ModelUser = new UserCRUD();
$Connection = new MySQL();

if (isset($_GET['action'])) {
    $action = $_GET['action'];

    switch ($action) {
        case 'Register':
            RegisterUserAndEmployee($ModelUser, $Connection);
            break;
        case 'Update':
            break;
        case 'Delete':
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
            $Passwd = md5($_POST['Passwd']);
            $Rol = $_POST['Rol'];
            $FirstName = $_POST['FirstName'];
            $LastName = $_POST['LastName'];
            $Address = $_POST['Address'];
            $Phone = $_POST['Phone'];
            $Dui = $_POST['Dui'];
            $Department = $_POST['Department'];
            $SendData = $ModelUser->Register($Email, $Passwd, $Rol, $FirstName, $LastName, $Address, $Phone, $Dui, $Department);
            if ($SendData == True) {
                $_SESSION['Message'] = "Data entered correctly.";
                $_SESSION['MessageType'] = 'success';
                header("Location: " . $Connection->Route() . "./Views/Forms/Users.php");
                exit();
            } else {
                $_SESSION['Message'] = "Data Not Entered, An error occurred at layer 8.";
                $_SESSION['MessageType'] = "error";
                header("Location: " . $Connection->Route() . "./Views/Forms/Users.php");
                exit();
            }
        }else{
            $_SESSION['Message'] = "Empty Fields";
            $_SESSION['MessageType'] = 'error';
            header("Location: " . $Connection->Route() . "./Views/Forms/Users.php");
            exit();
        }
    }
}


function EditUserAndEMployee($ID, $data)
{
}

function DeleteUserAndEmployee($ID)
{
    // $result = $ModelUser->Delete($ID);
    // session_start();
    // if ($result) {
    //     $_SESSION['Message'] = "User deleted successfully.";
    //     $_SESSION['MessageType'] = 'success';
    // } else {
    //     $_SESSION['Message'] = "Failed to delete user.";
    //     $_SESSION['MessageType'] = 'error';
    // }
    // header("Location: " . $Connection->Route() . "./Views/Forms/Users.php");
    // exit();
}
