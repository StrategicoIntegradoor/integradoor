<?php

if ($_SESSION["rol"] != 1 && $_SESSION["rol"] != 2) {

    echo '<script>

    window.location = "inicio";

  </script>';

    return;
}

?>

<style>
    th {
        border: 0 !important;
    }
    ul {
        padding-left: 0;
    }
    li {
        text-align: start;
        list-style: none;
    }
</style>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Ayuda Ventas</h1>

        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Ayuda Ventas</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-body">
                <!-- Form -->
                <form action="javascript:void(0);" class="form-editar-ayuda-venta" style="display: none; ">
                    
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <h4>Centros de inspección</h4>
                            <div id="centros_de_inspeccion"></div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <h4>Continuidades</h4>
                            <div id="continuidades"></div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <h4>Formas De Pago</h4>
                            <div id="formas_de_pago"></div>
                        </div>
                    </div>

                    <input type="hidden" id="aseguradora">
                    <input type="hidden" id="id_ayuda_venta">
                    <div class="row">
                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                            <label>Linea de atención</label>
                            <input type="text" class="form-control" id="linea_atencion">
                        </div>
                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                            <label>Link Clausulado</label>
                            <input type="text" class="form-control" id="clausulado">
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                            <label>Sarlaft PN</label>
                            <input type="file" class="form-control" id="sarlaft">
                        </div>
                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                            <label>Sarlaft PJ</label>
                            <input type="file" class="form-control" id="sarlaft2">
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                            <label>Continuidad</label>  
                            <input type="text" class="form-control" id="continuidad">
                            <button id="agregarContinuidad">Agregar Continuidad</button>
                        </div>
                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                            <label>Centro de inspección</label>
                            <input type="text" class="form-control" id="centro_inspeccion">
                            <button id="agregarCentroDeInspeccion">Agregar Centro</button>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                            <label>Formas de pago</label>
                            <input type="text" class="form-control" id="forma_de_pago"></textarea>
                            <button id="agregarFormaDePago">Agregar Forma De Pago</button>
                        </div>
                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                            <label>Tips de expedición</label>
                            <input type="text" class="form-control" id="tips_expedicion">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                            <button 
                                id="editarAyudaVenta"
                                class="btn btn-primary"
                            >
                                Editar
                            </button>
                        </div>
                    </div>
                </form>
                <!-- END Form -->

                <table class="table table-bordered table-striped dt-responsive tablas-asistencias" width="100%">
                    <thead style="background: #88d600; color: #FFF; ">
                        <tr>
                            <th style="text-align: center">Aseguradora</th>
                            <th style="text-align: center">Linea de atención</th>
                            <th style="text-align: center">Clausulado</th>
                            <th style="text-align: center">Sarlaft PN</th>
                            <th style="text-align: center">Sarlaft PJ</th>
                            <th style="text-align: center">Centro de inspección</th>
                            <th style="text-align: center">Continuidad</th>
                            <th style="text-align: center">Formas de pago</th>
                            <th style="text-align: center">Tips de expedición</th>
                            <th style="text-align: center">Editar</th>
                        </tr>
                    </thead>
                    <tbody class="ayuda-ventas-body">
                    </tbody>
                </table>
            </div>

            <!-- <div style="margin-left: 1em; padding-bottom: 1em;">
                <p>* PN: Persona natural. PJ: Persona Jurídica</p>
                <p>
                    <b>Sarlaft general PN PDF: </b>
                    <input type="file" name="" id="sarlaft-pn">
                    <button id="subirpn">Subir PDF</button>
                <p>
                <p>
                    <b>Sarlaft general PJ PDF: </b>
                    <input type="file" name="" id="sarlaft-pj">
                    <button id="subirpj">Subir PDF</button>
                <p>
            </div> -->
        </div>
    </section>
</div>

<script src="./vistas/modulos/AyudaVentas/ayuda-ventas.js"></script>
