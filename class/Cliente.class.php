<?php
require_once "ConexionBD.class.php";
require_once("AccesoBD.class.php");

class Cliente{
	private $cn;
	
	function __construct(){
		try{
			$con = ConexionBD::CadenaCN();
			$this->cn =	AccesoBD::ConexionBD($con);
		}catch(Exception $e){
			throw $e;
		}
	}
	
	public function Validar($email, $clave){
		try{
			$sql = "select * from cliente 
						where email='$email' and clave = '$clave' ";
			$lista = AccesoBD::Consultar($this->cn,$sql);
			return $lista[0];
		}catch(Exception $e){
			$mensaje = "Fecha: ".date("Y-m-d H:i:s")."\n".
								"Archivo: ".$e->getFile()."\n".
								"Linea: ".$e->getLine()."\n".
								"Mensaje: ".$sql."\n\n";
			error_log($mensaje,3,"log/pedidos.log");			
			throw $e;
		}
	}
}
?>