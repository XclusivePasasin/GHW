<?php

$Include = require_once 'C:\xampp\htdocs\GHW-PROJECT\Config\Connection.php';
include_once 'C:\xampp\htdocs\GHW-PROJECT\Controllers\Users-Controller.php';
require_once 'C:\xampp\htdocs\GHW-PROJECT\Models\Users.php';
// Instance Components
$database = new MySQL();
$ConnectionMYSQL = $database->ConnectionMySQL();
$ModelUser = new UserCRUD();
$Message = RegisterUserAndEmployee($ModelUser, $ConnectionMYSQL);
$idInfo = $_GET["id"];

if ($ConnectionMYSQL) 
{
    $selectUser = "SELECT * FROM user WHERE ID_User = $idInfo";
    $consultUser = mysqli_query($ConnectionMYSQL, $selectUser);

    if (!$consultUser) {
        die("Error en la consulta: " . mysqli_error($ConnectionMYSQL));
    }
    if (mysqli_num_rows($consultUser) > 0) {
        $user = mysqli_fetch_object($consultUser);
    }

    $Sql_User_Info = "SELECT * FROM User_Info"; // User Information
    $User_Info = mysqli_query($ConnectionMYSQL, $Sql_User_Info);
    $Sql_Rol = "SELECT * FROM Rol"; // Extract Information table Rol
    $GetRol =  mysqli_query($ConnectionMYSQL, $Sql_Rol);
    $Sql_Department = "SELECT * FROM Department";
    $GetDepartment = mysqli_query($ConnectionMYSQL, $Sql_Department);

    $selectEmployee = "SELECT * FROM employee WHERE ID_Employee = $idInfo";
    $consultEmployee = mysqli_query($ConnectionMYSQL, $selectEmployee);

    if (!$consultEmployee) {
        die("Error en la consulta: " . mysqli_error($ConnectionMYSQL));
    }
    if (mysqli_num_rows($consultEmployee) > 0) {
        $employee = mysqli_fetch_object($consultEmployee);
    }
}

?>

<!DOCTYPE html>
<html>
<head lang="es">
    <!--Import MainHead-->
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/GHW-PROJECT/Views/Moduls/Head/MainHead.php'; ?>
</head>
<style>
    .no-border {
        border: none;
    }

    .centered-button {
        top: 26px;
        left: -16px;
        text-align: center;
    }

    .centered-hr {
        width: 600px;
        margin: 0 auto;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        height: 0px;

    }

    .error {
        display: none;
    }
  
</style>
</head>
<body class="no-border">

    <header class="section-header">
        <div class="tbl">
            <div class="tbl-row">
                <div class="tbl-cell">
                    <h2>Users Management</h2>
                    <ol class="breadcrumb breadcrumb-simple">
                        <li><a href="#">Sivar's Burguers</a></li>
                        <li><a href="#">Users</a></li>
                        <li class="active">View Users</li>
                    </ol>
                </div>
            </div>
        </div>
    </header>

    <section class="card no-border">
        <div class="card-block">
            <div class="div">
                <!-- Messsage -->
                <?php
                if (isset($_SESSION['Message']) && !empty($_SESSION['Message']) && isset($_SESSION['MessageType']) && !empty($_SESSION['MessageType'])) {
                    if ($_SESSION['MessageType'] == 'success') {
                        echo '<div class="alert alert-aquamarine alert-border-left alert-close alert-dismissible fade in" role="alert">';
                        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
                        echo '<span aria-hidden="true">×</span>';
                        echo '</button>';
                        echo '<strong>Heads Up!</strong> ' . $_SESSION['Message'];
                        echo '</div>';
                        
                    } elseif ($_SESSION['MessageType'] == 'error') {
                        echo '<div class="alert alert-warning alert-border-left alert-close alert-dismissible fade in" role="alert">';
                        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
                        echo '<span aria-hidden="true">×</span>';
                        echo '</button>';
                        echo '<strong>Error!</strong> ' . $_SESSION['Message'];
                        echo '</div>';
                    }
                    unset($_SESSION['Message']);
                    unset($_SESSION['MessageType']);
                }
                ?>

            </div>
            <div class="row">
                <form action="../../Controllers/Users-Controller.php?action=Update" method="POST">
                    <div class="col-md-6">
                        <legend>
                            <h4 style="font-weight:600;">Access Credentials</h4>
                            <fieldset class="form-group">
                                <label class="form-label">ID</label>
                                <input type="number" class="form-control" name="userID" readonly value="<?php echo $user->ID_User; ?>" id="IdUser">
                            </fieldset>
                            <fieldset class="form-group">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" placeholder="Example: @Codelab.sv" name="Email" oninput="ValidarCorreo(event)" value="<?php echo $user->Email; ?>">
                                <div class="alert alert-warning alert-icon alert-close alert-dismissible fade in error" role="alert" id="error-message">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <i class="font-icon font-icon-warning"></i>
                                    Invalid Email Format
                                </div>
                            </fieldset>
                            <fieldset class="form-group">
                                <label class="form-label">Password</label>
                                <input name="Passwd" type="password" class="form-control" placeholder="Example: CodeLabs#" maxlength="10" value="<?php echo base64_decode($user->UserPassword); ?>">
                            </fieldset>
                            <fieldset class="form-group">
                                <label class="form-label">Rol</label>
                                <select id="Rol" class="form-control" name="Rol">
                                    <?php while ($Rol = $GetRol->fetch_object()) { ?>
                                        <option value="<?php echo $Rol->ID_Rol ?>"><?php echo $Rol->Rol ?></option>
                                    <?php } ?>
                                </select>
                            </fieldset>
                                <div class="col-md-6 centered-button">
                                <fieldset class="form-group">
                                    <button type="button" class="btn btn-danger centered-button" style="width: 220px; font-size:17px; ;" onclick="confirmCancel()"><i class="fa-solid fa-arrow-left"></i> Cancel</button>
                                    <script>
                                         function confirmCancel() 
                                        {

                                            window.location.href = './Users.php';
                                        }
                                </script>
                                </fieldset>
                            </div>
                            <div class="col-md-6 centered-button">
                                <fieldset class="form-group">
                                    <button type="submit" class="btn btn-success centered-button swal-btn-update" style="width: 220px; font-size:17px; ;" onclick="confirmSave()">Save Changes <i class="fa-solid fa-floppy-disk"></i></button>
                                    <script>
                                        function confirmSave() {
                                            document.addEventListener('DOMContentLoaded', (event) => {
                                            document.querySelectorAll('.swal-btn-update').forEach(button => {
                                            button.addEventListener('click', function(event) {
                                                event.preventDefault(); 

                                                const href = this.closest('form').getAttribute('action'); // get URL

                                                Swal.fire({
                                                title: 'Warning!',
                                                text: "Are you sure you want to delete this employee?",
                                                icon: 'warning',
                                                showCancelButton: true,
                                                confirmButtonColor: '#5DCA73',
                                                cancelButtonColor: '#d33',
                                                confirmButtonText: 'Yes',
                                                cancelButtonText: 'No'
                                                }).then((result) => {
                                                if (result.isConfirmed) {
                                                    Swal.fire({
                                                    title: 'Deleted!',
                                                    text: 'The user has been deleted.',
                                                    icon: 'success',
                                                    confirmButtonColor: '#5DCA73', 
                                                    confirmButtonText: 'Ok'
                                                }).then(() => {
                                                    window.location.href = href;
                                                    }).then(() => {
                                                    window.location.href = href;
                                                    });
                                                }
                                                });
                                            });
                                            });
                                        });
                                    }
                                    </script>
                                </fieldset>
                            </div>
                        </legend>

                    </div>
                    <div class="col-md-6">
                        <legend>
                            <h4 style="font-weight:600;">Employee Information</h4>
                            <div class="row">
                                <fieldset class="form-group col-md-6">
                                    <label class="form-label">First Name</label>
                                    <input name="FirstName" type="text" class="form-control" placeholder="Luna" value="<?php echo $employee->Name; ?>">
                                </fieldset>
                                <fieldset class="form-group col-md-6">
                                    <label class="form-label">Last Name</label>
                                    <input name="LastName" type="text" class="form-control" placeholder="Gonzalez" value="<?php echo $employee->Lastname; ?>">
                                </fieldset>
                            </div>
                            <fieldset class="form-group">
                                <label class="form-label">Address</label>
                                <input name="Address" type="text" class="form-control" placeholder="San Salvador, Santa Tecla" value="<?php echo $employee->Address; ?>">
                            </fieldset>
                            <fieldset class="form-group">
                                <label class="form-label">Phone Number</label>
                                <input name="Phone" type="text" class="form-control" oninput="EliminarLetras(event)" placeholder="Example: 7122-3144" maxlength="9" value="<?php echo $employee->Phone; ?>">
                            </fieldset>
                            <fieldset class="form-group">
                                <label class="form-label">DUI</label>
                                <input name="Dui" type="text" class="form-control" placeholder="Example: 00000000-1" maxlength="9"  oninput="EliminarLetras(event)" value="<?php echo $employee->DUI; ?>">
                            </fieldset>
                            <fieldset class="form-group">
                                <label class="form-label">Departament</label>
                                <select id="Departament" class="form-control" name="Department">
                                    <?php while ($Department = $GetDepartment->fetch_object()) { ?>
                                        <option value="<?php echo $Department->ID_Department ?>"><?php echo $Department->Department ?></option>
                                    <?php } ?>
                                </select>

                        </legend>
                    </div>

                </form>
            </div>
        </div>
        <br>
        <br>
    </section>