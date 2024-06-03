<?php
require_once 'C:\xampp\htdocs\GHW-PROJECT\Config\Connection.php';
$Connection = new Connection();
if (isset($_SESSION['Email'])) {
?>
	<!DOCTYPE html>
	<html>

	<head lang="es">
		<!--Import MainHead-->
		<?php require_once './Head/MainHead.php'; ?>
		<title>Codelab - Dashboard</title>
		<style>
			.mainDashboard {
				width: 100%;
				height: 100vh; 
				display: flex;
				justify-content: center;
				align-items: center;
				background-image: url('../../Public/img/1 (2).svg');
				background-position:top;
				background-repeat: no-repeat;
			}
			.mainDashboard iframe {
				width: 100%;
				height: 100%; 
			}
    	</style>
	</head>

	<body class="with-side-menu">

		<!--Import Header-->
		<?php require_once './Header/Header.php'; ?>


		<div class="mobile-menu-left-overlay"></div>

		<!--Import Menu-->
		<?php require_once './Menu/Nav.php'; ?>

		<div class="page-content">
			<div class="container-fluid">
				<div class="mainDashboard">
					<iframe src="<?php include 'Moduls/menu/nav.php'; ?>" name="pages" frameborder="0"></iframe>	
				</div>
			</div>
		</div>

		<!--Import MainJS-->
		<?php require_once './Head/MainJS.php'; ?>
	</body>

	</html>
<?php
} else {
	header("location:" . $Connection->Route() . 'index.php');
	exit();
}
?>