const btnShowHistory = document.querySelector('.show__history');
const historyAccordion = document.querySelector('.history__accordion');
const editUser = document.querySelector(".edit__profile");
const login = document.querySelector("#login");
const email = document.querySelector("#email");
const img = document.querySelector(".label__user");
const profileForm = document.querySelector(".profile__form");


btnShowHistory.addEventListener('click', () => {
  console.log(historyAccordion);
  historyAccordion.classList.toggle('accordion__hidden')
})

function getEditParam() {
  const urlParams = new URLSearchParams(window.location.search);
  return urlParams.get('editRating');
}

const edit = getEditParam();

if (edit) {
  historyAccordion.classList.toggle('accordion__hidden');
}

editUser.addEventListener("click", (e) => {
  e.preventDefault();
  img.style.display = "flex";
  editUser.classList.add("update__user");
  editUser.classList.remove("edit__profile")
  editUser.textContent = "UPDATE";
  checkUpdate();
})

function checkUpdate() {
  if (editUser.textContent === "UPDATE") {
    editUser.addEventListener("click", () => {
      profileForm.submit();      
    })
  } 
}


