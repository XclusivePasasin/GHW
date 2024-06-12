<?php
$Include = require_once 'C:\xampp\htdocs\GHW-PROJECT\Config\Connection.php';
include_once 'C:\xampp\htdocs\GHW-PROJECT\Controllers\TicketController.php';
require_once 'C:\xampp\htdocs\GHW-PROJECT\Models\Tickets.php';

$Connection = new Connection();

$database = new MySQL();
$ConnectionMYSQL = $database->ConnectionMySQL();

if ($ConnectionMYSQL) {
    // Extract database information
   $CategorySQL = "SELECT * FROM category";
   $GetCategory = mysqli_query($ConnectionMYSQL, $CategorySQL);
}

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if(isset($_SESSION['Email'])) 
{     
    $Email = $_SESSION['Email'];
}
else 
{
    header("Location: " . Connection::Route() . "../index.php");     
    exit(); 
}

?>

<!DOCTYPE html>
<html>

<head lang="es">
    <!--Import MainHead-->
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/GHW-PROJECT/Views/Moduls/Head/MainHead.php'; ?>

</head>

<body>
    <header class="section-header">
        <div class="tbl">
            <div class="tbl-row">
                <div class="tbl-cell">
                    <h3>NEW TICKET</h3>
                    <ol class="breadcrumb breadcrumb-simple">
                        <li><a href="#">CodeLab</a></li>
                        <li><a href="#">Tickets</a></li>
                        <li class="active">New Ticket</li>
                    </ol>
                </div>
            </div>
        </div>
    </header>
    <section class="card">
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
        <div class="card-block">
            <div class="row m-t-lg">
                <div class="col-md-6">
                    <form action="../../Controllers/TicketController.php?action=Register" id="form-signup_v1" name="form-signup_v1" method="POST" >
                        <div class="form-group">
                            <label class="form-label" for="signup_v1-title">Title</label>
                            <div class="form-control-wrapper">
                                <input type="text" class="form-control" name="Title" placeholder="Subject..." >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="signup_v1-description">Description</label>
                            <div class="col-sm-16">
                                <textarea rows="10" class="form-control" placeholder="Description of problem" name="Description" ></textarea>
                            </div>
                        </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                            <label class="form-label" for="signup_v1-title">Email</label>
                            <div class="form-control-wrapper">
                                <input type="text" class="form-control" name="email" placeholder="<?php echo "$Email" ?>" readonly >
                            </div>
                        </div>
                    <div class="form-group">
                        <label class="form-label" for="signup_v1-category">Category</label>
                        <select id="ID_Category" class="form-control" name="Category" onchange="loadProblems()" >
                        <option value="" disabled selected>Select Category</option>
                        <?php 
                            while ($Category = $GetCategory->fetch_object()) 
                            {                                                               
                                echo '<option value="' . $Category->ID_Category . '">' . $Category->TicketCategory . '</option>'; 
                            } 
                        ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="signup_v1-problems">Problems</label>                         
                        <select id="Problems" class="form-control" name="Problems" >
                            <option value="" disabled selected>Select a Problem</option>
                            <script>
                                function loadProblems()
                                {
                                var ID_Category = document.getElementById("ID_Category").value;
                                $.ajax({
                                    type: "post",
                                    url: "../../Controllers/TicketController.php",
                                    data: {'key':'Problems', 'ID_Category': ID_Category },
                                    success: function (Problems) 
                                    {
                                        console.log(Problems);
                                        $("#Problems").empty();
                                        $("#Problems").append(Problems);
                                    }
                                })
                                };
                            </script>
                            
                        </select>
                    </div>
                    <br>
                    <center>
                        <div class="form-group">
                            <input type="submit" class="btn" value = "Register Ticket">
                        </div>
                    </center>
                </div>
            </form>
            </div>
        </div><!--.row-->
    </section>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/GHW-PROJECT/Views/Moduls/Head/MainJS.php'; ?>                       		
</body>
<script src="https://code.jquery.com/jquery-3.7.1.js"integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="crossorigin="anonymous"></script>
</html>