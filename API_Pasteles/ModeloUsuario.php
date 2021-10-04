<?php
	include 'conexion.php';
	class ModeloUsuario{
		var $id;
		var $nombres;
		var $apellidos;
		var $edad;
		var $correo;
		var $clave;
		var $tipo;
		var $tipo_string;
		public function __construct($id, $nombres, $apellidos, $edad, $correo, $clave, $tipo){
			$this->id 			= $id;
			$this->nombres 		= $nombres;
			$this->apellidos 	= $apellidos;
			$this->correo 		= $correo;
			$this->edad			= $edad;
			$this->clave		= $clave; 	
			$this->tipo			= $tipo; 	
		}
		public function getId(){
			if(isset($this->id)){
				return $this->id;
			}
		}
		
		public function getNombres(){
			if(isset($this->nombres)){
				return $this->nombres;
			}
		}
		public function getApellidos(){
			if(isset($this->apellidos)){
				return $this->apellidos;
			}
		}
		public function getCorreo(){
			if(isset($this->correo)){
				return $this->correo;
			}
		}
		public function getEdad(){
			if(isset($this->edad)){
				return $this->edad;
			}
		}
		public function getClave(){
			if(isset($this->clave)){
				return $this->clave;
			}
		}
		public function getTipo(){
			if(isset($this->tipo)){
				return $this->tipo;
			}
		}
		public function setTipoString($tipo_str){
			$this->tipo_string=$tipo_str;
		}
		public function guardarCliente(){
			try {	
				$sql = "INSERT INTO usuarios (id, nombres, apellidos, edad, correo, clave, tipo)
				VALUES ($this->id , '$this->nombres' , '$this->apellidos' , $this->edad , '$this->correo' , '$this->clave' , $this->tipo )";
				$conn=new Conexion();
				$conn->getConexion()->exec($sql);
				$response = array(
					"SERVICIO"=>"CONECTADO",
					"ESTADO"=>"CREADO"
				);
				$conn=null;
			} catch(PDOException $e) {
				$response = array(
					"SERVICIO"=>"DESCONECTADO",
					"ESTADO"=>"NO CREADO",
					"ERROR"=>$e
				);
			}
			echo json_encode($response);
			return json_encode($response);
		}
		public static function actualizarUsuario($id, $dato, $index){
			$datos = array('nombres', 'apellidos', 'edad', 'clave');
			$columna = $datos[$index];
			$valor=$dato;
			$sql = "UPDATE usuarios SET  $columna = '$dato' WHERE id = '$id'";
			try {	
				$conn=new Conexion();
				$conn->getConexion()->exec($sql);
				$response = array(
					"Respuesta"=>"Dato ($datos[$index]) actualizado.($valor)"
				);
				
			} catch(PDOException $e){
				$response = array(
					"SERVICIO"=>"DESCONECTADO",
					"ESTADO"=>"NO CREADO",
					"ERROR"=>$e,
					"Columna"=>$datos[$index],
					"Dato"=>$valor
				);
				
			}
			$conn=null;
			echo json_encode($response);
			return json_encode($response);
		}
		public static function borrarCliente($correo){
			$response = null;
			$sql = "DELETE FROM usuarios WHERE correo='$correo' and tipo='6'";
			try {
				$conn=new Conexion();
				$conn->getConexion()->exec($sql);
				if ($conn->getConexion()->query($sql) == TRUE) {
					$response = array(
						"estado"=>"TRUE",
						"MENSAJE"=>"Cuenta eliminada"
					);
				} else{
					$response = array(
						"estado"=>"FALSE",
						"MENSAJE"=>"Cuenta No eliminada"
					);
				}
				$conn=null;
			} catch (PDOException $e) {
				$response = array(
					"estado"=>"FALSE",
					"MENSAJE"=>$e
				);
			}
			return json_encode($response);
		}
		public static function mostrarUsuarioByCorreo($correo){
			$response = null;
			$conn=new Conexion();
			$sql = "SELECT * FROM usuarios where correo='$correo'";
			try {
				
				$stmt = $conn->getConexion()->query($sql);
				$result = $stmt->setFetchMode(PDO::FETCH_NUM);
				while ($row = $stmt->fetch()) {
					$usuario =  new ModeloUsuario($row[0], $row[1], $row[2], $row[3],  $row[4], $row[5], $row[6]);
				}
				$conn=null;
				echo json_encode($usuario);
				return json_encode($usuario);
			} catch (PDOException $e) {
				$response = null;
				$response = array(
					"estado"=>"FALLIDO",
					"usuario"=>"NULL"
				);
				echo json_encode($response);
				return json_encode($response);
			}
		}
		public static function isLogin($correo, $clave){
			$response = null;
			$conn=new Conexion();
			$sql = "SELECT * FROM usuarios where correo='$correo' and clave='$clave'";
			try {
				
				$stmt = $conn->getConexion()->query($sql);
				$result = $stmt->setFetchMode(PDO::FETCH_NUM);
				while ($row = $stmt->fetch()) {
					$usuario =  new ModeloUsuario($row[0], $row[1], $row[2], $row[3],  $row[4], $row[5], $row[6]);
				}
				$conn=null;
				//echo json_encode($usuario);
				return $usuario;
			} catch (PDOException $e) {
				$response = null;
				$response = array(
					"estado"=>"FALLIDO",
					"usuario"=>"NULL"
				);
				echo json_encode($response);
				return json_encode($response);
			}
		}
		public static function tipoDeUsuario($correo){
			$response = null;
			$conn=new Conexion();
			$sql_tipo_num = "SELECT tipo FROM usuarios where correo='$correo'";
			try {
				$stmt = $conn->getConexion()->query($sql_tipo_num);
				$result = $stmt->setFetchMode(PDO::FETCH_NUM);
				$usuario=null;
				while ($row = $stmt->fetch()) {
					$tipo_num = $row[0];
					$sql_tipo_str = "SELECT nombre FROM tipos_de_usuario where id='$tipo_num'";
					$stmt = $conn->getConexion()->query($sql_tipo_str);
					$result = $stmt->setFetchMode(PDO::FETCH_NUM);
					$tipo =null;
					while ($row = $stmt->fetch()) {
						$tipo = $row[0];
					}
				}
				
				$conn=null;
				//echo json_encode($tipo);
				return json_encode($tipo);
			} catch (PDOException $e) {
				$response = null;
				$response = array(
					"estado"=>"FALLIDO",
					"tipo"=>"NULL"
				);
				
				return json_encode($response);
			}
		}
		
		public static function allUsuarios(){
			$response = null;
			$sql = "SELECT * FROM usuarios;";
			try {
				$conn=new conexion();
				$stmt = $conn->getConexion()->query($sql);
				$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
				while ($row = $stmt->fetch()) {
					$response[] = $row;
				}
				$conn=null;
				echo json_encode($response);
			} catch (PDOException $e) {
				$response = array(
					"estado"=>"FALLIDO",
					"direccion"=>"NULL"
				);
				echo json_encode($response);
			}
		}
	}
?>	