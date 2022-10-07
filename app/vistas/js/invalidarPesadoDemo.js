(()=>{
    Swal.fire({
        icon: 'error',
        title: 'No estas autorizado, Comunicate con el Administrador.',
        confirmButtonText: 'Ok',
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