<?php

$Include = require_once 'C:\xampp\htdocs\GHW-PROJECT\Config\Connection.php';
include_once 'C:\xampp\htdocs\GHW-PROJECT\Controllers\Users-Controller.php';
require_once 'C:\xampp\htdocs\GHW-PROJECT\Models\Users.php';
// Instance Components
$database = new MySQL();
$ConnectionMYSQL = $database->ConnectionMySQL();
$ModelUser = new UserCRUD();
$Message = RegisterUserAndEmployee($ModelUser, $ConnectionMYSQL);
$ModelDelete = new UserCRUD();


if ($ConnectionMYSQL) {
    // Extract database information
    $Sql_User_Info = "SELECT * FROM User_Info"; // User Information
    $User_Info = mysqli_query($ConnectionMYSQL, $Sql_User_Info);
    $Sql_Rol = "SELECT * FROM Rol"; // Extract Information table Rol
    $GetRol =  mysqli_query($ConnectionMYSQL, $Sql_Rol);
    $Sql_Department = "SELECT * FROM Department";
    $GetDepartment = mysqli_query($ConnectionMYSQL, $Sql_Department);
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
                <form action="../../Controllers/Users-Controller.php?action=Register" method="POST">
                    <div class="col-md-6">
                        <legend>
                            <h4 style="font-weight:600;">Access Credentials</h4>
                            <fieldset class="form-group">
                                <label class="form-label">ID</label>
                                <input type="number" class="form-control" name="ID" readonly value="" id="IdUser">
                            </fieldset>
                            <fieldset class="form-group">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" placeholder="Example: @Codelab.sv" name="Email" require oninput="ValidarCorreo(event)">
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
                                <input name="Passwd" type="password" class="form-control" placeholder="Example: CodeLabs#" maxlength="10" require>
                            </fieldset>
                            <fieldset class="form-group">
                                <label class="form-label">Rol</label>
                                <select id="Rol" class="form-control" name="Rol">
                                    <?php while ($Rol = $GetRol->fetch_object()) { ?>
                                        <option value="<?php echo $Rol->ID_Rol ?>"><?php echo $Rol->Rol ?></option>
                                    <?php } ?>
                                </select>
                            </fieldset>
                            <div class="col-md-12 centered-button">
                                <fieldset class="form-group">
                                    <button type="submit" class="btn btn-success centered-button" style="width: 220px; font-size:17px; ;">Register <i class="fa-solid fa-floppy-disk"></i></button>
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
                                    <input name="FirstName" type="text" class="form-control" placeholder="Luna" require>
                                </fieldset>
                                <fieldset class="form-group col-md-6">
                                    <label class="form-label">Last Name</label>
                                    <input name="LastName" type="text" class="form-control" placeholder="Gonzalez" require>
                                </fieldset>
                            </div>
                            <fieldset class="form-group">
                                <label class="form-label">Address</label>
                                <input name="Address" type="text" class="form-control" placeholder="San Salvador, Santa Tecla" require>
                            </fieldset>
                            <fieldset class="form-group">
                                <label class="form-label">Phone Number</label>
                                <input name="Phone" type="text" class="form-control" oninput="EliminarLetras(event)" placeholder="Example: 7122-3144" maxlength="9" require>
                            </fieldset>
                            <fieldset class="form-group">
                                <label class="form-label">DUI</label>
                                <input name="Dui" type="text" class="form-control" placeholder="Example: 00000000-1" maxlength="9"  oninput="EliminarLetras(event)" require>
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

    <hr class="centered-hr">

    <section class="card no-border">
        <div class="card-block">
            <br>
            <h4 style="font-weight:600;" class="text-center">Registered Users</h4>
        </div>
        <!--Table-->
        <table id="table-edit" class="table table-striped table-hover text-center">
            <thead>
                <tr>
                    <th width="1">ID</th>
                    <th class="text-center">Name Employee</th>
                    <th class="text-center">Phone</th>
                    <th class="text-center">Email</th>
                    <th width="120" class="text-center">Rol</th>
                    <th width="120" class="text-center">Departament</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($Info = $User_Info->fetch_object()) { ?>
                    <tr id="">
                        <td><span class="tabledit-span tabledit-identifier"></span><input class="tabledit-input tabledit-identifier" type="hidden" name="id" value="" disabled=""><?php echo htmlspecialchars($Info->ID_User); ?></td>
                        <td class="color-blue-grey-lighter tabledit-view-mode"><span class="tabledit-span"><?php echo htmlspecialchars($Info->Name . ' ' . $Info->Lastname); ?></span><input class="tabledit-input form-control input-sm" type="text" name="description" value="Revene for last quarter in state America for year 2013, whith..." style="display: none;" disabled=""></td>
                        <td class="table-icon-cell"><?php echo htmlspecialchars($Info->Phone); ?></td>
                        <td class="table-icon-cell"><?php echo htmlspecialchars($Info->Email); ?></td>
                        <td class="table-icon-cell"><?php echo htmlspecialchars($Info->Rol); ?></td>
                        <td class="table-icon-cell"><?php echo htmlspecialchars($Info->Department); ?></td>

                        <td style="white-space: nowrap; width: 1%;">
                            <div class="btn-group btn-group-sm" style="float: none;">
                                <a href="UserUpdate.php?id=<?php echo $Info->ID_User ?>" target="pages">
                                    <button type="button" class="tabledit-edit-button btn btn-sm btn-default btn-default" style="float: none;"><span class="glyphicon glyphicon-pencil"></span></button>
                                </a>
                                <a href="../../Controllers/Users-Controller.php?action=Delete" target="pages">
                                    <button type="button" class="tabledit-delete-button btn btn-sm btn-default btn-danger" style="float: none;" onclick="confirmDelete()"><span class="glyphicon glyphicon-trash"></span></button>
                                    <script>
                                        function confirmDelete() 
                                        {
                                            if (confirm("Are you sure you want to delete this user?")) 
                                            {
                                                window.location.href="../../Controllers/Users-Controller.php?id=<?php echo $Info->ID_User ?>";

                                            } 
                                            else 
                                            {
                                                return false;
                                            }
                                        }
                                    </script> 
                                </a>
                                
                            </div>
                            <button type="button" class="tabledit-save-button btn btn-sm btn-success" style="display: none; float: none;">Save</button>
                            <button type="button" class="tabledit-confirm-button btn btn-sm btn-danger" style="display: none; float: none;">Confirm</button>
                            <button type="button" class="tabledit-restore-button btn btn-sm btn-warning" style="display: none; float: none;">Restore</button>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
                
    </section>

    <script>
        function EliminarLetras(event) {
            event.target.value = event.target.value.replace(/[^0-9\-]/g, '');
        }

        function ValidarCorreo(event) {
            const emailInput = event.target;
            const emailValue = emailInput.value;
            const errorElement = document.getElementById('error-message');
            const regex = /^[^\s@]+@[^\s@]+\.Codelab\.sv$/;

            if (!regex.test(emailValue)) {
                errorElement.style.display = 'block';
            } else {
                errorElement.style.display = 'none';
            }
        }
    </script>

    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/GHW-PROJECT/Views/Moduls/Head/MainJS.php'; ?>
</body>

</html>

