let currentIndex = 0;
const items = document.querySelectorAll('.carrusel-item');
const indicator = document.getElementById('indicator');
let autoSlideInterval;
let isAnimating = false; // Bandera para evitar múltiples clics rápidos

// Configuración del tiempo de auto-desplazamiento (en milisegundos)
const AUTO_SLIDE_INTERVAL = 8000; // 8 segundos

// Función para mostrar la imagen correspondiente
function showImage(index) {
    if (isAnimating) return;
    isAnimating = true;
    
    // Ocultamos todas las imágenes
    items.forEach(item => item.style.display = 'none');
    
    // Mostramos la imagen correspondiente
    items[index].style.display = 'block';

    // Actualizamos los puntos
    const dots = document.querySelectorAll('.dot');
    dots.forEach(dot => dot.classList.remove('active'));
    dots[index].classList.add('active');
    
    // Resetear la bandera después de un pequeño retraso
    setTimeout(() => {
        isAnimating = false;
    }, 100);
}

// Función para avanzar al siguiente slide
function nextSlide() {
    const nextIndex = (currentIndex + 1) % items.length;
    if (nextIndex !== currentIndex) {
        currentIndex = nextIndex;
        showImage(currentIndex);
    }
}

// Función para retroceder al slide anterior
function prevSlide() {
    const prevIndex = (currentIndex - 1 + items.length) % items.length;
    if (prevIndex !== currentIndex) {
        currentIndex = prevIndex;
        showImage(currentIndex);
    }
}

// Función para crear los puntos (indicadores) dinámicamente
function createIndicators() {
    indicator.innerHTML = ''; // Limpiar indicadores existentes
    for (let i = 0; i < items.length; i++) {
        const dot = document.createElement('span');
        dot.classList.add('dot');
        if (i === 0) dot.classList.add('active');
        dot.addEventListener('click', () => {
            if (i !== currentIndex) {
                currentIndex = i;
                showImage(currentIndex);
                resetAutoSlide();
            }
        });
        indicator.appendChild(dot);
    }
}

// Función para iniciar el auto-desplazamiento
function startAutoSlide() {
    clearInterval(autoSlideInterval);
    autoSlideInterval = setInterval(() => {
        nextSlide();
    }, AUTO_SLIDE_INTERVAL);
}

// Función para reiniciar el auto-desplazamiento
function resetAutoSlide() {
    startAutoSlide();
}

// Agregar eventos para los botones de navegación
document.getElementById('next')?.addEventListener('click', () => {
    nextSlide();
    resetAutoSlide();
});

document.getElementById('prev')?.addEventListener('click', () => {
    prevSlide();
    resetAutoSlide();
});

// Cambiar imagen usando las teclas del teclado
document.addEventListener('keydown', (e) => {
    if (e.key === 'ArrowRight') {
        nextSlide();
        resetAutoSlide();
    } else if (e.key === 'ArrowLeft') {
        prevSlide();
        resetAutoSlide();
    }
});

// Inicializar el carrusel
function initCarousel() {
    if (items.length > 0) {
        createIndicators();
        showImage(currentIndex);
        startAutoSlide();
        
        // Pausar/reanudar con el ratón
        const carruselContainer = document.querySelector('.carrusel-container');
        if (carruselContainer) {
            carruselContainer.addEventListener('mouseenter', () => {
                clearInterval(autoSlideInterval);
            });
            carruselContainer.addEventListener('mouseleave', () => {
                startAutoSlide();
            });
        }
    }
}

// Iniciar el carrusel cuando el DOM esté listo
if (document.readyState === 'complete') {
    initCarousel();
} else {
    document.addEventListener('DOMContentLoaded', initCarousel);
}