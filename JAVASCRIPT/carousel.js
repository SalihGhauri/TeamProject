const slides = document.querySelector('.slides');
const dots = document.querySelectorAll('.dot');
const slideCount = document.querySelectorAll('.slide').length;

let currentIndex = 0;
let autoSlide;
let direction = 1;

function updateSlide() {
  slides.style.transform = `translateX(${-100 * currentIndex}%)`;
  dots.forEach((dot, i) => dot.classList.toggle('active', i === currentIndex));
}

function moveSlide() {
  currentIndex = (currentIndex + direction + slideCount) % slideCount;
  updateSlide();
}

function startSlide() {
  autoSlide = setInterval(moveSlide, 6500);
}

function resetSlide() {
  clearInterval(autoSlide);
  startSlide();
}

dots.forEach((dot, index) => {
  dot.addEventListener('click', () => {
    currentIndex = index;
    updateSlide();
    resetSlide();
  });
});

document.querySelector('.next').addEventListener('click', () => {
  direction = 1;
  moveSlide();
  resetSlide();
});

document.querySelector('.prev').addEventListener('click', () => {
  direction = -1;
  moveSlide();
  resetSlide();
});

updateSlide();
startSlide();
