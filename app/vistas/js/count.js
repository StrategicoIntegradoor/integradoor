const getTime = dateTo => {
    let now = new Date(),
        time = (new Date(dateTo) - now + 1000) / 1000,
        seconds = ('0' + Math.floor(time % 60)).slice(-2),
        minutes = ('0' + Math.floor(time / 60 % 60)).slice(-2),
        hours = ('0' + Math.floor(time / 3600 % 24)).slice(-2),
        days = Math.floor(time / (3600 * 24));

    return {
        seconds,
        minutes,
        hours,
        days,
        time
    }
};

const countdown = (dateTo, element) => {
    const item = document.getElementById(element);

    const timerUpdate = setInterval( () => {
        let currenTime = getTime(dateTo);

        item.innerHTML = currenTime.days + "D " + currenTime.hours +  'H ' + currenTime.minutes + 'M ' + currenTime.seconds + 'S';
        

        if (currenTime.time <= 1) {
            clearInterval(timerUpdate);

            Swal.fire({
                icon: 'error',
                title: '!Tu tiempo de uso se agoto!.',
                confirmButtonText: 'Ok',
              }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "salir";
                } else if (result.isDenied) {
                }
              })


              setTimeout(function(){
                window.location = "salir";
            }, 10000);
        }

    }, 1000);
};

let fecha_fin = $("#fechaLimi").val();


countdown(fecha_fin, 'cuentatras');