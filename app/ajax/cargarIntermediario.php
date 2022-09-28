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

$query = "SELECT * FROM intermediario";
$ejecucion = mysqli_query($enlace,$query);
// $objeto = mysqli_fetch_assoc($ejecucion);
// $numRows = mysqli_num_rows($ejecucion);
// echo $numRows;
$opcion = "";
while($fila = $ejecucion->fetch_assoc()){
    $opcion.= "<option value =" . $fila['id_Intermediario'].">". $fila['nombre']."</option>";
} 
echo $opcion;
    

?>