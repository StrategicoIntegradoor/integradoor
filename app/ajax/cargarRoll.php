<?php


$mensaje = $_POST['saludo'];

$DB_host = "localhost";
$DB_user = "root";
$DB_pass = "";
$DB_name = "grupoasi_cotizautos";


$enlace = mysqli_connect("$DB_host", "$DB_user", "$DB_pass", "$DB_name");

if(!$enlace ){

    die("Conexion Fallida ".mysqli_connect_error());

}

$query = "SELECT * FROM roles";
$ejecucion = mysqli_query($enlace,$query);
$opcion = "";
while($fila = $ejecucion->fetch_assoc()){
    $opcion.= "<option value =" . $fila['id_rol'].">". $fila['rol_descripcion']."</option>";
} 
echo $opcion;
    

?>