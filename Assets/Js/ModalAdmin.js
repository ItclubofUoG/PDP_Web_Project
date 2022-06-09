 //Modal add new admin
 const Admins = document.querySelectorAll('.js-add-admin') //sellect the class used to use js
 const modalcloseAdmin = document.querySelector('.js-modal-close-add-admin')
 const ModalContentAdmin = document.querySelector('.js-modal-content-add-admin')
 const modaladmin = document.querySelector('.js-modal-add-admin')
     
 function showModalAdd() {
     modaladmin.classList.add('open')
 }

 for(const Admin of Admins ){
     Admin.addEventListener('click',showModalAdd)
 }

 function hideModalAdd(){
     modaladmin.classList.remove('open')
 }
 modalcloseAdmin.addEventListener('click',hideModalAdd)

 ModalContentAdmin.addEventListener('click', function (event) {
     event.stopPropagation() //stop nổi bọt
 }) 

 // Modal update
 const Updates = document.querySelectorAll('.js-update-admin') //sellect the class used to use js
 const modalclose = document.querySelector('.js-modal-close-update-admin')
 const ModalContent = document.querySelector('.js-modal-content-update-admin')
 const modalad = document.querySelector('.js-modal-update-admin')
 
 function showModal() {
     modalad.classList.add('open')
 }

 for(const Update of Updates ){
     Update.addEventListener('click',showModal)
 }

 function hideModal(){
     modalad.classList.remove('open')
 }
 modalclose.addEventListener('click',hideModal)

 ModalContent.addEventListener('click', function (event) {
     event.stopPropagation() //stop nổi bọt
 })

