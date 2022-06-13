const AddMajors = document.querySelectorAll('.js-add-major') //sellect the class used to use js
const modalcloseAdd = document.querySelector('.js-modal-close-add-major')
const ModalContentAddMajor = document.querySelector('.js-modal-content-add')
const modalmajor = document.querySelector('.js-modal-add')

function showModalAdd() {
    modalmajor.classList.add('open')
}

for(const AddMajor of AddMajors ){
    AddMajor.addEventListener('click',showModalAdd)
}

function hideModalAdd(){
    modalmajor.classList.remove('open')
}
modalcloseAdd.addEventListener('click',hideModalAdd)

ModalContentAddMajor.addEventListener('click', function (event) {
    event.stopPropagation() //stop nổi bọt
})



// Modal update
const UpdateMajors = document.querySelectorAll('.js-update-major') //sellect the class used to use js
const modalclose = document.querySelector('.js-modal-close-update-major')
const ModalContent = document.querySelector('.js-modal-content-update')
const modal = document.querySelector('.js-modal')

function showModal() {
    modal.classList.add('open')
}

for(const UpdateMajor of UpdateMajors ){
    UpdateMajor.addEventListener('click',showModal)
}

function hideModal(){
    modal.classList.remove('open')
}
modalclose.addEventListener('click',hideModal)

ModalContent.addEventListener('click', function (event) {
    event.stopPropagation() //stop nổi bọt
})