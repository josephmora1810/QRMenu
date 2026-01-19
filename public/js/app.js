// Variables globales
let currentTab = null;

// Inicializar
document.addEventListener('DOMContentLoaded', () => {
    setupTabs();
    setupSmoothScrolling();

    // Establecer la primera pestaña como activa
    const firstTabButton = document.querySelector('.tab-button');
    if (firstTabButton) {
        currentTab = firstTabButton.dataset.tab;
        firstTabButton.classList.add('border-orange-500', 'text-orange-600', 'bg-orange-50');
        firstTabButton.classList.remove('border-transparent', 'text-gray-600', 'hover:text-gray-900', 'hover:bg-gray-50');
    }
});

// Configurar pestañas
function setupTabs() {
    const tabButtons = document.querySelectorAll('.tab-button');

    tabButtons.forEach(button => {
        button.addEventListener('click', () => {
            const tabId = button.dataset.tab;

            // Remover clases activas de todas las pestañas
            tabButtons.forEach(btn => {
                btn.classList.remove('border-orange-500', 'text-orange-600', 'bg-orange-50');
                btn.classList.add('border-transparent', 'text-gray-600', 'hover:text-gray-900', 'hover:bg-gray-50');

                // Actualizar ícono
                const icon = btn.querySelector('i');
                if (icon) {
                    icon.className = 'fas mr-2';
                    if (btn.dataset.tab === 'combos-parrillas') {
                        icon.classList.add('fa-fire');
                    } else if (btn.dataset.tab === 'hamburguesas-perros') {
                        icon.classList.add('fa-hamburger');
                    } else if (btn.dataset.tab === 'pizzas') {
                        icon.classList.add('fa-pizza-slice');
                    }
                }
            });

            // Añadir clases activas a la pestaña clickeada
            button.classList.remove('border-transparent', 'text-gray-600', 'hover:text-gray-900', 'hover:bg-gray-50');
            button.classList.add('border-orange-500', 'text-orange-600', 'bg-orange-50');

            // Actualizar ícono de la pestaña activa
            const activeIcon = button.querySelector('i');
            if (activeIcon) {
                activeIcon.className = 'fas fa-fire mr-2';
            }

            // Ocultar todos los contenidos
            document.querySelectorAll('.tab-content').forEach(content => {
                content.classList.add('hidden');
                content.classList.remove('fade-in');
            });

            // Mostrar el contenido correspondiente
            const tabContent = document.getElementById(`tab-${tabId}`);
            if (tabContent) {
                tabContent.classList.remove('hidden');
                setTimeout(() => {
                    tabContent.classList.add('fade-in');
                }, 10);
            }

            currentTab = tabId;
        });
    });
}

// Configurar scroll suave
function setupSmoothScrolling() {
    // Agregar scroll suave a los enlaces internos
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            if (targetId === '#') return;

            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                window.scrollTo({
                    top: targetElement.offsetTop - 100,
                    behavior: 'smooth'
                });
            }
        });
    });
}

// Mostrar detalles del producto
function showProductDetails(product) {
    const modal = document.getElementById('product-modal');
    const modalTitle = document.getElementById('modal-title');
    const modalImage = document.getElementById('modal-image');
    const modalDescription = document.getElementById('modal-description');
    const modalIngredients = document.getElementById('modal-ingredients');
    const modalPrice = document.getElementById('modal-price');
    const modalCalories = document.getElementById('modal-calories');
    const modalTime = document.getElementById('modal-time');

    // Llenar el modal con los datos del producto
    modalTitle.textContent = product.name;
    modalImage.src = product.image_url;
    modalImage.alt = product.name;
    modalDescription.textContent = product.description;
    modalIngredients.textContent = product.ingredients;
    modalPrice.textContent = `$${parseFloat(product.price).toFixed(2)}`;
    modalCalories.textContent = product.calories ? `${product.calories} cal` : 'N/A';
    modalTime.textContent = product.preparation_time ? `${product.preparation_time} min` : 'N/A';

    // Mostrar el modal
    modal.classList.remove('hidden');
    modal.classList.add('flex');
    document.body.style.overflow = 'hidden';
}

// Cerrar modal del producto
function closeProductModal() {
    const modal = document.getElementById('product-modal');
    modal.classList.remove('flex');
    modal.classList.add('hidden');
    document.body.style.overflow = 'auto';
}

// Compartir producto
function shareProduct() {
    if (navigator.share) {
        navigator.share({
            title: 'Mira este producto del Restaurante Delicias',
            text: '¡Qué delicia! Encontré este producto en el menú digital del Restaurante Delicias',
            url: window.location.href
        })
        .then(() => console.log('Compartido exitosamente'))
        .catch(error => console.log('Error al compartir:', error));
    } else {
        // Fallback para navegadores que no soportan Web Share API
        const url = window.location.href;
        navigator.clipboard.writeText(url).then(() => {
            alert('¡Enlace copiado al portapapeles! Compártelo con tus amigos.');
        });
    }
}

// Cerrar modal con Escape
document.addEventListener('keydown', (e) => {
    const modal = document.getElementById('product-modal');
    if (e.key === 'Escape' && modal.classList.contains('flex')) {
        closeProductModal();
    }
});

// Cerrar modal haciendo clic fuera
document.getElementById('product-modal').addEventListener('click', (e) => {
    if (e.target.id === 'product-modal') {
        closeProductModal();
    }
});

// Animación de scroll reveal básica
function initScrollReveal() {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-fade-in');
            }
        });
    }, {
        threshold: 0.1
    });

    // Observar todos los productos
    document.querySelectorAll('.group').forEach(el => observer.observe(el));
}

// Inicializar animaciones cuando la página cargue
window.addEventListener('load', initScrollReveal);
