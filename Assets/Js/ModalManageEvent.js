const AddEvents = document.querySelectorAll('.js-add-event') //sellect the class used to use js
const modalcloseAdd = document.querySelector('.js-modal-close-add-event')
const ModalContentAddEvent = document.querySelector('.js-modal-content-add')
const modalEvent = document.querySelector('.js-modal-add')

function showModalAdd() {
    modalEvent.classList.add('open')
}

for (const AddEvent of AddEvents) {
    AddEvent.addEventListener('click', showModalAdd)
}

function hideModalAdd() {
    modalEvent.classList.remove('open')
}
modalcloseAdd.addEventListener('click', hideModalAdd)

ModalContentAddEvent.addEventListener('click', function (event) {
    event.stopPropagation() //stop nổi bọt
})



// Modal update
const UpdateEvents = document.querySelectorAll('.js-update-event') //sellect the class used to use js
const modalclose = document.querySelector('.js-modal-close-update-event')
const ModalContent = document.querySelector('.js-modal-content-update')
const modal = document.querySelector('.js-modal')

function showModal() {
    modal.classList.add('open')
}

for (const UpdateEvent of UpdateEvents) {
    UpdateEvent.addEventListener('click', showModal)
}

function hideModal() {
    modal.classList.remove('open')
}
modalclose.addEventListener('click', hideModal)

ModalContent.addEventListener('click', function (event) {
    event.stopPropagation() //stop nổi bọt
})