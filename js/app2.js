// jQery
let valoresSeleccionados = []; // El arreglo de datos que quieres enviar

// Convertir el arreglo a JSON
var datosJSON = JSON.stringify(valoresSeleccionados);

// Realizar la solicitud AJAX utilizando jQuery
$.ajax({
  url: 'procesa.php', // URL del script PHP que recibirá los datos
  type: 'POST', // Método de la solicitud
  contentType: 'application/json', // Tipo de contenido que se está enviando
  data: datosJSON, // Datos que se enviarán al servidor
  success: function(response) {
    // Manejar la respuesta del servidor si es necesario
    console.log(response);
  },
  error: function(xhr, status, error) {
    // Manejar errores si los hay
    console.error(error);
  }
});
