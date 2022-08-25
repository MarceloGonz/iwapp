<?php
require_once "../../dll/config.php";
require_once "../../dll/class_mysqli.php";

class UserModel 
{
  private $idUser;
  private $nombres;
  private $apellidos;
  private $correo;
  private $clave;
  private $rol;
 

  #region Set y Get
  public function getIdUser(){
    return $this->idUser;
  }
  public function setNombres($nombres){
    $this->nombres = $nombres;
  }
  public function setApellidos($apellidos){
    $this->apellidos = $apellidos;
  }
  public function setCorreo($correo){
    $this->correo = $correo;
  }
  public function setClave($clave){
    $this->clave = $clave;
  }
  public function setRol($rol){
    $this->rol = $rol;
  }
  public function setIdUser($id){
    $this->id = $id;
  }
 


  public function ListUser() {
    $miconexion = new clase_mysqli;
    $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
    $resSQL=$miconexion->consulta("select id, nombres, apellidos, correo, clave, tipoUser from usuarios");
    $resSQL=$miconexion->verconsultacrud();
    //$this->Disconnect();
    return $resSQL;
  }
  public function ListUserId() {
    $miconexion = new clase_mysqli;
    $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
    $resSQL=$miconexion->consulta("select * from usuarios WHERE id = '$this->id'");
    $resSQL=$miconexion->verUpdateUser();
    //$this->Disconnect();
    return $resSQL;
  }
  public function CreateUser() {
    $miconexion = new clase_mysqli;
    $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
    $resSQL=$miconexion->consulta("insert into usuarios values('','$this->nombres','$this->apellidos','$this->correo','12345','22')");
    //$this->Disconnect();
    return $resSQL;
  }

  public function UpdateUser() {
    $miconexion = new clase_mysqli;
    $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
    $resSQL=$miconexion->consulta("UPDATE usuarios SET nombres = '$this->nombres',apellidos = '$this->apellidos',correo = '$this->correo',clave = '$this->clave',tipoUser = '$this->rol'");
    //$this->Disconnect();
    return $resSQL;
  }

  public function DeleteUser() {
    $miconexion = new clase_mysqli;
    $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
    $resSQL=$miconexion->consulta("DELETE FROM usuarios WHERE id = '$this->id'");
    //$this->Disconnect();
    return $resSQL;
  }

}
