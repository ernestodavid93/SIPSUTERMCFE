
function validarDias(){
    let fechaInicio = document.getElementById("FechaInicio").value;
    let fechaFinal = document.getElementById("FechaFinal").value;

}


function myFunction(){
    var  msDay = 60*60*24*1000;
    let fechaInicio = document.getElementById("FechaInicio").value;
    let fechaFinal = document.getElementById("FechaFin").value;

    let fechaDate = new Date(fechaFinal);
    let fechaDate2 = new Date(fechaInicio);

    var result = (fechaDate.getTime() - fechaDate2.getTime()) / (1000 * 60 * 60 * 24);

    console.log(result);

return result;

     //var result = moment(fecha2).diff(moment(fecha1), 'days');

    //let cambioAux2 = Date.parse(fechaFinal);

}

function diasPasados(){
    let fechaInicio = document.getElementById("FechaInicio").value;
    let fechaDate2 = new Date(fechaInicio);

    let hoy = new Date();
    fechaDate2.setDate(10);

    if(fechaDate2 >= hoy){
        alert("Correcto");
    }
    else {
        alert("Ingresaste una fecha pasada");
    }
}

function emailJs1(){
        (function () {
            emailjs.init("user_9jJ4JByGdiHwXSvI6L0ZH");
        })();
        var templateParams = {
        RPE: document.getElementById("RPE").value,
        Nombre: document.getElementById("Nombre").value,
            descripcion: document.getElementById("Descripcion").value,
        FechaInicio: document.getElementById("FechaInicio").value,
        FechaFin: document.getElementById("FechaFin").value,
        to_email: 'cristobalalejandrobtds@gmail.com'
    };

        emailjs.send('gmail', 'template_w6i21tp', templateParams)
        .then(function (response) {
        console.log('SUCCESS!', response.status, response.text);
        alert("Se ha enviado el mensaje exitosamente") //le agrege este alert nomas para saber que si se envio
    }, function (error) {
        console.log('FAILED...', error);
        alert("Hubo un error al mandar el mensaje") //
    });
}


/*function handler(e){


      var  msDay = 60*60*24*1000;
    let fechaInicio = document.getElementById("FechaInicio").value;
    let fechaFinal = document.getElementById("FechaFinal").value;

    let cambioAux1 = Date.parse(fechaInicio);
    let cambioAux2 = Date.parse(fechaFinal);

    console.log(cambioAux2);

    //let days = (Math.floor((cambioAux2 - cambioAux1) / msDay) + ' full days between');



}*/
