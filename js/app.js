// Variables
const contenedorArchivos = document.querySelector('#contenedorArchivos');
const botonArchivo = document.querySelector('#botonArchivo');
const cantidadArchivos = document.querySelector('#cantidadArchivos');

// Ver Ciudades 
const ckbCiudades = document.querySelector('#ckbCiudades');
const divDivisiones = document.querySelector('#divDivisiones');

const ckbMetro = document.querySelector('#ckbMetro');
const divRegionesMetro = document.querySelector('#divRegionesMetro');

const ckbSur = document.querySelector('#ckbSur');
const divRegionesSur = document.querySelector('#divRegionesSur');

const ckbNorte = document.querySelector('#ckbNorte');
const divRegionesNorte = document.querySelector('#divRegionesNorte');


// Agregar event listener para detectar cambios en el estado del checkbox
ckbCiudades.addEventListener('change', function() {
    // Si el checkbox está marcado, mostrar el contenido; de lo contrario, ocultarlo
    if (ckbCiudades.checked) {
        divDivisiones.style.display = 'block';
    } else {
        divDivisiones.style.display = 'none';
    }
});

// Metro 
ckbMetro.addEventListener('change', function() {
    // Si el checkbox está marcado, mostrar el contenido; de lo contrario, ocultarlo
    if (ckbMetro.checked) {
        divRegionesMetro.style.display = 'block';
    } else {
        divRegionesMetro.style.display = 'none';
    }
});

// Sur
ckbSur.addEventListener('change', function() {
    // Si el checkbox está marcado, mostrar el contenido; de lo contrario, ocultarlo
    if (ckbSur.checked) {
        divRegionesSur.style.display = 'block';
    } else {
        divRegionesSur.style.display = 'none';
    }
});

// Norte
ckbNorte.addEventListener('change', function() {
    // Si el checkbox está marcado, mostrar el contenido; de lo contrario, ocultarlo
    if (ckbNorte.checked) {
        divRegionesNorte.style.display = 'block';
    } else {
        divRegionesNorte.style.display = 'none';
    }
});


// Eventos 
botonArchivo.addEventListener('click', agregarArchivo);
// Carga las ciudades al ser presionado
// ckbCiudades.addEventListener('');

// Inicializar contador de clics
let contador = 1;

// Funciones
function agregarArchivo(){
    // Incrementar el contador
    contador++;

    // Actualizar el contenido del contador
    contadorArchivos.textContent = `Archivos: ${contador}`;

    // Agrega el input de tipo archivo 
    // <input type="file" name="archivo" id="archivo"></input>
    const inputArchivo = document.createElement('input');
    inputArchivo.type = 'file';
    inputArchivo.classList.add('mt-2');
    contenedorArchivos.appendChild(inputArchivo);
    
}

let puestosSeleccionados = [];
function handleCheckboxChange(checkbox) {
    if (checkbox.checked) {
        // Si el checkbox está seleccionado, agregar su valor al arreglo
        puestosSeleccionados.push(checkbox.value);
    } else {
        // Si el checkbox está deseleccionado, remover su valor del arreglo
        const index = puestosSeleccionados.indexOf(checkbox.value);
        if (index !== -1) {
            puestosSeleccionados.splice(index, 1);
        }
    }
    
    // console.log(valoresSeleccionados); // Muestra el arreglo en la consola para propósitos de depuración

    // valoresSeleccionados.forEach(valor => {
    //     console.log(valor);
    // });

    /*Envía los datos al servidor*/
    // Crear un objeto XMLHttpRequest
    var xhr = new XMLHttpRequest();

    // Especificar la URL del script PHP que recibirá los datos
    var url = "procesa.php";

    // Convertir el arreglo a JSON
    var datosJSON = JSON.stringify(puestosSeleccionados);

    // Abrir una conexión POST a la URL especificada
    xhr.open("POST", url, true);

    // Establecer el encabezado de la solicitud
    xhr.setRequestHeader("Content-Type", "application/json");

    // Definir la función a ejecutar cuando la solicitud se complete
    xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
        // Aquí puedes manejar la respuesta del servidor si lo necesitas
        console.log(xhr.responseText);
    }
    };

    // Enviar los datos al servidor
    xhr.send(datosJSON);
}

let marcasSeleccionadas = [];
function handleCheckboxChange(checkbox) {
    if (checkbox.checked) {
        // Si el checkbox está seleccionado, agregar su valor al arreglo
        marcasSeleccionadas.push(checkbox.value);
    } else {
        // Si el checkbox está deseleccionado, remover su valor del arreglo
        const index = marcasSeleccionadas.indexOf(checkbox.value);
        if (index !== -1) {
            marcasSeleccionadas.splice(index, 1);
        }
    }
    
    console.log(marcasSeleccionadas); // Muestra el arreglo en la consola para propósitos de depuración

    marcasSeleccionadas.forEach(valor => {
        console.log(valor);
    });

    /*Envía los datos al servidor*/
    // Crear un objeto XMLHttpRequest
    var xhr = new XMLHttpRequest();

    // Especificar la URL del script PHP que recibirá los datos
    var url = "procesa.php";

    // Convertir el arreglo a JSON
    var datosJSON2 = JSON.stringify(marcasSeleccionadas);

    // Abrir una conexión POST a la URL especificada
    xhr.open("POST", url, true);

    // Establecer el encabezado de la solicitud
    xhr.setRequestHeader("Content-Type", "application/json");

    // Definir la función a ejecutar cuando la solicitud se complete
    xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
        // Aquí puedes manejar la respuesta del servidor si lo necesitas
        console.log(xhr.responseText);
    }
    };

    // Enviar los datos al servidor
    xhr.send(datosJSON2);
}

