import "./bootstrap";
import "../../vendor/masmerise/livewire-toaster/resources/js";

document.addEventListener("DOMContentLoaded", () => {
    const images = [
        "/images/guest-image-1.jpeg",
        "/images/guest-image-2.jpeg",
        "/images/guest-image-3.jpeg",
    ];

    let currentImageIndex = 0;
    const imageContainer = document.getElementById("rotating-image");

    setInterval(() => {
        currentImageIndex = (currentImageIndex + 1) % images.length;
        imageContainer.src = images[currentImageIndex];
    }, 4000);
});
