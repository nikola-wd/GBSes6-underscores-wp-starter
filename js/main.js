"use strict"

// import * as _imported from './inc/_import1'
// alert(_imported.test1)




// open modal function
const openModal = (modalId) => {
  const $modal = document.getElementById(modalId);
  document.body.classList.add('modal--custom-open');
  $modal.classList.add('modal--custom-open');
};

document.querySelectorAll('.modal--custom-close').forEach((modalCLose) => {
  modalCLose.addEventListener('click', () => {
    const $parentModal = document.querySelector('.modal--custom.modal--custom-open');
    document.body.classList.remove('modal--custom-open');
    $parentModal.classList.remove('modal--custom-open');
  });
})




// doc ready
document.addEventListener("DOMContentLoaded", () => {


  // if (document.querySelectorAll('.slider').length) {
  //   var swiper = new Swiper('.slider', {
  //     slidesPerView: 1,
  //     loop: true,
  //     autoplay: {
  //       delay: 2500,
  //       disableOnInteraction: false,
  //     },
  //     pagination: {
  //       el: '.swiper-pagination',
  //     }
  //   });
  // }
	

}); // end doc ready