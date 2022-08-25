<?php
require_once "./header.php";
include_once "../controller/pedidos_controller.php";

$control= new pedidos_controller();
$control->crearPedido();


?>

<form method="post" action="">
			<div class="grupoInput">
				<label for="nombres">Nombres</label>
				<input type="text" name="nombreComensal" id="nombreComensal"  placeholder="Ingrese su nombre">
			</div>
            <?php

            ?>
			<div class="grupoInput">
                <h2>Entrada 2.00$</h2>
                <input type="radio" id="camaron" name="entrada" value="1">
                <label for="1">Coctel de camaron</label>
                <input type="radio" id="camaron" name="entrada" value="2">
                <label for="2">Rollos de pollo</label>
                <input type="radio" id="camaron" name="entrada" value="3">
                <label for="3">Estofado de papa con atun </label>
			</div>
            <div class="grupoInput">
                <h2>Fuerte 4.00$</h2>
                <input type="radio" id="camaron" name="fuerte" value="1">
                <label for="1">Coctel de camaron</label>
                <input type="radio" id="camaron" name="fuerte" value="2">
                <label for="2">Rollos de pollo</label>
                <input type="radio" id="camaron" name="fuerte" value="3">
                <label for="3">Estofado de papa con atun </label>
			</div>
            <div class="grupoInput">
                <h2>Postre 1.50$</h2>
                <input type="radio" id="camaron" name="postre" value="1">
                <label for="1">Coctel de camaron</label>
                <input type="radio" id="camaron" name="postre" value="2">
                <label for="2">Rollos de pollo</label>
                <input type="radio" id="camaron" name="postre" value="3">
                <label for="3">Estofado de papa con atun </label>
			</div>
			<div class="grupoInput">
			 <button type="submit" value="Procesar" class="btn-submit">Pedir</button>
			</div>
		</form>


<?php require_once "./footer.php"; ?>