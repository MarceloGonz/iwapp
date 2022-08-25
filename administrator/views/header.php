<?php
include("../seguridad/seguridad.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bienvenidos al sistema</title>
	<link rel="stylesheet" type="text/css" href="../css/estilosAdmin.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" />
    <link rel="icon" href="../images/icnbl.png" sizes="192x192" />
    <link rel="apple-touch-icon" href="../images/icnbl.png" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins" rel="stylesheet">
</head>
<body>
	<header class="cabeceraPrincipal">
		<section class="logoCabecera">
			<img src="../images/icnbl.png" alt="Logo Restaurante"> Villonaco Food
		</section>
		<section class="widgetsCabecera">
			<h5><a href="../seguridad/exit.php?salir=true">Cerrar sesion</a></h5>
			<h5>Bienvenido: <?php echo $_SESSION['username'];?></h5>
		</section>
	</header>
	<section class="contenedorPrincipal">
		<nav class="menuAdmin">
			<a href="dashboard.php">Dahsboard</a>
			<a href="">Platos</a>
			<a href="user.php">Usuarios</a>
			<a href="gestionPedidos.php">Gestion de pedidos</a>
			<a href="listaPedidos.php">Lista de pedidos</a>
			<div class="espacioMenu">&nbsp;</div>
			<a href="">Perfil</a>
			<a href="">Cerrar session</a>
		</nav>
		<section class="contenidoPrinipal">