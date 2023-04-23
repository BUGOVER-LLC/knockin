"use strict";
(self["webpackChunknoix_app"] = self["webpackChunknoix_app"] || []).push([["asset_app_pages_application_AppIndex_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./asset/app/components/DrawerDrag.vue?vue&type=script&lang=js&":
/*!**************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./asset/app/components/DrawerDrag.vue?vue&type=script&lang=js& ***!
  \**************************************************************************************************************************************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ({
  data: function data() {
    return {
      navigation: {
        shown: true,
        width: 400,
        borderSize: 3
      }
    };
  },
  computed: {
    direction: function direction() {
      return false === this.navigation.shown ? 'Open' : 'Closed';
    }
  },
  mounted: function mounted() {
    this.setBorderWidth();
    this.setEvents();
  },
  methods: {
    setBorderWidth: function setBorderWidth() {
      var i = this.$refs.drawer.$el.querySelector('.v-navigation-drawer__border');
      i.style.width = "".concat(this.navigation.borderSize, "px");
      i.style.cursor = 'ew-resize';
    },
    setEvents: function setEvents() {
      var minSize = this.navigation.borderSize;
      var el = this.$refs.drawer.$el;
      var drawerBorder = el.querySelector('.v-navigation-drawer__border');
      var vm = this;
      var direction = el.classList.contains('v-navigation-drawer--right') ? 'right' : 'left';

      /**
       *
       * @param e
       */
      function resize(e) {
        document.body.style.cursor = 'ew-resize';
        var f = 'right' === direction ? document.body.scrollWidth - e.clientX : e.clientX;
        el.style.width = "".concat(f, "px");
      }
      drawerBorder.addEventListener('mousedown', function (e) {
        if (e.offsetX < minSize) {
          var m_pos = e.x;
          el.style.transition = 'initial';
          document.addEventListener('mousemove', resize, false);
        }
      }, false);
      document.addEventListener('mouseup', function () {
        el.style.transition = '';
        vm.navigation.width = el.style.width;
        document.body.style.cursor = '';
        document.removeEventListener('mousemove', resize, false);
      }, false);
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./asset/app/pages/application/AppIndex.vue?vue&type=script&lang=js&":
/*!*******************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./asset/app/pages/application/AppIndex.vue?vue&type=script&lang=js& ***!
  \*******************************************************************************************************************************************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _app_components_DrawerDrag_vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @/app/components/DrawerDrag.vue */ "./asset/app/components/DrawerDrag.vue");

/* harmony default export */ __webpack_exports__["default"] = ({
  components: {
    DrawerDrag: _app_components_DrawerDrag_vue__WEBPACK_IMPORTED_MODULE_0__["default"]
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/lib/loaders/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./asset/app/components/DrawerDrag.vue?vue&type=template&id=0f0c4d13&":
/*!*************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/lib/loaders/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./asset/app/components/DrawerDrag.vue?vue&type=template&id=0f0c4d13& ***!
  \*************************************************************************************************************************************************************************************************************************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": function() { return /* binding */ render; },
/* harmony export */   "staticRenderFns": function() { return /* binding */ staticRenderFns; }
/* harmony export */ });
var render = function render() {
  var _vm = this,
    _c = _vm._self._c;
  return _c("div", [_c("v-navigation-drawer", {
    ref: "drawer",
    attrs: {
      app: "",
      width: _vm.navigation.width
    },
    model: {
      value: _vm.navigation.shown,
      callback: function callback($$v) {
        _vm.$set(_vm.navigation, "shown", $$v);
      },
      expression: "navigation.shown"
    }
  }, [_c("v-toolbar", {
    attrs: {
      color: "primary"
    }
  }, [_c("v-toolbar-title", {
    staticClass: "headline text-uppercase"
  }, [_c("span", [_vm._v("t a")]), _c("span", {
    staticClass: "font-weight-light"
  }, [_vm._v(" b s ")])])], 1), _vm._v(" "), _c("v-tabs", [_vm._l(3, function (n) {
    return _c("v-tab", {
      key: n
    }, [_vm._v(" Item " + _vm._s(n) + " ")]);
  }), _vm._v(" "), _vm._l(3, function (n) {
    return _c("v-tab-item", {
      key: n
    }, [_c("v-card", {
      attrs: {
        flat: ""
      }
    }, [_c("v-card-text", [_vm._v("Content for tab " + _vm._s(n) + " would go here")])], 1)], 1);
  })], 2)], 1), _vm._v(" "), _c("v-layout", {
    attrs: {
      "justify-center": ""
    }
  }, [_c("v-btn", {
    on: {
      click: function click($event) {
        _vm.navigation.shown = !_vm.navigation.shown;
      }
    }
  }, [_vm._v("Toggle " + _vm._s(_vm.direction))])], 1)], 1);
};
var staticRenderFns = [];
render._withStripped = true;


/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/lib/loaders/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./asset/app/pages/application/AppIndex.vue?vue&type=template&id=7ecffed6&scoped=true&lang=html&":
/*!****************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/lib/loaders/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./asset/app/pages/application/AppIndex.vue?vue&type=template&id=7ecffed6&scoped=true&lang=html& ***!
  \****************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": function() { return /* binding */ render; },
/* harmony export */   "staticRenderFns": function() { return /* binding */ staticRenderFns; }
/* harmony export */ });
var render = function render() {
  var _vm = this,
    _c = _vm._self._c;
  return _c("v-app", {
    attrs: {
      id: "inspire"
    }
  }, [_c("v-system-bar", {
    attrs: {
      app: ""
    }
  }, [_c("v-spacer"), _vm._v(" "), _c("v-icon", [_vm._v("mdi-square")]), _vm._v(" "), _c("v-icon", [_vm._v("mdi-circle")]), _vm._v(" "), _c("v-icon", [_vm._v("mdi-triangle")])], 1), _vm._v(" "), _c("v-app-bar", {
    attrs: {
      app: "",
      "clipped-right": "",
      flat: "",
      height: "72"
    }
  }, [_c("v-spacer"), _vm._v(" "), _c("v-responsive", {
    attrs: {
      "max-width": "156"
    }
  }, [_c("v-text-field", {
    attrs: {
      dense: "",
      flat: "",
      "hide-details": "",
      rounded: "",
      "solo-inverted": ""
    }
  })], 1)], 1), _vm._v(" "), _c("v-navigation-drawer", {
    attrs: {
      app: "",
      width: "300"
    },
    model: {
      value: _vm.drawer,
      callback: function callback($$v) {
        _vm.drawer = $$v;
      },
      expression: "drawer"
    }
  }, [_c("v-navigation-drawer", {
    attrs: {
      absolute: "",
      color: "grey lighten-3",
      "mini-variant": ""
    },
    model: {
      value: _vm.drawer,
      callback: function callback($$v) {
        _vm.drawer = $$v;
      },
      expression: "drawer"
    }
  }, [_c("v-avatar", {
    staticClass: "d-block text-center mx-auto mt-4",
    attrs: {
      color: "grey darken-1",
      size: "36"
    }
  }), _vm._v(" "), _c("v-divider", {
    staticClass: "mx-3 my-5"
  }), _vm._v(" "), _vm._l(6, function (n) {
    return _c("v-avatar", {
      key: n,
      staticClass: "d-block text-center mx-auto mb-9",
      attrs: {
        color: "grey lighten-1",
        size: "28"
      }
    });
  })], 2), _vm._v(" "), _c("v-sheet", {
    attrs: {
      color: "grey lighten-5",
      height: "128",
      width: "100%"
    }
  }), _vm._v(" "), _c("v-list", {
    staticClass: "pl-14",
    attrs: {
      shaped: ""
    }
  }, _vm._l(5, function (n) {
    return _c("v-list-item", {
      key: n,
      attrs: {
        link: ""
      }
    }, [_c("v-list-item-content", [_c("v-list-item-title", [_vm._v("Item " + _vm._s(n))])], 1)], 1);
  }), 1)], 1), _vm._v(" "), _c("v-navigation-drawer", {
    attrs: {
      app: "",
      clipped: "",
      right: ""
    }
  }, [_c("v-list", _vm._l(5, function (n) {
    return _c("v-list-item", {
      key: n,
      attrs: {
        link: ""
      }
    }, [_c("v-list-item-content", [_c("v-list-item-title", [_vm._v("Item " + _vm._s(n))])], 1)], 1);
  }), 1)], 1), _vm._v(" "), _c("v-main"), _vm._v(" "), _c("v-footer", {
    attrs: {
      app: "",
      color: "transparent",
      height: "72",
      inset: ""
    }
  }, [_c("v-text-field", {
    attrs: {
      "background-color": "grey lighten-1",
      dense: "",
      flat: "",
      "hide-details": "",
      rounded: "",
      solo: ""
    }
  })], 1)], 1);
};
var staticRenderFns = [];
render._withStripped = true;


/***/ }),

/***/ "./asset/app/components/DrawerDrag.vue":
/*!*********************************************!*\
  !*** ./asset/app/components/DrawerDrag.vue ***!
  \*********************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _DrawerDrag_vue_vue_type_template_id_0f0c4d13___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./DrawerDrag.vue?vue&type=template&id=0f0c4d13& */ "./asset/app/components/DrawerDrag.vue?vue&type=template&id=0f0c4d13&");
/* harmony import */ var _DrawerDrag_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./DrawerDrag.vue?vue&type=script&lang=js& */ "./asset/app/components/DrawerDrag.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _DrawerDrag_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _DrawerDrag_vue_vue_type_template_id_0f0c4d13___WEBPACK_IMPORTED_MODULE_0__.render,
  _DrawerDrag_vue_vue_type_template_id_0f0c4d13___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "asset/app/components/DrawerDrag.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./asset/app/pages/application/AppIndex.vue":
/*!**************************************************!*\
  !*** ./asset/app/pages/application/AppIndex.vue ***!
  \**************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _AppIndex_vue_vue_type_template_id_7ecffed6_scoped_true_lang_html___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./AppIndex.vue?vue&type=template&id=7ecffed6&scoped=true&lang=html& */ "./asset/app/pages/application/AppIndex.vue?vue&type=template&id=7ecffed6&scoped=true&lang=html&");
/* harmony import */ var _AppIndex_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./AppIndex.vue?vue&type=script&lang=js& */ "./asset/app/pages/application/AppIndex.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _AppIndex_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _AppIndex_vue_vue_type_template_id_7ecffed6_scoped_true_lang_html___WEBPACK_IMPORTED_MODULE_0__.render,
  _AppIndex_vue_vue_type_template_id_7ecffed6_scoped_true_lang_html___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  "7ecffed6",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "asset/app/pages/application/AppIndex.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./asset/app/components/DrawerDrag.vue?vue&type=script&lang=js&":
/*!**********************************************************************!*\
  !*** ./asset/app/components/DrawerDrag.vue?vue&type=script&lang=js& ***!
  \**********************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_DrawerDrag_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./DrawerDrag.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./asset/app/components/DrawerDrag.vue?vue&type=script&lang=js&");
 /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_DrawerDrag_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./asset/app/pages/application/AppIndex.vue?vue&type=script&lang=js&":
/*!***************************************************************************!*\
  !*** ./asset/app/pages/application/AppIndex.vue?vue&type=script&lang=js& ***!
  \***************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_AppIndex_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./AppIndex.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./asset/app/pages/application/AppIndex.vue?vue&type=script&lang=js&");
 /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_AppIndex_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./asset/app/components/DrawerDrag.vue?vue&type=template&id=0f0c4d13&":
/*!****************************************************************************!*\
  !*** ./asset/app/components/DrawerDrag.vue?vue&type=template&id=0f0c4d13& ***!
  \****************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": function() { return /* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_lib_loaders_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_lib_index_js_vue_loader_options_DrawerDrag_vue_vue_type_template_id_0f0c4d13___WEBPACK_IMPORTED_MODULE_0__.render; },
/* harmony export */   "staticRenderFns": function() { return /* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_lib_loaders_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_lib_index_js_vue_loader_options_DrawerDrag_vue_vue_type_template_id_0f0c4d13___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns; }
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_lib_loaders_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_lib_index_js_vue_loader_options_DrawerDrag_vue_vue_type_template_id_0f0c4d13___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??ruleSet[1].rules[2]!../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./DrawerDrag.vue?vue&type=template&id=0f0c4d13& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/lib/loaders/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./asset/app/components/DrawerDrag.vue?vue&type=template&id=0f0c4d13&");


/***/ }),

/***/ "./asset/app/pages/application/AppIndex.vue?vue&type=template&id=7ecffed6&scoped=true&lang=html&":
/*!*******************************************************************************************************!*\
  !*** ./asset/app/pages/application/AppIndex.vue?vue&type=template&id=7ecffed6&scoped=true&lang=html& ***!
  \*******************************************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": function() { return /* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_lib_loaders_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_lib_index_js_vue_loader_options_AppIndex_vue_vue_type_template_id_7ecffed6_scoped_true_lang_html___WEBPACK_IMPORTED_MODULE_0__.render; },
/* harmony export */   "staticRenderFns": function() { return /* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_lib_loaders_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_lib_index_js_vue_loader_options_AppIndex_vue_vue_type_template_id_7ecffed6_scoped_true_lang_html___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns; }
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_lib_loaders_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_lib_index_js_vue_loader_options_AppIndex_vue_vue_type_template_id_7ecffed6_scoped_true_lang_html___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??ruleSet[1].rules[2]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./AppIndex.vue?vue&type=template&id=7ecffed6&scoped=true&lang=html& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/lib/loaders/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./asset/app/pages/application/AppIndex.vue?vue&type=template&id=7ecffed6&scoped=true&lang=html&");


/***/ }),

/***/ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js":
/*!********************************************************************!*\
  !*** ./node_modules/vue-loader/lib/runtime/componentNormalizer.js ***!
  \********************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": function() { return /* binding */ normalizeComponent; }
/* harmony export */ });
/* globals __VUE_SSR_CONTEXT__ */

// IMPORTANT: Do NOT use ES2015 features in this file (except for modules).
// This module is a runtime utility for cleaner component module output and will
// be included in the final webpack user bundle.

function normalizeComponent(
  scriptExports,
  render,
  staticRenderFns,
  functionalTemplate,
  injectStyles,
  scopeId,
  moduleIdentifier /* server only */,
  shadowMode /* vue-cli only */
) {
  // Vue.extend constructor export interop
  var options =
    typeof scriptExports === 'function' ? scriptExports.options : scriptExports

  // render functions
  if (render) {
    options.render = render
    options.staticRenderFns = staticRenderFns
    options._compiled = true
  }

  // functional template
  if (functionalTemplate) {
    options.functional = true
  }

  // scopedId
  if (scopeId) {
    options._scopeId = 'data-v-' + scopeId
  }

  var hook
  if (moduleIdentifier) {
    // server build
    hook = function (context) {
      // 2.3 injection
      context =
        context || // cached call
        (this.$vnode && this.$vnode.ssrContext) || // stateful
        (this.parent && this.parent.$vnode && this.parent.$vnode.ssrContext) // functional
      // 2.2 with runInNewContext: true
      if (!context && typeof __VUE_SSR_CONTEXT__ !== 'undefined') {
        context = __VUE_SSR_CONTEXT__
      }
      // inject component styles
      if (injectStyles) {
        injectStyles.call(this, context)
      }
      // register component module identifier for async chunk inferrence
      if (context && context._registeredComponents) {
        context._registeredComponents.add(moduleIdentifier)
      }
    }
    // used by ssr in case component is cached and beforeCreate
    // never gets called
    options._ssrRegister = hook
  } else if (injectStyles) {
    hook = shadowMode
      ? function () {
          injectStyles.call(
            this,
            (options.functional ? this.parent : this).$root.$options.shadowRoot
          )
        }
      : injectStyles
  }

  if (hook) {
    if (options.functional) {
      // for template-only hot-reload because in that case the render fn doesn't
      // go through the normalizer
      options._injectStyles = hook
      // register for functional component in vue file
      var originalRender = options.render
      options.render = function renderWithStyleInjection(h, context) {
        hook.call(context)
        return originalRender(h, context)
      }
    } else {
      // inject component registration as beforeCreate hook
      var existing = options.beforeCreate
      options.beforeCreate = existing ? [].concat(existing, hook) : [hook]
    }
  }

  return {
    exports: scriptExports,
    options: options
  }
}


/***/ })

}]);
//# sourceMappingURL=asset_app_pages_application_AppIndex_vue.js.map