"use strict";
(self["webpackChunknoix_app"] = self["webpackChunknoix_app"] || []).push([["asset_app_plugins_validators_js"],{

/***/ "./asset/app/plugins/validators.js":
/*!*****************************************!*\
  !*** ./asset/app/plugins/validators.js ***!
  \*****************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var vee_validate__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vee-validate */ "./node_modules/vee-validate/dist/vee-validate.esm.js");
/* harmony import */ var vee_validate_dist_locale_en_json__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! vee-validate/dist/locale/en.json */ "./node_modules/vee-validate/dist/locale/en.json");
/* harmony import */ var vee_validate_dist_rules__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! vee-validate/dist/rules */ "./node_modules/vee-validate/dist/rules.js");
/** @format */





// Install rules
(0,vee_validate__WEBPACK_IMPORTED_MODULE_0__.extend)('required', vee_validate_dist_rules__WEBPACK_IMPORTED_MODULE_1__.required);
(0,vee_validate__WEBPACK_IMPORTED_MODULE_0__.extend)('min', vee_validate_dist_rules__WEBPACK_IMPORTED_MODULE_1__.min);
(0,vee_validate__WEBPACK_IMPORTED_MODULE_0__.extend)('email', vee_validate_dist_rules__WEBPACK_IMPORTED_MODULE_1__.email);
(0,vee_validate__WEBPACK_IMPORTED_MODULE_0__.extend)('confirmed', vee_validate_dist_rules__WEBPACK_IMPORTED_MODULE_1__.email);

// Install messages
(0,vee_validate__WEBPACK_IMPORTED_MODULE_0__.localize)({
  en: vee_validate_dist_locale_en_json__WEBPACK_IMPORTED_MODULE_2__
});

/***/ })

}]);
//# sourceMappingURL=asset_app_plugins_validators_js.js.map