import "./bootstrap";

import Alpine from "alpinejs";
import TomSelect from "tom-select";
import "tom-select/dist/css/tom-select.css";

document.addEventListener("DOMContentLoaded", () => {
    new TomSelect("#category", {
        create: false,
        maxOptions: 500,
        placeholder: "Toutes les catégories",
    });
});
window.Alpine = Alpine;

Alpine.start();
