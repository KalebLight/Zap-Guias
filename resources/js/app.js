import "./bootstrap";

function applyCpfMask(input) {
    let value = input.value.replace(/\D/g, "");
    value = value.replace(/(\d{3})(\d)/, "$1.$2");
    value = value.replace(/(\d{3})(\d)/, "$1.$2");
    value = value.replace(/(\d{3})(\d{1,2})$/, "$1-$2");
    input.value = value;
}

function applyPhoneMask(input) {
    let value = input.value.replace(/\D/g, "");
    value = value.replace(/(\d{2})(\d)/, "($1) $2");
    value = value.replace(/(\d{5})(\d)/, "$1-$2");
    value = value.substring(0, 15);
    input.value = value;
}

function applyCNPJMask(input) {
    let value = input.value.replace(/\D/g, "");
    value = value.replace(/(\d{2})(\d)/, "$1.$2");
    value = value.replace(/(\d{5})(\d)/, "$1.$2");
    value = value.replace(/(\d{8})(\d)/, "$1/$2");
    value = value.replace(/(\d{12})(\d)/, "$1-$2");
    value = value.substring(0, 18);
    input.value = value;
}

const phoneInput = document.getElementById("phone");
if (phoneInput) {
    phoneInput.addEventListener("input", () => applyPhoneMask(phoneInput));
}

const cnpjInput = document.getElementById("cnpj");
if (cnpjInput) {
    cnpjInput.addEventListener("input", () => applyCNPJMask(cnpjInput));
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
