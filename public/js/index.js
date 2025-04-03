
let currentIndex = 0;
const items = document.querySelectorAll('.carrusel-item');
const indicator = document.getElementById('indicator');

// Función para mostrar la imagen correspondiente
function showImage(index) {
    // Ocultamos todas las imágenes
    items.forEach(item => item.style.display = 'none');
    
    // Mostramos la imagen correspondiente
    items[index].style.display = 'block';

    // Actualizamos los puntos
    const dots = document.querySelectorAll('.dot');
    dots.forEach(dot => dot.classList.remove('active'));
    dots[index].classList.add('active');
}

// Función para crear los puntos (indicadores) dinámicamente
function createIndicators() {
    for (let i = 0; i < items.length; i++) {
        const dot = document.createElement('span');
        dot.classList.add('dot');
        indicator.appendChild(dot);
    }
}

// Agregar eventos para los botones de navegación
document.getElementById('next').addEventListener('click', () => {
    currentIndex = (currentIndex + 1) % items.length; // Avanza al siguiente índice
    showImage(currentIndex);
});

document.getElementById('prev').addEventListener('click', () => {
    currentIndex = (currentIndex - 1 + items.length) % items.length; // Retrocede al índice anterior
    showImage(currentIndex);
});

// Cambiar imagen usando las teclas del teclado
document.addEventListener('keydown', (e) => {
    if (e.key === 'ArrowRight') {
        currentIndex = (currentIndex + 1) % items.length;
    } else if (e.key === 'ArrowLeft') {
        currentIndex = (currentIndex - 1 + items.length) % items.length;
    }
    showImage(currentIndex);
});

// Inicializar el carrusel
createIndicators(); // Crear los puntos
showImage(currentIndex); // Mostrar la primera imagen




