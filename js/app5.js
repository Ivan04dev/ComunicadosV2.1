// Obtener referencia al checkbox y al elemento de contenido
const toggleCheckbox = document.getElementById('toggleCheckbox');
const content = document.getElementById('content');

// Agregar event listener para detectar cambios en el estado del checkbox
toggleCheckbox.addEventListener('change', function() {
    // Si el checkbox está marcado, mostrar el contenido; de lo contrario, ocultarlo
    if (toggleCheckbox.checked) {
        content.style.display = 'block';
    } else {
        content.style.display = 'none';
    }
});
