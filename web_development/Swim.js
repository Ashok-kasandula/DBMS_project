function openLightbox(imageSrc) {
    var lightbox = document.getElementById('lightbox');
    var image = lightbox.querySelector('img');
    image.src = imageSrc;
    lightbox.style.display = 'block';
}

function closeLightbox() {
    document.getElementById('lightbox').style.display = 'none';
}
