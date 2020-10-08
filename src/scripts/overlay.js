let overlay = document.querySelector('.overlay');

let buttonsBack = document.querySelectorAll('.btn-back').forEach((btn) => {
  btn.addEventListener('click', () => (overlay.style.display = 'none'));
});
