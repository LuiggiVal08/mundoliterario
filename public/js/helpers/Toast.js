class Toast {
    constructor() {
        this.portal = document.getElementById('portal');
        this.queue = [];
    }

    createToast({ title, message, type = 'success', duration = 3000 }) {
        // Crear el contenedor del toast
        const toast = document.createElement('div');
        const colorClass = type === 'success' ? 'toast-success' : 'toast-error errorInput';

        toast.className = `${colorClass} toast border-[1px] relative transition-all duration-500 ease-in-out`;

        // Contenido del toast
        toast.innerHTML = `
            <div class="flex flex-col gap-1 justify-start">
                <strong class="block font-bold">${title}</strong>
                <span>${message}</span>
            </div>
            <button class="btn-toast">
                <span class="material-symbols-rounded ico-cancel md-18 fill-1 wght-ligth leading-none">
                </span>
            </button>
        `;

        // Botón de cerrar (la "X")
        const closeButton = toast.querySelector('button');
        closeButton.addEventListener('click', () => {
            this.removeToast(toast);
        });

        // Añadir el toast al portal y al principio del queue
        this.portal.appendChild(toast);
        this.queue.unshift(toast);  // Agregar el nuevo toast al principio de la lista

        // Reorganizar los toasts
        this.reorganizeToasts();

        // Al hacer hover en el contenedor del portal, expandir todos los toasts
        this.portal.addEventListener('mouseover', () => this.expandToasts());
        this.portal.addEventListener('mouseout', () => this.collapseToasts());

        // Iniciar el temporizador para remover el toast después de un tiempo
        let timer = this.scheduleRemoveToast(toast, duration);
        toast.addEventListener('mouseover', () => clearTimeout(timer)); // Detener el temporizador al hacer hover
        toast.addEventListener('mouseout', () => timer = this.scheduleRemoveToast(toast, duration)); // Reiniciar el temporizador al salir del hover
    }

    scheduleRemoveToast(toast, duration) {
        return setTimeout(() => {
            this.removeToast(toast);
        }, duration);
    }

    removeToast(toast) {
        toast.classList.add('opacity-0'); // Añadir transición de salida
        setTimeout(() => {
            toast.remove();
            this.queue = this.queue.filter(t => t !== toast); // Remover del queue
            this.reorganizeToasts(); // Reorganizar después de remover
        }, 300); // Tiempo de transición
    }

    reorganizeToasts() {
        this.queue.forEach((toast, index) => {
            // Ajustar el z-index para que los más nuevos queden sobre los viejos
            toast.style.zIndex = this.queue.length - index;
            // Colocar cada toast más encima del anterior, mostrando menos de cada uno
            toast.style.transform = `translateY(${index * -25}px)`; // Más superposición
        });
    }

    expandToasts() {
        // Expandir todos los toasts cuando se hace hover
        this.queue.forEach((toast, index) => {
            toast.style.transform = `translateY(${index * -70}px)`; // Mueve cada toast para que queden desplegados en la lista
        });
    }

    collapseToasts() {
        // Colapsar todos los toasts cuando se deja de hacer hover
        this.queue.forEach((toast, index) => {
            toast.style.transform = `translateY(${index * -25}px)`; // Superposición original ajustada
        });
    }
}

// Crear una instancia del helper
const toast = new Toast();

// Usar el toast en cualquier lugar de la aplicación
export default function showToast({ title, message, type = 'success', duration = 3000 }) {
    toast.createToast({ title, message, type, duration });
}
