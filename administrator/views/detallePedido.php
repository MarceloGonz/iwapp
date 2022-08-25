<?php
require_once "./header.php";
extract($_GET);
?>
<h1>Lista pedidos</h1>
<div class="menuDashboard"><a href="gestionPedidos.php">+ Add pedido</a></div>
<?php

include("../controller/pedidos_controller.php");
$control = new pedidos_controller();
$control->ListPedidosDetalle($idPedido);


?>

<?php require_once "./footer.php"; ?>