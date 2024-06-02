import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


document.addEventListener("DOMContentLoaded", function () {
    const paymentOptions = document.querySelectorAll(".payment-option");
    const paymentMethodInput = document.getElementById("payment-method");

    paymentOptions.forEach((option) => {
        option.addEventListener("click", function () {
            paymentOptions.forEach((opt) => {
                opt.classList.remove("border-blue-500");
                opt.querySelector(".dot").classList.remove("border-4");
            });

            this.classList.add("border-blue-500");

            this.querySelector(".dot").classList.add("border-4");

            paymentMethodInput.value = this.id;
        });
    });
});
