<?php

require_once("../modelos/intermediario.modelo.php");




Switch ($_GET['function']){
    //funcion para cargar la informacion del intermediario
    case "traerCrede":

        $modelo = ModeloInternediario::mostrarCredenciales();

        $resp = $modelo[0];

        print_r(json_encode($resp));
        break;

        //funcion para guardar credenciales de allianz
    case "guardarallianz":

        $modelo = ModeloInternediario::guardarAlli($_POST['contra'], $_POST['part'], $_POST['idAge'], $_POST['codPat'], $_POST['codAge']);

        echo $modelo;

        break;
//funcion para guardar credenciales bolivar
    case "guardarvoli":
        $modelo = ModeloInternediario::guardarBoli($_POST['apikey'], $_POST['clave']);

        echo $modelo; 

        break;

        //funcion para guardar credenciales equidad
    case "guardarequi":

        $modelo = ModeloInternediario::guardarEqui($_POST['usu'], $_POST['contra'] , $_POST['sucur']);

        echo $modelo; 

        break;

        //funcion para guardar credenciales solidaria
    case "guardarsoli":
        $modelo = ModeloInternediario::guardarSoli($_POST['sucur'], $_POST['codPer'] , $_POST['tipAge'], $_POST['codAge'] , $_POST['PunVen'], $_POST['grantTy'], $_POST['cookie']);

        echo $modelo;  

        break;

        //funcion para guardar credencialesliberty
    case "guardarliber":
        $modelo = ModeloInternediario::guardarLibe($_POST['cookTo'], $_POST['cookRe'] , $_POST['auto'], $_POST['codAge'] , $_POST['apliCli'], $_POST['ip'], $_POST['idReq'], $_POST['terminal']);

        echo $modelo; 

        break;

        //funcion para guardar credenciales estado
    case "guardarest":
        $modelo = ModeloInternediario::guardarEst($_POST['usu'], $_POST['contra']);

        echo $modelo;
        break;

        //funcion para guardar credenciales axa
    case "guardaraxa":
        $modelo = ModeloInternediario::guardaraxa($_POST['contra'], $_POST['codDis'], $_POST['tipDis'], $_POST['codCiu'], $_POST['canal'], $_POST['valEve']);

        echo $modelo; 

        break;

        //funcion para guardar credenciales hdi
    case "guardarhdi":
        $modelo = ModeloInternediario::guardarhdi($_POST['codSucu'], $_POST['codAge'], $_POST['usu'], $_POST['contra']);

        echo $modelo; 

        break;

        //funcion para guardar credenciales sbs
    case "guardarsbs":
        $modelo = ModeloInternediario::guardarsbs($_POST['usu'], $_POST['contra']);

        echo $modelo; 
        break;
    // case "guardar":
    //     $modelo = 

    //     break;
    // case "guardar":
    //     $modelo =

    //     break;

    //funcion para guardar credenciales zurich
    case "guardarzuri":

        $modelo = ModeloInternediario::guardarZuri($_POST['usu'], $_POST['contra'], $_POST['correo'], $_POST['cookie']);

        echo $modelo;

        break;
    
}

