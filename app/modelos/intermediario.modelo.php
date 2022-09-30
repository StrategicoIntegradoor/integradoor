<?php

require_once "conexion.php";

class ModeloInternediario{

    //funcion para traer informacion del intermediario

    //funcion para traer credenciales de intermediario

    public static function mostrarCredenciales(){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM intermediario i, credenciales_zurich z,credenciales_solidaria so, credenciales_sbs sb, credenciales_liberty l, credenciales_hdi h, credenciales_estado e, credenciales_bolivar b, credenciales_axa ax, credenciales_allianz al, credenciales_equidad eq WHERE i.id_Intermediario = 3  AND i.id_Intermediario = z.id_Intermediario  AND i.id_Intermediario = so.id_Intermediario  AND i.id_Intermediario = sb.id_intermediario AND i.id_Intermediario = l.id_Intermediario AND i.id_Intermediario = h.id_intermediario AND i.id_Intermediario = e.id_Intermediario AND i.id_Intermediario = b.id_Intermediario AND i.id_Intermediario = ax.id_Intermediario AND i.id_Intermediario = al.id_Intermediario AND i.id_Intermediario = eq.id_Intermediario");

		$stmt -> execute();

        return $stmt -> fetchAll(PDO::FETCH_ASSOC);


    }

    //funcion para actualizar informacion del intermediario

    //funcion para guardar credenciales del intermediario

    //funcion para actualizar credenciales del intermediario

    //XewEqDEOkZ1i4sphLVXxs5RtkIDLFIPq3jWEokla
}
?>