// Funciones
const construirHtmlCentrosDeInspeccion = centrosDeInspeccion => {
    if (centrosDeInspeccion.length === 0) return ''
    let html = '<ul>'
    centrosDeInspeccion.forEach(centro => {
        if (centro !== '') html += `<li>- ${centro}</li>`
    })
    html += '</ul>'

    return html
}
const construirHtmlContinuidad = continuidades => {
    if (continuidades.length === 0) return ''
    let html = '<ul>'
    continuidades.forEach(continuidad => {
        if (continuidad !== '') html += `<li>- ${continuidad}</li>`
    })
    html += '</ul>'

    return html
}
const construirHtmlFormasDePago = formasDePago => {
    if (formasDePago.length === 0) return ''
    let html = '<ul>'
    formasDePago.forEach(formaDePago => {
        if (formaDePago !== '') html += `<li>- ${formaDePago}</li>`
    })
    html += '</ul>'

    return html
}
document.querySelector('#editarAyudaVenta').addEventListener('click', e => {
    editarAyudaVenta()
})
const editarAyudaVenta = async () => {
    const d = document
    const issetSarlaft = d.querySelector('#sarlaft').files.length > 0
    const issetSarlaft2 = d.querySelector('#sarlaft2').files.length > 0
    const formData = new FormData()
    formData.append('funcion', 'editarAyudaVenta');
    formData.append('linea_de_atencion', d.querySelector('#linea_atencion').value)
    formData.append('id_ayuda_venta', d.querySelector('#id_ayuda_venta').value)
    formData.append('clausulado', d.querySelector('#clausulado').value)
    if (issetSarlaft) {
        formData.append('sarlaft', d.querySelector('#sarlaft').files[0])
    }
    if (issetSarlaft2) {
        formData.append('sarlaft2', d.querySelector('#sarlaft2').files[0])
    }
    formData.append('aseguradora', d.querySelector('#aseguradora').value)
    formData.append('centro_de_inspeccion', centros.join('-').toString())
    formData.append('continuidad', continuidades.join('-').toString())
    formData.append('formas_de_pago', formasDePago.join('-').toString())
    formData.append('tips_expedicion', d.querySelector('#tips_expedicion').value)

    await editarAyudaVentaRequest(formData);
}
const editarAyudaVentaRequest = async _formData => {
    const req = await fetch('./vistas/modulos/AyudaVentas/AyudaVentasController.php', {
        method: 'POST',
        headers: {
            'Accept': 'application/json',
        },
        body: _formData
    }).then(() => {
        obtenerAyudaVentas()
        document.querySelector('.form-editar-ayuda-venta').style.display = 'none';
    })
}
const editar = async _id => {
    const data = await obtenerAyudaVenta(_id)
    llenarFormulario(data)
}
const obtenerAyudaVenta = async _id => {
    const formData = new FormData();
    formData.append('funcion', 'obtenerAyudaVenta')
    formData.append('id', _id)
    const _data = await fetch('./vistas/modulos/AyudaVentas/AyudaVentasController.php', {
        method: 'POST',
        headers: {
            'Accept': 'application/json',
        },
        body: formData
    })
    .then(res => res.json())
    .then(data => {
        return data
    })
    return _data
}
const llenarFormulario = _data => {
    const d = document
    if (_data.centro_de_inspeccion != null) {
        centros = _data.centro_de_inspeccion.split('-')
        llenarCentrosDeInspeccion(centros)
    }
    if (_data.continuidad != null) {
        continuidades = _data.continuidad.split('-')
        llenarContinuidades(continuidades)
    }
    if (_data.formas_de_pago != null) {
        formasDePago = _data.formas_de_pago.split('-')
        llenarFormasDePago(formasDePago)
    }
    d.querySelector('#aseguradora').value = _data.aseguradora
    d.querySelector('#id_ayuda_venta').value = _data.id 
    d.querySelector('#linea_atencion').value = _data.linea_de_atencion
    d.querySelector('#clausulado').value = _data.link_clausulado
    d.querySelector('#continuidad').innerText = _data.continuidad
    d.querySelector('#tips_expedicion').innerText = _data.tips_de_expedicion
    d.querySelector('.form-editar-ayuda-venta').style.display = 'block'
    window.scroll(0, 0)
}
const obtenerAyudaVentas = async () => {
    const formData = new FormData();
    formData.append('funcion', 'obtenerAyudaVentas')
    await fetch('./vistas/modulos/AyudaVentas/AyudaVentasController.php', {
        method: 'POST',
        headers: {
            'Accept': 'application/json'
        },
        body: formData
    })
    .then(res => {
        const test = res.json()
        //return res.json()
        return test
    })
    .then(data => {
        let template = ''
        data.forEach(ayudaVenta => {
            const centrosDeInspeccion = (ayudaVenta.centro_de_inspeccion != null) 
                                            ? ayudaVenta.centro_de_inspeccion.split('-') : []
            const continuidades = (ayudaVenta.continuidad != null) 
                                            ? ayudaVenta.continuidad.split('-') : []
            const formasDePago = (ayudaVenta.formas_de_pago != null) 
                                            ? ayudaVenta.formas_de_pago.split('-') : []
            let partTemplate = `
                <tr>
                    <td><img src="./vistas/modulos/AyudaVentas/src/logos/${ayudaVenta.aseguradora}.png" class="img-responsive" width="80"></td>
                    <td>${ayudaVenta.linea_de_atencion}</td>`
            if (ayudaVenta.link_clausulado) {
                partTemplate += `<td><a class="btn btn-alert" style="border-color: #88d600; color: #88d600; font-weight: 500;" target="_blank" href="${ayudaVenta.link_clausulado}">${ayudaVenta.link_clausulado.substring(0, 12)}</a></td>`
            } else {
                partTemplate += '<td></td>'
            }
            if (ayudaVenta.path_sarlaft || ayudaVenta.path_sarlaft2) {
                let sarlaftButtons = '<td>'
                sarlaftButtons += ayudaVenta.path_sarlaft ? `<button class="btn btn-alert" style="background: red; color: #fff; font-weight: 500;" onclick="window.open('./vistas/modulos/AyudaVentas/pdf/sarlaft/${ayudaVenta.path_sarlaft}')">PDF #1</button>` : ''
                sarlaftButtons += ayudaVenta.path_sarlaft2 ? `<button class="btn btn-alert" style="background: red; color: #fff; font-weight: 500;" onclick="window.open('./vistas/modulos/AyudaVentas/pdf/sarlaft2/${ayudaVenta.path_sarlaft2}')">PDF #2</button>` : ''
                partTemplate += sarlaftButtons + '</td>'
            } else {
                partTemplate += '<td></td>'
            }
            partTemplate += `
                <td>${construirHtmlCentrosDeInspeccion(centrosDeInspeccion)}</td>
                <td>${construirHtmlContinuidad(continuidades)}</td>
                <td>${construirHtmlFormasDePago(formasDePago)}</td>
                <td></td>
                <td>
                    <button 
                        onclick="editar(${ayudaVenta.id})"
                        class="btn btn-primary"
                    >
                        Editar
                    </button>
                </td>
            </tr>`
            template += partTemplate
        })
        document.querySelector('.ayuda-ventas-body').innerHTML = template   
    })
}
// document.querySelector('#subirpn').addEventListener('click', async () => {
//     const _formData = new FormData();
//     const filePN = document.querySelector('#sarlaft-pn').files[0]
//     _formData.append('sarlaft-pn')
//     const req = await fetch('./vistas/modulos/AyudaVentas/AyudaVentasController.php', {
//         method: 'POST',
//         headers: {
//             'Accept': 'application/json',
//         },
//         body: _formData
//     }).then(() => {

//     })
// })

/* CENTROS DE INSPECCIÓN */
/* Agregar centro */
let centros = []
document.querySelector('#agregarCentroDeInspeccion').addEventListener('click', e => {
    e.preventDefault()
    agregarCentroDeInspeccion()
})
const agregarCentroDeInspeccion = () => {
    const d = document
    const centro = d.querySelector('#centro_inspeccion').value
    if (centro === '') return;
    centros.push(centro)
    const index = (centros.length - 1)
    template = `
    <div class="form-group">
        <input type="hidden" value="${index}" />
        <input class="form-control" type="text" id="centro_value_${index}" value="${centro}" />
        <button class="btn btn-danger" onclick="editarCentroInspeccion(${index}, 'centro_value_${index}')">Editar   </button>
    </div>
    `
    d.querySelector('#centros_de_inspeccion').innerHTML += template
    d.querySelector('#centro_inspeccion').value = ''
}

const llenarCentrosDeInspeccion = _centros => {
    const d = document
    let template = ''
    _centros.forEach((centro, index) => {
        template += `
        <div class="form-group">
            <input type="hidden" value="${index}" />
            <input class="form-control" type="text" id="centro_value_${index}" value="${centro}" />
            <button class="btn btn-danger" onclick="editarCentroInspeccion(${index}, 'centro_value_${index}')">Editar   </button>
        </div>
        `
    })
    d.querySelector('#centros_de_inspeccion').innerHTML = template
}
const editarCentroInspeccion = (_index, _centro_value_index) => {
    const d = document
    centros[_index] = d.querySelector('#' + _centro_value_index).value
}
/* END - CENTROS DE INSPECCIÓN */

/* CONTINUIDAD */
let continuidades = []
document.querySelector('#agregarContinuidad').addEventListener('click', e => {
    e.preventDefault()
    agregarContinuidad()
})
const agregarContinuidad = () => {
    const d = document
    const continuidad = d.querySelector('#continuidad').value
    if (continuidad === '') return;
    continuidades.push(continuidad)
    const index = (continuidades.length - 1)
    template = `
    <div class="form-group">
        <input type="hidden" value="${index}" />
        <input class="form-control" type="text" id="continuidad_value_${index}" value="${continuidad}" />
        <button class="btn btn-danger" onclick="editarContinuidad(${index}, 'continuidad_value_${index}')">Editar   </button>
    </div>
    `
    d.querySelector('#continuidades').innerHTML += template
    d.querySelector('#continuidad').value = ''
}
const llenarContinuidades = _continuidades => {
    const d = document
    let template = ''
    _continuidades.forEach((continuidad, index) => {
        template += `
        <div class="form-group">
            <input type="hidden" value="${index}" />
            <input class="form-control" type="text" id="continuidad_value_${index}" value="${continuidad}" />
            <button class="btn btn-danger" onclick="editarContinuidad(${index}, 'continuidad_value_${index}')">Editar   </button>
        </div>
        `
    })
    d.querySelector('#continuidades').innerHTML = template
}
const editarContinuidad = (_index, _continuidad_value_index) => {
    const d = document
    continuidades[_index] = d.querySelector('#' + _continuidad_value_index).value
}
/* END - CONTINUIDAD */

/* FORMAS DE PAGO */
let formasDePago = []
document.querySelector('#agregarFormaDePago').addEventListener('click', e => {
    e.preventDefault()
    agregarFormaDePago()
})
const agregarFormaDePago = () => {
    const d = document
    const formaDePago = d.querySelector('#forma_de_pago').value
    if (formaDePago === '') return;
    formasDePago.push(formaDePago)
    const index = (formasDePago.length - 1)
    template = `
    <div class="form-group">
        <input type="hidden" value="${index}" />
        <input class="form-control" type="text" id="forma_de_pago_value_${index}" value="${formaDePago}" />
        <button class="btn btn-danger" onclick="editarFormaDePago(${index}, 'forma_de_pago_value_${index}')">Editar   </button>
    </div>
    `
    d.querySelector('#formas_de_pago').innerHTML += template
    d.querySelector('#forma_de_pago').value  = ''
}

const llenarFormasDePago = _formasDePago => {
    const d = document
    let template = ''
    _formasDePago.forEach((formaDePago, index) => {
        template += `
            <div class="form-group">
                <input type="hidden" value="${index}" />
                <input class="form-control" type="text" id="forma_de_pago_value_${index}" value="${formaDePago}" />
                <button class="btn btn-danger" onclick="editarFormaDePago(${index}, 'forma_de_pago_value_${index}')">Editar   </button>
            </div>
            `
    })
    d.querySelector('#formas_de_pago').innerHTML = template
}
const editarFormaDePago = (_index, _forma_de_pago_value_index) => {
    const d = document
    formasDePago[_index] = d.querySelector('#' + _forma_de_pago_value_index).value
}
/* END - FORMAS DE PAGO */

obtenerAyudaVentas()
