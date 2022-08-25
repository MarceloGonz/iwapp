<?php 
	require_once "./header.php";
	include("../controller/user_controller.php");
?>
<h1>Gestión de Usuarios</h1>
<div class="menuDashboard">
	<a href="user_add.php">+ Add User</a>
</div>
<?php

	
	
	$control= new user_controller();
    $control->ListUser();
?>

<?php require_once "./footer.php"; ?>