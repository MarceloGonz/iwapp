<?php
include("header.php");
?>

<section id='enpresa'>
		<div class="nombreEmpresa">
			<h2>Nombre de la empresa</h2>
			<img src="../../images/estadisct.PNG" alt="estadisct" id="imgVerde">
			<div class="resultadosEnc">
				<h3>Resultados estadisticos de la empresa</h3>
				<img src="../../images/pastel.png" alt="pastel">
			</div>
		</div>
		<div class="containerBurPro">
			<div class="culturaBursatil">
				<h3 id="cultura">Cultura bursatil</h3>
				<div class="tarjetaBursatil">
					<div class="containerIcono">
						<img src="../../images/persona.png" alt="persona">
					</div>
					<h3>450</h3>
					<h3>Vinculacion</h3>
				</div>
				<div class="tarjetaBursatil">
					<div class="containerIcono">
						<img src="../../images/persona.png" alt="persona">
					</div>
					<h3>450</h3>
					<h3>Vinculacion</h3>
				</div>
				<div class="tarjetaBursatil">
					<div class="containerIcono">
						<img src="../../images/persona.png" alt="persona">
					</div>
					<h3>450</h3>
					<h3>Vinculacion</h3>
				</div>
				<div class="tarjetaBursatil">
					<div class="containerIcono">
						<img src="../../images/persona.png" alt="persona">
					</div>
					<h3>450</h3>
					<h3>Vinculacion</h3>
				</div>
				<div class="tarjetaBursatil">
					<div class="containerIcono">
						<img src="../../images/persona.png" alt="persona">
					</div>
					<h3>450</h3>
					<h3>Vinculacion</h3>
				</div>
			</div>
			<div class="proyectos">
				<h3 id="proyectos">Proyectos</h3>
				<table>
					<?php
					$miconexion = new clase_mysqli;
					$miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);

					$miconexion->consulta("select id 'CODIGO', nombres 'NOMBRES', apellidos 'APELLIDOS', correo 'CORREO' from usuarios");
					$miconexion->verconsulta();
					?>
				</table>
			</div>
		</div>
		
	</section>

<?php
include("footer.php");
?>
			
