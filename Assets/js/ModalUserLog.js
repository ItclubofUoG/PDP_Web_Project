// Modal Log Filter
const LogFilters = document.querySelectorAll('.js-log-filter') //sellect the class used to use js
const modalcloseLogFilter = document.querySelector('.js-modal-close-log-filter')
const ModalContentLogFilter = document.querySelector('.js-modal-content-log-filter')
const modalLogFilter = document.querySelector('.js-modal-log-filter')

function showModalAdd() {
    modalLogFilter.classList.add('open')
}

for (const LogFilter of LogFilters) {
    LogFilter.addEventListener('click', showModalAdd)
}

function hideModalAdd() {
    modalLogFilter.classList.remove('open')
}
modalcloseLogFilter.addEventListener('click', hideModalAdd)

ModalContentLogFilter.addEventListener('click', function (event) {
    event.stopPropagation() //stop nổi bọt
})



// Modal Export
const Exports = document.querySelectorAll('.js-log-export') //sellect the class used to use js
const modalcloseExport = document.querySelector('.js-modal-close-log-export')
const ModalContentExport = document.querySelector('.js-modal-content-log-export')
const modalExport = document.querySelector('.js-modal-log-export')

function showModal() {
    modalExport.classList.add('open')
}

for (const Export of Exports) {
    Export.addEventListener('click', showModal)
}

function hideModal() {
    modalExport.classList.remove('open')
}
modalcloseExport.addEventListener('click', hideModal)

ModalContentExport.addEventListener('click', function (event) {
    event.stopPropagation() //stop nổi bọt
})

