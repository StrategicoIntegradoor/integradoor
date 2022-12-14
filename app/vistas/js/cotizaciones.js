$(document).ready(function () {

    const aseguradorasExitosas = []
    
	// Mostrar alertas
	const alertas = new Promise((resolve, reject) => {
		const requestOptions = {
			method: 'POST',
			headers: { 'Content-Type': 'application/json' },
			body: JSON.stringify({ obtenerAlertas: true, cotizacion: idCotizacion }),
		  };
		
		  fetch('ajax/alerta_aseguradora.ajax.php', requestOptions)
			.then((response) => response.json())
			.then(result => resolve(result));
	});
	alertas.then(result => {
	    console.log(alertas)
		result.forEach(alerta => {
			if (alerta.exitosa == '1') {
				if (!aseguradorasExitosas.includes(alerta.aseguradora)) { 
                    document.querySelector('.exitosas').innerHTML += `<span style="margin-right: 15px;"><i class="fa fa-check" aria-hidden="true" style="color: green; margin-right: 5px;
                    "></i>${alerta.aseguradora}</span>
                    `
                    aseguradorasExitosas.push(alerta.aseguradora)
                }
			} else {
				document.querySelector('.fallidas').innerHTML += `<p><i class="fa fa-times" aria-hidden="true" style="color: red; margin-right: 10px;"></i>${alerta.aseguradora}: ${alerta.mensaje}</p>`
			}
		})
	})

	// Limpia los contenedores de las Cards y del Boton PDF y Recotiza
	$("#btnRecotizar").click(function () {
		document.getElementById("formularioCotizacionManual").style.display =
		  "none";
		let cardCotizacion = document.querySelector("#cardCotizacion");
		cardCotizacion.innerHTML = "";
		cotizarOfertas();
	  });

  // Limpia los contenedores de las Cards y del Boton PDF y Recotiza
  $("#btnRecotizar").click(function () {
    document.getElementById("formularioCotizacionManual").style.display =
      "none";
    let cardCotizacion = document.querySelector("#cardCotizacion");
    cardCotizacion.innerHTML = "";
    cotizarOfertas();
  });

  // Visualiza el formulario para agregar cotizaciones manualmente
  $("#btnMostrarFormCotManual").click(function () {
    Swal.fire({
      icon: 'error',
      title: '¡Esta opción no está disponible en la versión Demo!',
      confirmButtonText: 'Cerrar',
    }).then((result) => {
      if (result.isConfirmed) {
      } else if (result.isDenied) {
      }
    })

    // document.getElementById("formularioCotizacionManual").style.display =
    //   "block";
    // document.querySelector(".btnAgregar").innerHTML =
    //   '<button class="btn btn-primary btn-block" id="btnAgregarCotizacion">Agregar Cotización</button>';
    // $("#btnAgregarCotizacion").click(function () {
    //   agregarCotizacion();
    // });
    // vaciarCamposOfertaManual();
    // menosVeh();
    // masAgr();
  });

  // Funcion para seleccionar el Producto Manualmente
  $("#aseguradora").change(function () {
    selecProductoManual();
  });

  // Función para seleccionar RC Manualmente
  $("#producto").change(function () {
    selecRCManual();
  });

  // Función para cargar las Coberturas Manualmente
  $("#valorRC").change(function () {
    selecCoberturasManual();
  });

  // Ejectura la funcion Agregar Cotizacion Manualmente
  $("#btnAgregarCotizacion").click(function () {
    agregarCotizacion();
  });

  // Imprimir Parrilla de Cotizaciones
  $("#btnParrillaPDF").click(function () {
    var todosOn = $(".classSelecOferta:checked").length;
    var idCotizacionPDF = idCotizacion;

    if (!todosOn) {
      swal({
        text: "! Por favor seleccione como minimo una cotización de la Parrilla. ¡",
      });
    } else {
      // window.open("comparador.php?cotizacion="+idCotizacionPDF, "_blank");
      window.open(
        "extensiones/tcpdf/pdf/comparador.php?cotizacion=" + idCotizacionPDF,
        "_blank"
      );
    }
  });

  // Imprimir Parrilla de Cotizaciones
  $("#btnParrillaPDF2").click(function () {
    var todosOn = $(".classSelecOferta:checked").length;
    var idCotizacionPDF = idCotizacion;

    if (!todosOn) {
      swal({
        text: "! Por favor seleccione como minimo una cotización de la Parrilla. ¡",
      });
    } else {
      // window.open("comparador.php?cotizacion="+idCotizacionPDF, "_blank");
      window.open(
        "extensiones/tcpdf/pdf/comparadorPesados.php?cotizacion=" +
          idCotizacionPDF,
        "_blank"
      );
    }
  });

  /*=============================================
	BOTON EDITAR COTIZACIÓN
	=============================================*/
  $(".tablas-cotizaciones").on("click", ".btnEditarCotizacion", function () {
    var idCotizacion = $(this).attr("idCotizacion");
    window.location =
      "index.php?ruta=editar-cotizacion&idCotizacion=" + idCotizacion;
    // $.redirect("editar-cotizacion", { idCotizacion: idCotizacion }, "POST");
  });

  /*=============================================
	ELIMINAR COTIZACIÓN
	=============================================*/
  $(".tablas-cotizaciones").on("click", ".btnEliminarCotizacion", function () {
    var idCotizacion = $(this).attr("idCotizacion");

    swal({
      title: "¿Está seguro de borrar la cotización?",
      text: "¡Si no lo está puede cancelar la acción!",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      cancelButtonText: "Cancelar",
      confirmButtonText: "Si, borrar cotización!",
    }).then(function (result) {
      if (result.value) {
        window.location = "index.php?ruta=inicio&idCotizacion=" + idCotizacion;
      }
    });
  });

  /*===================================================
	CONFIGURACION DE LA TABLA DATATABLE PARA COTIZACIONES
	===================================================*/
  $(".tablas-cotizaciones").DataTable({
    order: [
      [0, "desc"],
      [1, "desc"],
    ],
    // "ordering": false,
    language: {
      sProcessing: "Procesando...",
      sLengthMenu: "Mostrar _MENU_ registros",
      sZeroRecords: "No se encontraron resultados",
      sEmptyTable: "Ningún dato disponible en esta tabla",
      sInfo: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
      sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0",
      sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
      sInfoPostFix: "",
      sSearch: "Buscar:",
      sUrl: "",
      sInfoThousands: ",",
      sLoadingRecords: "Cargando...",
      oPaginate: {
        sFirst: "Primero",
        sLast: "Último",
        sNext: "Siguiente",
        sPrevious: "Anterior",
      },
      oAria: {
        sSortAscending:
          ": Activar para ordenar la columna de manera ascendente",
        sSortDescending:
          ": Activar para ordenar la columna de manera descendente",
      },
    },
  });

  /*=============================================
	ADICIONAR CLASES PERSONALIZADAS AL DATERANGE
	=============================================*/
  $("#daterange-btnCotizaciones").on("click", function () {
    $(".daterangepicker.opensleft .ranges li.active").addClass(
      "liCotizaciones"
    );
  });

  /*=============================================
	RANGO DE FECHAS
	=============================================*/
  $("#daterange-btnCotizaciones").daterangepicker(
    {
      ranges: {
        Hoy: [moment(), moment()],
        Ayer: [moment().subtract(1, "days"), moment().subtract(1, "days")],
        "Últimos 7 días": [moment().subtract(6, "days"), moment()],
        "Últimos 30 días": [moment().subtract(29, "days"), moment()],
        "Este mes": [moment().startOf("month"), moment().endOf("month")],
        "Último mes": [
          moment().subtract(1, "month").startOf("month"),
          moment().subtract(1, "month").endOf("month"),
        ],
      },
      startDate: moment(),
      endDate: moment(),
    },
    function (start, end) {
      $("#daterange-btnCotizaciones span").html(
        start.format("MMMM D, YYYY") + " - " + end.format("MMMM D, YYYY")
      );

      var fechaInicialCotizaciones = start.format("YYYY-MM-DD");

      var fechaFinalCotizaciones = end.format("YYYY-MM-DD");

      var capturarRango = $("#daterange-btnCotizaciones span").html();

      localStorage.setItem("capturarRango", capturarRango);

      window.location =
        "index.php?ruta=inicio&fechaInicialCotizaciones=" +
        fechaInicialCotizaciones +
        "&fechaFinalCotizaciones=" +
        fechaFinalCotizaciones;
    }
  );

  /*=============================================
	CANCELAR RANGO DE FECHAS
	=============================================*/
  $("#daterange-btnCotizaciones").on(
    "cancel.daterangepicker",
    function (ev, picker) {
      localStorage.removeItem("capturarRango");
      localStorage.clear();
      window.location = "inicio";
    }
  );

  /*=============================================
	CAPTURAR HOY
	=============================================*/
  $(".daterangepicker.opensleft").on("click", ".liCotizaciones", function () {
    var textoHoy = $(this).attr("data-range-key");

    if (textoHoy == "Hoy") {
      var d = new Date();
      var dia = d.getDate();
      var mes = d.getMonth() + 1;
      var año = d.getFullYear();

      dia = ("0" + dia).slice(-2);
      mes = ("0" + mes).slice(-2);

      var fechaInicialCotizaciones = año + "-" + mes + "-" + dia;
      var fechaFinalCotizaciones = año + "-" + mes + "-" + dia;

      localStorage.setItem("capturarRango", "Hoy");
      window.location =
        "index.php?ruta=inicio&fechaInicialCotizaciones=" +
        fechaInicialCotizaciones +
        "&fechaFinalCotizaciones=" +
        fechaFinalCotizaciones;
    }
  });
});

/*================================================
// CAPTURA LA URL DE LA PAGINA EDITAR COTIZACIONES
================================================*/

var urlPage = new URL(window.location.href); // Instancia la URL Actual
var options = urlPage.searchParams.getAll("idCotizacion"); //Buscar todos los parametros
if (options.length > 0) {
  editarCotizacion(options[0]);
}

/*=============================================
EDITAR COTIZACION
=============================================*/

var numId = 1;

function editarCotizacion(id) {
  idCotizacion = id; // Almacena el Id en la variable global de idCotización

  var datos = new FormData();
  datos.append("idCotizacion", idCotizacion);

  /*=============================================			
	INFORMACION DEL ASEGURADO Y DEL VEHICULO
	=============================================*/
  $.ajax({
    url: "ajax/cotizaciones.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      /* FORMULARIO INFORMACIÓN DEL ASEGURADO */
      $("#placaVeh").val(respuesta["cot_placa"]);
      $("#idCliente").val(respuesta["id_cliente"]);
      $("#tipoDocumentoID").val(respuesta["id_tipo_documento"]);
      $("#numDocumentoID").val(respuesta["cli_num_documento"]);
      $("#txtNombres").val(respuesta["cli_nombre"]);
      $("#txtApellidos").val(respuesta["cli_apellidos"]);
      $("#genero").val(respuesta["cli_genero"]);
      $("#estadoCivil").val(respuesta["id_estado_civil"]);
      $("#emailID").val(respuesta["cli_email"]);
      $("#telefonoID").val(respuesta["cli_telefono"]);


      var fecha = respuesta["cli_fch_nacimiento"].split("-");
      var nombreMes = obtenerNombreMes(fecha[1]);
      $("#dianacimiento").append(
        "<option value='" + fecha[2] + "' selected>" + fecha[2] + "</option>"
      );
      $("#mesnacimiento").append(
        "<option value='" +
          fecha[1] +
          "' selected>" +
          nombreMes[0].toUpperCase() +
          nombreMes.slice(1) +
          "</option>"
      );
      $("#anionacimiento").append(
        "<option value='" + fecha[0] + "' selected>" + fecha[0] + "</option>"
      );

      /* FORMULARIO INFORMACIÓN DEL VEHICULO */
      if (respuesta["cot_cerokm"] == 1) {
        document.getElementById("contenPlaca").style.display = "none";
        document.getElementById("contenCeroKM").style.display = "block";
        $("#txtConocesLaPlacaNo").prop("checked", true);
        $("#txtEsCeroKmSi").prop("checked", true);
      }

      if (respuesta["cot_placa"] == "KZY000") {
        $("#txtPlacaVeh").val("SIN PLACA - VEHÍCULO 0 KM").val();
      } else {
        $("#txtPlacaVeh").val(respuesta["cot_placa"]).val();
      }

      $("#CodigoClase").val(respuesta["cot_cod_clase"]);
      $("#txtClaseVeh").val(respuesta["cot_clase"]);
      $("#txtMarcaVeh").val(respuesta["cot_marca"]);
      $("#txtModeloVeh").val(respuesta["cot_modelo"]);
      $("#txtReferenciaVeh").val(respuesta["cot_linea"]);
      $("#txtFasecolda").val(respuesta["cot_fasecolda"]);
      $("#txtValorFasecolda").val(respuesta["cot_valor_asegurado"]);
      $("#txtTipoUsoVehiculo").val(respuesta["cot_tip_uso"]);
      $("#txtTipoServicio").val(respuesta["cot_tip_servicio"]);
      $("#DptoCirculacion").append(
        "<option value='" +
          respuesta["cot_departamento"] +
          "' selected>" +
          departamentoVeh(respuesta["cot_departamento"]) +
          "</option>"
      );

      var posicion = respuesta["Nombre"].split("-");
      var ciudad = posicion[0].toLowerCase();
      var nomCiudad = ciudad.replace(/^(.)|\s(.)/g, function ($1) {
        return $1.toUpperCase();
      });
      $("#ciudadCirculacion").append(
        "<option value='" +
          respuesta["cot_ciudad"] +
          "' selected>" +
          nomCiudad +
          "</option>"
      );

      if (respuesta["cot_bnf_oneroso"] != "") {
        $("#esOnerosoSi").prop("checked", true);
        $("#benefOneroso").val(respuesta["cot_bnf_oneroso"]);
        document.getElementById("contenBenefOneroso").style.display = "block";
      } else {
        $("#esOnerosoNo").prop("checked", true);
      }

      /*=============================================			
			// CONSULTA LAS OFERTAS DE LA COTIZACION
			=============================================*/
      var datos2 = new FormData();
      datos2.append("idCotizaOferta", idCotizacion);

      $.ajax({
        url: "ajax/cotizaciones.ajax.php",
        method: "POST",
        data: datos2,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
          // console.log(respuesta);
          if (respuesta.length > 0) {
            var cardCotizacion = "";

            respuesta.forEach(function (oferta, i) {
              var primaFormat = formatNumber(oferta.Prima);
              var valorRCFormat = formatNumber(oferta.ValorRC);

              if (
                oferta.Aseguradora == "SBS Seguros" &&
                oferta.Producto == "RCE Daños"
              ) {
                oferta.PerdidaTotal = "Cubrimiento al 100% (Daños)";
                oferta.PerdidaParcial = "Deducible 10% - 1 SMMLV (Daños)";
              } else if (
                oferta.Aseguradora == "SBS Seguros" &&
                oferta.Producto == "RCE Hurto"
              ) {
                oferta.PerdidaTotal = "Cubrimiento al 100% (Hurto)";
                oferta.PerdidaParcial = "Deducible 10% - 1 SMMLV (Hurto)";
              }

              if (oferta.seleccionar == "Si") {
                var selecChecked = "checked";
              }
              if (oferta.recomendar == "Si") {
                var recomChecked = "checked";
              }

              cardCotizacion += `
								<div class='col-lg-12'>
									<div class='card-ofertas'>
										<div class='row card-body'>
											<div class="col-xs-12 col-sm-6 col-md-2 oferta-logo">
												<img src='${oferta.logo}'>
											</div>
											<div class="col-xs-12 col-sm-6 col-md-2 oferta-header">
												<h5 class='entidad'>${oferta.Aseguradora} - ${oferta.Producto}</h5>
												<h5 class='precio'>Desde $ ${primaFormat}</h5>
												<p class='title-precio'>Precio</p>
											</div>
											<div class="col-xs-12 col-sm-6 col-md-4">
												<ul class="list-group">
													<li class="list-group-item">
														<span class="badge">* $${valorRCFormat}</span>
														Responsabilidad Civil (RCE)
													</li>
													<li class="list-group-item">
														<span class="badge">* ${oferta.PerdidaTotal}</span>
														Pérdida Total Daños y Hurto
													</li>
													<li class="list-group-item">
														<span class="badge">* ${oferta.PerdidaParcial}</span>
														Pérdida Parcial Daños y Hurto
													</li>
													<li class="list-group-item">
														<span class="badge">* ${oferta.ConductorElegido}</span>
														Conductor elegido
													</li>
													<li class="list-group-item">
														<span class="badge">* ${oferta.Grua}</span>
														Servicio de Grúa
													</li>
												</ul>
											</div>
											<div class="col-xs-12 col-sm-6 col-md-2">
											<div class="selec-oferta">
												<label for="seleccionar">SELECCIONAR</label>&nbsp;&nbsp;
												<input type="checkbox" class="classSelecOferta" name="selecOferta" id="selec${oferta.NumCotizOferta}${numId}\" onclick='seleccionarOferta(\"${oferta.Aseguradora}\", \"${oferta.Prima}\", \"${oferta.Producto}\", \"${oferta.NumCotizOferta}\", this);' ${selecChecked}/>
											</div>
											<div class="recom-oferta">
												<label for="recomendar">RECOMENDAR</label>&nbsp;&nbsp;
												<input type="checkbox" class="classRecomOferta" name="recomOferta" id="recom${oferta.NumCotizOferta}${numId}\" onclick='recomendarOferta(\"${oferta.Aseguradora}\", \"${oferta.Prima}\", \"${oferta.Producto}\", \"${oferta.NumCotizOferta}\", this);' ${recomChecked}/>
											</div>
											</div>`;
              if (oferta.Manual == "1") {
                cardCotizacion += `
							<div class="col-xs-12 col-sm-6 col-md-2 verpdf-oferta">
								<button type="button" class="btn btn-success editar-manual" id="${oferta.id_oferta}">
									<div>EDITAR &nbsp;&nbsp;<span class="fa fa-edit"></span></div>
								</button>
								<button type="button" class="btn btn-danger eliminar-manual" id="eliminar-${oferta.id_oferta}">
									<div>ELIMINAR &nbsp;&nbsp;<span class="fa fa-trash"></span></div>
								</button>
							</div>`;
              }
              if (oferta.Manual == "1" && oferta.UrlPdf != "") {
                cardCotizacion += `
							<div class="col-xs-12 col-sm-6 col-md-2 verpdf-oferta">
								<a type="button" class="btn btn-info" href="${oferta.UrlPdf}">
									<div>VER PDF &nbsp;&nbsp;<span class="fa fa-file-text"></span></div>
								</a>
							</div>`;
              }
              if (
                oferta.Manual == "0" &&
                (oferta.Aseguradora == "Seguros Bolivar" ||
                  oferta.Aseguradora == "Axa Colpatria")
              ) {
                cardCotizacion += `
											<div class="col-xs-12 col-sm-6 col-md-2 verpdf-oferta">
											<button type="button" class="btn btn-info" id="btnAsegPDF${oferta.NumCotizOferta}${numId}\" onclick='verPdfOferta(\"${oferta.Aseguradora}\", \"${oferta.NumCotizOferta}\", \"${numId}\");'>
												<div id="verPdf${oferta.NumCotizOferta}${numId}\">VER PDF &nbsp;&nbsp;<span class="fa fa-file-text"></span></div>
											</button>
											</div>`;
              } else if (
                oferta.Manual == "0" &&
                oferta.Aseguradora == "Seguros del Estado" &&
                oferta.UrlPdf !== null
              ) {
                cardCotizacion += `
											<div class="col-xs-12 col-sm-6 col-md-2 verpdf-oferta">
											<button type="button" class="btn btn-info" id="btnAsegPDF${oferta.NumCotizOferta}${numId}\" onclick='verPdfEstado(\"${oferta.Aseguradora}\", \"${oferta.NumCotizOferta}\", \"${numId}\", \"${oferta.UrlPdf}\");'>
												<div id="verPdf${oferta.NumCotizOferta}${numId}\">VER PDF &nbsp;&nbsp;<span class="fa fa-file-text"></span></div>
											</button>
											</div>`;
              } else if (
                oferta.Manual == "0" &&
                oferta.Aseguradora == "Aseguradora Solidaria"
              ) {
                cardCotizacion += `
											<div class="col-xs-12 col-sm-6 col-md-2 verpdf-oferta">
    											<button id="solidaria-pdf" type="button" class="btn btn-info" onclick='verPdfSolidaria(${oferta.NumCotizOferta})'>
    												<div>VER PDF &nbsp;&nbsp;<span class="fa fa-file-text"></span></div>
    											</button>
											</div>`;
              } else if (
                oferta.Manual == "0" &&
                oferta.Aseguradora == "Zurich"
              ) {
                cardCotizacion += `
											<div class="col-xs-12 col-sm-6 col-md-2 verpdf-oferta">
    											<button id="solidaria-pdf" type="button" class="btn btn-info" onclick='verPdfZurich(${oferta.NumCotizOferta})'>
    												<div>VER PDF &nbsp;&nbsp;<span class="fa fa-file-text"></span></div>
    											</button>
											</div>`;
              }
              cardCotizacion += `
										</div>
									</div>
								</div>
							`;

              numId++;
            });

            $("#cardCotizacion").html(cardCotizacion);
            const updateManualQuotes =
              document.querySelectorAll(".editar-manual");
            updateManualQuotes.forEach((e) => {
              e.addEventListener("click", (e) => {
                const id = e.path[1].id;
                getManualOffer(id);
              });
            });
            const deleteManualQuotes =
              document.querySelectorAll(".eliminar-manual");
            deleteManualQuotes.forEach((e) => {
              e.addEventListener("click", (e) => {
                let id = e.path[1].id;
                id = id.split("-")[1];
                deleteManualOffer(id);
              });
            });
          } else {
            $("#loaderOferta").html("");
            swal({
              type: "warning",
              title: "¡ UPS, Lo Sentimos !",
              text: "¡ No hay ofertas disponibles para tu vehículo !",
              showConfirmButton: true,
              confirmButtonText: "Cerrar",
            });
          }
          document.getElementById("headerAsegurado").style.display = "block";
          document.getElementById("contenSuperiorPlaca").style.display = "none";
          document.getElementById("contenBtnConsultarPlaca").style.display =
            "none";
          document.getElementById("resumenVehiculo").style.display = "block";
          // Oculta el Boton Cotizar Ofertas al cargar la Parrilla
          document.getElementById("contenBtnCotizar").style.display = "none";
          // Muestra los Botones Recotizar y Agregar Cotizacion
          document.getElementById("contenRecotizarYAgregar").style.display =
            "block";
          // Muestra el Contenido de la Parrilla de Ofertas, Cotizaciones Manuales y PDF
          document.getElementById("contenParrilla").style.display = "block";
          menosAseg();
        },
      });
    },
  });
}

/*===============================================
FUNCION PARA SELECCIONAR OFERTA DE LA ASEGURADORA
===============================================*/
function seleccionarOferta(
  aseguradora,
  prima,
  producto,
  numCotizOferta,
  valCheck
) {
  var idSelecOferta = idCotizacion;
  var placa = document.getElementById("placaVeh").value;

  // Capturamos el Id del Checkbox seleccionado
  var idCheckbox = $(valCheck).attr("id");
  var seleccionar = "";

  if (document.getElementById(idCheckbox).checked) {
    seleccionar = "Si";
  }

  $.ajax({
    type: "POST",
    url: "src/seleccionarOferta.php",
    dataType: "json",
    data: {
      placa: placa,
      idCotizacion: idSelecOferta,
      aseguradora: aseguradora,
      numCotizOferta: numCotizOferta,
      producto: producto,
      valorPrima: prima,
      seleccionar: seleccionar,
    },
    success: function (data) {
      console.log(data);
    },
  });
}

/*===============================================
FUNCION PARA RECOMENDAR OFERTA DE LA ASEGURADORA
===============================================*/
function recomendarOferta(
  aseguradora,
  prima,
  producto,
  numCotizOferta,
  valCheck
) {
  var idRecomOferta = idCotizacion;
  var placa = document.getElementById("placaVeh").value;

  // Capturamos el Id del Checkbox seleccionado
  var idCheckbox = $(valCheck).attr("id");
  var recomendar = "";

  if (document.getElementById(idCheckbox).checked) {
    recomendar = "Si";
  }

  // Valida que no se Recomiende mas de 3 Ofertas.
  if ($(".classRecomOferta:checked").length > 3) {
    $("#" + idCheckbox).prop("checked", false); // Permite deselecionar el Checkbox
    swal({
      text: "! No se permite recomendar mas de 3 Ofertas por Parrilla. ¡",
    });
  } else {
    $.ajax({
      type: "POST",
      url: "src/recomendarOferta.php",
      dataType: "json",
      data: {
        placa: placa,
        idCotizacion: idRecomOferta,
        aseguradora: aseguradora,
        numCotizOferta: numCotizOferta,
        producto: producto,
        valorPrima: prima,
        recomendar: recomendar,
      },
      success: function (data) {
        console.log(data);
      },
    });
  }
}

/*==================================================
FUNCION PARA CARGAR EL PDF OFICIAL DE LA ASEGURADORA
==================================================*/
function verPdfOferta(aseguradora, numCotizOferta, numId) {
  

  Swal.fire({
    icon: 'error',
    title: '¡Esta opción no está disponible en la versión Demo!',
    confirmButtonText: 'Cerrar',
  }).then((result) => {
    if (result.isConfirmed) {
    } else if (result.isDenied) {
    }
  })
  
  // $("#verPdf" + numCotizOferta + numId).html(
  //   "VER PDF &nbsp;&nbsp;<img src='vistas/img/plantilla/loading.gif' width='18' height='18'>"
  // );

  // var ventanaPDF = window.open(
  //   "",
  //   aseguradora,
  //   "width=" + 1024 + ", height=" + 768
  // );
  // // var ventanaPDF = window.open('http://example.com/waiting.html', '_blank'); // Carga otra pagina
  // ventanaPDF.document.write("Cargando vista previa Pdf " + aseguradora + "..."); // Carga un mensaje de espera

  // var myHeaders = new Headers(); // Cabecera del Metodo
  // myHeaders.append("Content-Type", "application/json");

  // var raw = JSON.stringify({
  //   aseguradora: aseguradora,
  //   numero_cotizacion: numCotizOferta,
  // });
  // var requestOptions = {
  //   mode: "cors",
  //   method: "POST",
  //   headers: myHeaders,
  //   body: raw,
  //   redirect: "follow",
  // };

  // // Llama la URL del PDF oficial de la oferta generada por la aseguradora
  // fetch(
  //   "https://www.grupoasistencia.com/webservice_autosv1/ImpresionPdf",
  //   requestOptions
  // )
  //   .then(function (response) {
  //     if (!response.ok) {
  //       throw Error(response.statusText);
  //     }
  //     return response.json();
  //   })
  //   .then(function (data) {
  //     ventanaPDF.location.href = data;
  //     $("#verPdf" + numCotizOferta + numId).html(
  //       'VER PDF &nbsp;&nbsp;<span class="fa fa-file-text"></span>'
  //     );
  //   })
  //   .catch(function (error) {
  //     console.log("Parece que hubo un problema: \n", error);
  //   });
}

/*======================================================
FUNCION PARA CARGAR EL PDF OFICIAL DE SEGUROS DEL ESTADO
======================================================*/
function verPdfEstado(aseguradora, numCotizOferta, numId, UrlPdf) {

  Swal.fire({
    icon: 'error',
    title: '¡Esta opción no está disponible en la versión Demo!',
    confirmButtonText: 'Cerrar',
  }).then((result) => {
    if (result.isConfirmed) {
    } else if (result.isDenied) {
    }
  })

  // $("#verPdf" + numCotizOferta + numId).html(
  //   "VER PDF &nbsp;&nbsp;<img src='vistas/img/plantilla/loading.gif' width='18' height='18'>"
  // );

  // var ventanaPDF = window.open(
  //   "",
  //   aseguradora,
  //   "width=" + 1024 + ", height=" + 768
  // );
  // ventanaPDF.document.write("Cargando vista previa Pdf " + aseguradora + "..."); // Carga un mensaje de espera
  // ventanaPDF.location.href = UrlPdf;

  // setTimeout(function () {
  //   $("#verPdf" + numCotizOferta + numId).html(
  //     'VER PDF &nbsp;&nbsp;<span class="fa fa-file-text"></span>'
  //   );
  // }, 6000);
}

/*======================================================
FUNCION PARA CARGAR EL PDF OFICIAL DE SOLIDARIA
======================================================*/
const verPdfSolidaria = async (cotizacion) => {

  Swal.fire({
    icon: 'error',
    title: '¡Esta opción no está disponible en la versión Demo!',
    confirmButtonText: 'Cerrar',
  }).then((result) => {
    if (result.isConfirmed) {
        window.location = "inicio";
    } else if (result.isDenied) {
    }
  })

  // let base64 = await obtenerPdfSolidaria(cotizacion);
  // base64 = base64.slice(1, -1);

  // const linkSource = `data:application/pdf;base64,${base64}`;
  // const downloadLink = document.createElement("a");
  // const fileName = cotizacion + ".pdf";

  // downloadLink.href = linkSource;
  // downloadLink.download = fileName;
  // downloadLink.click();
};

const obtenerPdfSolidaria = async (cotizacion) => {

  Swal.fire({
    icon: 'error',
    title: '¡Esta opción no está disponible en la versión Demo!',
    confirmButtonText: 'Cerrar',
  }).then((result) => {
    if (result.isConfirmed) {
        window.location = "inicio";
    } else if (result.isDenied) {
    }
  })

  // const formData = new FormData();
  // formData.append("cotizacion", cotizacion);

  // const pdfText = await fetch(
  //   "https://www.grupoasistencia.com/webservice_autosv1/WSSolidaria/get_pdf.php",
  //   {
  //     method: "POST",
  //     body: formData,
  //   }
  // )
  //   .then((response) => response.text())
  //   .then((responseText) => {
  //     return responseText;
  //   });

  // return pdfText;
};

/*======================================================
FUNCION PARA CARGAR EL PDF OFICIAL DE ZURICH
======================================================*/
const verPdfZurich = async (cotizacion) => {

  Swal.fire({
    icon: 'error',
    title: '¡Esta opción no está disponible en la versión Demo!',
    confirmButtonText: 'Cerrar',
  }).then((result) => {
    if (result.isConfirmed) {
        window.location = "inicio";
    } else if (result.isDenied) {
    }
  })


  // let base64 = await obtenerPdfZurich(cotizacion);
  // base64 = base64.slice(1, -1);

  // const linkSource = `data:application/pdf;base64,${base64}`;
  // const downloadLink = document.createElement("a");
  // const fileName = cotizacion + ".pdf";

  // downloadLink.href = linkSource;
  // downloadLink.download = fileName;
  // downloadLink.click();
};

const obtenerPdfZurich = async (cotizacion) => {
  Swal.fire({
    icon: 'error',
    title: '¡Esta opción no está disponible en la versión Demo!',
    confirmButtonText: 'Cerrar',
  }).then((result) => {
    if (result.isConfirmed) {
        window.location = "inicio";
    } else if (result.isDenied) {
    }
  })

  // const formData = new FormData();
  // formData.append("cotizacion", cotizacion);

  // const pdfText = await fetch(
  //   "https://www.grupoasistencia.com/webservice_autosv1/WSZurich/get_pdf.php",
  //   {
  //     method: "POST",
  //     body: formData,
  //   }
  // )
  //   .then((response) => response.text())
  //   .then((responseText) => {
  //     return responseText;
  //   });

  // return pdfText;
};

/*==================================================
FUNCION PARA CARGAR EL PRODUCTO DE LA ASEGURADORA
==================================================*/
function selecProductoManual() {
  vaciarCamposOfertaManual();
  var aseguradora = $("#aseguradora").val();

  $.ajax({
    type: "POST",
    url: "src/seleccionarProducto.php",
    dataType: "json",
    data: {
      aseguradora: aseguradora,
    },
    cache: false,
    success: function (data) {
      // console.log(data);
      var producto = "<option value=''>Seleccione Producto</option>";

      $.each(data, function (key, item) {
        producto +=
          "<option value='" +
          item.producto +
          "'>" +
          item.producto +
          "</option>";
      });

      $("#producto").html(producto);
    },
  });
}

/*==================================================
FUNCION PARA CARGAR LAS COBERTURAS
==================================================*/
function selecRCManual() {
  var aseguradora = $("#aseguradora").val();
  var producto = $("#producto").val();

  $.ajax({
    type: "POST",
    url: "src/seleccionarRC.php",
    dataType: "json",
    data: {
      aseguradora: aseguradora,
      producto: producto,
    },
    cache: false,
    success: function (data) {
      // console.log(data);
      if (data.length > 1) {
        var valorRC = "<option value=''>Seleccione RC</option>";

        $.each(data, function (key, item) {
          valorRC +=
            "<option value='" + item.rce + "'>" + item.rce + "</option>";
        });
        $("#valorRC").html(valorRC);
      } else {
        $("#valorRC").html(
          "<option value='" +
            data[0].rce +
            "' selected>" +
            data[0].rce +
            "</option>"
        );
        selecCoberturasManual();
      }
    },
  });
}

/*==================================================
FUNCION PARA CARGAR LAS COBERTURAS
==================================================*/
function selecCoberturasManual() {
  var aseguradora = $("#aseguradora").val();
  var producto = $("#producto").val();
  var valorRC = $("#valorRC").val();
  var modeloVeh = $("#txtModeloVeh").val();
  var valorFasecolda = $("#txtValorFasecolda").val();

  var diaNac = $("#dianacimiento").val();
  var mesNac = $("#mesnacimiento").val();
  var anioNac = $("#anionacimiento").val();
  var fechaNacimiento = diaNac + "/" + mesNac + "/" + anioNac;

  $.ajax({
    type: "POST",
    url: "src/seleccionarCoberturas.php",
    dataType: "json",
    data: {
      aseguradora: aseguradora,
      producto: producto,
      valorRC: valorRC,
    },
    cache: false,
    success: function (data) {
      // console.log(data);
      var edadVeh = new Date().getFullYear() - modeloVeh;
      var edadAseg = calcularEdad(fechaNacimiento);

      var perdTotales = data.pth;
      var perdParcialDanio = data.ppd;

      if (
        (aseguradora == "Seguros Bolivar" && producto == "Estandar") ||
        producto == "Clasico"
      ) {
        if (edadVeh <= 5) {
          perdTotales = "Cubrimiento al 100%";
        } else {
          perdTotales = "Cubrimiento al 90%";
        }
      }

      if (
        (aseguradora == "Axa Colpatria" && producto == "Plus") ||
        producto == "VIP" ||
        producto == "Tradicional"
      ) {
        if (edadVeh <= 11 && edadAseg > 33) {
          perdParcialDanio = "Deducible unico: $700.000";
        } else {
          perdParcialDanio = "Deducible 10% - 1 SMMLV";
        }
      }

      if (aseguradora == "Allianz Seguros" && producto == "Motocicletas") {
        if (valorFasecolda <= 6000000) {
          perdTotales =
            "Cubrimiento al " +
            calcularPerdTotalAllianz(valorFasecolda, 800000) +
            "%";
          perdParcialDanio = "Deducible unico: $800.000";
        } else if (valorFasecolda > 6000000 && valorFasecolda <= 10000000) {
          perdTotales =
            "Cubrimiento al " +
            calcularPerdTotalAllianz(valorFasecolda, 1350000) +
            "%";
          perdParcialDanio = "Deducible unico: $1.350.000";
        } else if (valorFasecolda > 10000000 && valorFasecolda <= 20000000) {
          perdTotales =
            "Cubrimiento al " +
            calcularPerdTotalAllianz(valorFasecolda, 2000000) +
            "%";
          perdParcialDanio = "Deducible unico: $2.000.000";
        } else if (valorFasecolda > 20000000 && valorFasecolda <= 30000000) {
          perdTotales =
            "Cubrimiento al " +
            calcularPerdTotalAllianz(valorFasecolda, 3000000) +
            "%";
          perdParcialDanio = "Deducible unico: $3.000.000";
        } else if (valorFasecolda > 30000000) {
          perdTotales =
            "Cubrimiento al " +
            calcularPerdTotalAllianz(valorFasecolda, 4000000) +
            "%";
          perdParcialDanio = "Deducible unico: $4.000.000";
        }
      }

      $("#valorPerdidaTotal").val(perdTotales);
      $("#valorPerdidaParcial").val(perdParcialDanio);
      $("#conductorElegido").val(data.CE);
      $("#servicioGrua").val(data.Grua);
    },
  });
}

/*==================================================
FUNCION PARA CALCULAR LA EDAD DESDE LA FECHA DE NAC.
==================================================*/
function calcularEdad(fecha) {
  var fechaNac = new Date(fecha);
  var fechaActual = new Date();

  var mes = fechaActual.getMonth();
  var dia = fechaActual.getDate();
  var año = fechaActual.getFullYear();

  fechaActual.setDate(dia);
  fechaActual.setMonth(mes);
  fechaActual.setFullYear(año);

  edad = Math.floor((fechaActual - fechaNac) / (1000 * 60 * 60 * 24) / 365);

  return edad;
}

/*==================================================
FUNCION PARA CALCULAR LAS PERDIDAS TOTALES "ALLIANZ"
==================================================*/
function calcularPerdTotalAllianz(valorFasecolda, deducible) {
  var cubrimiento = valorFasecolda - deducible;
  var porcentCubrimiento = Math.round((cubrimiento / valorFasecolda) * 100);
  return porcentCubrimiento;
}

/*=============================================
FUNCION PARA AGREGAR COTIZACIONES MANUALES
=============================================*/
function agregarCotizacion() {
  var aseguradora = document.getElementById("aseguradora").value;
  var producto = document.getElementById("producto").value;
  var numCotizOferta = document.getElementById("numCotizacion").value;
  var prima = document.getElementById("valorTotal").value;

  var valorRC = document.getElementById("valorRC").value;
  var PT = document.getElementById("valorPerdidaTotal").value;
  var PT2 = document.getElementById("valorPerdidaTotal").value;
  var PP = document.getElementById("valorPerdidaParcial").value;
  var PP2 = document.getElementById("valorPerdidaParcial").value;
  var CE = document.getElementById("conductorElegido").value;
  var GR = document.getElementById("servicioGrua").value;

  const pdf =
    document.getElementById("pdfCotizacion").files[0] !== undefined
      ? document.getElementById("pdfCotizacion").files[0]
      : null;
  if (pdf !== null && pdf.type !== "application/pdf") {
    alert("Solo se admiten reportes en formato PDF");

    return;
  }

  const random = Math.round(Math.random() * (99999 - 10000) + 10000);
  const rutaPdf =
    pdf !== null
      ? `reportes/cotizaciones_manuales/cot_manual_${random}_${numCotizOferta}.pdf`
      : "";

  if (
    aseguradora != "" &&
    producto != "" &&
    numCotizOferta != "" &&
    prima != "" &&
    valorRC != "" &&
    PT != "" &&
    PP != "" &&
    CE != "" &&
    GR != ""
  ) {
    var logo = logoOfertaManual(aseguradora);
    var primaFormat = formatNumber(prima);
    var valorRCFormat = valorRC;
    var cardCotizacion = "";

    if (aseguradora == "SBS Seguros" && producto == "RCE Daños") {
      PT = "Cubrimiento al 100% (Daños)";
      PP = "Deducible 10% - 1 SMMLV (Daños)";
    } else if (aseguradora == "SBS Seguros" && producto == "RCE Hurto") {
      PT = "Cubrimiento al 100% (Hurto)";
      PP = "Deducible 10% - 1 SMMLV (Hurto)";
    }

    cardCotizacion += `
				<div class='col-lg-12'>
					<div class='card-ofertas'>
						<div class='row card-body'>
							<div class="col-xs-12 col-sm-6 col-md-2 oferta-logo">
								<img src='vistas/img/logos/${logo}'>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-2 oferta-header">
								<h5 class='entidad'>${aseguradora} - ${producto}</h5>
								<h5 class='precio'>Desde $ ${primaFormat}</h5>
								<p class='title-precio'>Precio</p>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-4">
								<ul class="list-group">
									<li class="list-group-item">
										<span class="badge">* $${valorRCFormat}</span>
										Responsabilidad Civil (RCE)
									</li>
									<li class="list-group-item">
										<span class="badge">* ${PT}</span>
										Pérdida Total Daños y Hurto
									</li>
									<li class="list-group-item">
										<span class="badge">* ${PP}</span>
										Pérdida Parcial Daños y Hurto
									</li>
									<li class="list-group-item">
										<span class="badge">* ${CE}</span>
										Conductor elegido
									</li>
									<li class="list-group-item">
										<span class="badge">* ${GR}</span>
										Servicio de Grúa
									</li>
								</ul>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-2">
							  <div class="selec-oferta">
								<label for="seleccionar">SELECCIONAR</label>&nbsp;&nbsp;
								<input type="checkbox" class="classSelecOferta" name="selecOferta" id="selec${numCotizOferta}${numId}\" onclick='seleccionarOferta(\"${aseguradora}\", \"${prima}\", \"${producto}\", \"${numCotizOferta}\", this);' />
							  </div>
							  <div class="recom-oferta">
								<label for="recomendar">RECOMENDAR</label>&nbsp;&nbsp;
								<input type="checkbox" class="classRecomOferta" name="recomOferta" id="recom${numCotizOferta}${numId}\" onclick='recomendarOferta(\"${aseguradora}\", \"${prima}\", \"${producto}\", \"${numCotizOferta}\", this);' />
							  </div>
							</div>`;
    if (pdf != null) {
      cardCotizacion += `
					<div class="col-xs-12 col-sm-6 col-md-2 verpdf-oferta">
						<a type="button" class="btn btn-info" href="${rutaPdf}">
							<div>VER PDF &nbsp;&nbsp;<span class="fa fa-file-text"></span></div>
						</a>
					</div>`;
    }
    if (aseguradora == "Seguros Bolivar" || aseguradora == "Axa Colpatria") {
      cardCotizacion += `
							<div class="col-xs-12 col-sm-6 col-md-2 verpdf-oferta">
								<button type="button" class="btn btn-info" id="btnAsegPDF${numCotizOferta}${numId}\" onclick='verPdfOferta(\"${aseguradora}\", \"${numCotizOferta}\", \"${numId}\");'>
									<div id="verPdf${numCotizOferta}${numId}\">VER PDF &nbsp;&nbsp;<span class="fa fa-file-text"></span></div>
								</button>
							</div>`;
    } else if (aseguradora == "ASeguradora Solidaria") {
      cardCotizacion += `
									<div class="col-xs-12 col-sm-6 col-md-2 verpdf-oferta">
										<button id="solidaria-pdf" type="button" class="btn btn-info" onclick='verPdfSolidaria(${numCotizOferta})'>
											<div>VER PDF &nbsp;&nbsp;<span class="fa fa-file-text"></span></div>
										</button>
									</div>`;
    }
    cardCotizacion += `
							</div>
						</div>
					</div>
				</div>
		`;
    const idSelect = `selec${numCotizOferta}${numId}`;
    numId++;

    registrarOferta(
      aseguradora,
      prima,
      producto,
      numCotizOferta,
      valorRC,
      PT2,
      PP2,
      CE,
      GR,
      logo,
      rutaPdf,
      1
    )
      .then(() => {
        if (rutaPdf === null) return;
        guardarPdfCotizacioManual(rutaPdf, pdf);
      })
      .catch((err) => console.error(err));

    swal({ text: "! Cotización Registrada con Exito. ¡" });
    $("#cardAgregarCotizacion").append(cardCotizacion);
    document.querySelector(`#${idSelect}`).click();
    $("#aseguradora").val("");
    vaciarCamposOfertaManual();
  }
}

const guardarPdfCotizacioManual = (rutaPdf, archivo) => {
  return new Promise((resolve, reject) => {
    const formData = new FormData();
    formData.append("archivo", archivo);
    formData.append("urlPdf", rutaPdf);
    $.ajax({
      type: "POST",
      url: "src/guardarPdfCotizacion.php",
      data: formData,
      contentType: false,
      processData: false,
      success: (data) => {
        resolve(data);
      },
      error: (err) => {
        reject(err);
      },
    });
  });
};

/*==================================================
FUNCION PARA IDENTIFICAR EL NOMBRE DEL LOGO MANUALMETE
==================================================*/
function logoOfertaManual(aseguradora) {
  var logo = "";

  if (aseguradora == "Seguros del Estado") {
    logo = "estado.png";
  } else if (aseguradora == "Seguros Bolivar") {
    logo = "bolivar.png";
  } else if (aseguradora == "Axa Colpatria") {
    logo = "axa.png";
  } else if (aseguradora == "HDI Seguros") {
    logo = "hdi.png";
  } else if (aseguradora == "SBS Seguros") {
    logo = "sbs.png";
  } else if (aseguradora == "Allianz Seguros") {
    logo = "allianz.png";
  } else if (aseguradora == "Equidad Seguros") {
    logo = "equidad.png";
  } else if (aseguradora == "Seguros Mapfre") {
    logo = "mapfre.png";
  } else if (aseguradora == "Liberty Seguros") {
    logo = "liberty.png";
  } else if (aseguradora == "Aseguradora Solidaria") {
    logo = "solidaria.png";
  } else if (aseguradora == "Seguros Sura") {
    logo = "sura.png";
  } else if (aseguradora == "Zurich Seguros") {
    logo = "zurich.png";
  } else if (aseguradora == "Previsora Seguros") {
    logo = "previsora.png";
  } else if (aseguradora == "Previsora") {
    logo = "previsora.png";
  }

  return logo;
}

/*==========================================================
FUNCION PARA CONSULTAR EL NOMBRE DEL DEPARTAMENTO POR CODIGO
==========================================================*/
function departamentoVeh(codigoDpto) {
  var nomDpto = "";

  if (codigoDpto == 1) {
    nomDpto = "Amazonas";
  } else if (codigoDpto == 2) {
    nomDpto = "Antioquia";
  } else if (codigoDpto == 3) {
    nomDpto = "Arauca";
  } else if (codigoDpto == 4) {
    nomDpto = "Atlántico";
  } else if (codigoDpto == 5) {
    nomDpto = "Barranquilla";
  } else if (codigoDpto == 6) {
    nomDpto = "Bogotá";
  } else if (codigoDpto == 7) {
    nomDpto = "Bolívar";
  } else if (codigoDpto == 8) {
    nomDpto = "Boyacá";
  } else if (codigoDpto == 9) {
    nomDpto = "Caldas";
  } else if (codigoDpto == 10) {
    nomDpto = "Caquetá";
  } else if (codigoDpto == 11) {
    nomDpto = "Casanare";
  } else if (codigoDpto == 12) {
    nomDpto = "Cauca";
  } else if (codigoDpto == 13) {
    nomDpto = "Cesar";
  } else if (codigoDpto == 14) {
    nomDpto = "Chocó";
  } else if (codigoDpto == 15) {
    nomDpto = "Córdoba";
  } else if (codigoDpto == 16) {
    nomDpto = "Cundinamarca";
  } else if (codigoDpto == 17) {
    nomDpto = "Guainía";
  } else if (codigoDpto == 18) {
    nomDpto = "La Guajira";
  } else if (codigoDpto == 19) {
    nomDpto = "Guaviare";
  } else if (codigoDpto == 20) {
    nomDpto = "Huila";
  } else if (codigoDpto == 21) {
    nomDpto = "Magdalena";
  } else if (codigoDpto == 22) {
    nomDpto = "Meta";
  } else if (codigoDpto == 23) {
    nomDpto = "Nariño";
  } else if (codigoDpto == 24) {
    nomDpto = "Norte de Santander";
  } else if (codigoDpto == 25) {
    nomDpto = "Putumayo";
  } else if (codigoDpto == 26) {
    nomDpto = "Quindío";
  } else if (codigoDpto == 27) {
    nomDpto = "Risaralda";
  } else if (codigoDpto == 28) {
    nomDpto = "San Andrés";
  } else if (codigoDpto == 29) {
    nomDpto = "Santander";
  } else if (codigoDpto == 30) {
    nomDpto = "Sucre";
  } else if (codigoDpto == 31) {
    nomDpto = "Tolima";
  } else if (codigoDpto == 32) {
    nomDpto = "Valle del Cauca";
  } else if (codigoDpto == 33) {
    nomDpto = "Vaupés";
  } else if (codigoDpto == 34) {
    nomDpto = "Vichada";
  } else {
    nomDpto = "No Disponible";
  }
  return nomDpto;
}

/*==================================================
FUNCION PARA LIMPIAR LOS CAMPOS AGREGADOS MANUALMENTE
==================================================*/
function vaciarCamposOfertaManual() {
  $("#producto").html("");
  $("#numCotizacion").val("");
  $("#valorTotal").val("");
  $("#valorRC").html("");
  $("#valorPerdidaTotal").val("");
  $("#valorPerdidaParcial").val("");
  $("#conductorElegido").val("");
  $("#servicioGrua").val("");
}

/* EDITAR COTIZACION */
const getManualOffer = (id) => {
  $.ajax({
    type: "POST",
    url: "src/obtenerOferta.php",
    dataType: "json",
    data: { id: id },
    success: function (data) {
      const D = document;

      const aseguradoras = D.querySelectorAll(".clsAseguradora");
      aseguradoras.forEach((e) => {
        if (e.value == data.Aseguradora) {
          e.selected = true;
        }
      });

      const producto = `<option value='${data.Producto}' selected>${data.Producto}</option>`;
      D.querySelector("#producto").innerHTML = producto;

      const rce = `<option value='${data.ValorRC}' selected>${data.ValorRC}</option>`;
      D.querySelector("#valorRC").innerHTML = rce;

      D.querySelector("#numCotizacion").value = data.NumCotizOferta;

      D.querySelector("#valorTotal").value = data.Prima;

      D.querySelector("#valorPerdidaTotal").value = data.PerdidaTotal;

      D.querySelector("#valorPerdidaParcial").value = data.PerdidaParcial;

      D.querySelector("#conductorElegido").value = data.ConductorElegido;

      D.querySelector("#servicioGrua").value = data.Grua;

      D.querySelector(".btnAgregar").innerHTML =
        '<button class="btn btn-success btn-block" id="btnEditarCotizacion">Editar Cotización</button>';

      $("#btnAgregarCotizacion").click(function () {
        agregarCotizacion();
      });

      D.querySelector("#btnEditarCotizacion").addEventListener("click", (e) => {
        editarCotizacionManual(data.id_oferta);
      });

      document.getElementById("formularioCotizacionManual").style.display =
        "block";
      menosVeh();
      masAgr();
      window.scrollTo(0, 0);
    },
  });
};

const editarCotizacionManual = (id) => {
  var placa = document.getElementById("txtPlacaVeh").value;
  var numIdentificacion = document.getElementById("numDocumentoID").value;

  var aseguradora = document.getElementById("aseguradora").value;
  var producto = document.getElementById("producto").value;
  var numCotizOferta = document.getElementById("numCotizacion").value;
  var prima = document.getElementById("valorTotal").value;

  var valorRC = document.getElementById("valorRC").value;
  var PT = document.getElementById("valorPerdidaTotal").value;
  var PT2 = document.getElementById("valorPerdidaTotal").value;
  var PP = document.getElementById("valorPerdidaParcial").value;
  var PP2 = document.getElementById("valorPerdidaParcial").value;
  var CE = document.getElementById("conductorElegido").value;
  var GR = document.getElementById("servicioGrua").value;

  if (
    aseguradora != "" &&
    producto != "" &&
    numCotizOferta != "" &&
    prima != "" &&
    valorRC != "" &&
    PT != "" &&
    PP != "" &&
    CE != "" &&
    GR != ""
  ) {
    var logo = logoOfertaManual(aseguradora);
    var primaFormat = formatNumber(prima);
    var valorRCFormat = valorRC;

    $.ajax({
      type: "POST",
      url: "src/editarOferta.php",
      dataType: "json",
      data: {
        placa: placa,
        numIdentificacion: numIdentificacion,
        aseguradora: aseguradora,
        valorPrima: primaFormat,
        producto: producto,
        valorRC: valorRCFormat,
        PT: PT,
        PP: PP,
        CE: CE,
        GR: GR,
        logo: logo,
        UrlPdf: "",
        id: id,
      },
      success: function (data) {
        document.location.reload(true);
      },
    });
  }
};

const deleteManualOffer = (id) => {
  console.log(id);
  swal({
    title: "¿Está seguro de borrar la cotización?",
    text: "¡Si no lo está puede cancelar la acción!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    cancelButtonText: "Cancelar",
    confirmButtonText: "Si, borrar cotización!",
  }).then(function (result) {
    if (result.value) {
      $.ajax({
        type: "POST",
        url: "src/eliminarOferta.php",
        dataType: "json",
        data: { id: id },
        success: function (data) {
          document.location.reload(true);
        },
      });
    }
  });
};

document.querySelector("#btnCancelar").addEventListener("click", (e) => {
  document.getElementById("formularioCotizacionManual").style.display = "none";
  document.querySelector(".btnAgregar").innerHTML =
    '<button class="btn btn-info btn-block" id="btnAgregarCotizacion">Agregar Cotización</button>';
  $("#btnAgregarCotizacion").click(function () {
    agregarCotizacion();
  });
  menosAgr();
  vaciarCamposOfertaManual();
  const aseguradoras = document.querySelectorAll(".clsAseguradora");
  aseguradoras.forEach((e) => {
    if (e.value == "") {
      e.selected = true;
    }
  });
});


// FUNCION PARA OBTENER EL NOMBRE DEL MES
function obtenerNombreMes(numero) {
  var fecha = new Date();
  if (0 < numero && numero <= 12) {
    fecha.setMonth(numero - 1);
    return new Intl.DateTimeFormat("es-ES", { month: "long" }).format(fecha);
  }
}


function formatNumber(n) {
  n = String(n).replace(/\D/g, "");
  return n === "" ? n : Number(n).toLocaleString();
}


// Maximiza el formulario Datos Asegurado
function masAseg() {
  document.getElementById("DatosAsegurado").style.display = "block";
  document.getElementById("menosAsegurado").style.display = "block";
  document.getElementById("masAsegurado").style.display = "none";
}
// Minimiza el formulario Datos Asegurado
function menosAseg() {
  document.getElementById("DatosAsegurado").style.display = "none";
  document.getElementById("menosAsegurado").style.display = "none";
  document.getElementById("masAsegurado").style.display = "block";
}

// Maximizar el formulario Datos Vehiculo
function masVeh() {
  document.getElementById("DatosVehiculo").style.display = "block";
  document.getElementById("menosVehiculo").style.display = "block";
  document.getElementById("masVehiculo").style.display = "none";
}
// Minimiza el formulario Datos Vehiculo
function menosVeh() {
  document.getElementById("DatosVehiculo").style.display = "none";
  document.getElementById("menosVehiculo").style.display = "none";
  document.getElementById("masVehiculo").style.display = "block";
}

// Maximiza el Formulario Agregar Oferta
function masAgr() {
  document.getElementById("DatosAgregarOferta").style.display = "block";
  document.getElementById("menosAgrOferta").style.display = "block";
  document.getElementById("masAgrOferta").style.display = "none";
}
// Minimiza el Formulario Agregar Oferta
function menosAgr() {
  document.getElementById("DatosAgregarOferta").style.display = "none";
  document.getElementById("menosAgrOferta").style.display = "none";
  document.getElementById("masAgrOferta").style.display = "block";
}

