<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header('Content-Type: application/json');

class AyudaVentasController 
{
    public static function ejecutarConsulta($sql){
		$mysqli = new mysqli("localhost", "root", "", "grupoasi_cotizautos");
        return $mysqli->query($sql);
	}

    public static function obtenerAyudaVentas()
    {
        $consulta = "SELECT * FROM ayuda_ventas";
        $resultado = AyudaVentasController::ejecutarConsulta($consulta);
        $resultado = $resultado->fetch_all(MYSQLI_ASSOC);
        print_r(json_encode($resultado));
    }
}

$json = $data = json_decode( file_get_contents('php://input') );
$funcion = $json->funcion;
if ($funcion == 'obtenerAyudaVentas') {
    AyudaVentasController::obtenerAyudaVentas();
}
