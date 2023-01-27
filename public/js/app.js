/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _main__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./main */ "./resources/js/main.js");
/* harmony import */ var _main__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_main__WEBPACK_IMPORTED_MODULE_0__);
// import './bootstrap';


/***/ }),

/***/ "./resources/js/main.js":
/*!******************************!*\
  !*** ./resources/js/main.js ***!
  \******************************/
/***/ (() => {

// INÍCIO :: Ocultar sidebar
// var sidebar = document.getElementById('sidebar');
var btnSidebar = document.querySelector('#btnSidebar');
function sidebarToggle() {
  var sidebar = document.querySelector('#sidebar');
  if (sidebar.style.display === "none") {
    sidebar.style.display = "block";
  } else {
    sidebar.style.display = "none";
  }
}
btnSidebar.addEventListener('click', sidebarToggle);
// FIM :: Ocultar sidebar

// INÍCIO :: Dropdown do perfil
// var profileDropdown = document.getElementById('ProfileDropDown');
var btnProfileDropdown = document.querySelector('#btnProfileDropdown');
function profileToggle() {
  var profileDropdown = document.querySelector('#ProfileDropDown');
  if (profileDropdown.style.display === "none") {
    profileDropdown.style.display = "block";
  } else {
    profileDropdown.style.display = "none";
  }
}
btnProfileDropdown.addEventListener('click', profileToggle);
// FIM :: Dropdown do perfil

/**
 * ### Modals ###
 */
function toggleModal(action, elem_trigger) {
  elem_trigger.addEventListener('click', function () {
    if (action == 'add') {
      var modal_id = this.dataset.modal;
      document.getElementById("".concat(modal_id)).classList.add('modal-is-open');
    } else {
      // Automaticlly get the opned modal ID
      var _modal_id = elem_trigger.closest('.modal-wrapper').getAttribute('id');
      document.getElementById("".concat(_modal_id)).classList.remove('modal-is-open');
    }
  });
}

// Check if there is modals on the page
if (document.querySelector('.modal-wrapper')) {
  // Open the modal
  document.querySelectorAll('.modal-trigger').forEach(function (btn) {
    toggleModal('add', btn);
  });

  // close the modal
  document.querySelectorAll('.close-modal').forEach(function (btn) {
    toggleModal('remove', btn);
  });
}

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

// INÍCIO :: CAMPO APENAS COM NÚMEROS
var inputNumeroResidencia = document.querySelector('#numero');
inputNumeroResidencia.addEventListener("keypress", somenteNumeros);
function somenteNumeros(e) {
  var charCode = e.which ? e.which : e.keyCode;
  if (charCode > 31 && (charCode < 48 || charCode > 57)) e.preventDefault();
}
// FIM :: CAMPO APENAS COM NÚMEROS

// INÍCIO :: Máscara para CEP
var inputCep = document.querySelector("#cep");
inputCep.addEventListener("keyup", formatarCep);
function formatarCep(e) {
  var v = e.target.value.replace(/\D/g, "");
  v = v.replace(/^(\d{5})(\d)/, "$1-$2");
  e.target.value = v;
}
// FIM :: Máscara para CEP

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

/***/ }),

/***/ "./resources/css/all.css":
/*!*******************************!*\
  !*** ./resources/css/all.css ***!
  \*******************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/css/styles.css":
/*!**********************************!*\
  !*** ./resources/css/styles.css ***!
  \**********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/css/app.css":
/*!*******************************!*\
  !*** ./resources/css/app.css ***!
  \*******************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	(() => {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = (module) => {
/******/ 			var getter = module && module.__esModule ?
/******/ 				() => (module['default']) :
/******/ 				() => (module);
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"/js/app": 0,
/******/ 			"css/app": 0,
/******/ 			"css/styles": 0,
/******/ 			"css/all": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some((id) => (installedChunks[id] !== 0))) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkId] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunk"] = self["webpackChunk"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	__webpack_require__.O(undefined, ["css/app","css/styles","css/all"], () => (__webpack_require__("./resources/js/app.js")))
/******/ 	__webpack_require__.O(undefined, ["css/app","css/styles","css/all"], () => (__webpack_require__("./resources/css/all.css")))
/******/ 	__webpack_require__.O(undefined, ["css/app","css/styles","css/all"], () => (__webpack_require__("./resources/css/styles.css")))
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["css/app","css/styles","css/all"], () => (__webpack_require__("./resources/css/app.css")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;