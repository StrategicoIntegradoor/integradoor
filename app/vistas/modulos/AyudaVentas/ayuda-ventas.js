
// Funciones
const obtenerAyudaVentas = async () => {
    const data = { funcion: 'obtenerAyudaVentas' }
    await fetch('./vistas/modulos/AyudaVentas/AyudaVentasController.php', {
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ funcion: 'obtenerAyudaVentas' })
    })
    .then(res => res.json())
    .then(data => console.log(data))
}

obtenerAyudaVentas()
