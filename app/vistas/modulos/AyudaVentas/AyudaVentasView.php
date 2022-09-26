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
                <table class="table table-bordered table-striped dt-responsive tablas-asistencias" width="100%">
                    <thead style="background: #88d600; color: #FFF;">
                        <tr>
                            <th>Aseguradora</th>
                            <th>Linea de atención</th>
                            <th>Clausulado</th>
                            <th>Sarlaft</th>
                            <th>Centro de inspección</th>
                            <th>Continuidad</th>
                            <th>Formas de pago</th>
                            <th>Tips de expedición</th>
                        </tr>
                    </thead>
                    <tbody class="ayuda-ventas-body">
                    </tbody>
                </table>
            </div>

            <div style="margin-left: 1em; padding-bottom: 1em;">
                <p>* PN: Persona natural. PJ: Persona Jurídica</p>
                <p><b>Sarlaft general PN PDF</b><p>
                <p><b>Sarlaft general PJ PDF</b><p>
            </div>
        </div>
    </section>
</div>

<script src="./vistas/modulos/AyudaVentas/ayuda-ventas.js"></script>
