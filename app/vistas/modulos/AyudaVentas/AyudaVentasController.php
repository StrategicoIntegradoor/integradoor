<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
// header('Content-Type: application/json');

class AyudaVentasController 
{
    public static function ejecutarConsulta($sql){
		$mysqli = new mysqli("localhost", "root", "", "grupoasi_cotizautos");
        return $mysqli->query($sql);
	}

    public static function obtenerAyudaVentas()
    {
        $consulta = "SELECT * FROM ayuda_ventas;";
        $resultado = AyudaVentasController::ejecutarConsulta($consulta);
        $resultado = $resultado->fetch_all(MYSQLI_ASSOC);
        print_r(json_encode($resultado));
    }

    public static function obtenerAyudaVenta($id)
    {
        $consulta = "SELECT * FROM ayuda_ventas WHERE id = $id;";
        $resultado = AyudaVentasController::ejecutarConsulta($consulta);
        $resultado = $resultado->fetch_assoc();
        print_r(json_encode($resultado));
    }

    public static function crearNombreArchivoSarlaft($idAyudaVenta, $aseguradora) {
        return $idAyudaVenta . '_' . $aseguradora . '_' . 'Sarlaft.pdf';
    }

    public static function crearNombreArchivoClausulado($idAyudaVenta, $aseguradora) {
        return $idAyudaVenta . '_' . $aseguradora . '_' . 'Clausulado.pdf';
    }

    public static function editarAyudaVenta($post, $files) {
        $nombreArchivoClausulado = AyudaVentasController::crearNombreArchivoClausulado($post['id_ayuda_venta'], $post['aseguradora']);
        $nombreArchivoSarlaft = AyudaVentasController::crearNombreArchivoSarlaft($post['id_ayuda_venta'], $post['aseguradora']);
        // Editar datos
        $consulta = "UPDATE ayuda_ventas 
                SET linea_de_atencion = '" . $post['linea_de_atencion'] . "', 
                centro_de_inspeccion = '" . $post['centro_de_inspeccion'] . "', 
                continuidad = '" . $post['continuidad'] . "', 
                formas_de_pago = '" . $post['formas_de_pago'] . "', 
                tips_de_expedicion = '" . $post['tips_expedicion'] . "'
            WHERE id = " . $post['id_ayuda_venta'];
        $resultado = AyudaVentasController::ejecutarConsulta($consulta);
        if (count($files) > 0 && isset($files['clausulado'])) {
            move_uploaded_file($files['clausulado']['tmp_name'], 'pdf/clausulado/' . $nombreArchivoClausulado);
            $consulta = "UPDATE ayuda_ventas
            SET path_clausulado = '" . $nombreArchivoClausulado . "'
            WHERE id = " .$post['id_ayuda_venta'];
            $resultado = AyudaVentasController::ejecutarConsulta($consulta);
        }   
        if (count($files) > 0 && isset($files['sarlaft'])) {
            move_uploaded_file($files['sarlaft']['tmp_name'], 'pdf/sarlaft/' . $nombreArchivoSarlaft);
            $consulta = "UPDATE ayuda_ventas
            SET path_sarlaft = '" . $nombreArchivoSarlaft . "'
            WHERE id = " .$post['id_ayuda_venta'];
            $resultado = AyudaVentasController::ejecutarConsulta($consulta);
        }
    }
}

$funcion = $_POST['funcion'];
if ($funcion == 'obtenerAyudaVentas') {
    AyudaVentasController::obtenerAyudaVentas();
}
if ($funcion == 'obtenerAyudaVenta') {
    $id = $_POST['id'];
    AyudaVentasController::obtenerAyudaVenta($id);
}
if ($funcion == 'editarAyudaVenta') {
    AyudaVentasController::editarAyudaVenta($_POST, $_FILES);
}
