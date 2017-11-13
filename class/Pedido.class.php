<?php
require_once "ConexionBD.class.php";
require_once("AccesoBD.class.php");

class Pedido{
	private $cn;
	
	function __construct(){
		try{
			$con = ConexionBD::CadenaCN();
			$this->cn =	AccesoBD::ConexionBD($con);
		}catch(Exception $e){
			throw $e;
		}
	}
	
	public function GrabarEncabezado($fecha, $id_cliente){
		$sql = "insert into pedido_cab(fecha, id_cliente, id_vendedor) 
					values ('$fecha', $id_cliente,1) ";
		$id = AccesoBD::Insertar($this->cn,$sql);
		return $id;
	}

	public function GrabarDetalle($id_pedido, $id_producto, $cantidad, $precio){
		$sql = "insert into pedido_det(id_pedido, id_producto, cantidad, precio) 
					values ($id_pedido, $id_producto, $cantidad, $precio) ";
		$id = AccesoBD::Insertar($this->cn,$sql);
		return $id;
	}
}
?>