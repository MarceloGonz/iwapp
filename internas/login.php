<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mi primera app</title>
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
</head>
<body>
	<header class="cabeceraPrincipal">
		<h1>Vilonaco Food</h1>
	</header>
	<nav class="menuPrincipal">
		<a href="../">Inicio</a>
		<a href="">Empresa</a>
		<a href="contactos.php">Registro</a>
		<a href="listados.php">Listado</a>
		<a href="login.php">Login</a>
	</nav>
	
	<main>
		<div class="boxCentrado">
		<h2 class="h2Home">Ingeso al sistema</h2>
		<form method="post" action="../dll/validar.php">
			<div class="grupoInput">
				<label for="correo">Correo</label>
				<input type="email" name="correo" id="correo" placeholder="Ingrese su correo">
			</div>
			<div class="grupoInput">
				<label for="clave">Contraseña</label>
				<input type="password" name="clave" id="clave" placeholder="Ingrese su Contraseña">
			</div>
			
			<div class="grupoInput">
			 <button type="submit" value="Procesar" class="btn-submit">Ingresar</button>
			</div>
		</form>
		</div>
	</main>
	<footer class="piePagina"><h6>Derechos Reservados 2022</h6></footer>
</body>
</html>