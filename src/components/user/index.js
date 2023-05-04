const btnOpenMenu = document.querySelector('.open-menu');
const mainNav = document.querySelector('.main__nav');


function getErrorParam() {
  const urlParams = new URLSearchParams(window.location.search);
  return urlParams.get('RatingsError');
}

function getEditParam() {
  const urlParams = new URLSearchParams(window.location.search);
  return urlParams.get('Edit');
}

const Error = getErrorParam();
const Edit = getEditParam();

const RatingsErrorDiv = document.querySelector('.ratings__error');
const btnCloseError = document.querySelector('.btn__close_error');
const btnCloseEdit = document.querySelector('.btn__close_edit');
const modalConfirm = document.querySelector('.modal__confirm');
const btnConfirmDelete = document.querySelector('.confirm_delete');
const deleteUser = document.querySelector('.delete__user');
const overlay = document.querySelector('.overlay');
const EditFootballer = document.querySelector('.edit__footballer');

if (Error) {
  RatingsErrorDiv.classList.remove('hidden');
  overlay.classList.remove('hidden');
}

if(Edit) {
  EditFootballer.classList.remove('hidden');
  overlay.classList.remove('hidden');
}
btnOpenMenu.addEventListener('click', () => {
  mainNav.classList.toggle('menu-active')
})
mainNav.addEventListener('click', () => {
  mainNav.classList.remove('menu-active')
})

btnCloseError.addEventListener('click', function () {
  RatingsErrorDiv.classList.add('hidden');
  overlay.classList.add('hidden');
})
btnCloseEdit.addEventListener('click', function () {
  EditFootballer.classList.add('hidden');
  overlay.classList.add('hidden');
})

deleteUser.addEventListener('click', function (e) {
  return false;
  e.preventDefault();
  modalConfirm.classList.remove('hidden');
  overlay.classList.add('hidden');
})


