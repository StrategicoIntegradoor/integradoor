(()=>{
    Swal.fire({
        icon: 'error',
        title: '¡Esta opcion no esta disponible en la version demo!.',
        confirmButtonText: 'Cerrar',
      }).then((result) => {
        if (result.isConfirmed) {
            window.location = "inicio";
        } else if (result.isDenied) {
        }
      })

     
})()


setTimeout(function(){
    window.location = "inicio";
}, 10000);