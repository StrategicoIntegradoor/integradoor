<?php

if ($_SESSION["rol"] != 1) {

  echo '<script>

    window.location = "inicio";

  </script>';

  return;

}

?>

<style>
  

.contentnav{
  display: flex;
  justify-content:space-around;
  align-items: center;
}

.divBoton {
  display: flex;
  justify-content:end;
}

.nav-tabs>.classli>.classa {
  border: 1px solid lightgray;
  color: black;
}


.nav-tabs>.classli.active>.classa, .nav-tabs>.classli.active>.classa:focus, .nav-tabs>.classli.active>.classa:hover{
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
.botonSel:hover, .botonSel:focus, .botonSel:active {
  color: white;
}
.botonSel:hover:before, .botonSel:focus:before, .botonSel:active:before {
  -webkit-transform: scaleY(1);
  transform: scaleY(1);
}
</style>

<div class="content-flex" style="margin-left: 40px;">
    <section class="content-header">
    
        <h1>
    
            <b>Mi Perfil</b>
    
        </h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

            <li class="active">Perfil</li>
    
        </ol>

    </section>
    <section class="content">
        <div class="box row">
            <div class="box-header with-border ">
                <div class="row" >
                    <div class="col-md-3">
                        <div class="info">
                            <div class="avatar-wrapper">
                                <img class="profile-pic" src="https://www.grupoasistencia.com/autogestionpro/Assets/images/default-image.png">
                                <input class="file-upload" name="file-upload" id="file-upload" type="file" accept="image/*">
                                <div class="upload-button">
                                    <i class="fa fa-camera-retro" aria-hidden="true"></i>
                                </div>
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
                                <input type="number" id="numero_identificacion">
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
                        <div clas="row" style="margin-bottom: 30px;">
                            <b style="font-size: 20px">Administracion de claves</b> 
                        </div>

                        <!-- ::::::::::::::::CABEZOTE CON NAVEGACION::::::::::::::::::::::::::::::::::::::::::::::: -->
                        <div class="row">
                          <div class="col-md-12 ">
                            <ul class="nav nav-tabs contentnav">
                              <li role="presentation" class="classli" id="ballili"><a class="classa" id="balli">Allianz</a></li>
                              <li role="presentation" class="classli" id="bbolili"><a class="classa" id="bboli">Bolivar</a></li>
                              <li role="presentation" class="classli" id="bequili"><a class="classa"  id="bequi">La Equidad</a></li>
                              <li role="presentation" class="classli" id="bmapli"><a  class="classa" id="bmap">Mapfre</a></li>
                              <li role="presentation" class="classli" id="bprevili"><a class="classa"   id="bprevi">Previsora</a></li>
                              <li role="presentation" class="classli" id="bsolili"><a class="classa"  id="bsoli">Solidaria</a></li>
                              <li role="presentation" class="classli" id="blibeli"><a class="classa"  id="blibe">Liberty</a></li>
                              <li role="presentation" class="classli" id="bestali"><a class="classa"  id="besta">Estado</a></li>
                              <li role="presentation" class="classli" id="baxali"><a  class="classa"id="baxa">AXA</a></li>
                              <li role="presentation" class="classli" id="bhdili"><a  class="classa"id="bhdi">HDI</a></li>
                              <li role="presentation" class="classli" id="bsbsli"><a  class="classa"id="bsbs">SBS</a></li>
                              <li role="presentation" class="classli" id="bzurili"><a class="classa" id="bzuri">Zurich</a></li>
                            </ul>
                          </div>

                          
                        </div>
                        <div class="row" id="allianzdiv" style="display: none;">
                          <div class="col-md-12">
                            <div class="row"  style="display: flex;">
                              <div class="col-md-12" style="background-color: #88d600; color: white; width: 100%;">
                                <h4>Credenciales Allianz</h4>
                              </div>
                            </div>
                            <div class="row" style="border: 1px solid #ddd;">
                              <div class="col-md-12">
                                <div class="row" style="margin-top: 10px; padding: 10px;">
                                  <div class="col-md-6" style="display: flex; justify-content:center;   align-items: center;">
                                    <label for="">Ssl Certfile:</label>
                                  </div>
                                  <div class="col-md-6" style="display: flex; justify-content:center;">
                                    <label for="">Ssl Keyfile:</label>
                                  </div>
                                  <div class="row" style="margin-top: 10px; padding: 10px;">
                                    <div class="col-md-6" style="display: flex; justify-content:center;   align-items: center;">
                                      <input type="file" id="repre">
                                    </div>
                                    <div class="col-md-6" style="display: flex; justify-content:center;">
                                      <input type="file" name="contac" id="contac">
                                    </div>
                                  </div>
                                  <div class="row" style="margin-top: 10px; padding: 10px;">
                                    <div class="col-md-6" style="display: flex; justify-content:center;   align-items: center;">
                                      <label for="">Contraseña:</label>
                                    </div>
                                    <div class="col-md-6" style="display: flex; justify-content:center;">
                                      <label for="">Id Partner:</label>
                                    </div>
                                  </div>
                                  <div class="row" style="margin-top: 10px; padding: 10px;">
                                    <div class="col-md-6" style="display: flex; justify-content:center;   align-items: center;">
                                      <input type="text" id="repre">
                                    </div>
                                    <div class="col-md-6" style="display: flex; justify-content:center;">
                                      <input type="text" name="contac" id="contac">
                                    </div>
                                  </div>
                                  <div class="row" style="margin-top: 10px; padding: 10px;">
                                    <div class="col-md-6" style="display: flex; justify-content:center;   align-items: center;">
                                      <label for="">Codigo Agente:</label>
                                    </div>
                                    <div class="col-md-6" style="display: flex; justify-content:center;">
                                      <label for="">Codigo Partner:</label>
                                    </div>
                                  </div>
                                  <div class="row" style="margin-top: 10px; padding: 10px;">
                                    <div class="col-md-6" style="display: flex; justify-content:center;   align-items: center;">
                                      <input type="text" id="repre">
                                    </div>
                                    <div class="col-md-6" style="display: flex; justify-content:center;">
                                      <input type="text" name="contac" id="contac">
                                    </div>
                                  </div>
                                  <div class="row" style="margin-top: 10px; padding: 10px;">
                                    <div class="col-md-6" style="display: flex; justify-content:center;   align-items: center;">
                                      <label for="">Codigo Agente:</label>
                                    </div>
                                  </div>
                                  <div class="row" style="margin-top: 10px; padding: 10px;">
                                    <div class="col-md-6" style="display: flex; justify-content:center;   align-items: center;">
                                      <input type="text" id="repre">
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row" style="margin: 10px;">
                              <div class="col-md-12 divBoton">
                                <button class="btn btn-primary">Guardar</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row" id="bolivardiv" style="display: none;">
                          <div class="col-md-12">
                            <div class="row"  style="display: flex;">
                              <div class="col-md-12" style="background-color: #88d600; color: white; width: 100%;">
                                <h4>Credenciales Bolivar</h4>
                              </div>
                            </div>
                            <div class="row" style="border: 1px solid #ddd;">
                              <div class="col-md-12">
                                <div class="row" style="margin-top: 10px; padding: 10px;">
                                  <div class="col-md-6" style="display: flex; justify-content:center;   align-items: center;">
                                    <label for="">Api Key</label>
                                  </div>
                                  <div class="col-md-6" style="display: flex; justify-content:center;">
                                    <label for="">Clave Asesor:</label>
                                  </div>
                                  <div class="row" style="margin-top: 10px; padding: 10px;">
                                    <div class="col-md-6" style="display: flex; justify-content:center;   align-items: center;">
                                      <input type="text" id="repre">
                                    </div>
                                    <div class="col-md-6" style="display: flex; justify-content:center;">
                                      <input type="text " name="contac" id="contac">
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row" style="margin: 10px;">
                              <div class="col-md-12 divBoton">
                                <button class="btn btn-primary">Guardar</button>
                              </div>

                            </div>
                            
                          </div>
                        </div>
                        <div class="row" id="equidaddiv" style="display: none;">
                          <div class="col-md-12">
                            <div class="row"  style="display: flex;">
                              <div class="col-md-12" style="background-color: #88d600; color: white; width: 100%;">
                                <h4>Credenciales Equidad</h4>
                              </div>
                            </div>
                            <div class="row" style="border: 1px solid #ddd;">
                              <div class="col-md-12">
                                <div class="row" style="margin-top: 10px; padding: 10px;">
                                  <div class="col-md-6" style="display: flex; justify-content:center;   align-items: center;">
                                    <label for="">Usuario:</label>
                                  </div>
                                  <div class="col-md-6" style="display: flex; justify-content:center;">
                                    <label for="">Contraseña:</label>
                                  </div>
                                  <div class="row" style="margin-top: 10px; padding: 10px;">
                                    <div class="col-md-6" style="display: flex; justify-content:center;   align-items: center;">
                                      <input type="text" id="repre">
                                    </div>
                                    <div class="col-md-6" style="display: flex; justify-content:center;">
                                      <input type="password" name="contac" id="contac">
                                    </div>
                                  </div>
                                  <div class="row" style="margin-top: 10px; padding: 10px;">
                                    <div class="col-md-6" style="display: flex; justify-content:center;   align-items: center;">
                                    <label for="">Codigo Sucursal</label>
                                    </div>
                                  </div>
                                  <div class="row" style="margin-top: 10px; padding: 10px;">
                                    <div class="col-md-6" style="display: flex; justify-content:center;   align-items: center;">
                                      <input type="text" id="repre">
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row" style="margin: 10px;">
                              <div class="col-md-12 divBoton">
                                <button class="btn btn-primary">Guardar</button>
                              </div>

                            </div>
                            
                          </div>
                        </div>
                        <div class="row" id="mapfrediv" style="display: none;">
                          <div class="col-md-12">
                            <div class="row"  style="display: flex;">
                              <div class="col-md-12" style="background-color: #88d600; color: white; width: 100%;">
                                <h4>Credenciales Mapfre</h4>
                              </div>
                            </div>
                            <div class="row" style="border: 1px solid #ddd;">
                              <div class="col-md-12">
                                <div class="row" style="margin-top: 10px; padding: 10px;">
                                  <div class="col-md-6" style="display: flex; justify-content:center;   align-items: center;">
                                    <label for="">Ups, no hay nada que mostrar</label>
                                  </div>
                                  
                                </div>
                              </div>
                            </div>
                            <div class="row" style="margin: 10px;">
                              <div class="col-md-12 divBoton">
                                <button class="btn btn-primary">Guardar</button>
                              </div>

                            </div>
                            
                          </div>
                        </div>
                        <div class="row" id="previsoradiv" style="display: none;">
                          <div class="col-md-12">
                            <div class="row"  style="display: flex;">
                              <div class="col-md-12" style="background-color: #88d600; color: white; width: 100%;">
                                <h4>Credenciales Previsora</h4>
                              </div>
                            </div>
                            <div class="row" style="border: 1px solid #ddd;">
                              <div class="col-md-12">
                                <div class="row" style="margin-top: 10px; padding: 10px;">
                                  <div class="col-md-6" style="display: flex; justify-content:center;   align-items: center;">
                                    <label for="">nombre campo2:</label>
                                  </div>
                                  <div class="col-md-6" style="display: flex; justify-content:center;">
                                    <label for="">Nombre campo2:</label>
                                  </div>
                                  <div class="row" style="margin-top: 10px; padding: 10px;">
                                    <div class="col-md-6" style="display: flex; justify-content:center;   align-items: center;">
                                      <input type="file" id="repre">
                                    </div>
                                    <div class="col-md-6" style="display: flex; justify-content:center;">
                                      <input type="file" name="contac" id="contac">
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row" style="margin: 10px;">
                              <div class="col-md-12 divBoton">
                                <button class="btn btn-primary">Guardar</button>
                              </div>

                            </div>
                            
                          </div>
                        </div>
                        <div class="row" id="solidariadiv" style="display: none;">
                          <div class="col-md-12">
                            <div class="row"  style="display: flex;">
                              <div class="col-md-12" style="background-color: #88d600; color: white; width: 100%;">
                                <h4>Credenciales Solidaria</h4>
                              </div>
                            </div>
                            <div class="row" style="border: 1px solid #ddd;">
                              <div class="col-md-12">
                                <div class="row" style="margin-top: 10px; padding: 10px;">
                                  <div class="col-md-6" style="display: flex; justify-content:center;   align-items: center;">
                                    <label for="">Codigo Sucursal:</label>
                                  </div>
                                  <div class="col-md-6" style="display: flex; justify-content:center;">
                                    <label for="">Codigo Persona:</label>
                                  </div>
                                  <div class="row" style="margin-top: 10px; padding: 10px;">
                                    <div class="col-md-6" style="display: flex; justify-content:center;   align-items: center;">
                                      <input type="text" id="repre">
                                    </div>
                                    <div class="col-md-6" style="display: flex; justify-content:center;">
                                      <input type="text" name="contac" id="contac">
                                    </div>
                                  </div>
                                  <div class="row" style="margin-top: 10px; padding: 10px;">
                                    <div class="col-md-6" style="display: flex; justify-content:center;   align-items: center;">
                                      <label for="">Tipo Agente:</label>
                                    </div>
                                    <div class="col-md-6" style="display: flex; justify-content:center;">
                                      <label for="">Codigo Agente:</label>
                                    </div>
                                  </div>
                                  <div class="row" style="margin-top: 10px; padding: 10px;">
                                    <div class="col-md-6" style="display: flex; justify-content:center;   align-items: center;">
                                      <input type="text" id="repre">
                                    </div>
                                    <div class="col-md-6" style="display: flex; justify-content:center;">
                                      <input type="text" name="contac" id="contac">
                                    </div>
                                  </div>
                                  <div class="row" style="margin-top: 10px; padding: 10px;">
                                    <div class="col-md-6" style="display: flex; justify-content:center;   align-items: center;">
                                      <label for="">Codigo Punto de venta:</label>
                                    </div>
                                    <div class="col-md-6" style="display: flex; justify-content:center;">
                                      <label for="">Grant Type:</label> 
                                    </div>
                                  </div>
                                  <div class="row" style="margin-top: 10px; padding: 10px;">
                                    <div class="col-md-6" style="display: flex; justify-content:center;   align-items: center;">
                                      <input type="text" id="repre">
                                    </div>
                                    <div class="col-md-6" style="display: flex; justify-content:center;">
                                      <input type="text" name="contac" id="contac">
                                    </div>
                                  </div>
                                  <div class="row" style="margin-top: 10px; padding: 10px;">
                                    <div class="col-md-6" style="display: flex; justify-content:center;   align-items: center;">
                                    <label for="">Cookie:</label>
                                    </div>
                                  </div>
                                  <div class="row" style="margin-top: 10px; padding: 10px;">
                                    <div class="col-md-6" style="display: flex; justify-content:center;   align-items: center;">
                                      <input type="text" id="repre">
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row" style="margin: 10px;">
                              <div class="col-md-12 divBoton">
                                <button class="btn btn-primary">Guardar</button>
                              </div>

                            </div>
                            
                          </div>
                        </div>
                        <div class="row" id="libertydiv" style="display: none;">
                          <div class="col-md-12">
                            <div class="row"  style="display: flex;">
                              <div class="col-md-12" style="background-color: #88d600; color: white; width: 100%;">
                                <h4>Credenciales Liberty</h4>
                              </div>
                            </div>
                            <div class="row" style="border: 1px solid #ddd;">
                              <div class="col-md-12">
                                <div class="row" style="margin-top: 10px; padding: 10px;">
                                  <div class="col-md-6" style="display: flex; justify-content:center;   align-items: center;">
                                    <label for="">Cookie Token:</label>
                                  </div>
                                  <div class="col-md-6" style="display: flex; justify-content:center;">
                                    <label for="">Cookie Peticion:</label>
                                  </div>
                                  <div class="row" style="margin-top: 10px; padding: 10px;">
                                    <div class="col-md-6" style="display: flex; justify-content:center;   align-items: center;">
                                      <input type="text" id="repre">
                                    </div>
                                    <div class="col-md-6" style="display: flex; justify-content:center;">
                                      <input type="text" name="contac" id="contac">
                                    </div>
                                  </div>
                                  <div class="row" style="margin-top: 10px; padding: 10px;">
                                    <div class="col-md-6" style="display: flex; justify-content:center;   align-items: center;">
                                      <label for="">Autorización:</label>
                                    </div>
                                    <div class="col-md-6" style="display: flex; justify-content:center;">
                                      <label for="">Codigo Agente:</label>
                                    </div>
                                  </div>
                                  <div class="row" style="margin-top: 10px; padding: 10px;">
                                    <div class="col-md-6" style="display: flex; justify-content:center;   align-items: center;">
                                      <input type="text" id="repre">
                                    </div>
                                    <div class="col-md-6" style="display: flex; justify-content:center;">
                                      <input type="text" name="contac" id="contac">
                                    </div>
                                  </div>
                                  <div class="row" style="margin-top: 10px; padding: 10px;">
                                    <div class="col-md-6" style="display: flex; justify-content:center;   align-items: center;">
                                      <label for="">Aplicacion Cliente:</label>
                                    </div>
                                    <div class="col-md-6" style="display: flex; justify-content:center;">
                                      <label for="">Ip:</label>
                                    </div>
                                  </div>
                                  <div class="row" style="margin-top: 10px; padding: 10px;">
                                    <div class="col-md-6" style="display: flex; justify-content:center;   align-items: center;">
                                      <input type="text" id="repre">
                                    </div>
                                    <div class="col-md-6" style="display: flex; justify-content:center;">
                                      <input type="text" name="contac" id="contac">
                                    </div>
                                  </div>
                                  <div class="row" style="margin-top: 10px; padding: 10px;">
                                    <div class="col-md-6" style="display: flex; justify-content:center;   align-items: center;">
                                      <label for="">Id Request:</label>
                                    </div>
                                    <div class="col-md-6" style="display: flex; justify-content:center;">
                                      <label for="">Terminal:</label>
                                    </div>
                                  </div>
                                  <div class="row" style="margin-top: 10px; padding: 10px;">
                                    <div class="col-md-6" style="display: flex; justify-content:center;   align-items: center;">
                                      <input type="text" id="repre">
                                    </div>
                                    <div class="col-md-6" style="display: flex; justify-content:center;">
                                      <input type="text" name="contac" id="contac">
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row" style="margin: 10px;">
                              <div class="col-md-12 divBoton">
                                <button class="btn btn-primary">Guardar</button>
                              </div>

                            </div>
                            
                          </div>
                        </div>
                        <div class="row" id="estadodiv" style="display: none;">
                          <div class="col-md-12">
                            <div class="row"  style="display: flex;">
                              <div class="col-md-12" style="background-color: #88d600; color: white; width: 100%;">
                                <h4>Credenciales Estado</h4>
                              </div>
                            </div>
                            <div class="row" style="border: 1px solid #ddd;">
                              <div class="col-md-12">
                                <div class="row" style="margin-top: 10px; padding: 10px;">
                                  <div class="col-md-6" style="display: flex; justify-content:center;   align-items: center;">
                                    <label for="">Susuario:</label>
                                  </div>
                                  <div class="col-md-6" style="display: flex; justify-content:center;">
                                    <label for="">NContraseña:</label>
                                  </div>
                                  <div class="row" style="margin-top: 10px; padding: 10px;">
                                    <div class="col-md-6" style="display: flex; justify-content:center;   align-items: center;">
                                      <input type="text" id="repre">
                                    </div>
                                    <div class="col-md-6" style="display: flex; justify-content:center;">
                                      <input type="password" name="contac" id="contac">
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row" style="margin: 10px;">
                              <div class="col-md-12 divBoton">
                                <button class="btn btn-primary">Guardar</button>
                              </div>

                            </div>
                            
                          </div>
                        </div>
                        <div class="row" id="axadiv" style="display: none;">
                          <div class="col-md-12">
                            <div class="row"  style="display: flex;">
                              <div class="col-md-12" style="background-color: #88d600; color: white; width: 100%;">
                                <h4>Credenciales Axa</h4>
                              </div>
                            </div>
                            <div class="row" style="border: 1px solid #ddd;">
                              <div class="col-md-12">
                                <div class="row" style="margin-top: 10px; padding: 10px;">
                                  <div class="col-md-6" style="display: flex; justify-content:center;   align-items: center;">
                                    <label for="">Ssl Certfile:</label>
                                  </div>
                                  <div class="col-md-6" style="display: flex; justify-content:center;">
                                    <label for="">Ssl Keyfile:</label>
                                  </div>
                                  <div class="row" style="margin-top: 10px; padding: 10px;">
                                    <div class="col-md-6" style="display: flex; justify-content:center;   align-items: center;">
                                      <input type="file" id="repre">
                                    </div>
                                    <div class="col-md-6" style="display: flex; justify-content:center;">
                                      <input type="file" name="contac" id="contac">
                                    </div>
                                  </div>
                                  <div class="row" style="margin-top: 10px; padding: 10px;">
                                    <div class="col-md-6" style="display: flex; justify-content:center;   align-items: center;">
                                    <label for="">Contraseña:</label>
                                    </div>
                                    <div class="col-md-6" style="display: flex; justify-content:center;">
                                    <label for="">Codigo Distribuidor:</label>
                                    </div>
                                  </div>
                                  <div class="row" style="margin-top: 10px; padding: 10px;">
                                    <div class="col-md-6" style="display: flex; justify-content:center;   align-items: center;">
                                      <input type="password" id="repre">
                                    </div>
                                    <div class="col-md-6" style="display: flex; justify-content:center;">
                                      <input type="text" name="contac" id="contac">
                                    </div>
                                  </div>
                                  <div class="row" style="margin-top: 10px; padding: 10px;">
                                    <div class="col-md-6" style="display: flex; justify-content:center;   align-items: center;">
                                      <label for="">Tipo Distribuidor:</label>
                                    </div>
                                    <div class="col-md-6" style="display: flex; justify-content:center;">
                                      <label for="">Codigo Ciudad:</label>
                                    </div>
                                  </div>
                                  <div class="row" style="margin-top: 10px; padding: 10px;">
                                    <div class="col-md-6" style="display: flex; justify-content:center;   align-items: center;">
                                      <input type="text" id="repre">
                                    </div>
                                    <div class="col-md-6" style="display: flex; justify-content:center;">
                                      <input type="text" name="contac" id="contac">
                                    </div>
                                  </div>
                                  <div class="row" style="margin-top: 10px; padding: 10px;">
                                    <div class="col-md-6" style="display: flex; justify-content:center;   align-items: center;">
                                      <label for="">Canal:</label>
                                    </div>
                                    <div class="col-md-6" style="display: flex; justify-content:center;">
                                      <label for="">Validacion de Eventos:</label>
                                    </div>
                                  </div>
                                  <div class="row" style="margin-top: 10px; padding: 10px;">
                                    <div class="col-md-6" style="display: flex; justify-content:center;   align-items: center;">
                                      <input type="text" id="repre">
                                    </div>
                                    <div class="col-md-6" style="display: flex; justify-content:center;">
                                      <input type="text" name="contac" id="contac">
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row" style="margin: 10px;">
                              <div class="col-md-12 divBoton">
                                <button class="btn btn-primary">Guardar</button>
                              </div>

                            </div>
                            
                          </div>
                        </div>
                        <div class="row" id="hdidiv" style="display: none;">
                          <div class="col-md-12">
                            <div class="row"  style="display: flex;">
                              <div class="col-md-12" style="background-color: #88d600; color: white; width: 100%;">
                                <h4>Credenciales HDI</h4>
                              </div>
                            </div>
                            <div class="row" style="border: 1px solid #ddd;">
                              <div class="col-md-12">
                                <div class="row" style="margin-top: 10px; padding: 10px;">
                                  <div class="col-md-6" style="display: flex; justify-content:center;   align-items: center;">
                                    <label for="">Codigo Sucursal:</label>
                                  </div>
                                  <div class="col-md-6" style="display: flex; justify-content:center;">
                                    <label for="">Codigo Agente:</label>
                                  </div>
                                  <div class="row" style="margin-top: 10px; padding: 10px;">
                                    <div class="col-md-6" style="display: flex; justify-content:center;   align-items: center;">
                                      <input type="text" id="repre">
                                    </div>
                                    <div class="col-md-6" style="display: flex; justify-content:center;">
                                      <input type="text" name="contac" id="contac">
                                    </div>
                                  </div>
                                  <div class="row" style="margin-top: 10px; padding: 10px;">
                                    <div class="col-md-6" style="display: flex; justify-content:center;   align-items: center;">
                                    <label for="">Usuario:</label>
                                    </div>
                                    <div class="col-md-6" style="display: flex; justify-content:center;">
                                    <label for="">Contraseña:</label>
                                    </div>
                                  </div>
                                  <div class="row" style="margin-top: 10px; padding: 10px;">
                                    <div class="col-md-6" style="display: flex; justify-content:center;   align-items: center;">
                                      <input type="text" id="repre">
                                    </div>
                                    <div class="col-md-6" style="display: flex; justify-content:center;">
                                      <input type="password" name="contac" id="contac">
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row" style="margin: 10px;">
                              <div class="col-md-12 divBoton">
                                <button class="btn btn-primary">Guardar</button>
                              </div>

                            </div>
                            
                          </div>
                        </div>
                        <div class="row" id="sbsdiv" style="display: none;">
                          <div class="col-md-12">
                            <div class="row"  style="display: flex;">
                              <div class="col-md-12" style="background-color: #88d600; color: white; width: 100%;">
                                <h4>Credenciales SBS</h4>
                              </div>
                            </div>
                            <div class="row" style="border: 1px solid #ddd;">
                              <div class="col-md-12">
                                <div class="row" style="margin-top: 10px; padding: 10px;">
                                  <div class="col-md-6" style="display: flex; justify-content:center;   align-items: center;">
                                    <label for="">Usuario:</label>
                                  </div>
                                  <div class="col-md-6" style="display: flex; justify-content:center;">
                                    <label for="">Contraseña:</label>
                                  </div>
                                  <div class="row" style="margin-top: 10px; padding: 10px;">
                                    <div class="col-md-6" style="display: flex; justify-content:center;   align-items: center;">
                                      <input type="text" id="repre">
                                    </div>
                                    <div class="col-md-6" style="display: flex; justify-content:center;">
                                      <input type="password" name="contac" id="contac">
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row" style="margin: 10px;">
                              <div class="col-md-12 divBoton">
                                <button class="btn btn-primary">Guardar</button>
                              </div>

                            </div>
                            
                          </div>
                        </div>
                        <div class="row" id="zuridiv" style="display: none;">
                          <div class="col-md-12">
                            <div class="row"  style="display: flex;">
                              <div class="col-md-12" style="background-color: #88d600; color: white; width: 100%;">
                                <h4>Credenciales Zurich</h4>
                              </div>
                            </div>
                            <div class="row" style="border: 1px solid #ddd;">
                              <div class="col-md-12">
                                <div class="row" style="margin-top: 10px; padding: 10px;">
                                  <div class="col-md-6" style="display: flex; justify-content:center;   align-items: center;">
                                    <label for="">Usuario:</label>
                                  </div>
                                  <div class="col-md-6" style="display: flex; justify-content:center;">
                                    <label for="">Contraseña:</label>
                                  </div>
                                  <div class="row" style="margin-top: 10px; padding: 10px;">
                                    <div class="col-md-6" style="display: flex; justify-content:center;   align-items: center;">
                                      <input type="text" id="repre">
                                    </div>
                                    <div class="col-md-6" style="display: flex; justify-content:center;">
                                      <input type="password" name="contac" id="contac">
                                    </div>
                                  </div>
                                  <div class="row" style="margin-top: 10px; padding: 10px;">
                                    <div class="col-md-6" style="display: flex; justify-content:center;   align-items: center;">
                                      <label for="">Correo:</label>
                                    </div>
                                    <div class="col-md-6" style="display: flex; justify-content:center;">
                                      <label for="">Cookie:</label>
                                    </div>
                                  </div>
                                  <div class="row" style="margin-top: 10px; padding: 10px;">
                                    <div class="col-md-6" style="display: flex; justify-content:center;   align-items: center;">
                                      <input type="text" id="repre">
                                    </div>
                                    <div class="col-md-6" style="display: flex; justify-content:center;">
                                      <input type="text" name="contac" id="contac">
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row" style="margin: 10px;">
                              <div class="col-md-12 divBoton">
                                <button class="btn btn-primary">Guardar</button>
                              </div>

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

<script src="vistas/js/intermediario.js?v=<?php echo (rand()); ?>"></script>