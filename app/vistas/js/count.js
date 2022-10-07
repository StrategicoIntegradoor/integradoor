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
            alert('Se acabo el tiempo '+ element);
        }

    }, 1000);
};

let fecha_fin = $("#fechaLimi").val();


countdown(fecha_fin, 'cuentatras');