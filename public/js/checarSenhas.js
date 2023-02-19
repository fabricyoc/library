/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**************************************!*\
  !*** ./resources/js/checarSenhas.js ***!
  \**************************************/
// INÍCIO :: Ver password
document.querySelector('#verPassword').addEventListener('mousedown', function () {
  if (document.querySelector('#password').type == 'password') {
    document.querySelector('#password').type = 'text';
  } else {
    document.querySelector('#password').type = 'password';
  }
});
document.querySelector('#verConfirmPassword').addEventListener('mousedown', function () {
  if (document.querySelector('#confirmPassword').type == 'password') {
    document.querySelector('#confirmPassword').type = 'text';
  } else {
    document.querySelector('#confirmPassword').type = 'password';
  }
});
verConfirmPassword;
// FIM :: Ver password

// INÍCIO :: Verificar se senhas iguais
var inputPassword = document.querySelector('#password');
var inputConfirmPassword = document.querySelector('#confirmPassword');
function senhasIguais() {
  if (inputPassword.value != inputConfirmPassword.value) {
    inputPassword.classList.add("border-red-500");
    inputConfirmPassword.classList.add("border-red-500");
    document.querySelector('#senhasDiferentes').innerHTML = "Senhas diferentes";
  } else {
    inputPassword.classList.remove("border-red-500");
    inputConfirmPassword.classList.remove("border-red-500");
    document.querySelector('#senhasDiferentes').innerHTML = null;
  }
}
inputPassword.addEventListener('keyup', senhasIguais);
inputConfirmPassword.addEventListener('keyup', senhasIguais);
// FIM :: Verificar se senhas iguais
/******/ })()
;