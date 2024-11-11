const images = document.querySelectorAll('.carousel-image');
const links = document.querySelectorAll('.links-container li');
let currentIndex = 0;
let autoScrollInterval;
let isAutoScrolling = true;

function updateCarousel() {
    images.forEach((img, index) => {
        img.classList.remove('active', 'left', 'right', 'left-2', 'right-2');

        if (index === currentIndex) {
            img.classList.add('active');
        } else if (index === (currentIndex - 1 + images.length) % images.length) {
            img.classList.add('left');
        } else if (index === (currentIndex + 1) % images.length) {
            img.classList.add('right');
        } else if (index === (currentIndex - 2 + images.length) % images.length) {
            img.classList.add('left-2');
        } else if (index === (currentIndex + 2) % images.length) {
            img.classList.add('right-2');
        }
    });

    links.forEach((link, linkIndex) => {
        link.classList.toggle('active', linkIndex === currentIndex);
    });
}

function showImage(index) {
    currentIndex = index;
    updateCarousel();
}

function startAutoScroll() {
    autoScrollInterval = setInterval(() => {
        if (isAutoScrolling) {
            currentIndex = (currentIndex + 1) % images.length;
            updateCarousel();
        }
    }, 1500);
}

function stopAutoScroll() {
    clearInterval(autoScrollInterval);
    isAutoScrolling = false;
}

startAutoScroll();

links.forEach((link, index) => {
    link.addEventListener('mouseover', () => {
        if (isAutoScrolling) {
            stopAutoScroll(); 
        }
        showImage(index);
    });
});

updateCarousel();
