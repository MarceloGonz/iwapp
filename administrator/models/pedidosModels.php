<?php
require_once "../../dll/config.php";
require_once "../../dll/class_mysqli.php";

class PedidoModel 
{
  private $idPedido;
  private $nombreComensal;
  private $entrada;
  private $fuerte;
  private $postre;
  private $estado;
  private $monto;

  #region Set y Get
  public function setidPedido($idPedido){
    $this->idPedido = $idPedido;
  }
  public function setnombreComensal($nombreComensal){
    $this->nombreComensal = $nombreComensal;
  }
  public function setentrada($entrada){
    $this->entrada = $entrada;
  }
  public function setfuerte($fuerte){
    $this->fuerte = $fuerte;
  }
  public function setpostre($postre){
    $this->postre = $postre;
  }
  public function setestado($estado){
    $this->estado = $estado;
  }
  public function setmonto($monto){
    $this->monto = $monto;
  }
 


  public function Listpedidos() {
    $miconexion = new clase_mysqli;
    $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
    $resSQL=$miconexion->consulta("select * from pedidos");
    $resSQL=$miconexion->verconsultaPedidos();
    //$this->Disconnect();
    return $resSQL;
  }

  public function crearPedido() {
    $miconexion = new clase_mysqli;
    $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
    $resSQL=$miconexion->consulta("insert into pedidos values('','$this->nombreComensal','$this->entrada','$this->fuerte','$this->postre','pendiente','$this->monto')");
    //$this->Disconnect();
    return $resSQL;
  }

  public function DeletePedido() {
    $miconexion = new clase_mysqli;
    $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
    $resSQL=$miconexion->consulta("delete from pedidos where id='$this->idPedido'");

    //$this->Disconnect();
    return $resSQL;
  }

  public function UpdatePedidoEstado() {
    $miconexion = new clase_mysqli;
    $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
    $resSQL=$miconexion->consulta("update pedidos set estado = '$this->estado' where id = '$this->idPedido'");

    //$this->Disconnect();
    return $resSQL;
  }
  public function ListPedidosDetalle() {
    $miconexion = new clase_mysqli;
    $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
    $resSQL=$miconexion->consulta("select * from pedidos where id = '$this->idPedido'");
    $resSQL=$miconexion->verconsultaPedidosDetalle();
    //$this->Disconnect();
    return $resSQL;
  }
  
}
