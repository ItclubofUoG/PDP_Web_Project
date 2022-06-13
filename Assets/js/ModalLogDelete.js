// Delete user log
const DeleteUserLogs = document.querySelectorAll('.js-log-delete') //sellect the class used to use js
const modalcloseDeleteUserLog = document.querySelector('.js-modal-close-log-delete')
const ModalContentDeleteUserLog = document.querySelector('.js-modal-content-log-delete')
const modalDeleteUserLog = document.querySelector('.js-modal-log-delete')

function showModalAdd() {
    modalDeleteUserLog.classList.add('open')
}

for (const DeleteUserLog of DeleteUserLogs) {
    DeleteUserLog.addEventListener('click', showModalAdd)
}

function hideModalAdd() {
    modalDeleteUserLog.classList.remove('open')
}
modalcloseDeleteUserLog.addEventListener('click', hideModalAdd)

ModalContentDeleteUserLog.addEventListener('click', function (event) {
    event.stopPropagation() //stop nổi bọt
})