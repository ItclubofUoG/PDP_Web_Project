// Modal add user log
const AddUserLogs = document.querySelectorAll('.js-log-add') //sellect the class used to use js
const modalcloseAddUserLog = document.querySelector('.js-modal-close-log-add')
const ModalContentAddUserLog = document.querySelector('.js-modal-content-log-add')
const modalAddUserLog = document.querySelector('.js-modal-log-add')

function showModalAdd() {
    modalAddUserLog.classList.add('open')
}

for (const AddUserLog of AddUserLogs) {
    AddUserLog.addEventListener('click', showModalAdd)
}

function hideModalAdd() {
    modalAddUserLog.classList.remove('open')
}
modalcloseAddUserLog.addEventListener('click', hideModalAdd)

ModalContentAddUserLog.addEventListener('click', function (event) {
    event.stopPropagation() //stop nổi bọt
})