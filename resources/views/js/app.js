import './bootstrap';
import './bootstrap.bundle.js'
import Alpine from 'alpinejs';
window.Alpine = Alpine;

Alpine.start();

var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
})
