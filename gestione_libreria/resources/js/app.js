import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


function getRandomColor() {
    return '#' + Math.floor(Math.random() * 16777215).toString(16);
}


document.querySelectorAll('.particle').forEach(function (particle) {
    particle.addEventListener('mouseenter', function () {
        this.style.setProperty('--hover-color', getRandomColor());
    });

    particle.addEventListener('mouseleave', function () {
        this.style.removeProperty('--hover-color');
    });
});
