// fetch API 
let valoresSeleccionados = []; // El arreglo de datos que quieres enviar

// Convertir el arreglo a JSON
var datosJSON = JSON.stringify(valoresSeleccionados);

// Configurar la solicitud Fetch
fetch('procesa.php', {
  method: 'POST', // Método de la solicitud
  headers: {
    'Content-Type': 'application/json' // Tipo de contenido que se está enviando
  },
  body: datosJSON // Datos que se enviarán al servidor
})
.then(function(response) {
  // Verificar si la solicitud fue exitosa
  if (!response.ok) {
    throw new Error('Error al realizar la solicitud: ' + response.statusText);
  }
  // Retornar la respuesta en formato JSON
  return response.json();
})
.then(function(data) {
  // Manejar la respuesta del servidor si es necesario
  console.log(data);
})
.catch(function(error) {
  // Manejar errores si los hay
  console.error('Error al enviar la solicitud:', error);
});
