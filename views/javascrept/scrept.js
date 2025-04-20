//................ menu bar 

let menulist = document.getElementById('menulist');
let menubut = document.querySelector('.menu') ;

let closebut = document.querySelector('.close') ;


function openMenu(){
    menulist.style.display= 'flex';
    menubut.style.display= 'none';
    closebut.style.display = 'block';
    // document.querySelector('.menu').classList.toggle('animate');


}

function closeMenu(){
    menulist.style.display= 'none';
    menubut.style.display= 'block';
    closebut.style.display = 'none';

    


}

function checkScreenSize() {
    if (window.matchMedia("(max-width: 900px)").matches) {
        menubut.style.display= 'block';
        if(menulist.style.display = 'flex'){
            menulist.style.display= 'none';

        }
    } else {
        if(menulist.style.display = 'flex'){
            menubut.style.display= 'none';
            closebut.style.display = 'none';
        }
        // menulist.style.display = 'flex';
        
    }
}

// تشغيل الدالة عند تحميل الصفحة
checkScreenSize();

// تحديث الحالة عند تغيير حجم النافذة
window.addEventListener("resize", checkScreenSize);


//.................boxex scroll 
const boxes = document.querySelectorAll('.box')

window.addEventListener('scroll', checkBoxes)

checkBoxes()

function checkBoxes() {
    const triggerBottom = window.innerHeight / 5 * 4

    boxes.forEach(box => {
        const boxTop = box.getBoundingClientRect().top

        if(boxTop < triggerBottom) {
            box.classList.add('show')
        } else {
            box.classList.remove('show')
        }
    })
}


// الصور في الصفحةالرئيسية
const slides = document.querySelectorAll('.slide');
const dots = document.querySelectorAll('.dot');
const nextBtn = document.querySelector('.next-btn');
const prevBtn = document.querySelector('.prev-btn');

let current = 0;
let interval = setInterval(nextSlide, 4000);

function showSlide(index) {
  slides.forEach((slide, i) => {
    slide.classList.toggle('active', i === index);
    dots[i].classList.toggle('active', i === index);
  });
}

function nextSlide() {
  current = (current + 1) % slides.length;
  showSlide(current);
}

function prevSlide() {
  current = (current - 1 + slides.length) % slides.length;
  showSlide(current);
}

nextBtn.addEventListener('click', () => {
  nextSlide();
  resetTimer();
});

prevBtn.addEventListener('click', () => {
  prevSlide();
  resetTimer();
});

function resetTimer() {
  clearInterval(interval);
  interval = setInterval(nextSlide, 4000);
}

// // user Verification
// const codes = document.querySelectorAll('.code');
// codes[0].focus();
// codes.forEach((code, idx) => {
//   code.addEventListener('keydown', (e) => {
//     if (e.key >= 0 && e.key <= 9) {
//       code.value = '';
//       setTimeout(() => {
//         if (idx < codes.length - 1) {
//           codes[idx + 1].focus();
//         }
//       }, 10);
//     } else if (e.key === 'Backspace') {
//       setTimeout(() => {
//         if (idx > 0) {
//           codes[idx - 1].focus();
//         }
//       }, 10);
//     }
//   });
// });