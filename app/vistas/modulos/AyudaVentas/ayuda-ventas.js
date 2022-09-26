
// Funciones
const construirHtmlCentrosDeInspeccion = centrosDeInspeccion => {
    if (centrosDeInspeccion.length === 0) return ''
    let html = '<ul>'
    centrosDeInspeccion.forEach(centro => {
        html += `<li>- ${centro}</li>`
    })
    html += '</ul>'

    return html
}
const construirHtmlContinuidad = continuidades => {
    if (continuidades.length === 0) return ''
    let html = '<ul>'
    continuidades.forEach(continuidad => {
        html += `<li>- ${continuidad}</li>`
    })
    html += '</ul>'

    return html
}
const construirHtmlFormasDePago = formasDePago => {
    if (formasDePago.length === 0) return ''
    let html = '<ul>'
    formasDePago.forEach(formaDePago => {
        html += `<li>- ${formaDePago}</li>`
    })
    html += '</ul>'

    return html
}
const obtenerAyudaVentas = async () => {
    await fetch('./vistas/modulos/AyudaVentas/AyudaVentasController.php', {
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ funcion: 'obtenerAyudaVentas' })
    })
        .then(res => res.json())
        .then(data => {
            let template = ''
            data.forEach(ayudaVenta => {
                const centrosDeInspeccion = (ayudaVenta.centro_de_inspeccion != null) 
                                                ? ayudaVenta.centro_de_inspeccion.split('-') : []
                const continuidades = (ayudaVenta.continuidad != null) 
                                                ? ayudaVenta.continuidad.split('-') : []
                const formasDePago = (ayudaVenta.formas_de_pago != null) 
                                                ? ayudaVenta.formas_de_pago.split('-') : []
                const partTemplate = `
                    <tr>
                        <td><img src="./vistas/modulos/AyudaVentas/src/logos/${ayudaVenta.aseguradora}.png" class="img-responsive" width="80"></td>
                        <td>${ayudaVenta.linea_de_atencion}</td>
                        <td>PDF</td>
                        <td>PDF</td>
                        <td>${construirHtmlCentrosDeInspeccion(centrosDeInspeccion)}</td>
                        <td>${construirHtmlContinuidad(continuidades)}</td>
                        <td>${construirHtmlFormasDePago(formasDePago)}</td>
                        <td></td>
                    </tr>`
                template += partTemplate
            })
            document.querySelector('.ayuda-ventas-body').innerHTML = template   
        })
}

obtenerAyudaVentas()
