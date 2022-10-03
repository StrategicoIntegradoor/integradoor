<?php

session_start();

require_once "conexion.php";

class ModeloInternediario{
    

    //funcion para traer informacion del intermediario

    //funcion para traer credenciales de intermediario

    public static function mostrarCredenciales(){

        $inter = $_SESSION["intermediario"];

        $stmt = Conexion::conectar()->prepare("SELECT * FROM intermediario i, credenciales_zurich z,credenciales_solidaria so, credenciales_sbs sb, credenciales_liberty l, credenciales_hdi h, credenciales_estado e, credenciales_bolivar b, credenciales_axa ax, credenciales_allianz al, credenciales_equidad eq WHERE i.id_Intermediario = ".$inter."  AND i.id_Intermediario = z.id_Intermediario  AND i.id_Intermediario = so.id_Intermediario  AND i.id_Intermediario = sb.id_intermediario AND i.id_Intermediario = l.id_Intermediario AND i.id_Intermediario = h.id_intermediario AND i.id_Intermediario = e.id_Intermediario AND i.id_Intermediario = b.id_Intermediario AND i.id_Intermediario = ax.id_Intermediario AND i.id_Intermediario = al.id_Intermediario AND i.id_Intermediario = eq.id_Intermediario");


		$stmt -> execute();

        return $stmt -> fetchAll(PDO::FETCH_ASSOC);


    }

    //funcion para actualizar informacion del intermediario

    //funcion para guardar credenciales del intermediario

    public static function guardarAlli($contra, $part, $idAge, $codPAt, $codAge){

        $inter = $_SESSION["intermediario"];

        $stmt = Conexion::conectar()->prepare("SELECT al.id_intermediario FROM credenciales_allianz al WHERE al.id_Intermediario = ".$inter."");
		$stmt -> execute();

        $num = $stmt->rowCount();
        if ($num != 0){
            $sql = Conexion::conectar()->prepare("UPDATE credenciales_allianz SET cre_alli_passphrase = '$contra', cre_alli_partnerid =  '$part', cre_alli_agentid = '$idAge', cre_alli_partnercode ='$codPAt', cre_alli_agentcode = '$codAge' WHERE id_Intermediario = '$inter'");

            $sql -> execute();
        }else{
            $sql = Conexion::conectar()->prepare("INSERT INTO credenciales_allianz (cre_alli_passphrase, cre_alli_partnerid, cre_alli_agentid, cre_alli_partnercode, cre_alli_agentcode) VALUES ($contra, $part, $idAge, $codPAt, $codAge) WHERE id_Intermediario = '$inter'");

            $sql -> execute();
        }

        $result =  $sql ->rowCount();

        if($result){
            echo "exitoso";
        }else{
            echo "falle";
        }
    }

    public static function guardarBoli($apy, $clave){

        $inter = $_SESSION["intermediario"];

        $stmt = Conexion::conectar()->prepare("SELECT al.id_intermediario FROM credenciales_bolivar al WHERE al.id_Intermediario = ".$inter."");
		$stmt -> execute();

        $num = $stmt->rowCount();
        if ($num != 0){
            $sql = Conexion::conectar()->prepare("UPDATE credenciales_bolivar SET cre_bol_api_key = '$apy', cre_bol_claveAsesor =  '$clave' WHERE id_Intermediario = $inter");

            $sql -> execute();
        }else{
            $sql = Conexion::conectar()->prepare("INSERT INTO credenciales_bolivar (cre_bol_api_key, cre_bol_claveAsesor) VALUES ($apy, $clave) WHERE id_Intermediario = $inter");

            $sql -> execute();
        }

        $result =  $sql ->rowCount();

        if($result){
            echo "exitoso";
        }else{
            echo "falle";
        }
    }


    public static function guardarEqui($usu, $contra, $sucur){

        $inter = $_SESSION["intermediario"];

        $stmt = Conexion::conectar()->prepare("SELECT al.id_intermediario FROM credenciales_zurich al WHERE al.id_intermediario = ".$inter."");
		$stmt -> execute();

        $num = $stmt->rowCount();
        if ($num != 0){
            $sql = Conexion::conectar()->prepare("UPDATE credenciales_equidad SET cre_equ_usuario = '$usu', cre_equ_contraseña =  '$contra', cre_equ_codigo_sucursal = $sucur WHERE id_intermediario = $inter");

            $sql -> execute();
        }else{
            $sql = Conexion::conectar()->prepare("INSERT INTO credenciales_equidad (cre_equ_usuario, cre_equ_contraseña, cre_equ_codigo_sucursal) VALUES ($usu, $contra, $sucur) WHERE id_intermediario = $inter");

            $sql -> execute();
        }

        $result =  $sql ->rowCount();

        if($result){
            echo "exitoso";
        }else{
            echo "falle";
        }
    }

    public static function guardarSoli($sucur, $codPer, $tipAge, $codAge, $PunVen, $grantTy, $cookie){

        $inter = $_SESSION["intermediario"];

        $stmt = Conexion::conectar()->prepare("SELECT al.id_intermediario FROM credenciales_solidaria al WHERE al.id_Intermediario = ".$inter."");
		$stmt -> execute();

        $num = $stmt->rowCount();
        if ($num != 0){
            $sql = Conexion::conectar()->prepare("UPDATE credenciales_solidaria SET cre_sol_cod_sucursal = '$sucur', cre_sol_cod_per =  '$codPer', cre_sol_cod_tipo_agente = '$tipAge', cre_sol_cod_agente = '$codAge', cre_sol_cod_pto_vta = '$PunVen', cre_sol_grant_type = '$grantTy', cre_sol_Cookie_token = '$cookie' WHERE id_Intermediario = $inter");

            $sql -> execute();
        }else{
            $sql = Conexion::conectar()->prepare("INSERT INTO credenciales_solidaria (cre_sol_cod_sucursal, cre_sol_cod_per, cre_sol_cod_tipo_agente, cre_sol_cod_agente,cre_sol_cod_pto_vta, cre_sol_grant_type, cre_sol_Cookie_token) VALUES ($sucur, $codPer, $tipAge, $codAge, $PunVen, $grantTy, $cookie) WHERE id_Intermediario = $inter");

            $sql -> execute();
        }

        $result =  $sql ->rowCount();

        if($result){
            echo "exitoso";
        }else{
            echo "falle";
        }
    }


    public static function guardarLibe($cookTo, $cookRe, $auto, $codAge, $apliCli, $ip, $idReq, $terminal){

        $inter = $_SESSION["intermediario"];

        $stmt = Conexion::conectar()->prepare("SELECT al.id_intermediario FROM credenciales_liberty al WHERE al.id_Intermediario = ".$inter."");
		$stmt -> execute();

        $num = $stmt->rowCount();
        if ($num != 0){

            $sql = Conexion::conectar()->prepare("UPDATE credenciales_liberty SET cre_lib_cookieToken = '$cookTo', cre_lib_cookieRequest =  '$cookRe', cre_lib_authorization = '$auto', cre_lib_codigoAgenteGestion = '$codAge', cre_lib_aplicacionCliente = '$apliCli', cre_lib_ip = '$ip', cre_lib_requestID = '$idReq', cre_lib_terminal = '$terminal' WHERE id_Intermediario = $inter");

            $sql -> execute();
        }else{
            $sql = Conexion::conectar()->prepare("INSERT INTO credenciales_liberty (cre_lib_cookieToken, cre_lib_cookieRequest, cre_lib_authorization, cre_lib_codigoAgenteGestion,cre_lib_aplicacionCliente, cre_lib_ip, cre_lib_requestID, cre_lib_terminal) VALUES ($cookTo, $cookRe, $auto, $codAge, $apliCli, $ip, $idReq, $terminal) WHERE id_Intermediario = $inter");
            $sql -> execute();
        }

        $result =  $sql ->rowCount();

        if($result){
            echo "exitoso";
        }else{
            echo "falle";
        }
    }


    public static function guardarEst($usu, $contra){

        $inter = $_SESSION["intermediario"];

        $stmt = Conexion::conectar()->prepare("SELECT al.id_intermediario FROM credenciales_estado al WHERE al.id_intermediario = ".$inter."");
		$stmt -> execute();

        $num = $stmt->rowCount();
        if ($num != 0){
            $sql = Conexion::conectar()->prepare("UPDATE credenciales_estado SET cre_est_usuario = '$usu', cre_equ_contrasena =  '$contra' WHERE id_intermediario = $inter");

            $sql -> execute();
        }else{
            $sql = Conexion::conectar()->prepare("INSERT INTO credenciales_estado (cre_est_usuario, cre_equ_contrasena) VALUES ($usu, $contra) WHERE id_intermediario = $inter");

            $sql -> execute();
        }

        $result =  $sql ->rowCount();

        if($result){
            echo "exitoso";
        }else{
            echo "falle";
        }
    }


    public static function guardaraxa($contra, $codDis, $tipDis, $codCiu, $canal, $valEve){

        $inter = $_SESSION["intermediario"];

        $stmt = Conexion::conectar()->prepare("SELECT al.id_intermediario FROM credenciales_axa al WHERE al.id_Intermediario = ".$inter."");
		$stmt -> execute();

        $num = $stmt->rowCount();
        if ($num != 0){

            $sql = Conexion::conectar()->prepare("UPDATE credenciales_axa SET cre_axa_passphrase = '$contra', cre_axa_codigoDistribuidor =  '$codDis', cre_axa_idTipoDistribuidor = '$tipDis', cre_axa_codigoDivipola = '$codCiu', cre_axa_canal = '$canal', cre_axa_validacionEventos = '$valEve' WHERE id_Intermediario = $inter");

            $sql -> execute();
        }else{
            $sql = Conexion::conectar()->prepare("INSERT INTO credenciales_axa (cre_axa_passphrase, cre_axa_codigoDistribuidor, cre_axa_idTipoDistribuidor, cre_axa_codigoDivipola,cre_axa_canal, cre_axa_validacionEventos) VALUES ($contra, $codDis, $tipDis, $codCiu, $canal, $valEve) WHERE id_Intermediario = $inter");
            $sql -> execute();
        }

        $result =  $sql ->rowCount();

        if($result){
            echo "exitoso";
        }else{
            echo "falle";
        }
    }


    public static function guardarhdi($codSucu, $codAge, $usu, $contra){

        $inter = $_SESSION["intermediario"];

        $stmt = Conexion::conectar()->prepare("SELECT al.id_intermediario FROM credenciales_hdi al WHERE al.id_Intermediario = ".$inter."");
		$stmt -> execute();

        $num = $stmt->rowCount();
        if ($num != 0){

            $sql = Conexion::conectar()->prepare("UPDATE credenciales_hdi SET cre_hdi_codSucursal = '$codSucu', cre_hdi_CodigoAgente =  '$codAge', cre_hdi_usuario = '$usu', 	cre_hdi_contraseña = '$contra' WHERE id_Intermediario = $inter");

            $sql -> execute();
        }else{
            $sql = Conexion::conectar()->prepare("INSERT INTO credenciales_hdi (cre_hdi_codSucursal, cre_hdi_CodigoAgente, cre_hdi_usuario, cre_hdi_contraseña) VALUES ($codSucu, $codAge, $usu, $contra) WHERE id_Intermediario = $inter");
            $sql -> execute();
        }

        $result =  $sql ->rowCount();

        if($result){
            echo "exitoso";
        }else{
            echo "falle";
        }
    }


    public static function guardarsbs($usu, $contra){

        $inter = $_SESSION["intermediario"];

        $stmt = Conexion::conectar()->prepare("SELECT al.id_intermediario FROM credenciales_sbs al WHERE al.id_intermediario = ".$inter."");
		$stmt -> execute();

        $num = $stmt->rowCount();
        if ($num != 0){
            $sql = Conexion::conectar()->prepare("UPDATE credenciales_sbs SET cre_sbs_usuario = '$usu', cre_sbs_contraseña =  '$contra' WHERE id_intermediario = $inter");

            $sql -> execute();
        }else{
            $sql = Conexion::conectar()->prepare("INSERT INTO credenciales_estado (cre_sbs_usuario, cre_sbs_contraseña) VALUES ($usu, $contra) WHERE id_intermediario = $inter");

            $sql -> execute();
        }

        $result =  $sql ->rowCount();

        if($result){
            echo "exitoso";
        }else{
            echo "falle";
        }
    }

    public static function guardarZuri($usu, $contra, $correo, $cookie){

        $inter = $_SESSION["intermediario"];

        $stmt = Conexion::conectar()->prepare("SELECT al.id_intermediario FROM credenciales_zurich al WHERE al.id_Intermediario = ".$inter."");
		$stmt -> execute();

        $num = $stmt->rowCount();
        if ($num != 0){
            $sql = Conexion::conectar()->prepare("UPDATE credenciales_zurich SET cre_zur_nomUsu = '$usu', cre_zur_passwd =  '$contra',cre_zur_intermediaryEmail = '$correo', cre_zur_Cookie ='$cookie' WHERE id_Intermediario = '$inter'");

            $sql -> execute();
        }else{
            $sql = Conexion::conectar()->prepare("INSERT INTO credenciales_zurich (cre_zur_nomUsu, cre_zur_passwd, cre_zur_intermediaryEmail, cre_zur_Cookie) VALUES ($usu, $contra, $correo, $cookie) WHERE id_Intermediario = '$inter'");

            $sql -> execute();
        }

        $result =  $sql ->rowCount();

        if($result){
            echo "exitoso";
        }else{
            echo "falle";
        }
    }

    //funcion para actualizar credenciales del intermediario

    //XewEqDEOkZ1i4sphLVXxs5RtkIDLFIPq3jWEokla
}
?>