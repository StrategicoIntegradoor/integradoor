<?php

if ($_SESSION["rol"] != 1) {

  echo '<script>

    window.location = "inicio";

  </script>';

  return;
}

?>

<style>

input[type="checkbox"]{
    content: "";
    width: 26px;
    height: 26px;
    border: 2px solid #ccc;
    background: #ddd;
  }
  .contentnav {
    display: table;
    justify-content: space-around;
    margin: auto;
  }

  .divBoton {
    display: flex;
    justify-content: end;
  }

  .nav-tabs>.classli>.classa {
    border: 1px solid lightgray;
    color: black;
  }


  .nav-tabs>.classli.active>.classa,
  .nav-tabs>.classli.active>.classa:focus,
  .nav-tabs>.classli.active>.classa:hover {
    color: #fff;
    cursor: default;
    background-color: #88d600;
    border: 1px solid #ddd;
    border-bottom-color: transparent;
  }

  /* Sweep To Bottom */
  .botonSel {
    display: inline-block;
    vertical-align: middle;
    -webkit-transform: perspective(1px) translateZ(0);
    transform: perspective(1px) translateZ(0);
    box-shadow: 0 0 1px rgba(0, 0, 0, 0);
    position: relative;
    -webkit-transition-property: color;
    transition-property: color;
    -webkit-transition-duration: 0.3s;
    transition-duration: 0.3s;
  }

  .botonSel:before {
    content: "";
    position: absolute;
    z-index: -1;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: #88d600;
    -webkit-transform: scaleY(0);
    transform: scaleY(0);
    -webkit-transform-origin: 50% 0;
    transform-origin: 50% 0;
    -webkit-transition-property: transform;
    transition-property: transform;
    -webkit-transition-duration: 0.3s;
    transition-duration: 0.3s;
    -webkit-transition-timing-function: ease-out;
    transition-timing-function: ease-out;
  }

  .botonSel:hover,
  .botonSel:focus,
  .botonSel:active {
    color: white;
  }

  .botonSel:hover:before,
  .botonSel:focus:before,
  .botonSel:active:before {
    -webkit-transform: scaleY(1);
    transform: scaleY(1);
  }
</style>

<div class="box" style="margin-left: 50px;">
  <section class="content-header">

    <h1>

      <b>Mi Perfil</b>

    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Perfil</li>

    </ol>

  </section>
  <section class="container-fluid">
    <div class="box">
      <div class="box-header with-border ">
        <div class="row">
          <div class="col-md-3">
            <div class="info">
              <div class="avatar-wrapper" style="text-align: center;">
                <img class="profile-pic " src="vistas/img/usuarios/default/anonymous.png" width="80%" height="80%">
                <label class="btn btn-primary">
                  <input type="file" name="ImgInter" id="ImgInter" style="display:none;" />
                  Subir archivo
                </label>
                <input type="text" style="display: none;" id="fotoActual">
              </div>
            </div>
          </div>
          <div class="col-md-8">
            <div clas="row" style="margin-bottom: 30px;">
              <b style="font-size: 40px">Informacion General</b>
            </div>
            <div class="row" style="margin-bottom: 22px;">
              <div class="col-md-3">
                <label for="">Tipo de documento:</label>
              </div>
              <div class="col-md-3">
                <select name="tip_doc" id="tip_doc">
                  <option value="1">NIT</option>
                </select>
              </div>
              <div class="col-md-3">
                <label for="">Correo Electronico:</label>
              </div>
              <div class="col-md-3">
                <input type="email" name="email" id="email">
              </div>
            </div>
            <div class="row" style="margin-bottom: 22px;">
              <div class="col-md-3">
                <label for="">No. Identificación:</label>
              </div>
              <div class="col-md-3">
                <input type="number" id="numero_identificacionInter">
              </div>
              <div class="col-md-3">
                <label for="">Dirección:</label>
              </div>
              <div class="col-md-3">
                <input type="text" name="direccion" id="direccion">
              </div>
            </div>
            <div class="row" style="margin-bottom: 22px;">
              <div class="col-md-3">
                <label for="">Razon social:</label>
              </div>
              <div class="col-md-3">
                <input type="text" id="razon">
              </div>
              <div class="col-md-3">
                <label for="">Ciudad:</label>
              </div>
              <div class="col-md-3">
                <input type="text" name="ciudad" id="ciudad">
              </div>
            </div>
            <div class="row" style="margin-bottom:22px;">
              <div class="col-md-3">
                <label for="">Nombre Representante Legal:</label>
              </div>
              <div class="col-md-3">
                <input type="text" id="repre">
              </div>
              <div class="col-md-3">
                <label for="">Nombre Persona de Contacto:</label>
              </div>
              <div class="col-md-3">
                <input type="text" name="contac" id="contac">
              </div>
            </div>
            <div class="row" style="margin-bottom: 22px;">
              <div class="col-md-3">
                <label for="">No. Identificación:</label>
              </div>
              <div class="col-md-3">
                <input type="number" id="numero_identificacion_repre">
              </div>
              <div class="col-md-3">
                <label for="">Celular:</label>
              </div>
              <div class="col-md-3">
                <input type="number" name="cel" id="cel">
              </div>
            </div>
            <div clas="row" style="margin-bottom: 30px;">
              <b style="font-size: 35px">Informacion Aseguradoras Aliadas</b>
            </div>
            <div class="row" style="margin-bottom: 30px;">
              <div class="col-md-6">
                <div class="row text-center">
                  <div class="col-md-2">
                    <span>Aseguradora</span>
                  </div>
                  <div class="col-md-2">
                    <span>Tienes clave?</span>
                  </div>
                  <div class="col-md-4">
                    <span>Claves intermediación</span>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-2">
                    <label for="">Allianz</label>
                  </div>
                  <div class="col-md-2 text-center">
                    <input type="checkbox" name="tieneAlli" id="tieneAlli">
                  </div>
                  <div class="col-md-4">
                    <input type="text" id="claveparaIAlli" disabled="disabled">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-2">
                    <label for="">Bolivar</label>
                  </div>
                  <div class="col-md-2 text-center">
                    <input type="checkbox" name="tieneBoli" id="tieneBoli">
                  </div>
                  <div class="col-md-4">
                    <input type="text" id="claveparaBoli" disabled="disabled">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-2">
                    <label for="">La Equidad</label>
                  </div>
                  <div class="col-md-2 text-center">
                    <input type="checkbox" name="tieneEqui" id="tieneEqui">
                  </div>
                  <div class="col-md-4">
                    <input type="text" id="claveparaEqui" disabled="disabled">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-2">
                    <label for="">Mapfre</label>
                  </div>
                  <div class="col-md-2 text-center">
                    <input type="checkbox" name="tieneMap" id="tieneMap">
                  </div>
                  <div class="col-md-4">
                    <input type="text" id="claveparaMap" disabled="disabled">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-2">
                    <label for="">Previsora</label>
                  </div>
                  <div class="col-md-2 text-center">
                    <input type="checkbox" name="tienePrevi" id="tienePrevi">
                  </div>
                  <div class="col-md-4">
                    <input type="text" id="claveparaPrevi" disabled="disabled">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-2">
                    <label for="">Solidaria</label>
                  </div>
                  <div class="col-md-2 text-center">
                    <input type="checkbox" name="tieneSoli" id="tieneSoli">
                  </div>
                  <div class="col-md-4">
                    <input type="text" id="claveparaSoli" disabled="disabled">
                  </div>
                </div>
              </div>
              <div class="col-md-6">
              <div class="row text-center">
                  <div class="col-md-2">
                    <span>Aseguradora</span>
                  </div>
                  <div class="col-md-2">
                    <span>Tienes clave?</span>
                  </div>
                  <div class="col-md-4">
                    <span>Claves intermediacion</span>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-2">
                    <label for="">Liberty</label>
                  </div>
                  <div class="col-md-2 text-center">
                    <input type="checkbox" name="tieneLibe" id="tieneLibe">
                  </div>
                  <div class="col-md-4">
                    <input type="text" id="claveparaLibe" disabled="disabled">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-2">
                    <label for="">Estado</label>
                  </div>
                  <div class="col-md-2 text-center">
                    <input type="checkbox" name="tieneEst" id="tieneEst">
                  </div>
                  <div class="col-md-4">
                    <input type="text" id="claveparaEst" disabled="disabled">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-2">
                    <label for="">AXA</label>
                  </div>
                  <div class="col-md-2 text-center">
                    <input type="checkbox" name="tieneAxa" id="tieneAxa">
                  </div>
                  <div class="col-md-4">
                    <input type="text" id="claveparaAxa" disabled="disabled">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-2">
                    <label for="">HDI</label>
                  </div>
                  <div class="col-md-2 text-center">
                    <input type="checkbox" name="tienehdi" id="tienehdi" >
                  </div>
                  <div class="col-md-4">
                    <input type="text" id="claveparahdi" disabled="disabled">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-2">
                    <label for="">SBS</label>
                  </div>
                  <div class="col-md-2 text-center">
                    <input type="checkbox" name="tienesbs" id="tienesbs">
                  </div>
                  <div class="col-md-4">
                    <input type="text" id="claveparasbs" disabled="disabled">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-2">
                    <label for="">Zurich</label>
                  </div>
                  <div class="col-md-2 text-center">
                    <input type="checkbox" name="tienezuri" id="tienezuri">
                  </div>
                  <div class="col-md-4">
                    <input type="text" id="claveparazuri" disabled="disabled" >
                  </div>
                </div>
              </div>
            </div>
            <div class="row" style="margin: 10px;">
              <div class="col-md-12 divBoton">
                <button class="btn btn-primary" onclick="guardarInfoInter()" style="color: black"><strong>Actualizar</strong></button>
              </div>
            </div>
            <div clas="row" style="margin-bottom: 30px;">
              <b style="font-size: 20px">Credenciales Webservice</b>
            </div>

            <!-- ::::::::::::::::CABEZOTE CON NAVEGACION::::::::::::::::::::::::::::::::::::::::::::::: -->
            <div class="row" style="margin:auto;">
              <div class="col-12 ">
                <ul class="nav nav-tabs contentnav">
                  <li role="presentation" class="classli active" id="ballili"><a class="classa" id="balli">Allianz</a></li>
                  <li role="presentation" class="classli" id="bbolili"><a class="classa" id="bboli">Bolivar</a></li>
                  <li role="presentation" class="classli" id="bequili"><a class="classa" id="bequi">La Equidad</a></li>
                  <li role="presentation" class="classli" id="bmapli"><a class="classa" id="bmap">Mapfre</a></li>
                  <li role="presentation" class="classli" id="bprevili"><a class="classa" id="bprevi">Previsora</a></li>
                  <li role="presentation" class="classli" id="bsolili"><a class="classa" id="bsoli">Solidaria</a></li>
                  <li role="presentation" class="classli" id="blibeli"><a class="classa" id="blibe">Liberty</a></li>
                  <li role="presentation" class="classli" id="bestali"><a class="classa" id="besta">Estado</a></li>
                  <li role="presentation" class="classli" id="baxali"><a class="classa" id="baxa">AXA</a></li>
                  <li role="presentation" class="classli" id="bhdili"><a class="classa" id="bhdi">HDI</a></li>
                  <li role="presentation" class="classli" id="bsbsli"><a class="classa" id="bsbs">SBS</a></li>
                  <li role="presentation" class="classli" id="bzurili"><a class="classa" id="bzuri">Zurich</a></li>
                </ul>
              </div>
              <div class="row" id="allianzdiv">
                <div class="col-md-12">
                  <div class="row" style="display: flex;">
                    <div class="col-md-12" style="background-color: #88d600; color: white; width: 100%;">
                      <h4>Credenciales Allianz</h4>
                    </div>
                  </div>
                  <div class="row" style="padding:10px; border: 1px solid #ddd;">
                    <div class="col-md-12">
                      <div class="row" style="margin-bottom: 10px;margin-top: 5px;">
                        <div class="col-md-3">
                          <label for="">Contraseña:</label>
                        </div>
                        <div class="col-md-3">
                          <input type="text" id="contraseñaAlli" disabled="disabled">
                        </div>
                        <div class="col-md-3">
                          <label for="">Id Partner:</label>
                        </div>
                        <div class="col-md-3">
                          <input type="text" name="contac" id="idPartAlli" disabled="disabled">
                        </div>
                      </div>
                      <div class="row" style="margin-bottom: 10px;">
                        <div class="col-md-3">
                          <label for="">Id Agente:</label>
                        </div>
                        <div class="col-md-3">
                          <input type="text" id="idagentAlli" disabled="disabled">
                        </div>
                        <div class="col-md-3">
                          <label for="">Codigo Partner:</label>
                        </div>
                        <div class="col-md-3">
                          <input type="text" name="contac" id="codigoPartAlli" disabled="disabled">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-3" style="margin-bottom: 10px;">
                          <label for="">Codigo Agente:</label>
                        </div>
                        <div class="col-md-3">
                          <input type="text" id="codigoagenAlli" disabled="disabled">
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- <div class="row" style="margin: 10px;">
                    <div class="col-md-12 divBoton">
                      <button class="btn btn-primary" onclick="guardarcredenAlli()">Guardar</button>
                    </div>
                  </div> -->
                </div>
              </div>
              <div class="row" id="bolivardiv" style="display: none;">
                <div class="col-md-12">
                  <div class="row" style="display: flex;">
                    <div class="col-md-12" style="background-color: #88d600; color: white; width: 100%;">
                      <h4>Credenciales Bolivar</h4>
                    </div>
                  </div>
                  <div class="row" style="padding:10px; border: 1px solid #ddd;">
                    <div class="col-md-12">
                      <div class="row" style="margin-bottom: 10px;margin-top: 5px;">
                        <div class="col-md-3">
                          <label for="">Api Key</label>
                        </div>
                        <div class="col-md-3">
                          <input type="text" id="apikeyBo" disabled="disabled">
                        </div>
                        <div class="col-md-3">
                          <label for="">Clave Asesor:</label>
                        </div>
                        <div class="col-md-3">
                          <input type="text " name="contac" id="ClaveABo" disabled="disabled">
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- <div class="row" style="margin: 10px;">
                    <div class="col-md-12 divBoton">
                      <button class="btn btn-primary" onclick="guardarcredenBoli()">Guardar</button>
                    </div>

                  </div> -->

                </div>
              </div>
              <div class="row" id="equidaddiv" style="display: none;">
                <div class="col-md-12">
                  <div class="row" style="display: flex;">
                    <div class="col-md-12" style="background-color: #88d600; color: white; width: 100%;">
                      <h4>Credenciales Equidad</h4>
                    </div>
                  </div>
                  <div class="row" style="padding:10px; border: 1px solid #ddd;">
                    <div class="col-md-12">
                      <div class="row" style="margin-bottom: 10px;margin-top: 5px;">
                        <div class="col-md-3">
                          <label for="">Usuario:</label>
                        </div>
                        <div class="col-md-3">
                          <input type="text" id="usuEqui" disabled="disabled">
                        </div>
                        <div class="col-md-3">
                          <label for="">Contraseña:</label>
                        </div>
                        <div class="col-md-3">
                          <input type="password" name="contraseñaEqui" id="contraseñaEqui" disabled="disabled">
                        </div>
                      </div>
                      <div class="row" style="margin-bottom: 10px;margin-top: 5px;">
                        <div class="col-md-3">
                          <label for="">Codigo Sucursal</label>
                        </div>
                        <div class="col-md-3">
                          <input type="text" id="codSucuEqui" disabled="disabled">
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- <div class="row" style="margin: 10px;">
                    <div class="col-md-12 divBoton">
                      <button class="btn btn-primary" onclick="guardarcredenEqui()">Guardar</button>
                    </div>

                  </div> -->

                </div>
              </div>
              <div class="row" id="mapfrediv" style="display: none;">
                <div class="col-md-12">
                  <div class="row" style="display: flex;">
                    <div class="col-md-12" style="background-color: #88d600; color: white; width: 100%;">
                      <h4>Credenciales Mapfre</h4>
                    </div>
                  </div>
                  <div class="row" style="padding:10px; border: 1px solid #ddd;">
                    <div class="col-md-12">
                      <div class="row" style="margin-bottom: 10px;margin-top: 5px;">
                        <div class="col-md-6">
                          <label for="">Ups, no hay nada que mostrar</label>
                        </div>

                      </div>
                    </div>
                  </div>
                  <!-- <div class="row" style="margin: 10px;">
                    <div class="col-md-12 divBoton">
                      <button class="btn btn-primary" disabled="disabled" onclick="guardarcredenMap()">Guardar</button>
                    </div>

                  </div> -->

                </div>
              </div>
              <div class="row" id="previsoradiv" style="display: none;">
                <div class="col-md-12">
                  <div class="row" style="display: flex;">
                    <div class="col-md-12" style="background-color: #88d600; color: white; width: 100%;">
                      <h4>Credenciales Previsora</h4>
                    </div>
                  </div>
                  <div class="row" style="padding:10px; border: 1px solid #ddd;">
                    <div class="col-md-12">
                      <div class="row" style="margin-bottom: 10px;margin-top: 5px;">
                        <div class="col-md-6">
                          <label for="">Ups, no hay nada que mostrar</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- <div class="row" style="margin: 10px;">
                    <div class="col-md-12 divBoton">
                      <button class="btn btn-primary" onclick="guardarcredenPrevi()" disabled>Guardar</button>
                    </div>

                  </div> -->

                </div>
              </div>
              <div class="row" id="solidariadiv" style="display: none;">
                <div class="col-md-12">
                  <div class="row" style="display: flex;">
                    <div class="col-md-12" style="background-color: #88d600; color: white; width: 100%;">
                      <h4>Credenciales Solidaria</h4>
                    </div>
                  </div>
                  <div class="row" style="padding:10px; border: 1px solid #ddd;">
                    <div class="col-md-12">
                      <div class="row" style="margin-bottom: 10px;margin-top: 5px;">
                        <div class="col-md-3">
                          <label for="">Codigo Sucursal:</label>
                        </div>
                        <div class="col-md-3">
                          <input type="text" id="codSucuSoli" disabled="disabled">
                        </div>
                        <div class="col-md-3">
                          <label for="">Codigo Persona:</label>
                        </div>
                        <div class="col-md-3">
                          <input type="text" name="contac" id="codPerSoli" disabled="disabled">
                        </div>
                      </div>
                      <div class="row" style="margin-bottom: 10px;margin-top: 5px;">
                        <div class="col-md-3">
                          <label for="">Tipo Agente:</label>
                        </div>
                        <div class="col-md-3">
                          <input type="text" id="tipAgeSoli" disabled="disabled">
                        </div>
                        <div class="col-md-3">
                          <label for="">Codigo Agente:</label>
                        </div>
                        <div class="col-md-3">
                          <input type="text" name="codigoAgeSoli" id="codigoAgeSoli" disabled="disabled">
                        </div>
                      </div>
                      <div class="row" style="margin-bottom: 10px;margin-top: 5px;">
                        <div class="col-md-3">
                          <label for="">Codigo Punto de venta:</label>
                        </div>
                        <div class="col-md-3">
                          <input type="text" id="codPunVenSoli" disabled="disabled">
                        </div>
                        <div class="col-md-3">
                          <label for="">Grant Type:</label>
                        </div>
                        <div class="col-md-3">
                          <input type="text" name="contac" id="grantTypeSoli" disabled="disabled">
                        </div>
                      </div>
                      <div class="row" style="margin-bottom: 10px;margin-top: 5px;">
                        <div class="col-md-3">
                          <label for="">Cookie:</label>
                        </div>
                        <div class="col-md-3">
                          <input type="text" id="cookieSoli" disabled="disabled">
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- <div class="row" style="margin: 10px;">
                    <div class="col-md-12 divBoton">
                      <button class="btn btn-primary" onclick="guardarcredenSoli()">Guardar</button>
                    </div>

                  </div> -->

                </div>
              </div>
              <div class="row" id="libertydiv" style="display: none;">
                <div class="col-md-12">
                  <div class="row" style="display: flex;">
                    <div class="col-md-12" style="background-color: #88d600; color: white; width: 100%;">
                      <h4>Credenciales Liberty</h4>
                    </div>
                  </div>
                  <div class="row" style="padding:10px; border: 1px solid #ddd;">
                    <div class="col-md-12">
                      <div class="row" style="margin-bottom: 10px;margin-top: 5px;">
                        <div class="col-md-3">
                          <label for="">Cookie Token:</label>
                        </div>
                        <div class="col-md-3">
                          <input type="text" id="cookieToLibe" disabled="disabled">
                        </div>
                        <div class="col-md-3">
                          <label for="">Cookie Peticion:</label>
                        </div>
                        <div class="col-md-3">
                          <input type="text" name="contac" id="cookieReLibe" disabled="disabled">
                        </div>
                      </div>
                      <div class="row" style="margin-bottom: 10px;margin-top: 5px;">
                        <div class="col-md-3">
                          <label for="">Autorización:</label>
                        </div>
                        <div class="col-md-3">
                          <input type="text" id="autoLibe" disabled="disabled">
                        </div>
                        <div class="col-md-3">
                          <label for="">Codigo Agente:</label>
                        </div>
                        <div class="col-md-3">
                          <input type="text" name="contac" id="codigoAgenLibe" disabled="disabled">
                        </div>
                      </div>
                      <div class="row" style="margin-bottom: 10px;margin-top: 5px;">
                        <div class="col-md-3">
                          <label for="">Aplicacion Cliente:</label>
                        </div>
                        <div class="col-md-3">
                          <input type="text" id="ApliCliLibe" disabled="disabled">
                        </div>
                        <div class="col-md-3">
                          <label for="">Ip:</label>
                        </div>
                        <div class="col-md-3">
                          <input type="text" name="contac" id="ipLibe" disabled="disabled">
                        </div>
                      </div>
                      <div class="row" style="margin-bottom: 10px;margin-top: 5px;">
                        <div class="col-md-3">
                          <label for="">Id Request:</label>
                        </div>
                        <div class="col-md-3">
                          <input type="text" id="idRequeLibe" disabled="disabled">
                        </div>
                        <div class="col-md-3">
                          <label for="">Terminal:</label>
                        </div>
                        <div class="col-md-3">
                          <input type="text" name="contac" id="termilibe" disabled="disabled">
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- <div class="row" style="margin: 10px;">
                    <div class="col-md-12 divBoton">
                      <button class="btn btn-primary" onclick="guardarcredenLiberty()">Guardar</button>
                    </div>

                  </div> -->

                </div>
              </div>
              <div class="row" id="estadodiv" style="display: none;">
                <div class="col-md-12">
                  <div class="row" style="display: flex;">
                    <div class="col-md-12" style="background-color: #88d600; color: white; width: 100%;">
                      <h4>Credenciales Estado</h4>
                    </div>
                  </div>
                  <div class="row" style="padding:10px; border: 1px solid #ddd;">
                    <div class="col-md-12">
                      <div class="row" style="margin-bottom: 10px;margin-top: 5px;">
                        <div class="col-md-3">
                          <label for="">Usuario:</label>
                        </div>
                        <div class="col-md-3">
                          <input type="text" id="usuEst" disabled="disabled">
                        </div>
                        <div class="col-md-3">
                          <label for="">Contraseña:</label>
                        </div>
                        <div class="col-md-3">
                          <input type="password" name="contac" id="ContraLibe" disabled="disabled">
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- <div class="row" style="margin: 10px;">
                    <div class="col-md-12 divBoton">
                      <button class="btn btn-primary" onclick="guardarcredenEst()">Guardar</button>
                    </div>

                  </div> -->

                </div>
              </div>
              <div class="row" id="axadiv" style="display: none;">
                <div class="col-md-12">
                  <div class="row" style="display: flex;">
                    <div class="col-md-12" style="background-color: #88d600; color: white; width: 100%;">
                      <h4>Credenciales Axa</h4>
                    </div>
                  </div>
                  <div class="row" style="padding:10px; border: 1px solid #ddd;">
                    <div class="col-md-12">
                      <div class="row" style="margin-bottom: 10px;margin-top: 5px">
                        <div class="col-md-3">
                          <label for="">Contraseña:</label>
                        </div>
                        <div class="col-md-3">
                          <input type="password" id="contraseñaaxa" disabled="disabled">
                        </div>
                        <div class="col-md-3">
                          <label for="">Codigo Distribuidor:</label>
                        </div>
                        <div class="col-md-3">
                          <input type="text" name="contac" id="codigodistriaxa" disabled="disabled">
                        </div>
                      </div>
                      <div class="row" style="margin-bottom: 10px;margin-top: 5px">
                        <div class="col-md-3">
                          <label for="">Tipo Distribuidor:</label>
                        </div>
                        <div class="col-md-3">
                          <input type="text" id="tipdistriaxa" disabled="disabled">
                        </div>
                        <div class="col-md-3">
                          <label for="">Codigo Ciudad:</label>
                        </div>
                        <div class="col-md-3">
                          <input type="text" name="contac" id="codCiuaxa" disabled="disabled">
                        </div>
                      </div>
                      <div class="row" style="margin-bottom: 10px;margin-top: 5px">
                        <div class="col-md-3">
                          <label for="">Canal:</label>
                        </div>
                        <div class="col-md-3">
                          <input type="text" id="canalaxa" disabled="disabled">
                        </div>
                        <div class="col-md-3">
                          <label for="">Validacion de Eventos:</label>
                        </div>
                        <div class="col-md-3">
                          <input type="text" name="contac" id="valEveaxa" disabled="disabled">
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- <div class="row" style="margin: 10px;">
                    <div class="col-md-12 divBoton">
                      <button class="btn btn-primary" onclick="guardarcredenAxa()">Guardar</button>
                    </div>

                  </div> -->

                </div>
              </div>
              <div class="row" id="hdidiv" style="display: none;">
                <div class="col-md-12">
                  <div class="row" style="display: flex;">
                    <div class="col-md-12" style="background-color: #88d600; color: white; width: 100%;">
                      <h4>Credenciales HDI</h4>
                    </div>
                  </div>
                  <div class="row" style="padding:10px; border: 1px solid #ddd;">
                    <div class="col-md-12">
                      <div class="row" style="margin-bottom: 10px;margin-top: 5px">
                        <div class="col-md-3">
                          <label for="">Codigo Sucursal:</label>
                        </div>
                        <div class="col-md-3">
                          <input type="text" id="codSucurhdi" disabled="disabled">
                        </div>
                        <div class="col-md-3">
                          <label for="">Codigo Agente:</label>
                        </div>
                        <div class="col-md-3">
                          <input type="text" name="contac" id="codigoagenhdi" disabled="disabled">
                        </div>
                      </div>
                      <div class="row" style="margin-bottom: 10px;margin-top: 5px">
                        <div class="col-md-3">
                          <label for="">Usuario:</label>
                        </div>
                        <div class="col-md-3">
                          <input type="text" id="usuhdi" disabled="disabled">
                        </div>
                        <div class="col-md-3">
                          <label for="">Contraseña:</label>
                        </div>
                        <div class="col-md-3">
                          <input type="password" name="contac" id="contraseñahdi" disabled="disabled">
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- <div class="row" style="margin: 10px;">
                    <div class="col-md-12 divBoton">
                      <button class="btn btn-primary" onclick="guardarcredenHdi()">Guardar</button>
                    </div>

                  </div> -->

                </div>
              </div>
              <div class="row" id="sbsdiv" style="display: none;">
                <div class="col-md-12">
                  <div class="row" style="display: flex;">
                    <div class="col-md-12" style="background-color: #88d600; color: white; width: 100%;">
                      <h4>Credenciales SBS</h4>
                    </div>
                  </div>
                  <div class="row" style="padding:10px; border: 1px solid #ddd;">
                    <div class="col-md-12">
                      <div class="row" style="margin-bottom: 10px;margin-top: 5px">
                        <div class="col-md-3">
                          <label for="">Usuario:</label>
                        </div>
                        <div class="col-md-3">
                          <input type="text" id="ususbs" disabled="disabled">
                        </div>
                        <div class="col-md-3">
                          <label for="">Contraseña:</label>
                        </div>
                        <div class="col-md-3">
                          <input type="password" name="contac" id="contraseñasbs" disabled="disabled">
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- <div class="row" style="margin: 10px;">
                    <div class="col-md-12 divBoton">
                      <button class="btn btn-primary" onclick="guardarcredenSbs()">Guardar</button>
                    </div>

                  </div> -->

                </div>
              </div>
              <div class="row" id="zuridiv" style="display: none;">
                <div class="col-md-12">
                  <div class="row" style="display: flex;">
                    <div class="col-md-12" style="background-color: #88d600; color: white; width: 100%;">
                      <h4>Credenciales Zurich</h4>
                    </div>
                  </div>
                  <div class="row" style="padding:10px; border: 1px solid #ddd;">
                    <div class="col-md-12">
                      <div class="row" style="margin-bottom: 10px;margin-top: 5px">
                        <div class="col-md-3">
                          <label for="">Usuario:</label>
                        </div>
                        <div class="col-md-3">
                          <input type="text" id="usuzur" disabled="disabled">
                        </div>
                        <div class="col-md-3">
                          <label for="">Contraseña:</label>
                        </div>
                        <div class="col-md-3">
                          <input type="password" name="contac" id="contraseñazur" disabled="disabled">
                        </div>
                      </div>
                      <div class="row" style="margin-bottom: 10px;margin-top: 5px">
                        <div class="col-md-3">
                          <label for="">Correo:</label>
                        </div>
                        <div class="col-md-3">
                          <input type="text" id="correozur" disabled="disabled">
                        </div>
                        <div class="col-md-3">
                          <label for="">Cookie:</label>
                        </div>
                        <div class="col-md-3">
                          <input type="text" name="contac" id="cookiezur" disabled="disabled">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- <div class="row" style="margin: 10px;">
                  <div class="col-md-12 divBoton">
                    <button class="btn btn-primary" onclick="guardarcredenZuri()">Guardar</button>
                  </div>
                </div> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
</section>
</div>





<!-- scrip -->

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="vistas/js/intermediario.js?v=<?php echo (rand()); ?>"></script>