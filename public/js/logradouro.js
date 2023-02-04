/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!************************************!*\
  !*** ./resources/js/logradouro.js ***!
  \************************************/
// INÍCIO :: Não existe logradouro sem número e vice-versa
function logradouroNumero() {
  if (document.querySelector('#logradouro').value != "" && document.querySelector('#numero').value == "") {
    document.querySelector('#numero').classList.add("border-red-500");
  } else if (document.querySelector('#logradouro').value == "" && document.querySelector('#numero').value != "") {
    document.querySelector('#logradouro').classList.add("border-red-500");
  } else {
    document.querySelector('#numero').classList.remove("border-red-500");
    document.querySelector('#logradouro').classList.remove("border-red-500");
  }
}
document.querySelector('#logradouro').addEventListener('keyup', logradouroNumero);
document.querySelector('#numero').addEventListener('keyup', logradouroNumero);
// FIM :: Não existe logradouro sem número e vice-versa
/******/ })()
;