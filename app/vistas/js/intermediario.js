(()=>{
    traerCredenciales();
})()


//FUNCION CARGAR NUEVA FOTO

$("#ImgInter").change(function(){

	var imagen = this.files[0];
	
	/*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	=============================================*/

  	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

  		$("#ImgInter").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen debe estar en formato JPG o PNG!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else if(imagen["size"] > 2000000){

  		$("#ImgInter").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen no debe pesar más de 2MB!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else{

  		var datosImagen = new FileReader;
  		datosImagen.readAsDataURL(imagen);

  		$(datosImagen).on("load", function(event){

  			var rutaImagen = event.target.result;

  			$(".previsualizarEditar").attr("src", rutaImagen);

  		});

  	}

});


//funciones para cuando marquen aseguradora se habilite el campo del codigo

$("#tieneAlli").click(function () {
    if( $('#tieneAlli').is(':checked') ) {
        $("#claveparaIAlli").prop('disabled', false);
    }else{   
        $("#claveparaIAlli").prop('disabled', true);
    }
})

$("#tieneBoli").click(function () {
    if( $('#tieneBoli').is(':checked') ) {
        $("#claveparaBoli").prop('disabled', false);
    }else{   
        $("#claveparaBoli").prop('disabled', true);
    }
})

$("#tieneEqui").click(function () {
    if( $('#tieneEqui').is(':checked') ) {
        $("#claveparaEqui").prop('disabled', false);
    }else{   
        $("#claveparaEqui").prop('disabled', true);
    }
})

$("#tieneMap").click(function () {
    if( $('#tieneMap').is(':checked') ) {
        $("#claveparaMap").prop('disabled', false);
    }else{   
        $("#claveparaMap").prop('disabled', true);
    }
})

$("#tienePrevi").click(function () {
    if( $('#tienePrevi').is(':checked') ) {
        $("#claveparaPrevi").prop('disabled', false);
    }else{   
        $("#claveparaPrevi").prop('disabled', true);
    }
})

$("#tieneSoli").click(function () {
    if( $('#tieneSoli').is(':checked') ) {
        $("#claveparaSoli").prop('disabled', false);
    }else{   
        $("#claveparaSoli").prop('disabled', true);
    }
})

$("#tieneLibe").click(function () {
    if( $('#tieneLibe').is(':checked') ) {
        $("#claveparaLibe").prop('disabled', false);
    }else{   
        $("#claveparaLibe").prop('disabled', true);
    }
})

$("#tieneEst").click(function () {
    if( $('#tieneEst').is(':checked') ) {
        $("#claveparaEst").prop('disabled', false);
    }else{   
        $("#claveparaEst").prop('disabled', true);
    }
})

$("#tieneAxa").click(function () {
    if( $('#tieneAxa').is(':checked') ) {
        $("#claveparaAxa").prop('disabled', false);
    }else{   
        $("#claveparaAxa").prop('disabled', true);
    }
})

$("#tienehdi").click(function () {
    if( $('#tienehdi').is(':checked') ) {
        $("#claveparahdi").prop('disabled', false);
    }else{   
        $("#claveparahdi").prop('disabled', true);
    }
})

$("#tienesbs").click(function () {
    if( $('#tienesbs').is(':checked') ) {
        $("#claveparasbs").prop('disabled', false);
    }else{   
        $("#claveparasbs").prop('disabled', true);
    }
})

$("#tienezuri").click(function () {
    if( $('#tienezuri').is(':checked') ) {
        $("#claveparazuri").prop('disabled', false);
    }else{   
        $("#claveparazuri").prop('disabled', true);
    }
})


///Funcion para traer credenciales

function traerCredenciales(){
    $.ajax({
        url: "http://localhost/integradoor/app/controladores/intermediario.controlador.php?function=traerCrede",
        method: "POST",
        success: function (data) {

            data = JSON.parse(data);

            //enviar datos del intermediario al formulario de arriba
            $("#razon").val(data["nombre"]);
            $("#numero_identificacionInter").val(data["num_documento"]);
            $("#repre").val(data["nombre_representante"]);
            $("#numero_identificacion_repre").val(data["Identificacion"]);
            $("#email").val(data["correo"]);
            $("#direccion").val(data["direccion"]);
            $("#ciudad").val(data["ciudad"]);
            $("#contac").val(data["contacto"]);
            $("#cel").val(data["celular"]);
            $("#claveparaIAlli").val(data["codigo_alli"]);
            $("#claveparaBoli").val(data["codigo_boli"]);
            $("#claveparaEqui").val(data["codigo_equi"]);
            $("#claveparaMap").val(data["codigo_map"]);
            $("#claveparaPrevi").val(data["codigo_previ"]);
            $("#claveparaSoli").val(data["codigo_soli"]);
            $("#claveparaLibe").val(data["codigo_libe"]);
            $("#claveparaEst").val(data["codigo_est"]);
            $("#claveparaAxa").val(data["codigo_axa"]);
            $("#claveparahdi").val(data["codigo_hdi"]);
            $("#claveparasbs").val(data["codigo_sbs"]);
            $("#claveparazuri").val(data["codigo_zuri"]);
            $(".previsualizarEditar").attr("src", data["intermediario_imagen"]);


            
            //Credenciales de Bolivar para enviar a la visual.
            $("#apikeyBo").val(data["cre_bol_api_key"]);
            $("#ClaveABo").val(data["cre_bol_claveAsesor"]);

            //Credenciales de allianz para enviar a la visual.
            // $("#certfileAlli").val(data["cre_alli_sslcertfile"]);
            // $("#keyfileAlli").val(data["cre_alli_sslkeyfile"]);
            $("#contraseñaAlli").val(data["cre_alli_passphrase"]);
            $("#idPartAlli").val(data["cre_alli_partnerid"]);
            $("#idagentAlli").val(data["cre_alli_agentid"]);
            $("#codigoPartAlli").val(data["cre_alli_partnercode"]);
            $("#codigoagenAlli").val(data["cre_alli_agentcode"]);

            //Credenciales de equidad para enviar a la visual.
            $("#usuEqui").val(data["cre_equ_usuario"]);
            $("#contraseñaEqui").val(data["cre_equ_contraseña"]);
            $("#codSucuEqui").val(data["cre_equ_codigo_sucursal"]);

            //Credenciales de mpafre para enviar a la visual.

            //Credenciales de previsora para enviar a la visual.

            //Credenciales de solidaria para enviar a la visual.
            $("#codSucuSoli").val(data["cre_sol_cod_sucursal"]);
            $("#codPerSoli").val(data["cre_sol_cod_per"]);
            $("#tipAgeSoli").val(data["cre_sol_cod_tipo_agente"]);
            $("#codigoAgeSoli").val(data["cre_sol_cod_agente"]);
            $("#codPunVenSoli").val(data["cre_sol_cod_pto_vta"]);
            $("#grantTypeSoli").val(data["cre_sol_grant_type"]);
            $("#cookieSoli").val(data["cre_sol_Cookie_token"]);

            //Credenciales de liberty para enviar a la visual.
            $("#cookieToLibe").val(data["cre_lib_cookieToken"]);
            $("#cookieReLibe").val(data["cre_lib_cookieRequest"]);
            $("#autoLibe").val(data["cre_lib_authorization"]);
            $("#codigoAgenLibe").val(data["cre_lib_codigoAgenteGestion"]);
            $("#ApliCliLibe").val(data["cre_lib_aplicacionCliente"]);
            $("#ipLibe").val(data["cre_lib_ip"]);
            $("#idRequeLibe").val(data["cre_lib_requestID"]);
            $("#termilibe").val(data["cre_lib_terminal"]);

            //Credenciales de estado para enviar a la visual.
            $("#usuEst").val(data["cre_est_usuario"]);
            $("#ContraLibe").val(data["cre_equ_contrasena"]);

            //Credenciales de axa para enviar a la visual.
            // $("#certFileaxa").val(data["cre_axa_sslcertfile"]);
            // $("#keyfileaxa").val(data["cre_axa_sslkeyfile"]);
            $("#contraseñaaxa").val(data["cre_axa_passphrase"]);
            $("#codigodistriaxa").val(data["cre_axa_codigoDistribuidor"]);
            $("#tipdistriaxa").val(data["cre_axa_idTipoDistribuidor"]);
            $("#codCiuaxa").val(data["cre_axa_codigoDivipola"]);
            $("#canalaxa").val(data["cre_axa_canal"]);
            $("#valEveaxa").val(data["cre_axa_validacionEventos"]);

            //Credenciales de hdi para enviar a la visual.
            $("#codSucurhdi").val(data["cre_hdi_codSucursal"]);
            $("#codigoagenhdi").val(data["cre_hdi_CodigoAgente"]);
            $("#usuhdi").val(data["cre_hdi_usuario"]);
            $("#contraseñahdi").val(data["cre_hdi_contraseña"]);

            //Credenciales de sbs para enviar a la visual.
            $("#ususbs").val(data["cre_sbs_usuario"]);
            $("#contraseñasbs").val(data["cre_sbs_contraseña"]);

            //Credenciales de zurich para enviar a la visual.
            $("#usuzur").val(data["cre_zur_nomUsu"]);
            $("#contraseñazur").val(data["cre_zur_passwd"]);
            $("#correozur").val(data["cre_zur_intermediaryEmail"]);
            $("#cookiezur").val(data["cre_zur_Cookie"]);



            
        }
    });
}


//Funciones para enviar a guardar o actualizar credenciales.

function guardarcredenAlli(){
    let contra = $("#contraseñaAlli").val();
    let part = $("#idPartAlli").val();
    let idAge = $("#idagentAlli").val();
    let codPat = $("#codigoPartAlli").val();
    let codAge = $("#codigoagenAlli").val();

    $.ajax({
        url: "http://localhost/integradoor/app/controladores/intermediario.controlador.php?function=guardarallianz",
        method: "POST",
        data: { contra,
            part,
            idAge,
            codPat,
            codAge
        },
        success: function (data) {

            if(data == "exitoso"){
                Swal.fire({
                    icon: 'success',
                    text: '¡Credenciales guardadas con exito!'
                  })
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: '¡No pudimos guardar las credenciales!'
                  })
            }
        }
    });
}

function guardarcredenBoli(){
    let apikey = $("#apikeyBo").val();
    let clave = $("#ClaveABo").val();

    $.ajax({
        url: "http://localhost/integradoor/app/controladores/intermediario.controlador.php?function=guardarvoli",
        method: "POST",
        data: { apikey,
            clave
        },
        success: function (data) {

            if(data == "exitoso"){
                Swal.fire({
                    icon: 'success',
                    text: '¡Credenciales guardadas con exito!'
                  })
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: '¡No pudimos guardar las credenciales!'
                  })
            }
        }
    });
}

function guardarcredenEqui(){
    let usu = $("#usuEqui").val();
    let contra = $("#contraseñaEqui").val();
    let sucur  =$("#codSucuEqui").val();

    $.ajax({
        url: "http://localhost/integradoor/app/controladores/intermediario.controlador.php?function=guardarequi",
        method: "POST",
        data: { usu,
            contra,
            sucur
        },
        success: function (data) {

            if(data == "exitoso"){
                Swal.fire({
                    icon: 'success',
                    text: '¡Credenciales guardadas con exito!'
                  })
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: '¡No pudimos guardar las credenciales!'
                  })
            }
        }
    });
}

function guardarcredenMap(){
    
}

function guardarcredenPrevi(){
    
}

function guardarcredenSoli(){
    let sucur = $("#codSucuSoli").val();
    let codPer = $("#codPerSoli").val();
    let tipAge = $("#tipAgeSoli").val();
    let codAge = $("#codigoAgeSoli").val();
    let PunVen = $("#codPunVenSoli").val();
    let grantTy = $("#grantTypeSoli").val();
    let cookie  = $("#cookieSoli").val();

    $.ajax({
        url: "http://localhost/integradoor/app/controladores/intermediario.controlador.php?function=guardarsoli",
        method: "POST",
        data: { sucur,
            codPer,
            tipAge,
            codAge,
            PunVen,
            grantTy,
            cookie
        },
        success: function (data) {

            if(data == "exitoso"){
                Swal.fire({
                    icon: 'success',
                    text: '¡Credenciales guardadas con exito!'
                  })
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: '¡No pudimos guardar las credenciales!'
                  })
            }
        }
    });
}

function guardarcredenLiberty(){
    let cookTo = $("#cookieToLibe").val();
    let cookRe = $("#cookieReLibe").val();
    let auto = $("#autoLibe").val();
    let codAge = $("#codigoAgenLibe").val();
    let apliCli = $("#ApliCliLibe").val();
    let ip = $("#ipLibe").val();
    let  idReq= $("#idRequeLibe").val();
    let terminal = $("#termilibe").val();

    $.ajax({
        url: "http://localhost/integradoor/app/controladores/intermediario.controlador.php?function=guardarliber",
        method: "POST",
        data: { cookTo,
            cookRe,
            auto,
            codAge,
            apliCli,
            ip,
            idReq,
            terminal
        },
        success: function (data) {

            if(data == "exitoso"){
                Swal.fire({
                    icon: 'success',
                    text: '¡Credenciales guardadas con exito!'
                  })
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: '¡No pudimos guardar las credenciales!'
                  })
            }
        }
    });
}

function guardarcredenEst(){
    let usu  = $("#usuEst").val();
    let contra = $("#ContraLibe").val();

    $.ajax({
        url: "http://localhost/integradoor/app/controladores/intermediario.controlador.php?function=guardarest",
        method: "POST",
        data: { usu,
            contra
        },
        success: function (data) {

            if(data == "exitoso"){
                Swal.fire({
                    icon: 'success',
                    text: '¡Credenciales guardadas con exito!'
                  })
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: '¡No pudimos guardar las credenciales!'
                  })
            }
        }
    });
}

function guardarcredenAxa(){
    let contra = $("#contraseñaaxa").val();
    let codDis = $("#codigodistriaxa").val();
    let tipDis = $("#tipdistriaxa").val();
    let codCiu = $("#codCiuaxa").val();
    let canal = $("#canalaxa").val();
    let valEve= $("#valEveaxa").val();

    $.ajax({
        url: "http://localhost/integradoor/app/controladores/intermediario.controlador.php?function=guardaraxa",
        method: "POST",
        data: { contra,
            codDis,
            tipDis,
            codCiu,
            canal,
            valEve
        },
        success: function (data) {

            if(data == "exitoso"){
                Swal.fire({
                    icon: 'success',
                    text: '¡Credenciales guardadas con exito!'
                  })
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: '¡No pudimos guardar las credenciales!'
                  })
            }
        }
    });
}

function guardarcredenHdi(){
    let codSucu = $("#codSucurhdi").val()
    let codAge = $("#codigoagenhdi").val()
    let usu = $("#usuhdi").val()
    let contra = $("#contraseñahdi").val()

    $.ajax({
        url: "http://localhost/integradoor/app/controladores/intermediario.controlador.php?function=guardarhdi",
        method: "POST",
        data: { codSucu,
            codAge,
            usu,
            contra
        },
        success: function (data) {

            if(data == "exitoso"){
                Swal.fire({
                    icon: 'success',
                    text: '¡Credenciales guardadas con exito!'
                  })
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: '¡No pudimos guardar las credenciales!'
                  })
            }
        }
    });
}

function guardarcredenSbs(){
    let usu = $("#ususbs").val();
    let contra = $("#contraseñasbs").val();

    $.ajax({
        url: "http://localhost/integradoor/app/controladores/intermediario.controlador.php?function=guardarsbs",
        method: "POST",
        data: { usu,
            contra
        },
        success: function (data) {

            if(data == "exitoso"){
                Swal.fire({
                    icon: 'success',
                    text: '¡Credenciales guardadas con exito!'
                  })
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: '¡No pudimos guardar las credenciales!'
                  })
            }
        }
    });
}

function guardarcredenZuri(){
    let usu = $("#usuzur").val();
    let contra = $("#contraseñazur").val();
    let correo = $("#correozur").val();
    let cookie = $("#cookiezur").val();

    $.ajax({
        url: "http://localhost/integradoor/app/controladores/intermediario.controlador.php?function=guardarzuri",
        method: "POST",
        data: { usu,
            contra,
            correo,
            cookie
        },
        success: function (data) {

            if(data == "exitoso"){
                Swal.fire({
                    icon: 'success',
                    text: '¡Credenciales guardadas con exito!'
                  })
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: '¡No pudimos guardar las credenciales!'
                  })
            }
        }
    });
}

//Funcion para traer credenciales

function guardarInfoInter(){
    var tipodocumento = $("#tip_doc").val()
    var correo = $("#email").val()
    var identiInt = $("#numero_identificacionInter").val()
    var direccion = $("#direccion").val()
    var razonSO = $("#razon").val()
    var ciudad  = $("#ciudad").val()
    var nomRepre = $("#repre").val()
    var indentiRepre = $("#numero_identificacion_repre").val()
    var comConta = $("#contac").val()
    var cel = $("#cel").val()
    var alli = $("#claveparaIAlli").val()
    var boli = $("#claveparaBoli").val()
    var equi = $("#claveparaEqui").val()
    var mapfre = $("#claveparaMap").val()
    var previ = $("#claveparaPrevi").val()
    var soli = $("#claveparaSoli").val()
    var libe = $("#claveparaLibe").val()
    var est = $("#claveparaEst").val()
    var axa = $("#claveparaAxa").val()
    var hdi = $("#claveparahdi").val()
    var sbs = $("#claveparasbs").val()
    var zuri = $("#claveparazuri").val()

    debugger;

    var img = $('#ImgInter').val();

    $.ajax({
        url: "http://localhost/integradoor/app/controladores/intermediario.controlador.php?function=actualizarInter",
        method: "POST",
        data: { tipodocumento,
        correo,
        identiInt, 
        direccion,
        razonSO,
        ciudad,
        nomRepre,
        indentiRepre, 
        comConta,
        cel,
        alli,
        boli,
        equi,
        mapfre,
        previ,
        soli,
        libe,
        est,
        axa,
        hdi,
        sbs,
        zuri,
        img
        },
        success: function (data) {

            if(data == "exitoso"){

                // location.reload();
                Swal.fire({
                    title: '¡Intermediario guardado con Exito!',
                    confirmButtonText: 'Ok',
                  }).then((result) => {
                    if (result.isConfirmed) {
                        location.reload();
                    } else if (result.isDenied) {
                    }
                  })
                  
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: '¡No pudimos actualizar informacion!'
                  })
            }
        }
    });
}



//Funciones para mostrar inputs credenciales

$("#balli").click(function(){
    $("#ballili").addClass("active");
    $("#allianzdiv").show();
    $("#bbolili").removeClass("active");
    $("#bolivardiv").hide();
    $("#bequili").removeClass("active");
    $("#equidaddiv").hide();
    $("#bmapli").removeClass("active");
    $("#mapfrediv").hide();
    $("#bprevili").removeClass("active");
    $("#previsoradiv").hide();
    $("#bsolili").removeClass("active");
    $("#solidariadiv").hide();
    $("#blibeli").removeClass("active");
    $("#libertydiv").hide();
    $("#bestali").removeClass("active");
    $("#estadodiv").hide();
    $("#baxali").removeClass("active");
    $("#axadiv").hide();
    $("#bhdili").removeClass("active");
    $("#hdidiv").hide();
    $("#bsbsli").removeClass("active");
    $("#sbsdiv").hide();
    $("#bzurili").removeClass("active");
    $("#zuridiv").hide();
})
$("#bboli").click(function(){
    $("#bbolili").addClass("active");
    $("#bolivardiv").show();
    $("#ballili").removeClass("active");
    $("#allianzdiv").hide();
    $("#bequili").removeClass("active");
    $("#equidaddiv").hide();
    $("#bmapli").removeClass("active");
    $("#mapfrediv").hide();
    $("#bprevili").removeClass("active");
    $("#previsoradiv").hide();
    $("#bsolili").removeClass("active");
    $("#solidariadiv").hide();
    $("#blibeli").removeClass("active");
    $("#libertydiv").hide();
    $("#bestali").removeClass("active");
    $("#estadodiv").hide();
    $("#baxali").removeClass("active");
    $("#axadiv").hide();
    $("#bhdili").removeClass("active");
    $("#hdidiv").hide();
    $("#bsbsli").removeClass("active");
    $("#sbsdiv").hide();
    $("#bzurili").removeClass("active");
    $("#zuridiv").hide();

})
$("#bequi").click(function(){
    $("#bequili").addClass("active");
    $("#equidaddiv").show();
    $("#bbolili").removeClass("active");
    $("#bolivardiv").hide();
    $("#ballili").removeClass("active");
    $("#allianzdiv").hide();
    $("#bmapli").removeClass("active");
    $("#mapfrediv").hide();
    $("#bprevili").removeClass("active");
    $("#previsoradiv").hide();
    $("#bsolili").removeClass("active");
    $("#solidariadiv").hide();
    $("#blibeli").removeClass("active");
    $("#libertydiv").hide();
    $("#bestali").removeClass("active");
    $("#estadodiv").hide();
    $("#baxali").removeClass("active");
    $("#axadiv").hide();
    $("#bhdili").removeClass("active");
    $("#hdidiv").hide();
    $("#bsbsli").removeClass("active");
    $("#sbsdiv").hide();
    $("#bzurili").removeClass("active");
    $("#zuridiv").hide();
})
$("#bmap").click(function(){
    $("#bmapli").addClass("active");
    $("#mapfrediv").show();
    $("#bbolili").removeClass("active");
    $("#bolivardiv").hide();
    $("#bequili").removeClass("active");
    $("#equidaddiv").hide();
    $("#ballili").removeClass("active");
    $("#allianzdiv").hide();
    $("#bprevili").removeClass("active");
    $("#previsoradiv").hide();
    $("#bsolili").removeClass("active");
    $("#solidariadiv").hide();
    $("#blibeli").removeClass("active");
    $("#libertydiv").hide();
    $("#bestali").removeClass("active");
    $("#estadodiv").hide();
    $("#baxali").removeClass("active");
    $("#axadiv").hide();
    $("#bhdili").removeClass("active");
    $("#hdidiv").hide();
    $("#bsbsli").removeClass("active");
    $("#sbsdiv").hide();
    $("#bzurili").removeClass("active");
    $("#zuridiv").hide();
})
$("#bprevi").click(function(){
    $("#bprevili").addClass("active");
    $("#previsoradiv").show();
    $("#bbolili").removeClass("active");
    $("#bolivardiv").hide();
    $("#bequili").removeClass("active");
    $("#equidaddiv").hide();
    $("#bmapli").removeClass("active");
    $("#mapfrediv").hide();
    $("#ballili").removeClass("active");
    $("#allianzdiv").hide();
    $("#bsolili").removeClass("active");
    $("#solidariadiv").hide();
    $("#blibeli").removeClass("active");
    $("#libertydiv").hide();
    $("#bestali").removeClass("active");
    $("#estadodiv").hide();
    $("#baxali").removeClass("active");
    $("#axadiv").hide();
    $("#bhdili").removeClass("active");
    $("#hdidiv").hide();
    $("#bsbsli").removeClass("active");
    $("#sbsdiv").hide();
    $("#bzurili").removeClass("active");
    $("#zuridiv").hide();
})
$("#bsoli").click(function(){
    $("#bsolili").addClass("active");
    $("#solidariadiv").show();
    $("#bbolili").removeClass("active");
    $("#bolivardiv").hide();
    $("#bequili").removeClass("active");
    $("#equidaddiv").hide();
    $("#bmapli").removeClass("active");
    $("#mapfrediv").hide();
    $("#bprevili").removeClass("active");
    $("#previsoradiv").hide();
    $("#ballili").removeClass("active");
    $("#allianzdiv").hide();
    $("#blibeli").removeClass("active");
    $("#libertydiv").hide();
    $("#bestali").removeClass("active");
    $("#estadodiv").hide();
    $("#baxali").removeClass("active");
    $("#axadiv").hide();
    $("#bhdili").removeClass("active");
    $("#hdidiv").hide();
    $("#bsbsli").removeClass("active");
    $("#sbsdiv").hide();
    $("#bzurili").removeClass("active");
    $("#zuridiv").hide();
})
$("#blibe").click(function(){
    $("#blibeli").addClass("active");
    $("#libertydiv").show();
    $("#bbolili").removeClass("active");
    $("#bolivardiv").hide();
    $("#bequili").removeClass("active");
    $("#equidaddiv").hide();
    $("#bmapli").removeClass("active");
    $("#mapfrediv").hide();
    $("#bprevili").removeClass("active");
    $("#previsoradiv").hide();
    $("#bsolili").removeClass("active");
    $("#solidariadiv").hide();
    $("#ballili").removeClass("active");
    $("#allianzdiv").hide();
    $("#bestali").removeClass("active");
    $("#estadodiv").hide();
    $("#baxali").removeClass("active");
    $("#axadiv").hide();
    $("#bhdili").removeClass("active");
    $("#hdidiv").hide();
    $("#bsbsli").removeClass("active");
    $("#sbsdiv").hide();
    $("#bzurili").removeClass("active");
    $("#zuridiv").hide();
})
$("#besta").click(function(){
    $("#bestali").addClass("active");
    $("#estadodiv").show();
    $("#bbolili").removeClass("active");
    $("#bolivardiv").hide();
    $("#bequili").removeClass("active");
    $("#equidaddiv").hide();
    $("#bmapli").removeClass("active");
    $("#mapfrediv").hide();
    $("#bprevili").removeClass("active");
    $("#previsoradiv").hide();
    $("#bsolili").removeClass("active");
    $("#solidariadiv").hide();
    $("#blibeli").removeClass("active");
    $("#libertydiv").hide();
    $("#ballili").removeClass("active");
    $("#allianzdiv").hide();
    $("#baxali").removeClass("active");
    $("#axadiv").hide();
    $("#bhdili").removeClass("active");
    $("#hdidiv").hide();
    $("#bsbsli").removeClass("active");
    $("#sbsdiv").hide();
    $("#bzurili").removeClass("active");
    $("#zuridiv").hide();
})
$("#baxa").click(function(){
    $("#baxali").addClass("active");
    $("#axadiv").show();
    $("#bbolili").removeClass("active");
    $("#bolivardiv").hide();
    $("#bequili").removeClass("active");
    $("#equidaddiv").hide();
    $("#bmapli").removeClass("active");
    $("#mapfrediv").hide();
    $("#bprevili").removeClass("active");
    $("#previsoradiv").hide();
    $("#bsolili").removeClass("active");
    $("#solidariadiv").hide();
    $("#blibeli").removeClass("active");
    $("#libertydiv").hide();
    $("#bestali").removeClass("active");
    $("#estadodiv").hide();
    $("#ballili").removeClass("active");
    $("#allianzdiv").hide();
    $("#bhdili").removeClass("active");
    $("#hdidiv").hide();
    $("#bsbsli").removeClass("active");
    $("#sbsdiv").hide();
    $("#bzurili").removeClass("active");
    $("#zuridiv").hide();
})
$("#bhdi").click(function(){
    $("#bhdili").addClass("active");
    $("#hdidiv").show();
    $("#bbolili").removeClass("active");
    $("#bolivardiv").hide();
    $("#bequili").removeClass("active");
    $("#equidaddiv").hide();
    $("#bmapli").removeClass("active");
    $("#mapfrediv").hide();
    $("#bprevili").removeClass("active");
    $("#previsoradiv").hide();
    $("#bsolili").removeClass("active");
    $("#solidariadiv").hide();
    $("#blibeli").removeClass("active");
    $("#libertydiv").hide();
    $("#bestali").removeClass("active");
    $("#estadodiv").hide();
    $("#baxali").removeClass("active");
    $("#axadiv").hide();
    $("#ballili").removeClass("active");
    $("#allianzdiv").hide();
    $("#bsbsli").removeClass("active");
    $("#sbsdiv").hide();
    $("#bzurili").removeClass("active");
    $("#zuridiv").hide();
})
$("#bsbs").click(function(){
    $("#bsbsli").addClass("active");
    $("#sbsdiv").show();
    $("#bbolili").removeClass("active");
    $("#bolivardiv").hide();
    $("#bequili").removeClass("active");
    $("#equidaddiv").hide();
    $("#bmapli").removeClass("active");
    $("#mapfrediv").hide();
    $("#bprevili").removeClass("active");
    $("#previsoradiv").hide();
    $("#bsolili").removeClass("active");
    $("#solidariadiv").hide();
    $("#blibeli").removeClass("active");
    $("#libertydiv").hide();
    $("#bestali").removeClass("active");
    $("#estadodiv").hide();
    $("#baxali").removeClass("active");
    $("#axadiv").hide();
    $("#bhdili").removeClass("active");
    $("#hdidiv").hide();
    $("#ballili").removeClass("active");
    $("#allianzdiv").hide();
    $("#bzurili").removeClass("active");
    $("#zuridiv").hide();
})
$("#bzuri").click(function(){
    $("#bzurili").addClass("active");
    $("#zuridiv").show();
    $("#bbolili").removeClass("active");
    $("#bolivardiv").hide();
    $("#bequili").removeClass("active");
    $("#equidaddiv").hide();
    $("#bmapli").removeClass("active");
    $("#mapfrediv").hide();
    $("#bprevili").removeClass("active");
    $("#previsoradiv").hide();
    $("#bsolili").removeClass("active");
    $("#solidariadiv").hide();
    $("#blibeli").removeClass("active");
    $("#libertydiv").hide();
    $("#bestali").removeClass("active");
    $("#estadodiv").hide();
    $("#baxali").removeClass("active");
    $("#axadiv").hide();
    $("#bhdili").removeClass("active");
    $("#hdidiv").hide();
    $("#bsbsli").removeClass("active");
    $("#sbsdiv").hide();
    $("#ballili").removeClass("active");
    $("#allianzdiv").hide();
})
