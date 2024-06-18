<?php
$Include = require_once 'C:\xampp\htdocs\GHW-PROJECT\Config\Connection.php';
include_once 'C:\xampp\htdocs\GHW-PROJECT\Controllers\TicketController.php';
require_once 'C:\xampp\htdocs\GHW-PROJECT\Models\Tickets.php';

$Connection = new MySQL();
$ConnectionMYSQL = $Connection->ConnectionMySQL();
$TicketModel = new TicketCRUD();
$ID_Ticket = $_GET["id"];
$ID_Status = $_GET["status"];

if ($ConnectionMYSQL) 
{
    $TicketViewSQL = "SELECT * FROM TicketStatusView WHERE ID_Ticket = $ID_Ticket";
    $TicketView = mysqli_query($ConnectionMYSQL, $TicketViewSQL);

    if (!$TicketView) {
        die("Error en la consulta: " . mysqli_error($ConnectionMYSQL));
    }
    if (mysqli_num_rows($TicketView) > 0) {
        $TicketStatus = mysqli_fetch_object($TicketView);
    }

    $SelectTicket = "SELECT * FROM Ticket WHERE ID_Ticket = $ID_Ticket";
    $ConsultTicket = mysqli_query($ConnectionMYSQL, $SelectTicket);

    if (!$ConsultTicket) {
        die("Error en la consulta: " . mysqli_error($ConnectionMYSQL));
    }
    if (mysqli_num_rows($ConsultTicket) > 0) {
        $Ticket = mysqli_fetch_object($ConsultTicket);
    }

    $SelectUser = "SELECT * FROM User WHERE ID_User = $Ticket->ID_User";
    $ConsultUser = mysqli_query($ConnectionMYSQL, $SelectUser);

    if (!$ConsultUser) {
        die("Error en la consulta: " . mysqli_error($ConnectionMYSQL));
    }
    if (mysqli_num_rows($ConsultUser) == 1) {
        $User = mysqli_fetch_object($ConsultUser);
    }

    $SelectEmployee = "SELECT * FROM Employee WHERE ID_Employee = $Ticket->ID_User";
    $ConsultEmployee = mysqli_query($ConnectionMYSQL, $SelectEmployee);

    if (!$ConsultEmployee) {
        die("Error en la consulta: " . mysqli_error($ConnectionMYSQL));
    }
    if (mysqli_num_rows($ConsultEmployee) == 1) {
        $Employee = mysqli_fetch_object($ConsultEmployee);
    }

    $SelectDepartment = "SELECT * FROM Department WHERE ID_Department = $Employee->ID_Department";
    $ConsultDepartment = mysqli_query($ConnectionMYSQL, $SelectDepartment);

    if (!$ConsultDepartment) {
        die("Error en la consulta: " . mysqli_error($ConnectionMYSQL));
    }
    if (mysqli_num_rows($ConsultDepartment) == 1) {
        $Department = mysqli_fetch_object($ConsultDepartment);
    }
}

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

<!DOCTYPE html>
<html>

<head lang="es">
    <!--Import MainHead-->
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/GHW-PROJECT/Views/Moduls/Head/MainHead.php'; ?>
</head>

<?php if ($ID_Status == 1) {?>
<!-------Status Open------->
    <body>
    <header class="section-header">
        <div class="tbl">
            <div class="tbl-row">
                <div class="tbl-cell">
                    <h3>INFORMATION TICKET</h3>
                    <ol class="breadcrumb breadcrumb-simple">
                        <li><a href="#">CodeLab</a></li>
                        <li><a href="#">Tickets</a></li>
                        <li class="active">Information Ticket</li>
                    </ol>
                </div>
            </div>
        </div>
    </header>
    <section class="card">
        <div class="card-block">
            <div class="row m-t-lg">
                <div class="col-md-6">
                    <form id="form-signup_v1" name="form-signup_v1" method="POST" action="../../Controllers/TicketController.php?action=UpdateTwo">
                        <div class="form-group">
                            <label class="form-label" for="signup_v1-title">Nª Ticket</label>
                            <div class="form-control-wrapper">
                                <input type="text" class="form-control" name="ID_Ticket" value="<?php echo $Ticket->ID_Ticket; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="signup_v1-user">Title</label>
                            <div class="form-control-wrapper">
                                <input type="text" class="form-control" name="Title" value="<?php echo $Ticket->Title; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="signup_v1-description">Description</label>
                            <div class="col-sm-16">
                                <textarea rows="10" class="form-control" name="Description" readonly><?php echo $Ticket->Description; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                        <label class="form-label" for="signup_v1-priority">Difficulty</label>
                        <select name="Difficulty" class="form-control" value=" <?php echo $Ticket->ID_Difficulty; ?>"><?php echo $Ticket->ID_Difficulty; ?>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option> 
                        </select>                      
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="signup_v1-priority">Status</label>
                        <select name="Status" class="form-control" value="<?php echo $Ticket->ID_Status; ?>"><?php echo $Ticket->ID_Status; ?>
                            <option value="<?php echo $Ticket->ID_Status; ?>"><?php if($Ticket->ID_Status == 1) 
                        {
                            echo "Open";
                        }
                        else if($Ticket->ID_Status == 2)
                        {
                            echo "In Progress";
                        }
                        else if($Ticket->ID_Status == 3)
                        {
                            echo "Closed";
                        }
                        ?>
                        </option>
                            <option value="2">In Progress</option>
                            <option value="3">Closed</option> 
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="signup_v2-name">User</label>
                        <div class="form-control-wrapper">
                            <input type="text" class="form-control"  value="<?php echo ($Employee->Name . ' ' . $Employee->Lastname); ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="signup_v2-name">Email</label>
                        <div class="form-control-wrapper">
                            <input name="Email" type="Email" class="form-control" value="<?php echo $User->Email; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="signup_v2-name">Department</label>
                        <div class="form-control-wrapper">
                            <input type="text" class="form-control"  value="<?php echo $Department->Department; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="signup_v1-description">Comment</label>
                        <div class="col-sm-16">
                            <textarea rows="10" class="form-control" name="Content"></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="col-sm-6 centered-button">
                        <center>
                                <a href="<?php echo $Connection->Route() . 'Views/Forms/ViewLevelTwo.php'; ?>" target="pages"><span class="lbl text-white" style="color:white;">
                                    <button type="button" class="btn btn-inline btn-danger-outline" style="width: 220px; font-size:17px; ;">
                                        Cancel
                                    </button>
                                    </span>
                                </a>
                        </center>         
                    </div>
                    <div class="col-sm-6 centered-button">
                        <center>
                            <div class="form-group">
                                <button type="submit" class="btn btn-inline btn-primary-outline" style="width: 220px; font-size:17px; ;">Save Changes</button>
                            </div>
                        </center>
                    </div>                   
                </div>
                <!-------HiddenData------->
                <div class="form-group">
                            <label class="form-label" for="signup_v1-title"></label>
                            <div class="form-control-wrapper">
                                <input type="hidden" class="form-control" name="CreateDate" value="<?php echo $Ticket->CreateDate; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="signup_v1-title"></label>
                            <div class="form-control-wrapper">
                                <input type="hidden" class="form-control" name="ID_User" value="<?php echo $Ticket->ID_User; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="signup_v1-title"></label>
                            <div class="form-control-wrapper">
                                <input type="hidden" class="form-control" name="ID_Priority" value="<?php echo $Ticket->ID_Priority; ?>" readonly>
                            </div>
                        </div>
                        <!-------HiddenData------->
                </form>
            </div>
        </div><!--.row-->
    </section>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/GHW-PROJECT/Views/Moduls/Head/MainJS.php'; ?>
</body>

</html>
<!-------Status Open------->

<?php } else if ($ID_Status == 2) {?>
<!-------Status In Progress------->

<body>
    <header class="section-header">
        <div class="tbl">
            <div class="tbl-row">
                <div class="tbl-cell">
                    <h3>INFORMATION TICKET</h3>
                    <ol class="breadcrumb breadcrumb-simple">
                        <li><a href="#">CodeLab</a></li>
                        <li><a href="#">Tickets</a></li>
                        <li class="active">Information Ticket</li>
                    </ol>
                </div>
            </div>
        </div>
    </header>
    <section class="card">
        <div class="card-block">
            <div class="row m-t-lg">
                <div class="col-md-6">
                    <form id="form-signup_v1" name="form-signup_v1" method="POST" action="../../Controllers/TicketController.php?action=UpdateTwo">
                        <div class="form-group">
                            <label class="form-label" for="signup_v1-title">Nª Ticket</label>
                            <div class="form-control-wrapper">
                                <input type="text" class="form-control" name="ID_Ticket" value="<?php echo $Ticket->ID_Ticket; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="signup_v1-user">Title</label>
                            <div class="form-control-wrapper">
                                <input type="text" class="form-control" name="Title" value="<?php echo $Ticket->Title; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="signup_v1-description">Description</label>
                            <div class="col-sm-16">
                                <textarea rows="10" class="form-control" name="Description" readonly><?php echo $Ticket->Description; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                        <label class="form-label" for="signup_v1-priority">Difficulty</label>
                        <select name="Difficulty" class="form-control" value=" <?php echo $Ticket->ID_Difficulty; ?>"><?php echo $Ticket->ID_Difficulty; ?>
                        <?php if ($Ticket->ID_Difficulty == 1) {?>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option> 
                            <?php } else if($Ticket->ID_Difficulty == 2) {?>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            <?php } else if($Ticket->ID_Difficulty == 3) {?>
                            <option value="3">3</option>
                            <?php }?>
                        </select>                      
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="signup_v1-priority">Status</label>
                        <select name="Status" class="form-control" value="<?php echo $Ticket->ID_Status; ?>"><?php echo $Ticket->ID_Status; ?>
                            <option value="2">In Progress</option> 
                            <option value="3">Closed</option> 
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="signup_v2-name">User</label>
                        <div class="form-control-wrapper">
                            <input type="text" class="form-control" id="" value="<?php echo ($Employee->Name . ' ' . $Employee->Lastname); ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="signup_v2-name">Email</label>
                        <div class="form-control-wrapper">
                            <input name="Email" type="Email" class="form-control" value="<?php echo $User->Email; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="signup_v2-name">Department</label>
                        <div class="form-control-wrapper">
                            <input type="text" class="form-control"  value="<?php echo $Department->Department; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="signup_v1-description">Comment</label>
                        <div class="col-sm-16">
                            <textarea rows="10" class="form-control" name="Content"></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="col-sm-6 centered-button">
                        <center>
                                <a href="<?php echo $Connection->Route() . 'Views/Forms/ViewLevelTwo.php'; ?>" target="pages"><span class="lbl text-white" style="color:white;">
                                    <button type="button" class="btn btn-inline btn-danger-outline" style="width: 220px; font-size:17px; ;">
                                        Cancel
                                    </button>
                                    </span>
                                </a>
                        </center>         
                    </div>
                    <div class="col-sm-6 centered-button">
                        <center>
                            <div class="form-group">
                                <button type="submit" class="btn btn-inline btn-success-outline" style="width: 220px; font-size:17px; ;">Save Changes</button>
                            </div>
                        </center>
                    </div>                   
                </div>
                <!-------HiddenData------->
                <div class="form-group">
                            <label class="form-label" for="signup_v1-title"></label>
                            <div class="form-control-wrapper">
                                <input type="hidden" class="form-control" name="CreateDate" value="<?php echo $Ticket->CreateDate; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="signup_v1-title"></label>
                            <div class="form-control-wrapper">
                                <input type="hidden" class="form-control" name="ID_User" value="<?php echo $Ticket->ID_User; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="signup_v1-title"></label>
                            <div class="form-control-wrapper">
                                <input type="hidden" class="form-control" name="ID_Priority" value="<?php echo $Ticket->ID_Priority; ?>" readonly>
                            </div>
                        </div>
                        <!-------HiddenData------->
                </form>
            </div>
        </div><!--.row-->
    </section>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/GHW-PROJECT/Views/Moduls/Head/MainJS.php'; ?>
</body>

</html>

<!-------Status In Progress------->
<?php }?>


