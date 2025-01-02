import "./bootstrap";

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
