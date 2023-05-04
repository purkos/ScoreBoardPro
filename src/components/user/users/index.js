function getDeleteUser() {
  const urlParams = new URLSearchParams(window.location.search);
  return urlParams.get('deleteUser');
}

const deleteUserParam = getDeleteUser();

const closeBtn = document.querySelector('.btn__close');
const modal__confirm = document.querySelector('.modal__confirm');
const deleteUserBtn = document.querySelectorAll('.deleteUser');
const confirm_delete = document.querySelector('.confirm_delete');

let userDelId;
deleteUserBtn.forEach(e => e.addEventListener('click', (el) => {
  userDelId = Number(el.target.value)

  modal__confirm.classList.remove('hidden');
  overlay.classList.remove('hidden');
}));

closeBtn.addEventListener('click', () => {
  modal__confirm.classList.add('hidden');
  overlay.classList.add('hidden');
})

// console.log(userDelId)
confirm_delete.addEventListener('click', () => {
  location.href = `./?UserDelId=${userDelId}`;
})
