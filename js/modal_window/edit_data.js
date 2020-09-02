/* файл для модальних вікон (відкриття та закриття) */

// Відкриваємо модальне вікно зміни персональних даних користувача при кліку
var btnEditData = document.querySelector("#btn_edit_data");
if (btnEditData != null) {
  btnEditData.onclick = function () {
    var editDataModal = document.querySelector("#edit_data");
    editDataModal.style.display = "block";
    var contentCabinet = document.querySelector("#cab_content");
    contentCabinet.style.display = "none";
  };
}

// Закриваємо модальне вікно зміни персональних даних користувача при кліку
var btnCloseEditData = document.querySelector(".close #btn_close");
if (btnCloseEditData != null) {
  btnCloseEditData.onclick = function () {
    var editDataModal = document.querySelector("#edit_data");
    editDataModal.style.display = "none";
    var contentCabinet = document.querySelector("#cab_content");
    contentCabinet.style.display = "block";
  };
}

// Відкриваємо модальне вікно добавлення нового об'єкта при кліку
var btnAddNEwObject = document.querySelector("#btn_add_new_object");
if (btnAddNEwObject != null) {
  btnAddNEwObject.onclick = function () {
    var addNewObjectModal = document.querySelector("#add_object");
    addNewObjectModal.style.display = "block";
    var contentCabinet = document.querySelector("#cab_content");
    contentCabinet.style.display = "none";
  };
}

// Закриваємо модальне вікно добавлення нового об'єкта при кліку
var btnCloseEditData = document.querySelector(".close #btn_close_add_object");
if (btnCloseEditData != null) {
  btnCloseEditData.onclick = function () {
    var editDataModal = document.querySelector("#add_object");
    editDataModal.style.display = "none";
    var contentCabinet = document.querySelector("#cab_content");
    contentCabinet.style.display = "block";
  };
}

// Відкриваємо модальне вікно зміни даних об'єкта при кліку
var btnEditDataObject = document.querySelector("#btn_edit_object");
if (btnEditDataObject != null) {
  btnEditDataObject.onclick = function () {
    console.log("test");
    var editDataModal = document.querySelector("#edit_data_object");
    console.dir(editDataModal);
    editDataModal.style.display = "block";
    var contentCabinet = document.querySelector(".content");
    contentCabinet.style.display = "none";
  };
}

// Закриваємо модальне вікно зміни даних об'єкта при кліку
var btnCloseEditData = document.querySelector(".close #btn_close_edit_object");
if (btnCloseEditData != null) {
  btnCloseEditData.onclick = function () {
    var editDataModal = document.querySelector("#edit_data_object");
    editDataModal.style.display = "none";
    var contentCabinet = document.querySelector(".content");
    contentCabinet.style.display = "block";
  };
}
