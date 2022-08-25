<?php
require_once "../models/pedidosModels.php";

class pedidos_controller{
	/*variables de conexoion*/
	var $BaseDatos;
	var $Servidor;


	function user_controller($host="", $user="", $pass="", $db=""){
		$this->BaseDatos=$db;
		$this->Servidor=$host;
		$this->Usuario=$user;
		$this->Clave=$pass;
	}

	public function crearPedido()
    {
        $pedido = new PedidoModel();
        $entrada;
        $fuerte;
        $postre;
        $monto = 0;
        if (isset($_POST['nombreComensal'])) {
            if (isset($_POST['entrada'])) {
                if($_POST['entrada']==1){
                    $this->entrada = 'coctel de camaron';
                }elseif($_POST['entrada']==2){
                    $this->entrada = 'rollos de pollo';
                }elseif($_POST['entrada']==3){
                    $this->entrada = 'estofado de papas con atun';
                }
                $this->monto = $monto + 3;
            }else{
                $this->entrada = "";
            }
            if (isset($_POST['fuerte'])) {
                if($_POST['fuerte']==1){
                    $this->fuerte = 'coctel de camaron';
                }elseif($_POST['fuerte']==2){
                    $this->fuerte = 'rollos de pollo';
                }elseif($_POST['fuerte']==3){
                    $this->fuerte = 'estofado de papas con atun';
                }
                $this->monto = $monto + 4;
            }else{
                $this->fuerte = "";
            }
            if (isset($_POST['postre'])) {
                if($_POST['postre']==1){
                    $this->postre = 'coctel de camaron';
                }elseif($_POST['postre']==2){
                    $this->postre = 'rollos de pollo';
                }elseif($_POST['postre']==3){
                    $this->postre = 'estofado de papas con atun';
                }
                $this->monto = $monto + 1.5;
            }else{
                $this->postre = "";
            }

	        $pedido->setnombreComensal($_POST['nombreComensal']);
            $pedido->setentrada( $this->entrada);
	        $pedido->setfuerte( $this->fuerte);
	        $pedido->setpostre( $this->postre);
            $pedido->setmonto( $this->monto);
        	$pedidoResponse = $pedido->crearPedido();
	        //echo  $userResponse . " response"; //BORRAR
	        if ($pedidoResponse == 1) // exitoso
	        {
	            echo '<script>alert("SQL correctos :)...");</script>';
				echo "<script>location.href='../views/gestionPedidos.php'</script>";
	        } else {
	            echo '<script>alert("SQL correctos :)...");</script>';
				echo "<script>location.href='../views/gestionPedidos.php'</script>";
	        }
		}
        
    }

    public function ListPedidos()
    {
        $pedido = new PedidoModel();
        $pedidoResponse = $pedido->Listpedidos();
    }

    public function ListPedidosDetalle($idPedido)
    {
        $pedido = new PedidoModel();
        $pedido->setidPedido($idPedido);
        $pedidoResponse = $pedido->ListPedidosDetalle();
    }

    public function DeletePedido($idPedido)
    {
        $pedido = new PedidoModel();
		$pedido->setidPedido($idPedido);
		$pedidoResponse = $pedido->DeletePedido();
		if ($pedidoResponse == 1) // exitoso
	        {
	            echo '<script>alert("SQL correctos :)...");</script>';
				echo "<script>location.href='../views/listaPedidos.php'</script>";
	        } else {
	            echo '<script>alert("SQL Incorrectos...");</script>';
				echo "<script>location.href='../views/listaPedidos.php'</script>";
	        }
    }

    public function UpdatePedido($idPedidoPendiente)
    {
        $pedido = new PedidoModel();

			$pedido->setidPedido($idPedidoPendiente);
			$pedido->setestado('Pagado');
        	$userResponse = $pedido->UpdatePedidoEstado();
			if ($userResponse == 1)
	        {
	            echo '<script>alert("SQL correctos :)...");</script>';
				echo "<script>location.href='../views/listaPedidos.php'</script>";
	        } else {
	            echo '<script>alert("SQL Incorrectos...");</script>';
				echo "<script>location.href='../views/listaPedidos.php'</script>";
	        }
		
    }
}
?>