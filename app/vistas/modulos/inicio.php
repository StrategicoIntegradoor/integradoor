<?php

if ($_SESSION["rol"] != 1 && $_SESSION["rol"] != 2) {

  echo '<script>

    window.location = "inicio";

  </script>';

  return;

}

?>

<div class="content-wrapper">
  <section class="content-header">
    
    <h1>
      
      Admin. Cotizaciones 
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Admin. cotizaciones </li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <a href="cotizar">

          <button class="btn btn-primary">
            
            Cotizar Nuevo Vehículo

          </button>

        </a>

         <button type="button" class="btn btn-default pull-right" id="daterange-btnCotizaciones">
           
            <span>
              <i class="fa fa-calendar"></i> 

              <?php

                if(isset($_GET["fechaInicialCotizaciones"])){

                  echo $_GET["fechaInicialCotizaciones"]." - ".$_GET["fechaFinalCotizaciones"];
                
                }else{
                 
                  echo 'Rango de fecha';

                }

              ?>
            </span>

            <i class="fa fa-caret-down"></i>

         </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas-cotizaciones" width="100%">
         
        <thead>
         
         <tr>
           
           <th>N°</th>
           <th>Fecha</th>
           <th>Documento</th>
           <th>Cliente</th>
           <th>Placa</th>
           <th>Referencia del Vehículo</th>
           <th>Asesor</th>
           <th style="width:110px">Acciones</th>

         </tr> 

        </thead>

        <tbody>
          <tr role="row" class="odd">

            <td class="text-center sorting_1" tabindex="0">1</td>

            <td class="text-center sorting_2">2022/09/13</td>

            <td class="text-right">12345789</td>

            <td class="text-right">Ricky Martin</td>
            
            <td class="text-center">ABC987</td>

            <td class="">MAZDA 2 [2] TOURING SEDAN TP 1500CC 6AB</td>

            <td class="">Juan</td>

            <td class="text-center">

              <div class="btn-group">
              
                <button class="btn btn-primary btnEditarCotizacion" idcotizacion="" disabled="disabled">Seleccionar</button></div>

            </td>

          </tr>
          <tr role="row" class="odd">

            <td class="text-center sorting_1" tabindex="0">2</td>

            <td class="text-center sorting_2">9/10/2022</td>

            <td class="text-right">90876543</td>

            <td class="text-right">Marco Antonio Muñiz</td>
            
            <td class="text-center">ZYX234</td>

            <td class="">HYUNDAI STAREX [1] H1 PANEL MT 2600CC DSL SA</td>

            <td class="">Pablo</td>

            <td class="text-center">

              <div class="btn-group">
              
                <button class="btn btn-primary btnEditarCotizacion" idcotizacion="" disabled="disabled">Seleccionar</button></div>

            </td>

          </tr>
          <tr role="row" class="odd">

            <td class="text-center sorting_1" tabindex="0">3</td>

            <td class="text-center sorting_2">9/2/2022</td>

            <td class="text-right">34567891</td>

            <td class="text-right">Alberto Aguilera Valadez</td>

            <td class="text-center">YYY678</td>

            <td class="">RENAULT STEPWAY [2] DYNAMIQUE / INTENS MT 1600CC AA 16V 2AB</td>

            <td class="">Maria</td>

            <td class="text-center">

              <div class="btn-group">
              
                <button class="btn btn-primary btnEditarCotizacion" idcotizacion="" disabled="disabled">Seleccionar</button></div>

            </td>

          </tr>

        <?php

          if(isset($_GET["fechaInicialCotizaciones"])){

            $fechaInicialCotizaciones = $_GET["fechaInicialCotizaciones"];
            $fechaFinalCotizaciones = $_GET["fechaFinalCotizaciones"];

          }else{

            $fechaInicialCotizaciones = null;
            $fechaFinalCotizaciones = null;

          }

          $respuesta = ControladorCotizaciones::ctrRangoFechasCotizaciones($fechaInicialCotizaciones, $fechaFinalCotizaciones);

          foreach ($respuesta as $key => $value) {
           
           echo '<tr>

                  <td class="text-center">'. $value['id_cotizacion'] .'</td>

                  <td class="text-center">' . date('Y/m/d', strtotime($value['cot_fch_cotizacion'])) . '</td>

                  <td class="text-right">' . $value['cli_num_documento'] . '</td>

                  <td class="text-right">' . $value['cli_nombre'] . ' ' . $value['cli_apellidos'] . '</td>';

                  $placa = $value['cot_placa'] == "KZY000" ? "SIN PLACA" : $value['cot_placa'];
                  echo '<td class="text-center">' . $placa . '</td>

                  <td class="">' . $value['cot_marca'] . ' ' . $value['cot_linea'] . '</td>

                  <td class="">' . $value['usu_nombre'] . ' ' . $value['usu_apellido'] . '</td>

                  <td class="text-center">

                    <div class="btn-group">
                    
                      <button class="btn btn-primary btnEditarCotizacion" idCotizacion="'.$value["id_cotizacion"].'">Seleccionar</button>';

                      if($_SESSION["rol"] == 1){

                      echo '<button class="btn btn-danger btnEliminarCotizacion" idCotizacion="'.$value["id_cotizacion"].'"><i class="fa fa-times"></i></button>';

                    }

                    echo '</div>

                  </td>

                </tr>';
            }

        ?>
               
        </tbody>

       </table>

       <?php

      $eliminarCotizacion = new ControladorCotizaciones();
      $eliminarCotizacion -> ctrEliminarCotizacion();

      ?>
      

      </div>

    </div>

  </section>

</div>
