/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!******************************!*\
  !*** ./resources/js/user.js ***!
  \******************************/
// INÍCIO :: CPF COM MÁSCARA
var inputCpf = document.querySelector('#cpf');
inputCpf.addEventListener("keyup", formatarCPF);
function formatarCPF(e) {
  var v = e.target.value.replace(/\D/g, "");
  v = v.replace(/(\d{3})(\d)/, "$1.$2");
  v = v.replace(/(\d{3})(\d)/, "$1.$2");
  v = v.replace(/(\d{3})(\d{1,2})$/, "$1-$2");
  e.target.value = v;
}
// FIM :: CPF COM MÁSCARA

// INÍCIO :: Telefone COM MÁSCARA
var inputTelephone = document.querySelector('#telephone');
inputTelephone.addEventListener("keyup", formatarTelefone);
function formatarTelefone(e) {
  var v = e.target.value.replace(/\D/g, "");
  v = v.replace(/^(\d\d)(\d)/g, "($1)$2");
  v = v.replace(/(\d{5})(\d)/, "$1-$2");
  e.target.value = v;
}
// FIM :: Telefone COM MÁSCARA
/******/ })()
;