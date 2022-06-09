const AddEvents = document.querySelectorAll(".js-add-event"); //select the class used to use js
const modalcloseAdd = document.querySelector(".js-modal-close-add-event");
const ModalContentAddEvent = document.querySelector(".js-modal-content-add");
const modalEvent = document.querySelector(".js-modal-add");

function showModalAdd() {
  modalEvent.classList.add("open");
}

for (const AddEvent of AddEvents) {
  AddEvent.addEventListener("click", showModalAdd);
}

function hideModalAdd() {
  modalEvent.classList.remove("open");
}
modalcloseAdd.addEventListener("click", hideModalAdd);

ModalContentAddEvent.addEventListener("click", function (event) {
  event.stopPropagation(); //stop nổi bọt
});