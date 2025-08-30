
// Función para cargar el contenido en el iframe
function loadContent(page) {
    document.getElementById("content-frame").src = page;
}

function mostrarContenido(page) {
    // Ocultar todas las páginas
    const pages = document.querySelectorAll('.content-page');
    pages.forEach(page => {
        page.style.display = 'none';
    });

    // Mostrar la página seleccionada
    const selectedPage = document.getElementById(page);
    if (selectedPage) {
        selectedPage.style.display = 'block';
    }
}
