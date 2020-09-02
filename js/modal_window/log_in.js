/* файл для модального вікна авторизацї та реєстрації а також для головного екрану коли користувач не авторизований */

// Відкриваємо модальне вікно при кліку
var btnClickLogIn = document.querySelector("#btn_click_log_in");
btnClickLogIn.onclick = function () {
  var logInModal = document.querySelector("#log_in_modal");
  logInModal.style.display = "block";
  var contentHomeRek = document.querySelector("#home_content");
  contentHomeRek.style.display = "none";
};

// Закриваємо модальне вікно при кліку
var btnCloseLogIn = document.querySelector(".close #btn_close");
btnCloseLogIn.onclick = function () {
  var logInModal = document.querySelector("#log_in_modal");
  logInModal.style.display = "none";
  var contentHomeRek = document.querySelector("#home_content");
  contentHomeRek.style.display = "block";
};
/**************************************/
// функціонал для зміни форми авторизацї/реєстрації
var x = document.getElementById("login");
var y = document.getElementById("register");
var z = document.getElementById("btn");

function register() {
  x.style.left = "-400px";
  y.style.left = "50px";
  z.style.left = "110px";
}

function login() {
  x.style.left = "50px";
  y.style.left = "450px";
  z.style.left = "0px";
}
/*************************************************/
// функціонал для зміни блоку про_нас/пропозиція
var x_home = document.getElementById("about_us");
var y_home = document.getElementById("proposition");
var z_home = document.getElementById("btn_home");

function proposition() {
  x_home.style.left = "-1300px";
  y_home.style.left = "0px";
  z_home.style.left = "100px";
}

function about_us() {
  x_home.style.left = "0px";
  y_home.style.left = "1300px";
  z_home.style.left = "0px";
}
