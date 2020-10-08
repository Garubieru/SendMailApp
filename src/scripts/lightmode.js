function changeMode() {
  document.documentElement.classList.toggle('light-mode');

  document.querySelectorAll('.inverted').forEach((result) => {
    result.classList.toggle('invert');
  });
}

let switchButton = document.querySelector('.btn-switch-off');

switchButton.addEventListener('click', () => {
  if (switchButton.classList == 'btn-switch-off') {
    switchButton.style.justifyContent = 'flex-end';
    switchButton.classList = 'btn-switch-on';

    changeMode();
  } else {
    switchButton.style.justifyContent = 'flex-start';
    switchButton.classList = 'btn-switch-off';

    changeMode();
  }
});
