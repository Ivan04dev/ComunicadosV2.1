// Obtener referencia al botón y al contenedor del contador
const botonArchivo = document.querySelector('#botonArchivo');
const contadorArchivos = document.querySelector('#contadorArchivos');
const divContenedorArchivos = document.querySelector('#contenedorArchivos');

// Inicializar contador de clics
let contador = 1;

// Función para manejar el clic del botón
function handleClick() {
    // Incrementar el contador
    contador++;

    // Actualizar el contenido del contador
    contadorArchivos.textContent = `Número de clics: ${contador}`;

    // Agregar un input al contenedor de inputs
    const nuevoInput = document.createElement('input');
    nuevoInput.setAttribute('type', 'text');
    contenedorArchivos.appendChild(nuevoInput);
}

// Agregar un event listener al botón
botonArchivo.addEventListener('click', handleClick);
