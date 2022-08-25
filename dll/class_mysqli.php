<?php

class clase_mysqli{
	/*variables de conexoion*/
	var $BaseDatos;
	var $Servidor;
	var $Usuario;
	var $Clave;
	/*identificacion de error y texto de error*/
	var $Errno = 0;
	var $Error = "";
	/*identificacion de conexion y consulta*/
	var $Conexion_ID=0;
	var $Consulta_ID=0;
	/*constructor de la clase*/
	function clase_mysqli($host="", $user="", $pass="", $db=""){
		$this->BaseDatos=$db;
		$this->Servidor=$host;
		$this->Usuario=$user;
		$this->Clave=$pass;
	}
	/*conexion al servidor de db*/
	function conectar($host, $user, $pass, $db){
		if($db != "")$this->BaseDatos=$db;
		if($host != "")$this->Servidor=$host;
		if($user != "")$this->Usuario=$user;
		if($pass != "")$this->Clave=$pass;
		/*conectar al servidor*/
		$this->Conexion_ID=new mysqli($this->Servidor, $this->Usuario, $this->Clave, $this->BaseDatos);
		if(!$this->Conexion_ID){
			$this->Error="Ha fallado la conexion";
			return 0;
		}
		return$this->Conexion_ID;
	}
	function consulta($sql=""){
		if($sql==""){
			$this->Error="NO hay ninguna sentencia sql";
			return 0;
		}
		/*Ejecutar la cunsulta*/
		//$this->Consulta_ID=$this->Conexion_ID->query($sql);
		$this->Consulta_ID=mysqli_query($this->Conexion_ID,$sql);

		if(!$this->Consulta_ID){
			print $this->Conexion_ID->error;
			//$this->Errno->error;
		}
		return $this->Consulta_ID;
	}

	/*retorna el numero de campos de la consulta*/
	function numcampos(){
		return mysqli_num_fields($this->Consulta_ID);
	}
	/*retorna de campos de la consulta*/
	function numregistros(){
		return mysqli_num_rows($this->Consulta_ID);
	}
	function verconsulta(){
		echo "<table class='tablecud'>";
		echo "<tr>";
		for ($i=0; $i < $this->numcampos() ; $i++) { 
			//echo "<td>".$this->nombrecampo($i)."</td>";
			echo  "<td>".mysqli_fetch_field_direct($this->Consulta_ID, $i)->name."</td>";
		}
		echo "</tr>";
		while ($row=mysqli_fetch_array($this->Consulta_ID)) {
			echo "<tr>";
			for ($i=0; $i < $this->numcampos(); $i++) { 
				//echo "<td>".utf8_encode($row[$i])."</td>";
				echo "<td>".$row[$i]."</td>";
			}
			echo "</tr>";
		}
		echo "</table>";
	}

	function verconsultacrud(){
		echo "<table class='tablecud'>";
		echo "<tr>";
		for ($i=0; $i < ($this->numcampos()-2) ; $i++) { 
			//echo "<td>".$this->nombrecampo($i)."</td>";
			echo  "<td>".mysqli_fetch_field_direct($this->Consulta_ID, $i)->name."</td>";
		}
		echo  "<td>------</td>";
		echo  "<td>------</td>";
		echo "</tr>";
		while ($row=mysqli_fetch_array($this->Consulta_ID)) {
			echo "<tr>";
			for ($i=0; $i < ($this->numcampos()-2); $i++) { 
				//echo "<td>".utf8_encode($row[$i])."</td>";
				echo "<td>".$row[$i]."</td>";
			}
			echo  "<td><a href='../controller/user_delete.php?id=".$row[0]."'>Borrar</a></td>";
			echo  "<td><a href='../views/user_add.php?id=".$row[0]."'>Actualizar</a></td>";
			echo "</tr>";
		}
		echo "</table>";
	}
	function verconsultaPedidos(){
		echo "<table class='tablecud'>";
		echo "<tr>";
		for ($i=0; $i < ($this->numcampos()) ; $i++) { 
			//echo "<td>".$this->nombrecampo($i)."</td>";
			echo  "<td>".mysqli_fetch_field_direct($this->Consulta_ID, $i)->name."</td>";
		}
		echo  "<td>-Detalle-</td>";
		echo  "<td>-Borrar-</td>";
		echo "</tr>";
		while ($row=mysqli_fetch_array($this->Consulta_ID)) {
			echo "<tr>";
			for ($i=0; $i < ($this->numcampos()); $i++) { 
				//echo "<td>".utf8_encode($row[$i])."</td>";
				
				if($this->numcampos()-2==$i){
					echo "<td><a href='../views/listaPedidos.php?idPedidoPendiente=".$row[0]."'>.$row[$i].</a></td>";
				}else{
					echo "<td>".$row[$i]."</td>";
				}
			}
			echo  "<td><a href='../views/detallePedido.php?idPedido=".$row[0]."'>Detalle</a></td>";
			echo  "<td><a href='../views/listaPedidos.php?idPedido=".$row[0]."'>Borrar</a></td>";
			
			echo "</tr>";
		}
		echo "</table>";
	}

	function verconsultaPedidosDetalle(){
		echo "<table class='tablecud'>";
		echo "<tr>";
		for ($i=0; $i < ($this->numcampos()) ; $i++) { 
			//echo "<td>".$this->nombrecampo($i)."</td>";
			echo  "<td>".mysqli_fetch_field_direct($this->Consulta_ID, $i)->name."</td>";
		}
		echo "</tr>";
		while ($row=mysqli_fetch_array($this->Consulta_ID)) {
			echo "<tr>";
			for ($i=0; $i < ($this->numcampos()); $i++) { 

					echo "<td>".$row[$i]."</td>";
			}
			echo "</tr>";
		}
		echo "</table>";
	}

	function verUpdateUser(){
		$row=mysqli_fetch_array($this->Consulta_ID);
		$id = $row[0];
		$nombre  = $row[1];
		$apellidos = $row[2];




		echo "<h1>Nuevo Usuarios</h1>";
		echo "<div class='menuDashboard'><a href='user_add.php'>+ Add User</a></div>";
		echo "<form method='post' action=''>";
		echo "<div class='grupoInput'>";
		echo "<label for='nombres' >Nombre</label>";
		echo "<input type='text' name='nombres' id='nombres' value='$nombre'>";
		echo "</div>";
		echo "<div class='grupoInput'>";
		echo "<label for='apellidos'>Apellidos</label>";
		echo "<input type='text' name='apellidos' id='apellidos'  value='$apellidos'>";
		echo "</div>";
		echo "<div class='grupoInput'>";
		echo "<label for='correo'>Correo</label>";
		echo "<input type='email' name='correo' id='correo' placeholder='Ingrese su correo'>";
		echo "</div>";
		echo "<div class='grupoInput'>";
		echo "<label for='clave'>Clave</label>";
		echo "<input type='password' name='clave' id='clave' placeholder='Ingrese su clave'>";
		echo "</div>";
		echo "<div class='grupoInput'>";
		echo "<label for='tipoUser'>Tipo de usuario</label>";
		echo "<select id='tipoUser' name='tipoUser'>";
		echo "<option>--</option>";
		echo "<option value='1'>Administrador</option>";
		echo "<option value='2'>Visitante</option>";
		echo "</select>";
		echo "</div>";
		echo "<div class='grupoInput'>";
		echo "<button type='submit' value='Procesar' class='btn-submit'>Procesar</button>";
		echo "</div>";
		echo "</form>";		
		
	}

	function consulta_lista(){
		while ($row = mysqli_fetch_array($this->Consulta_ID)) {
			for ($i=0; $i < $this->numcampos(); $i++) { 
				$row[$i];
			}
			return $row;
		}
	}

	function consulta_json(){
		while ($row = mysqli_fetch_array($this->Consulta_ID)) {
			$data[]=$row;
		}
		echo json_encode(array("sensores"=>$data));
	}
	function consulta_busqueda_json(){
		if($this->numcampos() > 0){
			while ($row = mysqli_fetch_array($this->Consulta_ID)) {
				$data[]=$row;
			}
		    $resultData = array('status' => true, 'postData' => $data);
	    }else{
	    	$resultData = array('status' => false, 'message' => 'No Post(s) Found...');
	    }

	    echo  json_encode($resultData);
	}

}
?>