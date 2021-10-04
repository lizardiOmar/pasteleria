<?php
	include 'conexion.php';
	class ModeloProducto{
		var $id;
		var $nombre;
		var $descripcion;
		var $precio;
		var $cantidad;
		var $cantidad_Minima;
		var $tipo;
		
		public function __construct($id, $nombre, $descripcion, $precio, $cantidad, $cantidadMinima, $tipo){
			$this->id 			  = $id;
			$this->nombre 		  = $nombre;
			$this->descripcion 	  = $descripcion;
			$this->precio 		  = $precio;
			$this->cantidad	      = $cantidad;
			$this->cantidad_Minima = $cantidadMinima; 	
			$this->tipo			  = $tipo; 	
		}
		public function getId(){
			if(isset($this->id)){
				return $this->id;
			}
		}
		public function getNombre(){
			if(isset($this->nombre)){
				return $this->nombre;
			}
		}
		public function getDescripcion(){
			if(isset($this->descripcion)){
				return $this->descripcion;
			}
		}
		public function getPrecio(){
			if(isset($this->precio)){
				return $this->precio;
			}
		}
		public function getCantidad(){
			if(isset($this->cantidad)){
				return $this->cantidad;
			}
		}
		public function getCantidadMin(){
			if(isset($this->cantidad_Minima)){
				return $this->cantidad_Minima;
			}
		}
		public function getTipo(){
			if(isset($this->tipo)){
				return $this->tipo;
			}
		}
		public function guardarProducto(){
			try {	
				$sql = "INSERT INTO productos (id, nombre, descripcion, precio, cantidad, cantidad_minima, tipo)
				VALUES ($this->id, '$this->nombre', '$this->descripcion', $this->precio, $this->cantidad, $this->cantidad_Minima, $this->tipo)";
				$conn=new Conexion();
				$conn->getConexion()->exec($sql);
				$response = array(
					"SERVICIO"=>"CONECTADO",
					"ESTADO"=>"CREADO"
				);
				echo json_encode($response);
				$conn=null;
			} catch(PDOException $e) {
				$response = array(
					"SERVICIO"=>"DESCONECTADO",
					"ESTADO"=>"NO CREADO",
					"ERROR"=>$e
				);
				echo json_encode($response);
			}
			
			return json_encode($response);
		}
		public static function actualizarProducto($id, $dato, $index){
			$datos = array('nombre', 'descripcion', 'precio','cantidad','cantidad_Minima', 'tipo');
			$columna = $datos[$index];
			$valor=$dato;
			$sql = "UPDATE productos SET  $columna = '$dato' WHERE id = '$id'";
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
		public static function borrarProducto($id){
			$response = null;
			$sql = "DELETE FROM productos WHERE ID='$id'";
			try {
				$conn=new Conexion();
				$conn->getConexion()->exec($sql);
				if ($conn->getConexion()->query($sql) == TRUE) {
					$response = array(
						"estado"=>"TRUE",
						"MENSAJE"=>"producto eliminado"
					);
				} else{
					$response = array(
						"estado"=>"FALSE",
						"MENSAJE"=>"producto No eliminada"
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
		public static function allProductos(){
			$response = null;
			$sql = "SELECT * FROM productos;";
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