<?php 
require_once 'C:\xampp\htdocs\GHW-PROJECT\Config\Connection.php';
$Connection = new Connection();
// Instance Components
$database = new MySQL();
$ConnectionMYSQL = $database->ConnectionMySQL();
if ($ConnectionMYSQL) {
    // Extract database information
    $Sql_User_Info = "SELECT * FROM User_Info"; // User Information
    $User_Info = mysqli_query($ConnectionMYSQL, $Sql_User_Info);
	$User = $_SESSION['Id_User'];
    $Sql_Rol = "SELECT r.Rol FROM User_Info ui JOIN Rol r ON ui.ID_Rol = r.ID_Rol WHERE ui.ID_User= $User"; // Extract Information table Rol
    $GetRol =  mysqli_query($ConnectionMYSQL, $Sql_Rol);
	if ($GetRol && $GetRol->num_rows > 0) {
        $row = $GetRol->fetch_object();
        $Rol = $row->Rol; 
    }
}
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

?>
<header class="site-header">
	
	    <div class="container-fluid">
	
	        <a href="#" class="site-logo">
	           <!-- <img class="hidden-md-down" src="../../Public/img/Logo-Variante-6.svg" alt="Logo"> -->
	        </a>
	
	        <button id="show-hide-sidebar-toggle" class="show-hide-sidebar">
	            <span>toggle menu</span>
	        </button>
            
	        <button class="hamburger hamburger--htla">
	            <span>toggle menu</span>
	        </button>
	        <div class="site-header-content">
	            <div class="site-header-content-in">
	                <div class="site-header-shown">
	                    <div class="dropdown dropdown-notification messages">
								<h5 style="line-height: normal; margin-bottom: 5px; color:black; position: relative; top: -10px;"><?php echo $_SESSION['Name'].' '.$_SESSION['LastName'];?><br><small><?php echo $_SESSION["Access"] ?></small></h5>
	                    </div>
	
	                    <div class="dropdown user-menu">
	                        <button class="dropdown-toggle" id="dd-user-menu" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                            <img src="../../Public/img/avatar-2-64.png" alt="">
	                        </button>
	                        <div class="dropdown-menu dropdown-menu-right " aria-labelledby="dd-user-menu" >
	                            <a class="dropdown-item" href="<?php echo $Connection->Route().'Views/Moduls/Users/Logout.php'; ?>"><span class="font-icon glyphicon glyphicon-log-out"></span>Logout</a>
	                        </div>
	                    </div>
	
	                    <button type="button" class="burger-right">
	                        <i class="font-icon-menu-addl"></i>
	                    </button>
	                </div><!--.site-header-shown-->
	
	                <div class="mobile-menu-right-overlay"></div>
	                <div class="site-header-collapsed">
	                    <div class="site-header-collapsed-in">
	                        <div class="dropdown dropdown-typical">
	                            <div class="dropdown-menu" aria-labelledby="dd-header-sales">
	                                <a class="dropdown-item" href="#"><span class="font-icon font-icon-home"></span>Quant and Verbal</a>
	                                <a class="dropdown-item" href="#"><span class="font-icon font-icon-cart"></span>Real Gmat Test</a>
	                                <a class="dropdown-item" href="#"><span class="font-icon font-icon-speed"></span>Prep Official App</a>
	                                <a class="dropdown-item" href="#"><span class="font-icon font-icon-users"></span>CATprer Test</a>
	                                <a class="dropdown-item" href="#"><span class="font-icon font-icon-comments"></span>Third Party Test</a>
	                            </div>
	                        </div>
	                    </div>
	                </div><!--.site-header-collapsed-->
	            </div><!--site-header-content-in-->
	        </div><!--.site-header-content-->
	    </div><!--.container-fluid-->
	</header><!--.site-header-->
