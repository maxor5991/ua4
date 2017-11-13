<?php
require_once "ConexionBD.class.php";
require_once("AccesoBD.class.php");

class Reporte{
	private $cn;
	
	function __construct(){
		try{
			$con = ConexionBD::CadenaCN();
			$this->cn =	AccesoBD::ConexionBD($con);
		}catch(Exception $e){
			throw $e;
		}
	}
	
	public function TotalVentasAnio($anio){
		$sql = "CALL sp_total_ventas_anio($anio) ";
		$lista = AccesoBD::Consultar($this->cn,$sql);
		return $lista;
	}

}
?>