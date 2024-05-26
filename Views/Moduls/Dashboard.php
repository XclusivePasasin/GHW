<?php 
	require_once 'C:\xampp\htdocs\GHW-PROJECT\Config\Connection.php';
	$Connection = new Connection();
	if (isset($_POST['Id_User'])) {
		# code...
	
?>
<!DOCTYPE html>
<html>
<head lang="es">
    <!--Import MainHead-->
	<?php require_once './Head/MainHead.php'; ?>
    <title>Codelab - Dashboard</title>
</head>

<body class="with-side-menu">

	<!--Import Header-->
    <?php require_once './Header/Header.php'; ?>

    
	<div class="mobile-menu-left-overlay"></div>

	<!--Import Menu-->
    <?php require_once './Menu/Nav.php'; ?>

	<div class="page-content">
		<div class="container-fluid">
			Blank
		</div><!--.container-fluid-->
	</div><!--.page-content-->

<!--Import MainJS-->
<?php require_once './Head/MainJS.php'; ?>
</body>
</html>
<?php
	}else{
		header("location:".$Connection->Route().'index.php');
	}
?>