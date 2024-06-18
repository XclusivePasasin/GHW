<?php
$Include = require_once 'C:\xampp\htdocs\GHW-PROJECT\Config\Connection.php';
include_once 'C:\xampp\htdocs\GHW-PROJECT\Controllers\TicketController.php';
require_once 'C:\xampp\htdocs\GHW-PROJECT\Models\Tickets.php';

$Connection = new MySQL();
$ConnectionMYSQL = $Connection->ConnectionMySQL();
$TicketModel = new TicketCRUD();
$ID_Ticket = isset($_GET["id"]) ? intval($_GET["id"]) : null;

if ($ConnectionMYSQL) 
{
    $SelectTicket = "SELECT * FROM Ticket WHERE ID_Ticket = $ID_Ticket";
    $ConsultTicket = mysqli_query($ConnectionMYSQL, $SelectTicket);

    if (mysqli_num_rows($ConsultTicket) > 0) {
        $Ticket = mysqli_fetch_object($ConsultTicket);
    }

    $SelectUser = "SELECT * FROM User WHERE ID_User = $Ticket->ID_User";
    $ConsultUser = mysqli_query($ConnectionMYSQL, $SelectUser);

    if (mysqli_num_rows($ConsultUser) == 1) {
        $User = mysqli_fetch_object($ConsultUser);
    }

    $SelectEmployee = "SELECT * FROM Employee WHERE ID_Employee = $Ticket->ID_User";
    $ConsultEmployee = mysqli_query($ConnectionMYSQL, $SelectEmployee);

    if (mysqli_num_rows($ConsultEmployee) == 1) {
        $Employee = mysqli_fetch_object($ConsultEmployee);
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

<?php if($Ticket->ID_Status == 1 or $Ticket->ID_Status == 2) { ?>
<!-------Status Open or In Progress------->
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
                    <form id="form-signup_v1" name="form-signup_v1" method="POST" action="EditTicketOneTech.php?id=<?php echo $Ticket->ID_Ticket; ?>&status=<?php echo $Ticket->ID_Status; ?>">
                        <div class="form-group">
                            <label class="form-label" for="signup_v1-title">Nª Ticket</label>
                            <div class="form-control-wrapper">
                                <input type="text" class="form-control" id="" value="<?php echo $Ticket->ID_Ticket; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="signup_v1-user">Title</label>
                            <div class="form-control-wrapper">
                                <input type="text" class="form-control" id="" value="<?php echo $Ticket->Title; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="signup_v1-description">Description</label>
                            <div class="col-sm-16">
                                <textarea rows="10" class="form-control" value="" readonly><?php echo $Ticket->Description; ?></textarea>
                            </div>
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
                        <label class="form-label" for="signup_v1-priority">Difficulty</label>
                        <input type="text" class="form-control" id="Problems" value="<?php echo $Ticket->ID_Difficulty; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="signup_v1-priority">Status</label>
                        <input type="text" class="form-control" id="Problems" value="<?php if($Ticket->ID_Status == 1) 
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
                        ?>" readonly>
                    </div>
                    <br>
                    <div class="col-sm-6 centered-button">
                        <center>
                                <a href="<?php echo $Connection->Route() . 'Views/Forms/ViewLevelOne.php'; ?>" target="pages"><span class="lbl text-white" style="color:white;">
                                    <button type="button" class="btn btn-inline btn-secondary-outline" style="width: 220px; font-size:17px; ;">
                                        Back
                                    </button>
                                    </span>
                                </a>
                        </center>         
                    </div>
                    <div class="col-sm-6 centered-button">
                        <center>
                            <div class="form-group">
                                <button type="submit" class="btn btn-inline btn-primary-outline" style="width: 220px; font-size:17px; ;">Edit Ticket</button>
                            </div>
                        </center>                    
                    </div>            
                </div>
                </form>
            </div>
        </div><!--.row-->
    </section>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/GHW-PROJECT/Views/Moduls/Head/MainJS.php'; ?>
</body>

</html>
<!-------Status Open or In Progress------->

<?php } else if($Ticket->ID_Status == 3) {?>
<!-------Status Closed------->

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
                    <form id="form-signup_v1" name="form-signup_v1" method="POST" action="EditTicketOneTech.php?id=<?php echo $Ticket->ID_Ticket; ?>&status=<?php echo $Ticket->ID_Status; ?>">
                        <div class="form-group">
                            <label class="form-label" for="signup_v1-title">Nª Ticket</label>
                            <div class="form-control-wrapper">
                                <input type="text" class="form-control" id="" value="<?php echo $Ticket->ID_Ticket; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="signup_v1-user">Title</label>
                            <div class="form-control-wrapper">
                                <input type="text" class="form-control" id="" value="<?php echo $Ticket->Title; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="signup_v1-description">Description</label>
                            <div class="col-sm-16">
                                <textarea rows="10" class="form-control" value="" readonly><?php echo $Ticket->Description; ?></textarea>
                            </div>
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
                        <label class="form-label" for="signup_v1-priority">Difficulty</label>
                        <input type="text" class="form-control" id="Problems" value="<?php echo $Ticket->ID_Difficulty; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="signup_v1-priority">Status</label>
                        <input type="text" class="form-control" id="Problems" value="<?php if($Ticket->ID_Status == 1) 
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
                        ?>" readonly>
                    </div>
                    <br>
                    <div class="col-sm-12 centered-button">
                        <center>
                                <a href="<?php echo $Connection->Route() . 'Views/Forms/ViewLevelOne.php'; ?>" target="pages"><span class="lbl text-white" style="color:white;">
                                    <button type="button" class="btn" style="width: 220px; font-size:17px; ;">
                                        Back
                                    </button>
                                    </span>
                                </a>
                        </center>         
                    </div>         
                </div>
                </form>
            </div>
        </div><!--.row-->
    </section>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/GHW-PROJECT/Views/Moduls/Head/MainJS.php'; ?>
</body>

</html>
<!-------Status Closed------->
<?php } ?> 