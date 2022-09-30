<?php

require_once("../modelos/intermediario.modelo.php");




Switch ($_GET['function']){
    case "traerCrede":

        $modelo = ModeloInternediario::mostrarCredenciales();

        $resp = $modelo[0];

        print_r(json_encode($resp));
        break;
    
}

