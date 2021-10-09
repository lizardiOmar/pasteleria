<?php
	include 'conexion.php';
	class ModeloCatalogo{
		var $nombre;
		var $descripcion;
		var $imagen;

		public function_constructor($nombre, $descripcion, $imagen){
			$this->nombre = $nombre;
			$this->descripcion = $descripcion;
			$this->imagen = $imagen;
		}

		public function get Nombre(){
			if(isset($this->nombre)){
				return $this->nombre;
			}
		}

		public function getDescripcion(){
			if(isset($this->descripcion)){
				return $this->descripcion;
			}
		}

		public function getImagen(){
			if(isset($this->imagen)){
				return $this->imagen;
			}
		}

		public function guardarCatalogo(){
			try{
				$sql = "INSERT INTO productos (nombre, descripcion, imagen) VALUES ('$this->nombre', '$this->descripcion', $this->imagen)";
				$conn=new Conexion();
				$conn->getConexion()->exec($sql);
				$response = array("SERVICIO"=>"CONECTADO", "ESTADO"=>"CREADO");
				echo json_encode($response);
				$conn=null;
			} catch(PDOException $e){
				$response = array("SERVICIO"=>"DESCONECTADO","ESTADO"=>"NO CREADO","ERROR"=>$e);
				echo json_encode($response);
			}
		}

		return json_encode($response);
	}