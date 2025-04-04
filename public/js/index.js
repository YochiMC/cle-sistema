let currentIndex = 0;
const items = document.querySelectorAll('.carrusel-item');
const indicator = document.getElementById('indicator');
let autoSlideInterval;

// Configuración del tiempo de auto-desplazamiento (en milisegundos)
const AUTO_SLIDE_INTERVAL = 5000; // 5 segundos

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

// Función para avanzar al siguiente slide
function nextSlide() {
    currentIndex = (currentIndex + 1) % items.length;
    showImage(currentIndex);
}

// Función para retroceder al slide anterior
function prevSlide() {
    currentIndex = (currentIndex - 1 + items.length) % items.length;
    showImage(currentIndex);
}

// Función para crear los puntos (indicadores) dinámicamente
function createIndicators() {
    for (let i = 0; i < items.length; i++) {
        const dot = document.createElement('span');
        dot.classList.add('dot');
        dot.addEventListener('click', () => {
            currentIndex = i;
            showImage(currentIndex);
            resetAutoSlide(); // Reiniciamos el intervalo cuando se hace clic manual
        });
        indicator.appendChild(dot);
    }
}

// Función para iniciar el auto-desplazamiento
function startAutoSlide() {
    autoSlideInterval = setInterval(nextSlide, AUTO_SLIDE_INTERVAL);
}

// Función para reiniciar el auto-desplazamiento
function resetAutoSlide() {
    clearInterval(autoSlideInterval);
    startAutoSlide();
}

// Agregar eventos para los botones de navegación
document.getElementById('next').addEventListener('click', () => {
    nextSlide();
    resetAutoSlide(); // Reiniciamos el intervalo cuando se navega manualmente
});

document.getElementById('prev').addEventListener('click', () => {
    prevSlide();
    resetAutoSlide(); // Reiniciamos el intervalo cuando se navega manualmente
});

// Cambiar imagen usando las teclas del teclado
document.addEventListener('keydown', (e) => {
    if (e.key === 'ArrowRight') {
        nextSlide();
    } else if (e.key === 'ArrowLeft') {
        prevSlide();
    }
    resetAutoSlide(); // Reiniciamos el intervalo cuando se navega con teclado
});

// Inicializar el carrusel
createIndicators(); // Crear los puntos
showImage(currentIndex); // Mostrar la primera imagen
startAutoSlide(); // Iniciar el auto-desplazamiento

// Pausar el auto-desplazamiento cuando el ratón está sobre el carrusel
document.querySelector('.carrusel-container').addEventListener('mouseenter', () => {
    clearInterval(autoSlideInterval);
});

// Reanudar el auto-desplazamiento cuando el ratón sale del carrusel
document.querySelector('.carrusel-container').addEventListener('mouseleave', () => {
    startAutoSlide();
});