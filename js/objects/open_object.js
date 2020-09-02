/* файл для функцій з обєктами */

// функція яка переадресовує нас на сторінку вибраного об'єкта при кліку на рядок в таблиці
function openObjectId(e, id) {
  console.log(window.location.href);
  window.location.href = "/" + "pages/object_id.php?id=" + id;
}
