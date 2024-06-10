<?php
require_once 'C:\xampp\htdocs\GHW-PROJECT\Config\Connection.php';
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

if(isset($_SESSION['Id_User'])) 
{     
    $Name = $_SESSION['Name'];
    $Lastname = $_SESSION['LastName'];
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
        <div class="card-block">
            <div class="row m-t-lg">
                <div class="col-md-6">
                    <form id="form-signup_v1" name="form-signup_v1" method="POST">
                        <div class="form-group">
                            <label class="form-label" for="signup_v1-title">Title</label>
                            <div class="form-control-wrapper">
                                <input type="text" class="form-control" id="" placeholder="Subject..." required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="signup_v1-description">Description</label>
                            <div class="col-sm-16">
                                <textarea rows="10" class="form-control" placeholder="Description of problem" required></textarea>
                            </div>
                        </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                            <label class="form-label" for="signup_v1-title">User</label>
                            <div class="form-control-wrapper">
                                <input type="text" class="form-control" id="" placeholder="<?php echo "$Name "."$Lastname" ?>" readonly required>
                            </div>
                        </div>
                    <div class="form-group">
                        <label class="form-label" for="signup_v1-category">Category</label>
                        <select id="category" class="form-control" required>
                        <?php 
                            while ($Category = $GetCategory->fetch_object()) 
                            {                                 
                                $selected = ($Category->ID_Category == @$_POST['category']) ? 'selected' : '';                                 
                                echo '<option value="' . $Category->ID_Category . '" ' . $selected . '>' . $Category->TicketCategory . '</option>'; 
                            } 
                        ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="signup_v1-problems">Problems</label>                         
                        <?php if (isset($_POST['category'])) 
                            {                             
                                $CategoryID = $_POST['category'];                             
                                $ProblemSQL = "SELECT * FROM problems WHERE ID_Category = $CategoryID";                             
                                $GetProblem = mysqli_query($ConnectionMYSQL, $ProblemSQL);                             
                                echo '<select id="problems" class="form-control" required>';                             
                                while ($Problem = $GetProblem->fetch_object()) 
                                    {                                 
                                    echo '<option value="' . $Problem->ID_Problem . '">' . $Problem->Name . '</option>';                             
                                    }                            
                                echo '</select>';                         
                            } 
                            else 
                            {                             
                                echo '<select id="problems" class="form-control" required>';
                                echo '<option value="" disabled selected>Select Category First</option>'; 
                                echo '</select>'; 
                            } 
                            ?> 
                        </div>
                    <br>
                    <center>
                        <div class="form-group">
                            <button type="submit" class="btn">Submit ticket</button>
                        </div>
                    </center>
                </div>
            </form>
            </div>
        </div><!--.row-->
    </section>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/GHW-PROJECT/Views/Moduls/Head/MainJS.php'; ?>
</body>

</html>