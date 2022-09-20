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
                    <tbody>
                        <tr>
                            <td><img src="vistas/img/logos/allianz.png" class="img-responsive" width="80"></td>
                            <td>#265</td>
                            <td>PDF</td>
                            <td>PDF</td>
                            <td>
                                <ul>
                                    <li>- Automas</li>
                                    <li>- Colserautos</li>
                                </ul>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><img src="vistas/img/logos/solidaria.png" class="img-responsive" width="80"></td>
                            <td>#789</td>
                            <td>PDF</td>
                            <td>PDF</td>
                            <td>
                                <ul>
                                    <li>- Automas</li>
                                </ul>
                            </td>
                            <td>
                                <ul>
                                    <li>Modelos hasta 7 años para particulares</li>
                                    <li>Documentos: póliza vigente, Sarlaft, cédula, Tarjeta de propiedad simpre</li>
                                    <li>No haber presentado siniestros en el ultimo año</li>
                                </ul>
                            </td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><img src="vistas/img/logos/axa.png" class="img-responsive" width="80"></td>
                            <td>#247</td>
                            <td>PDF</td>
                            <td></td>
                            <td>
                                <ul>
                                    <li>- Automas</li>
                                </ul>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><img src="vistas/img/logos/bolivar.png" class="img-responsive" width="80"></td>
                            <td>#322</td>
                            <td>PDF</td>
                            <td></td>
                            <td>
                                <ul>
                                    <li>- Automas</li>
                                </ul>
                            </td>
                            <td></td>
                            <td>
                                <ul>
                                    <li>- Efectivo</li>
                                    <li>- Cheque</li>
                                    <li>- Financiación directa con bolivar cuota inicial 15%</li>
                                    <li>- Debito automático</li>
                                    <li>- PSE o tarjeta de crédito</li>
                                </ul>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><img src="vistas/img/logos/equidad.png" class="img-responsive" width="80"></td>
                            <td>#324</td>
                            <td>PDF</td>
                            <td></td>
                            <td>
                                <ul>
                                    <li>- Automas</li>
                                </ul>
                            </td>
                            <td>
                                <ul>
                                    <li>- Modelos hasta 8 años para particulares</li>
                                    <li>- Documentos: póliza vigente, Sarlaft, cédula y Tarjeta de propiedad siempre</li>
                                    <li>- No haber presentado siniestros en el ultimo año</li>
                                </ul>
                            </td>
                            <td>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><img src="vistas/img/logos/hdi.png" class="img-responsive" width="80"></td>
                            <td>#204</td>
                            <td>PDF</td>
                            <td></td>
                            <td>
                                <ul>
                                    <li>- Automas</li>
                                </ul>
                            </td>
                            <td>
                                <ul>
                                    <li>- Modelos hasta 8 años para particulares</li>
                                    <li>- Documentos: póliza vigente, Sarlaft, cédula y Tarjeta de propiedad siempre</li>
                                    <li>- No haber presentado siniestros en el ultimo año</li>
                                </ul>
                            </td>
                            <td>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><img src="vistas/img/logos/liberty.png" class="img-responsive" width="80"></td>
                            <td>#224</td>
                            <td>PDF</td>
                            <td></td>
                            <td>
                                <ul>
                                    <li>- Automas</li>
                                </ul>
                            </td>
                            <td>
                                <ul>
                                    <li>- Modelos hasta 8 años para particulares</li>
                                    <li>- Documentos: póliza vigente, Sarlaft, cédula y Tarjeta de propiedad siempre</li>
                                    <li>- No haber presentado siniestros en el ultimo año</li>
                                </ul>
                            </td>
                            <td>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><img src="vistas/img/logos/mapfre.png" class="img-responsive" width="80"></td>
                            <td>#624</td>
                            <td>PDF</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><img src="vistas/img/logos/mundial.png" class="img-responsive" width="80"></td>
                            <td>#624</td>
                            <td>PDF</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><img src="vistas/img/logos/previsora.png" class="img-responsive" width="80"></td>
                            <td>#624</td>
                            <td>PDF</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><img src="vistas/img/logos/sbs.png" class="img-responsive" width="80"></td>
                            <td>#624</td>
                            <td>PDF</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><img src="vistas/img/logos/estado.png" class="img-responsive" width="80"></td>
                            <td>#624</td>
                            <td>PDF</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><img src="vistas/img/logos/sura.png" class="img-responsive" width="80"></td>
                            <td>#624</td>
                            <td>PDF</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><img src="vistas/img/logos/zurich.png" class="img-responsive" width="80"></td>
                            <td>#624</td>
                            <td>PDF</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
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