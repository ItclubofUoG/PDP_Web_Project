const UpdateUsers = document.querySelectorAll('.js-update-user') //sellect the class use to use js
const modalclose = document.querySelector('.js-modal-close-update-user')
const ModalContent = document.querySelector('.js-modal-content-update-user')
const modal = document.querySelector('.js-modal')

function showModal() {
    modal.classList.add('open')
}

for (const UpdateUser of UpdateUsers) {
    UpdateUser.addEventListener('click', showModal)
}

function hideModal() {
    modal.classList.remove('open')
}
modalclose.addEventListener('click', hideModal)

// modal.addEventListener('click',hideModal)

ModalContent.addEventListener('click', function (event) {
    event.stopPropagation() //stop nổi bọt
})