const btnCloseModal = document.querySelector('.btn__close_modal');
const modal = document.querySelector('.modal');
const btnOpenModal = document.querySelector('.btn__open_modal');

btnCloseModal.addEventListener('click', function () {
  modal.classList.add('hidden');
  overlay.classList.add('hidden')
});

btnOpenModal.addEventListener('click', function () {
  modal.classList.remove('hidden');
  overlay.classList.remove('hidden')
});
