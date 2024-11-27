import "./bootstrap";

function applyCpfMask(input) {
    let value = input.value.replace(/\D/g, ""); // Remove todos os caracteres não numéricos
    value = value.replace(/(\d{3})(\d)/, "$1.$2"); // Adiciona o primeiro ponto
    value = value.replace(/(\d{3})(\d)/, "$1.$2"); // Adiciona o segundo ponto
    value = value.replace(/(\d{3})(\d{1,2})$/, "$1-$2"); // Adiciona o traço
    input.value = value; // Atualiza o valor do input
}

function applyPhoneMask(input) {
    let value = input.value.replace(/\D/g, ""); // Remove todos os caracteres não numéricos
    value = value.replace(/(\d{2})(\d)/, "($1) $2"); // Adiciona os parênteses e o espaço
    value = value.replace(/(\d{5})(\d)/, "$1-$2"); // Adiciona o traço
    value = value.substring(0, 15); // Garante o máximo de 15 caracteres
    input.value = value; // Atualiza o valor do input
}

const phoneInput = document.getElementById("phone");
if (phoneInput) {
    phoneInput.addEventListener("input", () => applyPhoneMask(phoneInput));
}

const cpfInput = document.getElementById("cpf");
if (cpfInput) {
    cpfInput.addEventListener("input", () => applyCpfMask(cpfInput));
}

document.addEventListener("DOMContentLoaded", () => {
    const images = [
        "/images/guest-image-1.png",
        "/images/guest-image-2.png",
        "/images/guest-image-3.png",
    ];

    let currentImageIndex = 0;
    const imageContainer = document.getElementById("rotating-image");

    setInterval(() => {
        currentImageIndex = (currentImageIndex + 1) % images.length;
        imageContainer.src = images[currentImageIndex];
    }, 4000);
});
