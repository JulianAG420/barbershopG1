let paso = 1;
const pasoInicial = 1;
const pasoFinal = 3;

const cita = {
    id : '',
    nombre : '',
    fecha : '',
    hora : '',
    servicios: []
}

document.addEventListener('DOMContentLoaded', function(){
    iniciarApp();
});

function iniciarApp(){
    mostrarSeccion(); //Muestra y oculta las secciones
    tabs(); //Cambia la seccion cuando se presionen los tabs
    botonesPaginador();//Agrega o quita los botones del paginador
    paginaSiguiente();
    paginaAnterior();
    consultarAPI(); //Consulta la API en el backend de PHP
    idCliente();//Añade el id del usuario al objeto de cita
    nombreCliente(); //Añade el nombre del usuario al objeto de cita
    seleccionarFecha(); //Añade la fecha al objeto de cita
    seleccionarHora(); //Añade la hora al objeto de cita

    mostrarResumen();
}

function mostrarSeccion(){
    
    //Ocultar la seccion que tenga la clase mostrar
    const seccionAnterior = document.querySelector('.mostrar');
    if(seccionAnterior){
        seccionAnterior.classList.remove('mostrar');
    }

    //Seleccionar la seccion con el paso...
    const seccion = document.querySelector(`#paso-${paso}`)
    seccion.classList.add('mostrar');

    //Remover el tab que contenga la clase actual
    const tabAnterior = document.querySelector('.actual');
    if(tabAnterior){
        tabAnterior.classList.remove('actual');
    }

    //Resalta el tab actual
    const tab = document.querySelector(`[data-paso="${paso}"]`); //Al momento de validar el evento la forma que contiene el selector es tal que contenida entre []
    tab.classList.add('actual');

}

function botonesPaginador(){

    const paginaAnterior = document.querySelector('#anterior');
    const paginaSiguiente = document.querySelector('#siguiente');

    if(paso === 1){
        paginaAnterior.classList.add('ocultar');
        paginaSiguiente.classList.remove('ocultar');
    }else if (paso === 3){
        paginaAnterior.classList.remove('ocultar');
        paginaSiguiente.classList.add('ocultar');
    }else{
        paginaAnterior.classList.remove('ocultar');
        paginaSiguiente.classList.remove('ocultar');
    }

    
    mostrarSeccion();
    
    if (paso === 3){
        mostrarResumen();
    }
}

function tabs(){

    const botones = document.querySelectorAll('.tabs button');

    botones.forEach( boton => {
        boton.addEventListener('click', (e) => {
            paso = parseInt(e.target.dataset.paso);
            mostrarSeccion();
            botonesPaginador();
        });
    });
}

function paginaAnterior(){
    
    const paginaAnterior = document.querySelector('#anterior');
    paginaAnterior.addEventListener('click', function(){

        if(paso <= pasoInicial) return; //El return detiene la ejecucion

        paso--;
        botonesPaginador();
    });
}

function paginaSiguiente(){
    const paginaSiguiente = document.querySelector('#siguiente');
    paginaSiguiente.addEventListener('click', function(){

        if(paso >= pasoFinal) return; //El return detiene la ejecucion

        paso++;
        botonesPaginador();
    });
}

async function consultarAPI(){
    try {
        
        const url = 'http://localhost/DAL/servicio.php';
        const resultado = await fetch(url);
        const servicios = await resultado.json();

        mostrarServicios(servicios);

    } catch (error) {
        console.log(error)
    }
}


function mostrarServicios(servicios){

    servicios.forEach(servicio=>{
        const {ServicioID, Nombre, Precio} = servicio; //Se aplica destructuring, obtiene el valor y crea la variable en una sola linea

        const nombreServicio = document.createElement('P');
        nombreServicio.classList.add('nombre-servicio');
        nombreServicio.textContent = Nombre;


        const precioServicio = document.createElement('P');
        precioServicio.classList.add('precio-servicio');
        precioServicio.textContent = `$${Precio}`;


        const servicioDIV = document.createElement('DIV');
        servicioDIV.classList.add('servicio');
        servicioDIV.dataset.idServicio = ServicioID;
        servicioDIV.onclick = function(){ //CallBack
            console.log(servicio);
            seleccionarServicio(servicio);
        };
        
        servicioDIV.appendChild(nombreServicio);
        servicioDIV.appendChild(precioServicio);

        document.querySelector('#servicios').appendChild(servicioDIV);
        
    });
    
}

function seleccionarServicio(servicio){
    const { ServicioID } = servicio;
    const { servicios } = cita;

    //Identificar el elemento al que se le da click
    const divServicio = document.querySelector(`[data-id-servicio="${ServicioID}"]`);

    if(servicios.some(agregado => agregado.ServicioID === ServicioID)){ //some es un array method que va a buscar un valor en un arreglo pero con la necesidad de un call back
        //Eliminarlo
        console.log('eliminado');
        cita.servicios = servicios.filter( agregado => agregado.ServicioID !== ServicioID);
        divServicio.classList.remove('seleccionado');
    }else{
        //Agregarlo
        console.log('agregado');
        cita.servicios = [...servicios, servicio]; // Sintaxis de ...servicios, lo que indican los puntos es que tomen una copia del ultimo valor y el segundo argumento que tome el nuevo valor y lo agregue
        divServicio.classList.add('seleccionado');
    }
}

function idCliente(){
    cita.id = document.querySelector('#idUsuario').value;

}

function nombreCliente(){
    cita.nombre = document.querySelector('#nombre').value;
    console.log(cita);

}

function seleccionarFecha(){
    const inputFecha = document.querySelector('#fecha');
    inputFecha.addEventListener('input', function(e){

        const dia = new Date(e.target.value).getUTCDay(); //Objeto de fecha ( getUTCDay devuelve el dia de la semana en posiciones tal que domingo 0 y sabados 6)

        if( [6, 0].includes(dia) ){ //includes es un array method que va a buscar un valor en un arreglo pero mas lineal, sin un call back
            e.target.value = ''; //El string vacio permite que no se le asigne nada al input si el valor es igual a 0 o 6 ( sabado o domingo)
            mostrarAlerta('Fines de semana no permitidos', 'error', '.formulario');
        }else{
           cita.fecha = e.target.value;
        }
    });
}

function seleccionarHora(){
    const inputHora = document.querySelector('#hora');
    inputHora.addEventListener('input', function(e){

        const horaCita = e.target.value;
        const hora = horaCita.split(':')[0]; //split permite separar por medio de un separador (segun el que exista, puede ser un espacio, :, etc) una cadena de texto y almacenarla en un arreglo, con [0] solo accedo a la primera posicion que seria la hora

         if(hora < 10 || hora > 19){
            e.target.value = '';
            mostrarAlerta('Horas no permitidos', 'error', '.formulario');
         }else{

             cita.hora = e.target.value;   
         }


        
    });
}

function mostrarResumen(){
    const resumen = document.querySelector('.contenido-resumen');

    //Limpiar el contenido del resumen cada vez que se manda a llamar mostrarResumen()
    while(resumen.firstChild){
        resumen.removeChild(resumen.firstChild);
    }

    if(Object.values(cita).includes('') || cita.servicios.lenght ===  0){
        mostrarAlerta('Faltan datos de servicios, fecha u hora' , 'error' , '.contenido-resumen', false);

        return;
    }

    //Formatear el div de resumen
    const {nombre,fecha,hora,servicios} = cita;

    
    //Heading para resumen de servicios
    const headingServicios = document.createElement('H3');
    headingServicios.textContent = 'Resumen de servicios';
    resumen.appendChild(headingServicios);

    //Iterando y mostrando los servicios
    servicios.forEach(servicio => {
        const {ServicioID, Nombre, Precio} = servicio;

        const contenedorServicio = document.createElement('DIV');
        contenedorServicio.classList.add('contenedor-servicio');

        const textoServicio = document.createElement('P');
        textoServicio.textContent = Nombre;

        const precioServicio = document.createElement('P');
        precioServicio.innerHTML = `<span> Precio: </span> $${Precio}`;

        contenedorServicio.appendChild(textoServicio);
        contenedorServicio.appendChild(precioServicio);

        resumen.appendChild(contenedorServicio);
    });

    //Heading para resumen de citas
    const headingCitas = document.createElement('H3');
    headingCitas.textContent = 'Resumen de la cita';
    resumen.appendChild(headingCitas);
    
    const nombreCliente = document.createElement('P');
    nombreCliente.innerHTML = `<span> Nombre: </span> ${nombre}`;

    //Formatear fecha de la cita en idioma spanish
    const fechaObj = new Date(fecha);
    const mes = fechaObj.getMonth();
    const dia = fechaObj.getDate() + 2; //Le sumo dos porque por cada instancia de new Date hay un desfase de un dia dado que en esta API los meses y dias comienzan en 0 como un arreglo
    const year = fechaObj.getFullYear(); 

    const fechaUTC = new Date( Date.UTC(year, mes, dia));

    const opciones = { 
        weekday: 'long',
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    };

    const fechaFormateada = fechaUTC.toLocaleDateString('es-MX', opciones); //Formatea por si sola las opciones


    const fechaCita = document.createElement('P');
    fechaCita.innerHTML = `<span> Fecha: </span> ${fechaFormateada}`;

    const horaCita = document.createElement('P');
    horaCita.innerHTML = `<span> Hora: </span> ${hora}`;

    //Boton para crear una cita
    const botonReservar = document.createElement('BUTTON');
    botonReservar.classList.add('boton');
    botonReservar.textContent = 'Reservar cita';
    botonReservar.onclick = reservarCita;


    resumen.appendChild(nombreCliente);
    resumen.appendChild(fechaCita);
    resumen.appendChild(horaCita);
    resumen.appendChild(botonReservar);

    console.log(cita);


}

async function reservarCita(){
    const {nombre, fecha, hora, servicios, id} = cita;
    const idServicios = servicios.map(servicio => servicio.ServicioID);



    const datos = new FormData(); //Se comporta igual que un submit en un formulario
    datos.append('ClienteId', id);
    datos.append('fecha', fecha);
    datos.append('hora', hora);
    datos.append('servicios', idServicios);

    try {
        //Peticion hacia la API
        const url = 'http://localhost/DAL/citas.php'; 
    
        const respuesta = await fetch(url, {
            method : 'POST',
            body : datos // Le permito a fetch saber que el FormData existe y que tome los datos del post para que el backend pueda tomar los datos del formulario (POST)
        });
    
        
    
        const resultado = await respuesta.json();
        console.log(resultado); //Seteado en active record el valor de la llave resultado
    
        if(resultado){
            Swal.fire({
                icon: 'success',
                title: 'Cita creada',
                text: 'Tu cita ha sido creada correctamente!',
                button: 'Ok'
              }).then( () => {
                setTimeout(() => {
                    window.location.reload();
                    
                }, 3000);
              });
        };
        
    } catch (error) {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Hubo un error al guardar la cita',
          });
    };

    // console.log([...datos]); Esta sintaxis permite mostrar todos los registros de la consulta o sea,todos los arreglos disponibles, sirve para saber si se esta enviando toda la informacion necesaria al servidor 
}

function mostrarAlerta(mensaje, tipo, elemento, desaparece = true){
    //Valida si la clase de alerta se encuentra presente y detiene la ejecucion para no mostrar la alarma mas de una vez
    const alertaPrevia = document.querySelector('.alerta');
    if(alertaPrevia){
        alertaPrevia.remove();
    };

    //Crea el div y contiene la clase de alerta previamente definida y le asigna la subclase de error
    const alerta = document.createElement('DIV');
    alerta.textContent = mensaje;
    alerta.classList.add('alerta');
    alerta.classList.add(tipo);

    //Anida el div de la variable de alerta hacia la clase de formulario para realizarlo visible
    const referencia = document.querySelector(elemento);
    referencia.appendChild(alerta);

    //Despues de 3 segundos quita la alerta
    if(desaparece){
        
        setTimeout(() => {
            alerta.remove();
        }, 3000);
    }


}



