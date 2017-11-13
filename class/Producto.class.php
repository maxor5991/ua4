<?php
require_once "ConexionBD.class.php";
require_once("AccesoBD.class.php");

class Producto{
	private $cn;
	
	function __construct(){
		try{
			$con = ConexionBD::CadenaCN();
			$this->cn =	AccesoBD::ConexionBD($con);
		}catch(Exception $e){
			throw $e;
		}
	}
	
	public function Catalogo(){
		try{
			$sql = "select * from producto";
			$lista = AccesoBD::Consultar($this->cn,$sql);
			return $lista;
		}catch(Exception $e){
			$mensaje = "Fecha: ".date("Y-m-d H:i:s")."\n".
								"Archivo: ".$e->getFile()."\n".
								"Linea: ".$e->getLine()."\n".
								"Mensaje: ".$sql."\n\n";
			error_log($mensaje,3,"log/pedidos.log");			
			throw $e;
		}
	}

	public function BuscarID($id){
			$sql = "select * from producto where id_producto = $id";
			$registro = AccesoBD::Consultar($this->cn, $sql);
			return $registro[0];
	}

	public function Nuevo($descripcion, $precio){
			$sql = "insert into producto (descripcion, precio) values ('$descripcion'', '$precio')";
			$id  = AccesoBD::Insertar($this->cn, $sql);
			return $id;
	}

	public function Editar($id_producto, $descripcion, $precio){
			$sql = "update producto set descripcion='$descripcion', precio='$precio' where id_producto=$id_producto";
			AccesoBD::OtroSQL($this->cn, $sql);
	}

	public function Borrar($id_producto){
			$sql = "delete from producto where id_producto=$id_producto";
			AccesoBD::OtroSQL($this->cn, $sql);
	}
}
?>