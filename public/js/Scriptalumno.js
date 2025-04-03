

        // Función para cargar el contenido en el iframe
        function loadContent(page) {
            document.getElementById("content-frame").src = page;
        }
        fetch("kardex.html")
        .then(response => response.text())
        .then(html => {
            document.getElementById("kardex-container").innerHTML = html;
        });