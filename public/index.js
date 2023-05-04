//MODALS
const btnCloseModal = document.querySelectorAll('.btn--close-modal');
const btnSignUpModal = document.querySelector('.sign-up');
const btnLoginModal = document.querySelector('.login');
const getStarted = document.querySelector(".get-started");
const signInModal = document.querySelector('.modal__signIn');
const signUpModal = document.querySelector('.modal__signUp');
const overlay = document.querySelector('.overlay');

const btnOpenMenu = document.querySelector('.open-menu');
const mainNav = document.querySelector('.main-nav-list');

signInModal.classList.add("hidden");
signUpModal.classList.add("hidden");
overlay.classList.add("hidden");

btnLoginModal.addEventListener('click', function () {
  signInModal.classList.remove('hidden');
  signUpModal.classList.add('hidden');
  overlay.classList.remove('hidden')
})
btnSignUpModal.addEventListener('click', function () {
  signInModal.classList.add('hidden');
  signUpModal.classList.remove('hidden');
  overlay.classList.remove('hidden')
})
getStarted.addEventListener('click', () => {
  signInModal.classList.add('hidden');
  signUpModal.classList.remove('hidden');
  overlay.classList.remove('hidden')
})
btnCloseModal.forEach((el) => el.addEventListener('click', function () {
  signInModal.classList.add('hidden');
  signUpModal.classList.add('hidden');
  overlay.classList.add('hidden')
}));

btnOpenMenu.addEventListener('click', ()=> {
  mainNav.classList.toggle('menu-active')
})
mainNav.addEventListener('click', () => {
  mainNav.classList.remove('menu-active')
})

// AUTHORIZATION

function getErrorParam() {
  const urlParams = new URLSearchParams(window.location.search);
  return urlParams.get('Error');
}

function getSignUpParam() {
  const urlParams = new URLSearchParams(window.location.search);
  return urlParams.get('SignUp');
}

const errorParam = getErrorParam();
const signUpParam = getSignUpParam();


if (errorParam) {
  const error = document.querySelector('.db__respond');
  error.textContent = errorParam;
  
  error.style.color = 'red';
  error.style.fontSize = '1.6rem';
  error.style.fontWeight = '500';
  error.style.gridColumn = "span 2";
  error.style.justifySelf = "center";

  signInModal.classList.remove('hidden');
  signUpModal.classList.add('hidden');
  overlay.classList.remove('hidden')
} else {
  // location.href = '/project/src/components/user/index.php';  
}

if (signUpParam) {
  const signUp__info = document.querySelector('.sign__up__info');
  signUp__info.textContent = signUpParam;
  signUp__info.style.color = signUpParam === 'User already exists' ? 'red' : '#2b8a3e';
  signUp__info.style.fontSize = '1.6rem';
  signUp__info.style.fontWeight = '500';
  signUp__info.style.gridColumn = "span 2";
  signUp__info.style.justifySelf = "center";

  if (signUpParam != 'User already exists') {
    signInModal.classList.add('hidden');
    signUpModal.classList.remove('hidden');
    overlay.classList.remove('hidden')
    setTimeout(() => {
      signInModal.classList.add('hidden');
      signUpModal.classList.add('hidden');
      overlay.classList.add('hidden')
    }, 2000);
  } else {
    signInModal.classList.add('hidden');
    signUpModal.classList.remove('hidden');
    overlay.classList.remove('hidden')
  }
}
const password = document.querySelector('#password');
const password2 = document.querySelector('#password2')
const repeatPassword = document.querySelector('#repeatpasswd');
const btn = document.querySelectorAll('.btn');
const isDisabled = true;

  btn[1].disabled = true;
  btn[1].style.backgroundColor = "#999";
  btn[1].style.cursor = 'auto';
const signUp__info = document.querySelector('.sign__up__info');

  function disabledSignUp(isDisabled) {
    signUp__info.style.color = 'red';
    signUp__info.style.fontSize = '1.6rem';
    signUp__info.style.fontWeight = '500';
    signUp__info.style.gridColumn = "span 2";
    signUp__info.style.justifySelf = "center";
    btn[1].disabled = isDisabled;
    btn[1].style.backgroundColor = "#999";
    btn[1].style.cursor = 'auto';
  }
  function activatedSignUp(isDisabled) {
    signUp__info.style.color = '#25a244';
    signUp__info.style.fontSize = '1.6rem';
    signUp__info.style.fontWeight = '500';
    signUp__info.style.gridColumn = "span 2";
    signUp__info.style.justifySelf = "center";
    btn[1].disabled = isDisabled;
    btn[1].style.backgroundColor = "#25a244";
    btn[1].style.cursor = 'pointer';
  }


  password2.addEventListener('input', ()=>{
      const passwordRegex = /^.{8,}$/;

      if(passwordRegex.test(password2.value)) {
        repeatPassword.addEventListener('input',()=>{
          if(passwordRegex.test(repeatPassword.value)) {
            if(password2.value === repeatPassword.value) {
              signUp__info.textContent = "Passwords are valid!";
              activatedSignUp(false);
            } else {
              signUp__info.textContent = "Passwords are not the same!";
              disabledSignUp(true);
            }
          } else {
            signUp__info.textContent = "Repeated password must be 8 characters long!";
            disabledSignUp(true);
          }
        })
      } else {
        signUp__info.textContent = "Password must be 8 characters long!";
        disabledSignUp(true);
      }
  })




/*
********************
SLIDER
********************
*/

const sliderContainer = document.querySelector('.testimonials-slider');

const sliderLeftBtn = sliderContainer.querySelector('.slider-btn--left');
const sliderRightBtn = sliderContainer.querySelector('.slider-btn--right');

const testimonials = sliderContainer.querySelectorAll('.testimonial');

let currentSlide = 0;

testimonials.forEach((testimonial, index) => {
  if (index !== currentSlide) {
    testimonial.classList.remove('active');
  }
});

sliderLeftBtn.addEventListener('click', () => {
  currentSlide--;
  if (currentSlide < 0) {
    currentSlide = testimonials.length - 1;
  }

  testimonials.forEach((testimonial, index) => {
    if (index !== currentSlide) {
      testimonial.classList.remove('active');
    } else {
      testimonial.classList.add('active');
    }
  });
});

sliderRightBtn.addEventListener('click', () => {
  currentSlide++;
  if (currentSlide >= testimonials.length) {
    currentSlide = 0;
  }

  testimonials.forEach((testimonial, index) => {
    if (index !== currentSlide) {
      testimonial.classList.remove('active');
    } else {
      testimonial.classList.add('active');
    }
  });
});



/*
********************
CANVAS
********************
*/

const canvas = document.getElementById('canvas');
const ctx = canvas.getContext('2d');
const radius = canvas.width / 2;
drawClock();

function drawClock() {
  // Clear the canvas
  ctx.clearRect(0, 0, canvas.width, canvas.height);

  // Draw the clock face
  ctx.beginPath();
  ctx.arc(radius, radius, radius - 5, 0, 2 * Math.PI);
  ctx.lineWidth = .6;
  ctx.strokeStyle = 'rgb(250,250,250)';
  ctx.stroke();

  // Draw the clock numbers
  ctx.font = '14px Arial';
  ctx.fillStyle = 'rgb(250,250,250)';
  ctx.textAlign = 'center';
  ctx.textBaseline = 'middle';
  ctx.fillText('12', radius, radius - radius / 1.7);
  ctx.fillText('3', radius + radius / 1.7, radius);
  ctx.fillText('6', radius, radius + radius / 1.7);
  ctx.fillText('9', radius - radius / 1.7, radius);

  // Get the current time
  const now = new Date();
  const hours = now.getHours() % 12;
  const minutes = now.getMinutes();
  const seconds = now.getSeconds();

  // Draw the hour hand
  const hourAngle = (hours * Math.PI / 6) + (minutes * Math.PI / (6 * 60)) + (seconds * Math.PI / (360 * 60));
  drawHand(hourAngle, radius * 0.5, 2, 'rgb(250,250,250)');

  // Draw the minute hand
  const minuteAngle = (minutes * Math.PI / 30) + (seconds * Math.PI / (30 * 60));
  drawHand(minuteAngle, radius * 0.7, 2, 'rgb(250,250,250)');

  // Draw the second hand
  const secondAngle = seconds * Math.PI / 30;
  drawHand(secondAngle, radius * 0.8, 3, '#25a244');

  // Draw the center circle
  ctx.beginPath();
  ctx.arc(radius, radius, 5, 0, 2 * Math.PI);
  ctx.fillStyle = 'rgb(250,250,250)';
  ctx.fill();
}

function drawHand(angle, length, width, color) {
  ctx.beginPath();
  ctx.lineWidth = width;
  ctx.lineCap = 'round';
  ctx.strokeStyle = color;
  ctx.moveTo(radius, radius);
  ctx.lineTo(radius + Math.sin(angle) * length, radius - Math.cos(angle) * length);
  ctx.stroke();
}

setInterval(drawClock, 1000);

