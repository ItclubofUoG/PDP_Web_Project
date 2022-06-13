 //Modal add
 const AddCourses = document.querySelectorAll('.js-add-course') //sellect the class used to use js
 const modalcloseAdd = document.querySelector('.js-modal-close-add-course')
 const ModalContentAddCourse = document.querySelector('.js-modal-content-add')
 const modalcourse = document.querySelector('.js-modal-add')
 
 function showModalAdd() {
     modalcourse.classList.add('open')
 }

 for(const AddCourse of AddCourses ){
     AddCourse.addEventListener('click',showModalAdd)
 }

 function hideModalAdd(){
     modalcourse.classList.remove('open')
 }
 modalcloseAdd.addEventListener('click',hideModalAdd)

 ModalContentAddCourse.addEventListener('click', function (event) {
     event.stopPropagation() //stop nổi bọt
 })
 
 
 
 // Modal update
 const UpdateCourses = document.querySelectorAll('.js-update-course') //sellect the class used to use js
 const modalclose = document.querySelector('.js-modal-close-update-course')
 const ModalContent = document.querySelector('.js-modal-content-update')
 const modal = document.querySelector('.js-modal')
 
 function showModal() {
     modal.classList.add('open')
 }

 for(const UpdateCourse of UpdateCourses ){
     UpdateCourse.addEventListener('click',showModal)
 }

 function hideModal(){
     modal.classList.remove('open')
 }
 modalclose.addEventListener('click',hideModal)

 ModalContent.addEventListener('click', function (event) {
     event.stopPropagation() //stop nổi bọt
 })