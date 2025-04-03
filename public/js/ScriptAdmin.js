    function mostrarContenido(pagina) {
        // Ocultar todas las páginas
        const paginas = document.querySelectorAll('.content-page');
        paginas.forEach(pagina => pagina.style.display = 'none');

        // Mostrar la página correspondiente
        document.getElementById(pagina).style.display = 'block';

        // Cargar el contenido HTML desde un archivo
        if (pagina === 'inicio') {
            fetch('inicio.html')
                .then(response => response.text())
                .then(data => document.getElementById('inicio').innerHTML = data);
        } else if (pagina === 'cursos') {
            fetch('cursos.html')
                .then(response => response.text())
                .then(data => document.getElementById('cursos').innerHTML = data);
        } else if (pagina === 'salir') {
            fetch('salir.html')
                .then(response => response.text())
                .then(data => document.getElementById('salir').innerHTML = data);
        }
    }

