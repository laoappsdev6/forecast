(function () {
  function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

  function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

  function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

  (self["webpackChunk_coreui_coreui_free_angular_admin_template"] = self["webpackChunk_coreui_coreui_free_angular_admin_template"] || []).push([["src_app_views_dashboard_dashboard_module_ts"], {
    /***/
    37911:
    /*!******************************************************************************!*\
      !*** ./node_modules/ngx-bootstrap/buttons/fesm2015/ngx-bootstrap-buttons.js ***!
      \******************************************************************************/

    /***/
    function _(__unused_webpack_module, __webpack_exports__, __webpack_require__) {
      "use strict";

      __webpack_require__.r(__webpack_exports__);
      /* harmony export */


      __webpack_require__.d(__webpack_exports__, {
        /* harmony export */
        "ButtonCheckboxDirective": function ButtonCheckboxDirective() {
          return (
            /* binding */
            _ButtonCheckboxDirective
          );
        },

        /* harmony export */
        "ButtonRadioDirective": function ButtonRadioDirective() {
          return (
            /* binding */
            _ButtonRadioDirective
          );
        },

        /* harmony export */
        "ButtonRadioGroupDirective": function ButtonRadioGroupDirective() {
          return (
            /* binding */
            _ButtonRadioGroupDirective
          );
        },

        /* harmony export */
        "ButtonsModule": function ButtonsModule() {
          return (
            /* binding */
            _ButtonsModule
          );
        },

        /* harmony export */
        "ɵa": function ɵa() {
          return (
            /* binding */
            CHECKBOX_CONTROL_VALUE_ACCESSOR
          );
        },

        /* harmony export */
        "ɵb": function ɵb() {
          return (
            /* binding */
            RADIO_CONTROL_VALUE_ACCESSOR$1
          );
        },

        /* harmony export */
        "ɵc": function ɵc() {
          return (
            /* binding */
            RADIO_CONTROL_VALUE_ACCESSOR
          );
        }
        /* harmony export */

      });
      /* harmony import */


      var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(
      /*! @angular/core */
      74788);
      /* harmony import */


      var _angular_forms__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(
      /*! @angular/forms */
      24751);
      /**
       * @fileoverview added by tsickle
       * @suppress {checkTypes,extraRequire,missingOverride,missingReturn,unusedPrivateMembers,uselessCode} checked by tsc
       */
      // TODO: config: activeClass - Class to apply to the checked buttons

      /** @type {?} */


      var CHECKBOX_CONTROL_VALUE_ACCESSOR = {
        provide: _angular_forms__WEBPACK_IMPORTED_MODULE_0__.NG_VALUE_ACCESSOR,

        /* tslint:disable-next-line: no-use-before-declare */
        useExisting: (0, _angular_core__WEBPACK_IMPORTED_MODULE_1__.forwardRef)(
        /**
        * @return {?}
        */
        function () {
          return _ButtonCheckboxDirective;
        }),
        multi: true
      };
      /**
       * Add checkbox functionality to any element
       */

      var _ButtonCheckboxDirective = /*#__PURE__*/function () {
        function _ButtonCheckboxDirective() {
          _classCallCheck(this, _ButtonCheckboxDirective);

          /**
           * Truthy value, will be set to ngModel
           */
          this.btnCheckboxTrue = true;
          /**
           * Falsy value, will be set to ngModel
           */

          this.btnCheckboxFalse = false;
          this.state = false;
          this.onChange = Function.prototype;
          this.onTouched = Function.prototype;
        } // view -> model

        /**
         * @return {?}
         */


        _createClass(_ButtonCheckboxDirective, [{
          key: "onClick",
          value: function onClick() {
            if (this.isDisabled) {
              return;
            }

            this.toggle(!this.state);
            this.onChange(this.value);
          }
          /**
           * @return {?}
           */

        }, {
          key: "ngOnInit",
          value: function ngOnInit() {
            this.toggle(this.trueValue === this.value);
          }
          /**
           * @protected
           * @return {?}
           */

        }, {
          key: "trueValue",
          get: function get() {
            return typeof this.btnCheckboxTrue !== 'undefined' ? this.btnCheckboxTrue : true;
          }
          /**
           * @protected
           * @return {?}
           */

        }, {
          key: "falseValue",
          get: function get() {
            return typeof this.btnCheckboxFalse !== 'undefined' ? this.btnCheckboxFalse : false;
          }
          /**
           * @param {?} state
           * @return {?}
           */

        }, {
          key: "toggle",
          value: function toggle(state) {
            this.state = state;
            this.value = this.state ? this.trueValue : this.falseValue;
          } // ControlValueAccessor
          // model -> view

          /**
           * @param {?} value
           * @return {?}
           */

        }, {
          key: "writeValue",
          value: function writeValue(value) {
            this.state = this.trueValue === value;
            this.value = value ? this.trueValue : this.falseValue;
          }
          /**
           * @param {?} isDisabled
           * @return {?}
           */

        }, {
          key: "setDisabledState",
          value: function setDisabledState(isDisabled) {
            this.isDisabled = isDisabled;
          }
          /**
           * @param {?} fn
           * @return {?}
           */

        }, {
          key: "registerOnChange",
          value: function registerOnChange(fn) {
            this.onChange = fn;
          }
          /**
           * @param {?} fn
           * @return {?}
           */

        }, {
          key: "registerOnTouched",
          value: function registerOnTouched(fn) {
            this.onTouched = fn;
          }
        }]);

        return _ButtonCheckboxDirective;
      }();

      _ButtonCheckboxDirective.ɵfac = function ButtonCheckboxDirective_Factory(t) {
        return new (t || _ButtonCheckboxDirective)();
      };

      _ButtonCheckboxDirective.ɵdir = /*@__PURE__*/_angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵdefineDirective"]({
        type: _ButtonCheckboxDirective,
        selectors: [["", "btnCheckbox", ""]],
        hostVars: 3,
        hostBindings: function ButtonCheckboxDirective_HostBindings(rf, ctx) {
          if (rf & 1) {
            _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵlistener"]("click", function ButtonCheckboxDirective_click_HostBindingHandler() {
              return ctx.onClick();
            });
          }

          if (rf & 2) {
            _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵattribute"]("aria-pressed", ctx.state);

            _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵclassProp"]("active", ctx.state);
          }
        },
        inputs: {
          btnCheckboxTrue: "btnCheckboxTrue",
          btnCheckboxFalse: "btnCheckboxFalse"
        },
        features: [_angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵProvidersFeature"]([CHECKBOX_CONTROL_VALUE_ACCESSOR])]
      });
      _ButtonCheckboxDirective.propDecorators = {
        btnCheckboxTrue: [{
          type: _angular_core__WEBPACK_IMPORTED_MODULE_1__.Input
        }],
        btnCheckboxFalse: [{
          type: _angular_core__WEBPACK_IMPORTED_MODULE_1__.Input
        }],
        state: [{
          type: _angular_core__WEBPACK_IMPORTED_MODULE_1__.HostBinding,
          args: ['class.active']
        }, {
          type: _angular_core__WEBPACK_IMPORTED_MODULE_1__.HostBinding,
          args: ['attr.aria-pressed']
        }],
        onClick: [{
          type: _angular_core__WEBPACK_IMPORTED_MODULE_1__.HostListener,
          args: ['click']
        }]
      };

      (function () {
        (typeof ngDevMode === "undefined" || ngDevMode) && _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵsetClassMetadata"](_ButtonCheckboxDirective, [{
          type: _angular_core__WEBPACK_IMPORTED_MODULE_1__.Directive,
          args: [{
            selector: '[btnCheckbox]',
            providers: [CHECKBOX_CONTROL_VALUE_ACCESSOR]
          }]
        }], function () {
          return [];
        }, {
          btnCheckboxTrue: [{
            type: _angular_core__WEBPACK_IMPORTED_MODULE_1__.Input
          }],
          btnCheckboxFalse: [{
            type: _angular_core__WEBPACK_IMPORTED_MODULE_1__.Input
          }],
          state: [{
            type: _angular_core__WEBPACK_IMPORTED_MODULE_1__.HostBinding,
            args: ['class.active']
          }, {
            type: _angular_core__WEBPACK_IMPORTED_MODULE_1__.HostBinding,
            args: ['attr.aria-pressed']
          }],
          // view -> model

          /**
           * @return {?}
           */
          onClick: [{
            type: _angular_core__WEBPACK_IMPORTED_MODULE_1__.HostListener,
            args: ['click']
          }]
        });
      })();

      if (false) {}
      /**
       * @fileoverview added by tsickle
       * @suppress {checkTypes,extraRequire,missingOverride,missingReturn,unusedPrivateMembers,uselessCode} checked by tsc
       */

      /** @type {?} */


      var RADIO_CONTROL_VALUE_ACCESSOR = {
        provide: _angular_forms__WEBPACK_IMPORTED_MODULE_0__.NG_VALUE_ACCESSOR,

        /* tslint:disable-next-line: no-use-before-declare */
        useExisting: (0, _angular_core__WEBPACK_IMPORTED_MODULE_1__.forwardRef)(
        /**
        * @return {?}
        */
        function () {
          return _ButtonRadioDirective;
        }),
        multi: true
      };
      /**
       * Create radio buttons or groups of buttons.
       * A value of a selected button is bound to a variable specified via ngModel.
       */

      var _ButtonRadioDirective = /*#__PURE__*/function () {
        /**
         * @param {?} el
         * @param {?} cdr
         * @param {?} renderer
         * @param {?} group
         */
        function _ButtonRadioDirective(el, cdr, renderer, group) {
          _classCallCheck(this, _ButtonRadioDirective);

          this.el = el;
          this.cdr = cdr;
          this.renderer = renderer;
          this.group = group;
          this.onChange = Function.prototype;
          this.onTouched = Function.prototype;
          this.role = 'radio';
          this._hasFocus = false;
        }
        /**
         * Current value of radio component or group
         * @return {?}
         */


        _createClass(_ButtonRadioDirective, [{
          key: "value",
          get: function get() {
            return this.group ? this.group.value : this._value;
          }
          /**
           * @param {?} value
           * @return {?}
           */
          ,
          set: function set(value) {
            if (this.group) {
              this.group.value = value;
              return;
            }

            this._value = value;
          }
          /**
           * If `true` — radio button is disabled
           * @return {?}
           */

        }, {
          key: "disabled",
          get: function get() {
            return this._disabled;
          }
          /**
           * @param {?} disabled
           * @return {?}
           */
          ,
          set: function set(disabled) {
            this.setDisabledState(disabled);
          }
          /**
           * @return {?}
           */

        }, {
          key: "controlOrGroupDisabled",
          get: function get() {
            return this.disabled || this.group && this.group.disabled ? true : undefined;
          }
          /**
           * @return {?}
           */

        }, {
          key: "hasDisabledClass",
          get: function get() {
            // Although the radio is disabled the active radio should still stand out.
            // The disabled class will prevent this so don't add it on the active radio
            return this.controlOrGroupDisabled && !this.isActive;
          }
          /**
           * @return {?}
           */

        }, {
          key: "isActive",
          get: function get() {
            return this.btnRadio === this.value;
          }
          /**
           * @return {?}
           */

        }, {
          key: "tabindex",
          get: function get() {
            if (this.controlOrGroupDisabled) {
              // Disabled radio buttons should not receive focus
              return undefined;
            } else if (this.isActive || this.group == null) {
              return 0;
            } else {
              return -1;
            }
          }
          /**
           * @return {?}
           */

        }, {
          key: "hasFocus",
          get: function get() {
            return this._hasFocus;
          }
          /**
           * @return {?}
           */

        }, {
          key: "toggleIfAllowed",
          value: function toggleIfAllowed() {
            if (!this.canToggle()) {
              return;
            }

            this.value = this.uncheckable && this.btnRadio === this.value ? undefined : this.btnRadio;

            this._onChange(this.value);
          }
          /**
           * @param {?} event
           * @return {?}
           */

        }, {
          key: "onSpacePressed",
          value: function onSpacePressed(event) {
            this.toggleIfAllowed();
            event.preventDefault();
          }
          /**
           * @return {?}
           */

        }, {
          key: "focus",
          value: function focus() {
            this.el.nativeElement.focus();
          }
          /**
           * @return {?}
           */

        }, {
          key: "onFocus",
          value: function onFocus() {
            this._hasFocus = true;
          }
          /**
           * @return {?}
           */

        }, {
          key: "onBlur",
          value: function onBlur() {
            this._hasFocus = false;
            this.onTouched();
          }
          /**
           * @return {?}
           */

        }, {
          key: "canToggle",
          value: function canToggle() {
            return !this.controlOrGroupDisabled && (this.uncheckable || this.btnRadio !== this.value);
          }
          /**
           * @return {?}
           */

        }, {
          key: "ngOnInit",
          value: function ngOnInit() {
            this.uncheckable = typeof this.uncheckable !== 'undefined';
          }
          /**
           * @param {?} value
           * @return {?}
           */

        }, {
          key: "_onChange",
          value: function _onChange(value) {
            if (this.group) {
              this.group.value = value;
              return;
            }

            this.onTouched();
            this.onChange(value);
          } // ControlValueAccessor
          // model -> view

          /**
           * @param {?} value
           * @return {?}
           */

        }, {
          key: "writeValue",
          value: function writeValue(value) {
            this.value = value;
            this.cdr.markForCheck();
          }
          /**
           * @param {?} fn
           * @return {?}
           */

        }, {
          key: "registerOnChange",
          value: function registerOnChange(fn) {
            this.onChange = fn;
          }
          /**
           * @param {?} fn
           * @return {?}
           */

        }, {
          key: "registerOnTouched",
          value: function registerOnTouched(fn) {
            this.onTouched = fn;
          }
          /**
           * @param {?} disabled
           * @return {?}
           */

        }, {
          key: "setDisabledState",
          value: function setDisabledState(disabled) {
            this._disabled = disabled;

            if (disabled) {
              this.renderer.setAttribute(this.el.nativeElement, 'disabled', 'disabled');
              return;
            }

            this.renderer.removeAttribute(this.el.nativeElement, 'disabled');
          }
        }]);

        return _ButtonRadioDirective;
      }();

      _ButtonRadioDirective.ɵfac = function ButtonRadioDirective_Factory(t) {
        return new (t || _ButtonRadioDirective)(_angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵdirectiveInject"](_angular_core__WEBPACK_IMPORTED_MODULE_1__.ElementRef), _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵdirectiveInject"](_angular_core__WEBPACK_IMPORTED_MODULE_1__.ChangeDetectorRef), _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵdirectiveInject"](_angular_core__WEBPACK_IMPORTED_MODULE_1__.Renderer2), _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵdirectiveInject"]((0, _angular_core__WEBPACK_IMPORTED_MODULE_1__.forwardRef)(
        /**
        * @return {?}
        */
        function () {
          return _ButtonRadioGroupDirective;
        }), 8));
      };

      _ButtonRadioDirective.ɵdir = /*@__PURE__*/_angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵdefineDirective"]({
        type: _ButtonRadioDirective,
        selectors: [["", "btnRadio", ""]],
        hostVars: 8,
        hostBindings: function ButtonRadioDirective_HostBindings(rf, ctx) {
          if (rf & 1) {
            _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵlistener"]("click", function ButtonRadioDirective_click_HostBindingHandler() {
              return ctx.toggleIfAllowed();
            })("keydown.space", function ButtonRadioDirective_keydown_space_HostBindingHandler($event) {
              return ctx.onSpacePressed($event);
            })("focus", function ButtonRadioDirective_focus_HostBindingHandler() {
              return ctx.onFocus();
            })("blur", function ButtonRadioDirective_blur_HostBindingHandler() {
              return ctx.onBlur();
            });
          }

          if (rf & 2) {
            _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵattribute"]("role", ctx.role)("aria-disabled", ctx.controlOrGroupDisabled)("aria-checked", ctx.isActive)("tabindex", ctx.tabindex);

            _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵclassProp"]("disabled", ctx.hasDisabledClass)("active", ctx.isActive);
          }
        },
        inputs: {
          value: "value",
          disabled: "disabled",
          uncheckable: "uncheckable",
          btnRadio: "btnRadio"
        },
        features: [_angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵProvidersFeature"]([RADIO_CONTROL_VALUE_ACCESSOR])]
      });
      /** @nocollapse */

      _ButtonRadioDirective.ctorParameters = function () {
        return [{
          type: _angular_core__WEBPACK_IMPORTED_MODULE_1__.ElementRef
        }, {
          type: _angular_core__WEBPACK_IMPORTED_MODULE_1__.ChangeDetectorRef
        }, {
          type: _angular_core__WEBPACK_IMPORTED_MODULE_1__.Renderer2
        }, {
          type: _ButtonRadioGroupDirective,
          decorators: [{
            type: _angular_core__WEBPACK_IMPORTED_MODULE_1__.Optional
          }, {
            type: _angular_core__WEBPACK_IMPORTED_MODULE_1__.Inject,
            args: [(0, _angular_core__WEBPACK_IMPORTED_MODULE_1__.forwardRef)(
            /**
            * @return {?}
            */
            function () {
              return _ButtonRadioGroupDirective;
            })]
          }]
        }];
      };

      _ButtonRadioDirective.propDecorators = {
        btnRadio: [{
          type: _angular_core__WEBPACK_IMPORTED_MODULE_1__.Input
        }],
        uncheckable: [{
          type: _angular_core__WEBPACK_IMPORTED_MODULE_1__.Input
        }],
        value: [{
          type: _angular_core__WEBPACK_IMPORTED_MODULE_1__.Input
        }],
        disabled: [{
          type: _angular_core__WEBPACK_IMPORTED_MODULE_1__.Input
        }],
        controlOrGroupDisabled: [{
          type: _angular_core__WEBPACK_IMPORTED_MODULE_1__.HostBinding,
          args: ['attr.aria-disabled']
        }],
        hasDisabledClass: [{
          type: _angular_core__WEBPACK_IMPORTED_MODULE_1__.HostBinding,
          args: ['class.disabled']
        }],
        isActive: [{
          type: _angular_core__WEBPACK_IMPORTED_MODULE_1__.HostBinding,
          args: ['class.active']
        }, {
          type: _angular_core__WEBPACK_IMPORTED_MODULE_1__.HostBinding,
          args: ['attr.aria-checked']
        }],
        role: [{
          type: _angular_core__WEBPACK_IMPORTED_MODULE_1__.HostBinding,
          args: ['attr.role']
        }],
        tabindex: [{
          type: _angular_core__WEBPACK_IMPORTED_MODULE_1__.HostBinding,
          args: ['attr.tabindex']
        }],
        toggleIfAllowed: [{
          type: _angular_core__WEBPACK_IMPORTED_MODULE_1__.HostListener,
          args: ['click']
        }],
        onSpacePressed: [{
          type: _angular_core__WEBPACK_IMPORTED_MODULE_1__.HostListener,
          args: ['keydown.space', ['$event']]
        }],
        onFocus: [{
          type: _angular_core__WEBPACK_IMPORTED_MODULE_1__.HostListener,
          args: ['focus']
        }],
        onBlur: [{
          type: _angular_core__WEBPACK_IMPORTED_MODULE_1__.HostListener,
          args: ['blur']
        }]
      };

      (function () {
        (typeof ngDevMode === "undefined" || ngDevMode) && _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵsetClassMetadata"](_ButtonRadioDirective, [{
          type: _angular_core__WEBPACK_IMPORTED_MODULE_1__.Directive,
          args: [{
            selector: '[btnRadio]',
            providers: [RADIO_CONTROL_VALUE_ACCESSOR]
          }]
        }], function () {
          return [{
            type: _angular_core__WEBPACK_IMPORTED_MODULE_1__.ElementRef
          }, {
            type: _angular_core__WEBPACK_IMPORTED_MODULE_1__.ChangeDetectorRef
          }, {
            type: _angular_core__WEBPACK_IMPORTED_MODULE_1__.Renderer2
          }, {
            type: _ButtonRadioGroupDirective,
            decorators: [{
              type: _angular_core__WEBPACK_IMPORTED_MODULE_1__.Optional
            }, {
              type: _angular_core__WEBPACK_IMPORTED_MODULE_1__.Inject,
              args: [(0, _angular_core__WEBPACK_IMPORTED_MODULE_1__.forwardRef)(
              /**
              * @return {?}
              */
              function () {
                return _ButtonRadioGroupDirective;
              })]
            }]
          }];
        }, {
          role: [{
            type: _angular_core__WEBPACK_IMPORTED_MODULE_1__.HostBinding,
            args: ['attr.role']
          }],
          value: [{
            type: _angular_core__WEBPACK_IMPORTED_MODULE_1__.Input
          }],
          disabled: [{
            type: _angular_core__WEBPACK_IMPORTED_MODULE_1__.Input
          }],
          controlOrGroupDisabled: [{
            type: _angular_core__WEBPACK_IMPORTED_MODULE_1__.HostBinding,
            args: ['attr.aria-disabled']
          }],
          hasDisabledClass: [{
            type: _angular_core__WEBPACK_IMPORTED_MODULE_1__.HostBinding,
            args: ['class.disabled']
          }],
          isActive: [{
            type: _angular_core__WEBPACK_IMPORTED_MODULE_1__.HostBinding,
            args: ['class.active']
          }, {
            type: _angular_core__WEBPACK_IMPORTED_MODULE_1__.HostBinding,
            args: ['attr.aria-checked']
          }],
          tabindex: [{
            type: _angular_core__WEBPACK_IMPORTED_MODULE_1__.HostBinding,
            args: ['attr.tabindex']
          }],

          /**
           * @return {?}
           */
          toggleIfAllowed: [{
            type: _angular_core__WEBPACK_IMPORTED_MODULE_1__.HostListener,
            args: ['click']
          }],

          /**
           * @param {?} event
           * @return {?}
           */
          onSpacePressed: [{
            type: _angular_core__WEBPACK_IMPORTED_MODULE_1__.HostListener,
            args: ['keydown.space', ['$event']]
          }],

          /**
           * @return {?}
           */
          onFocus: [{
            type: _angular_core__WEBPACK_IMPORTED_MODULE_1__.HostListener,
            args: ['focus']
          }],

          /**
           * @return {?}
           */
          onBlur: [{
            type: _angular_core__WEBPACK_IMPORTED_MODULE_1__.HostListener,
            args: ['blur']
          }],
          uncheckable: [{
            type: _angular_core__WEBPACK_IMPORTED_MODULE_1__.Input
          }],
          btnRadio: [{
            type: _angular_core__WEBPACK_IMPORTED_MODULE_1__.Input
          }]
        });
      })();

      if (false) {}
      /**
       * @fileoverview added by tsickle
       * @suppress {checkTypes,extraRequire,missingOverride,missingReturn,unusedPrivateMembers,uselessCode} checked by tsc
       */

      /** @type {?} */


      var RADIO_CONTROL_VALUE_ACCESSOR$1 = {
        provide: _angular_forms__WEBPACK_IMPORTED_MODULE_0__.NG_VALUE_ACCESSOR,

        /* tslint:disable-next-line: no-use-before-declare */
        useExisting: (0, _angular_core__WEBPACK_IMPORTED_MODULE_1__.forwardRef)(
        /**
        * @return {?}
        */
        function () {
          return _ButtonRadioGroupDirective;
        }),
        multi: true
      };
      /**
       * A group of radio buttons.
       * A value of a selected button is bound to a variable specified via ngModel.
       */

      var _ButtonRadioGroupDirective = /*#__PURE__*/function () {
        /**
         * @param {?} cdr
         */
        function _ButtonRadioGroupDirective(cdr) {
          _classCallCheck(this, _ButtonRadioGroupDirective);

          this.cdr = cdr;
          this.onChange = Function.prototype;
          this.onTouched = Function.prototype;
          this.role = 'radiogroup';
        }
        /**
         * @return {?}
         */


        _createClass(_ButtonRadioGroupDirective, [{
          key: "value",
          get: function get() {
            return this._value;
          }
          /**
           * @param {?} value
           * @return {?}
           */
          ,
          set: function set(value) {
            this._value = value;
            this.onChange(value);
          }
          /**
           * @return {?}
           */

        }, {
          key: "tabindex",
          get: function get() {
            if (this._disabled) {
              return null;
            } else {
              return 0;
            }
          }
          /**
           * @param {?} value
           * @return {?}
           */

        }, {
          key: "writeValue",
          value: function writeValue(value) {
            this._value = value;
            this.cdr.markForCheck();
          }
          /**
           * @param {?} fn
           * @return {?}
           */

        }, {
          key: "registerOnChange",
          value: function registerOnChange(fn) {
            this.onChange = fn;
          }
          /**
           * @param {?} fn
           * @return {?}
           */

        }, {
          key: "registerOnTouched",
          value: function registerOnTouched(fn) {
            this.onTouched = fn;
          }
          /**
           * @param {?} disabled
           * @return {?}
           */

        }, {
          key: "setDisabledState",
          value: function setDisabledState(disabled) {
            if (this.radioButtons) {
              this._disabled = disabled;
              this.radioButtons.forEach(
              /**
              * @param {?} buttons
              * @return {?}
              */
              function (buttons) {
                buttons.setDisabledState(disabled);
              });
              this.cdr.markForCheck();
            }
          }
          /**
           * @return {?}
           */

        }, {
          key: "onFocus",
          value: function onFocus() {
            if (this._disabled) {
              return;
            }
            /** @type {?} */


            var activeRadio = this.getActiveOrFocusedRadio();

            if (activeRadio) {
              activeRadio.focus();
            } else {
              /** @type {?} */
              var firstEnabled = this.radioButtons.find(
              /**
              * @param {?} r
              * @return {?}
              */
              function (r) {
                return !r.disabled;
              });

              if (firstEnabled) {
                firstEnabled.focus();
              }
            }
          }
          /**
           * @return {?}
           */

        }, {
          key: "onBlur",
          value: function onBlur() {
            if (this.onTouched) {
              this.onTouched();
            }
          }
          /**
           * @param {?} event
           * @return {?}
           */

        }, {
          key: "selectNext",
          value: function selectNext(event) {
            this.selectInDirection('next');
            event.preventDefault();
          }
          /**
           * @param {?} event
           * @return {?}
           */

        }, {
          key: "selectPrevious",
          value: function selectPrevious(event) {
            this.selectInDirection('previous');
            event.preventDefault();
          }
          /**
           * @return {?}
           */

        }, {
          key: "disabled",
          get: function get() {
            return this._disabled;
          }
          /**
           * @private
           * @param {?} direction
           * @return {?}
           */

        }, {
          key: "selectInDirection",
          value: function selectInDirection(direction) {
            if (this._disabled) {
              return;
            }
            /**
             * @param {?} currentIndex
             * @param {?} buttonRadioDirectives
             * @return {?}
             */


            function nextIndex(currentIndex, buttonRadioDirectives) {
              /** @type {?} */
              var step = direction === 'next' ? 1 : -1;
              /** @type {?} */

              var calcIndex = (currentIndex + step) % buttonRadioDirectives.length;

              if (calcIndex < 0) {
                calcIndex = buttonRadioDirectives.length - 1;
              }

              return calcIndex;
            }
            /** @type {?} */


            var activeRadio = this.getActiveOrFocusedRadio();

            if (activeRadio) {
              /** @type {?} */
              var buttonRadioDirectives = this.radioButtons.toArray();
              /** @type {?} */

              var currentActiveIndex = buttonRadioDirectives.indexOf(activeRadio);

              for (var i = nextIndex(currentActiveIndex, buttonRadioDirectives); i !== currentActiveIndex; i = nextIndex(i, buttonRadioDirectives)) {
                if (buttonRadioDirectives[i].canToggle()) {
                  buttonRadioDirectives[i].toggleIfAllowed();
                  buttonRadioDirectives[i].focus();
                  break;
                }
              }
            }
          }
          /**
           * @private
           * @return {?}
           */

        }, {
          key: "getActiveOrFocusedRadio",
          value: function getActiveOrFocusedRadio() {
            return this.radioButtons.find(
            /**
            * @param {?} button
            * @return {?}
            */
            function (button) {
              return button.isActive;
            }) || this.radioButtons.find(
            /**
            * @param {?} button
            * @return {?}
            */
            function (button) {
              return button.hasFocus;
            });
          }
        }]);

        return _ButtonRadioGroupDirective;
      }();

      _ButtonRadioGroupDirective.ɵfac = function ButtonRadioGroupDirective_Factory(t) {
        return new (t || _ButtonRadioGroupDirective)(_angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵdirectiveInject"](_angular_core__WEBPACK_IMPORTED_MODULE_1__.ChangeDetectorRef));
      };

      _ButtonRadioGroupDirective.ɵdir = /*@__PURE__*/_angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵdefineDirective"]({
        type: _ButtonRadioGroupDirective,
        selectors: [["", "btnRadioGroup", ""]],
        contentQueries: function ButtonRadioGroupDirective_ContentQueries(rf, ctx, dirIndex) {
          if (rf & 1) {
            _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵcontentQuery"](dirIndex, _ButtonRadioDirective, 4);
          }

          if (rf & 2) {
            var _t;

            _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵqueryRefresh"](_t = _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵloadQuery"]()) && (ctx.radioButtons = _t);
          }
        },
        hostVars: 2,
        hostBindings: function ButtonRadioGroupDirective_HostBindings(rf, ctx) {
          if (rf & 1) {
            _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵlistener"]("focus", function ButtonRadioGroupDirective_focus_HostBindingHandler() {
              return ctx.onFocus();
            })("blur", function ButtonRadioGroupDirective_blur_HostBindingHandler() {
              return ctx.onBlur();
            })("keydown.ArrowRight", function ButtonRadioGroupDirective_keydown_ArrowRight_HostBindingHandler($event) {
              return ctx.selectNext($event);
            })("keydown.ArrowDown", function ButtonRadioGroupDirective_keydown_ArrowDown_HostBindingHandler($event) {
              return ctx.selectNext($event);
            })("keydown.ArrowLeft", function ButtonRadioGroupDirective_keydown_ArrowLeft_HostBindingHandler($event) {
              return ctx.selectPrevious($event);
            })("keydown.ArrowUp", function ButtonRadioGroupDirective_keydown_ArrowUp_HostBindingHandler($event) {
              return ctx.selectPrevious($event);
            });
          }

          if (rf & 2) {
            _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵattribute"]("role", ctx.role)("tabindex", ctx.tabindex);
          }
        },
        features: [_angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵProvidersFeature"]([RADIO_CONTROL_VALUE_ACCESSOR$1])]
      });
      /** @nocollapse */

      _ButtonRadioGroupDirective.ctorParameters = function () {
        return [{
          type: _angular_core__WEBPACK_IMPORTED_MODULE_1__.ChangeDetectorRef
        }];
      };

      _ButtonRadioGroupDirective.propDecorators = {
        role: [{
          type: _angular_core__WEBPACK_IMPORTED_MODULE_1__.HostBinding,
          args: ['attr.role']
        }],
        radioButtons: [{
          type: _angular_core__WEBPACK_IMPORTED_MODULE_1__.ContentChildren,
          args: [(0, _angular_core__WEBPACK_IMPORTED_MODULE_1__.forwardRef)(
          /**
          * @return {?}
          */
          function () {
            return _ButtonRadioDirective;
          })]
        }],
        tabindex: [{
          type: _angular_core__WEBPACK_IMPORTED_MODULE_1__.HostBinding,
          args: ['attr.tabindex']
        }],
        onFocus: [{
          type: _angular_core__WEBPACK_IMPORTED_MODULE_1__.HostListener,
          args: ['focus']
        }],
        onBlur: [{
          type: _angular_core__WEBPACK_IMPORTED_MODULE_1__.HostListener,
          args: ['blur']
        }],
        selectNext: [{
          type: _angular_core__WEBPACK_IMPORTED_MODULE_1__.HostListener,
          args: ['keydown.ArrowRight', ['$event']]
        }, {
          type: _angular_core__WEBPACK_IMPORTED_MODULE_1__.HostListener,
          args: ['keydown.ArrowDown', ['$event']]
        }],
        selectPrevious: [{
          type: _angular_core__WEBPACK_IMPORTED_MODULE_1__.HostListener,
          args: ['keydown.ArrowLeft', ['$event']]
        }, {
          type: _angular_core__WEBPACK_IMPORTED_MODULE_1__.HostListener,
          args: ['keydown.ArrowUp', ['$event']]
        }]
      };

      (function () {
        (typeof ngDevMode === "undefined" || ngDevMode) && _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵsetClassMetadata"](_ButtonRadioGroupDirective, [{
          type: _angular_core__WEBPACK_IMPORTED_MODULE_1__.Directive,
          args: [{
            selector: '[btnRadioGroup]',
            providers: [RADIO_CONTROL_VALUE_ACCESSOR$1]
          }]
        }], function () {
          return [{
            type: _angular_core__WEBPACK_IMPORTED_MODULE_1__.ChangeDetectorRef
          }];
        }, {
          role: [{
            type: _angular_core__WEBPACK_IMPORTED_MODULE_1__.HostBinding,
            args: ['attr.role']
          }],
          tabindex: [{
            type: _angular_core__WEBPACK_IMPORTED_MODULE_1__.HostBinding,
            args: ['attr.tabindex']
          }],

          /**
           * @return {?}
           */
          onFocus: [{
            type: _angular_core__WEBPACK_IMPORTED_MODULE_1__.HostListener,
            args: ['focus']
          }],

          /**
           * @return {?}
           */
          onBlur: [{
            type: _angular_core__WEBPACK_IMPORTED_MODULE_1__.HostListener,
            args: ['blur']
          }],

          /**
           * @param {?} event
           * @return {?}
           */
          selectNext: [{
            type: _angular_core__WEBPACK_IMPORTED_MODULE_1__.HostListener,
            args: ['keydown.ArrowRight', ['$event']]
          }, {
            type: _angular_core__WEBPACK_IMPORTED_MODULE_1__.HostListener,
            args: ['keydown.ArrowDown', ['$event']]
          }],

          /**
           * @param {?} event
           * @return {?}
           */
          selectPrevious: [{
            type: _angular_core__WEBPACK_IMPORTED_MODULE_1__.HostListener,
            args: ['keydown.ArrowLeft', ['$event']]
          }, {
            type: _angular_core__WEBPACK_IMPORTED_MODULE_1__.HostListener,
            args: ['keydown.ArrowUp', ['$event']]
          }],
          radioButtons: [{
            type: _angular_core__WEBPACK_IMPORTED_MODULE_1__.ContentChildren,
            args: [(0, _angular_core__WEBPACK_IMPORTED_MODULE_1__.forwardRef)(
            /**
            * @return {?}
            */
            function () {
              return _ButtonRadioDirective;
            })]
          }]
        });
      })();

      if (false) {}
      /**
       * @fileoverview added by tsickle
       * @suppress {checkTypes,extraRequire,missingOverride,missingReturn,unusedPrivateMembers,uselessCode} checked by tsc
       */


      var _ButtonsModule = /*#__PURE__*/function () {
        function _ButtonsModule() {
          _classCallCheck(this, _ButtonsModule);
        }

        _createClass(_ButtonsModule, null, [{
          key: "forRoot",
          value:
          /**
           * @return {?}
           */
          function forRoot() {
            return {
              ngModule: _ButtonsModule,
              providers: []
            };
          }
        }]);

        return _ButtonsModule;
      }();

      _ButtonsModule.ɵfac = function ButtonsModule_Factory(t) {
        return new (t || _ButtonsModule)();
      };

      _ButtonsModule.ɵmod = /*@__PURE__*/_angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵdefineNgModule"]({
        type: _ButtonsModule
      });
      _ButtonsModule.ɵinj = /*@__PURE__*/_angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵdefineInjector"]({});

      (function () {
        (typeof ngDevMode === "undefined" || ngDevMode) && _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵsetClassMetadata"](_ButtonsModule, [{
          type: _angular_core__WEBPACK_IMPORTED_MODULE_1__.NgModule,
          args: [{
            declarations: [_ButtonCheckboxDirective, _ButtonRadioDirective, _ButtonRadioGroupDirective],
            exports: [_ButtonCheckboxDirective, _ButtonRadioDirective, _ButtonRadioGroupDirective]
          }]
        }], null, null);
      })();

      (function () {
        (typeof ngJitMode === "undefined" || ngJitMode) && _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵsetNgModuleScope"](_ButtonsModule, {
          declarations: [_ButtonCheckboxDirective, _ButtonRadioDirective, _ButtonRadioGroupDirective],
          exports: [_ButtonCheckboxDirective, _ButtonRadioDirective, _ButtonRadioGroupDirective]
        });
      })();
      /**
       * @fileoverview added by tsickle
       * @suppress {checkTypes,extraRequire,missingOverride,missingReturn,unusedPrivateMembers,uselessCode} checked by tsc
       */

      /**
       * @fileoverview added by tsickle
       * @suppress {checkTypes,extraRequire,missingOverride,missingReturn,unusedPrivateMembers,uselessCode} checked by tsc
       */
      //# sourceMappingURL=ngx-bootstrap-buttons.js.map

      /***/

    },

    /***/
    32913:
    /*!*************************************************************!*\
      !*** ./src/app/views/dashboard/dashboard-routing.module.ts ***!
      \*************************************************************/

    /***/
    function _(__unused_webpack_module, __webpack_exports__, __webpack_require__) {
      "use strict";

      __webpack_require__.r(__webpack_exports__);
      /* harmony export */


      __webpack_require__.d(__webpack_exports__, {
        /* harmony export */
        "DashboardRoutingModule": function DashboardRoutingModule() {
          return (
            /* binding */
            _DashboardRoutingModule
          );
        }
        /* harmony export */

      });
      /* harmony import */


      var _angular_router__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(
      /*! @angular/router */
      3984);
      /* harmony import */


      var _dashboard_component__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(
      /*! ./dashboard.component */
      66101);
      /* harmony import */


      var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(
      /*! @angular/core */
      74788);

      var routes = [{
        path: '',
        component: _dashboard_component__WEBPACK_IMPORTED_MODULE_0__.DashboardComponent,
        data: {
          title: 'Dashboard'
        }
      }];

      var _DashboardRoutingModule = function _DashboardRoutingModule() {
        _classCallCheck(this, _DashboardRoutingModule);
      };

      _DashboardRoutingModule.ɵfac = function DashboardRoutingModule_Factory(t) {
        return new (t || _DashboardRoutingModule)();
      };

      _DashboardRoutingModule.ɵmod = /*@__PURE__*/_angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵdefineNgModule"]({
        type: _DashboardRoutingModule
      });
      _DashboardRoutingModule.ɵinj = /*@__PURE__*/_angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵdefineInjector"]({
        imports: [[_angular_router__WEBPACK_IMPORTED_MODULE_2__.RouterModule.forChild(routes)], _angular_router__WEBPACK_IMPORTED_MODULE_2__.RouterModule]
      });

      (function () {
        (typeof ngJitMode === "undefined" || ngJitMode) && _angular_core__WEBPACK_IMPORTED_MODULE_1__["ɵɵsetNgModuleScope"](_DashboardRoutingModule, {
          imports: [_angular_router__WEBPACK_IMPORTED_MODULE_2__.RouterModule],
          exports: [_angular_router__WEBPACK_IMPORTED_MODULE_2__.RouterModule]
        });
      })();
      /***/

    },

    /***/
    66101:
    /*!********************************************************!*\
      !*** ./src/app/views/dashboard/dashboard.component.ts ***!
      \********************************************************/

    /***/
    function _(__unused_webpack_module, __webpack_exports__, __webpack_require__) {
      "use strict";

      __webpack_require__.r(__webpack_exports__);
      /* harmony export */


      __webpack_require__.d(__webpack_exports__, {
        /* harmony export */
        "DashboardComponent": function DashboardComponent() {
          return (
            /* binding */
            _DashboardComponent
          );
        }
        /* harmony export */

      });
      /* harmony import */


      var tslib__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(
      /*! tslib */
      64762);
      /* harmony import */


      var _services_station_service__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(
      /*! ../../../services/station.service */
      8248);
      /* harmony import */


      var leaflet__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(
      /*! leaflet */
      64216);
      /* harmony import */


      var leaflet__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(leaflet__WEBPACK_IMPORTED_MODULE_1__);
      /* harmony import */


      var _services_auth_service__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(
      /*! ../../../services/auth.service */
      72567);
      /* harmony import */


      var _angular_core__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(
      /*! @angular/core */
      74788);
      /* harmony import */


      var _angular_router__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(
      /*! @angular/router */
      3984);
      /* harmony import */


      var ngx_bootstrap_dropdown__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(
      /*! ngx-bootstrap/dropdown */
      12719);

      var _DashboardComponent = /*#__PURE__*/function () {
        function _DashboardComponent(router, stationservice, authService) {
          _classCallCheck(this, _DashboardComponent);

          this.router = router;
          this.stationservice = stationservice;
          this.authService = authService;
          this.adminCountAll = 0;
          this.userCountAll = 0;
        }

        _createClass(_DashboardComponent, [{
          key: "ngOnInit",
          value: function ngOnInit() {
            // generate random values for mainChart
            this.leafletMap();
            this.countUserAdmin();
            this.countUserByUser();
            this.countStationHydrology();
            this.countStationSynoptic();
          }
        }, {
          key: "ngOnDestroy",
          value: function ngOnDestroy() {// this.map.remove();
          }
        }, {
          key: "userlist",
          value: function userlist() {
            console.log('testt');
            this.router.navigate(['/usermanager']);
          }
        }, {
          key: "getstationListall",
          value: function getstationListall() {
            return (0, tslib__WEBPACK_IMPORTED_MODULE_3__.__awaiter)(this, void 0, void 0, /*#__PURE__*/regeneratorRuntime.mark(function _callee() {
              var _this = this;

              return regeneratorRuntime.wrap(function _callee$(_context) {
                while (1) {
                  switch (_context.prev = _context.next) {
                    case 0:
                      _context.next = 2;
                      return this.stationservice.getStationAll('').subscribe(function (res) {
                        _this.stationList = res.data;
                        console.log('list all station', _this.stationList);

                        for (var index = 0; index < _this.stationList.length; index++) {
                          var element = _this.stationList[index];
                          console.log('myLatssssssssss', element.lat); // console.log('myLongkkkkkkkkkkk', element.lng);

                          // console.log('myLongkkkkkkkkkkk', element.lng);
                          var part = '';

                          if (element.type == "Hydrology" || element.type == "Rain Gauge") {
                            part = 'assets/img/water2.png';
                          } else if (element.type == "CLIMATE" || element.type == "SYNOPTIC") {
                            part = 'assets/img/skydrive.png';
                          } // console.log(part, 'part', element.type);


                          // console.log(part, 'part', element.type);
                          var icons = leaflet__WEBPACK_IMPORTED_MODULE_1__.icon({
                            iconUrl: part,
                            iconSize: [24, 24],
                            iconAnchor: [6, 23],
                            popupAnchor: [0, -20]
                          }); // let html_str = `
                          // <a onclick=" window.location.href = 'http://localhost:4200/#/stationbyone?stationId=${element.id}'; "> ssss</a>
                          // `

                          // let html_str = `
                          // <a onclick=" window.location.href = 'http://localhost:4200/#/stationbyone?stationId=${element.id}'; "> ssss</a>
                          // `
                          leaflet__WEBPACK_IMPORTED_MODULE_1__.marker([element.lat, element.lng], {
                            // .bindPopup(html_str)
                            icon: icons,
                            draggable: false,
                            title: 'test'
                          }).addTo(_this.map).openTooltip().setTooltipContent('test').bindTooltip(element.name_lao, {
                            permanent: false,
                            direction: 'top'
                          });
                        }
                      });

                    case 2:
                    case "end":
                      return _context.stop();
                  }
                }
              }, _callee, this);
            }));
          }
        }, {
          key: "leafletMap",
          value: function leafletMap() {
            return (0, tslib__WEBPACK_IMPORTED_MODULE_3__.__awaiter)(this, void 0, void 0, /*#__PURE__*/regeneratorRuntime.mark(function _callee2() {
              var _this2 = this;

              return regeneratorRuntime.wrap(function _callee2$(_context2) {
                while (1) {
                  switch (_context2.prev = _context2.next) {
                    case 0:
                      // Leaflet.marker([16.55444444, 104.7555556], {
                      //   icon: customMarkerIcon, draggable: false, title: 'test'
                      // }).addTo(this.map).openTooltip().setTooltipContent('test').bindTooltip('ສະຫວັນນະເຂດ	', {
                      //   permanent: true,
                      //   direction: 'bottom'
                      // });
                      navigator.geolocation.getCurrentPosition(function (resp) {
                        console.log(resp);
                        _this2.latitude = resp.coords.latitude;
                        _this2.longitude = resp.coords.longitude;
                        _this2.map = leaflet__WEBPACK_IMPORTED_MODULE_1__.map('mapId').setView([_this2.latitude, _this2.longitude], 6);
                        leaflet__WEBPACK_IMPORTED_MODULE_1__.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                          attribution: 'edupala.com ©️ Angular LeafLet'
                        }).addTo(_this2.map);
                        var customMarkerIcon = leaflet__WEBPACK_IMPORTED_MODULE_1__.icon({
                          iconUrl: 'assets/img/custom-marker-icon.png',
                          iconSize: [24, 24],
                          iconAnchor: [6, 23],
                          popupAnchor: [0, -20]
                        });
                        var that = _this2;
                        that.map.panTo(new leaflet__WEBPACK_IMPORTED_MODULE_1__.LatLng(_this2.latitude, _this2.longitude));

                        _this2.getstationListall();
                      }), function (error) {
                        console.log('Error getting location', error);
                      };

                    case 1:
                    case "end":
                      return _context2.stop();
                  }
                }
              }, _callee2);
            }));
          }
        }, {
          key: "countUserAdmin",
          value: function countUserAdmin() {
            var _this3 = this;

            var data = {
              role: 'admin'
            };
            this.authService.countUserByRole(data).subscribe(function (res) {
              console.log(res);

              if (res.status == '1') {
                _this3.adminCountAll = res.data[0]['user'];
              } else {}
            });
          }
        }, {
          key: "countUserByUser",
          value: function countUserByUser() {
            var _this4 = this;

            var data = {
              role: 'user'
            };
            console.log('pls give me data', data);
            this.authService.countUserByRole(data).subscribe(function (res) {
              console.log(res);

              if (res.status == '1') {
                _this4.userCountAll = res.data[0]['user'];
              } else {}
            });
          }
        }, {
          key: "countStationHydrology",
          value: function countStationHydrology() {
            var _this5 = this;

            var data = {
              role: 'user'
            };
            console.log('pls give me data', data);
            this.stationservice.countHydrology(data).subscribe(function (res) {
              console.log(res);

              if (res.status == '1') {
                _this5.hydrologyCount = res.data[0]['total'];
              } else {}
            });
          }
        }, {
          key: "countStationSynoptic",
          value: function countStationSynoptic() {
            var _this6 = this;

            var data = {
              role: 'user'
            };
            console.log('pls give me data', data);
            this.stationservice.countSynoptic(data).subscribe(function (res) {
              console.log(res);

              if (res.status == '1') {
                _this6.synopticCount = res.data[0]['total'];
              } else {}
            });
          }
        }]);

        return _DashboardComponent;
      }();

      _DashboardComponent.ɵfac = function DashboardComponent_Factory(t) {
        return new (t || _DashboardComponent)(_angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵdirectiveInject"](_angular_router__WEBPACK_IMPORTED_MODULE_5__.Router), _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵdirectiveInject"](_services_station_service__WEBPACK_IMPORTED_MODULE_0__.StationService), _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵdirectiveInject"](_services_auth_service__WEBPACK_IMPORTED_MODULE_2__.AuthService));
      };

      _DashboardComponent.ɵcmp = /*@__PURE__*/_angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵdefineComponent"]({
        type: _DashboardComponent,
        selectors: [["ng-component"]],
        decls: 100,
        vars: 4,
        consts: [[1, "animated", "fadeIn"], [1, "row"], [1, "col-sm-6", "col-lg-3"], [1, "card", "text-white", 2, "background-color", "#109CF1"], [1, "card-body", "pb-0"], ["type", "button", 1, "btn", "btn-transparent", "p-0", "float-right"], [1, "icon-people", 2, "font-size", "30px", 3, "click"], [1, "text-value"], [1, "chart-wrapper", "mt-3", "mx-3", 2, "height", "70px"], [1, "chartjs-size-monitor"], [1, "chartjs-size-monitor-expand"], [1, ""], [1, "chartjs-size-monitor-shrink"], ["basechart", "", "width", "322", "height", "70", "id", "_canvas-140e01d178", 1, "chart", "chartjs-render-monitor", 2, "display", "block", "width", "322px", "height", "70px"], ["id", "_canvas-140e01d178-tooltip", 1, "chartjs-tooltip", "top", 2, "opacity", "0", "left", "235.761px", "top", "110.393px"], [1, "tooltip-header"], [1, "tooltip-header-item"], [1, "tooltip-body"], [1, "tooltip-body-item"], [1, "tooltip-body-item-color", 2, "background-color", "rgb(99, 194, 222)"], [1, "tooltip-body-item-label"], [1, "tooltip-body-item-value"], [1, "card", "text-white", "bg-primary"], ["dropdown", "", 1, "btn-group", "float-right"], ["type", "button", "dropdowntoggle", "", "aria-haspopup", "true", 1, "btn", "btn-transparent", "dropdown-toggle", "p-0"], [1, "icon-people", 2, "font-size", "30px"], ["basechart", "", "width", "322", "height", "70", "id", "_canvas-1feaf17263", 1, "chart", "chartjs-render-monitor", 2, "display", "block", "width", "322px", "height", "70px"], ["id", "_canvas-1feaf17263-tooltip", 1, "chartjs-tooltip", "top", "bottom", 2, "opacity", "0", "left", "74.335px", "top", "119.467px"], [1, "card", "text-white", 2, "background-color", "#334D6E"], ["aria-hidden", "true", 1, "fa", "fa-podcast", 2, "font-size", "30px"], [1, "chart-wrapper", "mt-3", 2, "height", "70px"], ["basechart", "", "width", "354", "height", "70", "id", "_canvas-15cbc12269", 1, "chart", "chartjs-render-monitor", 2, "display", "block", "width", "354px", "height", "70px"], ["id", "_canvas-15cbc12269-tooltip", 1, "chartjs-tooltip", "top", 2, "opacity", "0", "left", "118px", "top", "102px"], [1, "tooltip-body-item-color", 2, "background-color", "rgba(255, 255, 255, 0.2)"], [1, "card", "text-white", "bg-danger"], ["basechart", "", "width", "322", "height", "70", 1, "chart", "chartjs-render-monitor", 2, "display", "block", "width", "322px", "height", "70px"], [1, "card"], [1, "card-header"], [1, "map-container"], [1, "map-frame"], ["id", "mapId"]],
        template: function DashboardComponent_Template(rf, ctx) {
          if (rf & 1) {
            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementStart"](0, "div", 0);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementStart"](1, "div", 1);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementStart"](2, "div", 2);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementStart"](3, "div", 3);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementStart"](4, "div", 4);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementStart"](5, "button", 5);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementStart"](6, "i", 6);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵlistener"]("click", function DashboardComponent_Template_i_click_6_listener() {
              return ctx.userlist();
            });

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementEnd"]();

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementEnd"]();

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementStart"](7, "div", 7);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵtext"](8);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementEnd"]();

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementStart"](9, "div");

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵtext"](10, "admin \u0E97\u0EB1\u0E87\u0EDD\u0EBB\u0E94");

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementEnd"]();

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementEnd"]();

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementStart"](11, "div", 8);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementStart"](12, "div", 9);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementStart"](13, "div", 10);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelement"](14, "div", 11);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementEnd"]();

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementStart"](15, "div", 12);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelement"](16, "div", 11);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementEnd"]();

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementEnd"]();

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelement"](17, "canvas", 13);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementStart"](18, "div", 14);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementStart"](19, "div", 15);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementStart"](20, "div", 16);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵtext"](21, "June");

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementEnd"]();

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementEnd"]();

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementStart"](22, "div", 17);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementStart"](23, "div", 18);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelement"](24, "span", 19);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementStart"](25, "span", 20);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵtext"](26, "Series A");

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementEnd"]();

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementStart"](27, "span", 21);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵtext"](28, "22");

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementEnd"]();

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementEnd"]();

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementEnd"]();

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementEnd"]();

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementEnd"]();

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementEnd"]();

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementEnd"]();

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementStart"](29, "div", 2);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementStart"](30, "div", 22);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementStart"](31, "div", 4);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementStart"](32, "div", 23);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementStart"](33, "button", 24);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelement"](34, "i", 25);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementEnd"]();

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementEnd"]();

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementStart"](35, "div", 7);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵtext"](36);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementEnd"]();

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementStart"](37, "div");

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵtext"](38, "user \u0E97\u0EB1\u0E87\u0EDD\u0EBB\u0E94");

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementEnd"]();

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementEnd"]();

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementStart"](39, "div", 8);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementStart"](40, "div", 9);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementStart"](41, "div", 10);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelement"](42, "div", 11);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementEnd"]();

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementStart"](43, "div", 12);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelement"](44, "div", 11);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementEnd"]();

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementEnd"]();

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelement"](45, "canvas", 26);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelement"](46, "div", 27);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementEnd"]();

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementEnd"]();

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementEnd"]();

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementStart"](47, "div", 2);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementStart"](48, "div", 28);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementStart"](49, "div", 4);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementStart"](50, "div", 23);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementStart"](51, "button", 24);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelement"](52, "i", 29);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementEnd"]();

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementEnd"]();

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementStart"](53, "div", 7);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵtext"](54);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementEnd"]();

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementStart"](55, "div");

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵtext"](56, "\u0EAA\u0EB0\u0E96\u0EB2\u0E99\u0EB5\u0EAD\u0EB8\u0E95\u0EB8\u0E99\u0EB4\u0E8D\u0EBB\u0EA1");

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementEnd"]();

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementEnd"]();

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementStart"](57, "div", 30);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementStart"](58, "div", 9);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementStart"](59, "div", 10);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelement"](60, "div", 11);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementEnd"]();

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementStart"](61, "div", 12);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelement"](62, "div", 11);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementEnd"]();

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementEnd"]();

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelement"](63, "canvas", 31);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementStart"](64, "div", 32);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementStart"](65, "div", 15);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementStart"](66, "div", 16);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵtext"](67, "March");

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementEnd"]();

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementEnd"]();

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementStart"](68, "div", 17);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementStart"](69, "div", 18);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelement"](70, "span", 33);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementStart"](71, "span", 20);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵtext"](72, "Series A");

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementEnd"]();

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementStart"](73, "span", 21);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵtext"](74, "80");

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementEnd"]();

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementEnd"]();

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementEnd"]();

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementEnd"]();

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementEnd"]();

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementEnd"]();

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementEnd"]();

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementStart"](75, "div", 2);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementStart"](76, "div", 34);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementStart"](77, "div", 4);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementStart"](78, "div", 23);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementStart"](79, "button", 24);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelement"](80, "i", 29);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementEnd"]();

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementEnd"]();

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementStart"](81, "div", 7);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵtext"](82);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementEnd"]();

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementStart"](83, "div");

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵtext"](84, "\u0EAA\u0EB0\u0E96\u0EB2\u0E99\u0EB5\u0EAD\u0EB8\u0E97\u0EBB\u0E81\u0E81\u0EB0\u0EAA\u0EB2\u0E94");

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementEnd"]();

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementEnd"]();

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementStart"](85, "div", 8);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementStart"](86, "div", 9);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementStart"](87, "div", 10);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelement"](88, "div", 11);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementEnd"]();

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementStart"](89, "div", 12);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelement"](90, "div", 11);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementEnd"]();

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementEnd"]();

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelement"](91, "canvas", 35);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementEnd"]();

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementEnd"]();

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementEnd"]();

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementEnd"]();

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementStart"](92, "div", 36);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementStart"](93, "div", 37);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementStart"](94, "h5");

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementStart"](95, "p");

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵtext"](96, "\u0EAA\u0EB0\u0E96\u0EB2\u0E99\u0EB5\u0E97\u0EB1\u0E87\u0EDD\u0EBB\u0E94 ");

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementEnd"]();

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementEnd"]();

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementEnd"]();

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementStart"](97, "div", 38);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementStart"](98, "div", 39);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelement"](99, "div", 40);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementEnd"]();

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementEnd"]();

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementEnd"]();

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵelementEnd"]();
          }

          if (rf & 2) {
            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵadvance"](8);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵtextInterpolate1"]("", ctx.adminCountAll, " \u0E84\u0EBB\u0E99");

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵadvance"](28);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵtextInterpolate1"]("", ctx.userCountAll, " \u0E84\u0EBB\u0E99");

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵadvance"](18);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵtextInterpolate1"]("", ctx.synopticCount, " \u0EAA\u0EB0\u0E96\u0EB2\u0E99\u0EB5");

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵadvance"](28);

            _angular_core__WEBPACK_IMPORTED_MODULE_4__["ɵɵtextInterpolate1"]("", ctx.hydrologyCount, " \u0EAA\u0EB0\u0E96\u0EB2\u0E99\u0EB5");
          }
        },
        directives: [ngx_bootstrap_dropdown__WEBPACK_IMPORTED_MODULE_6__.BsDropdownDirective],
        styles: [".map-container[_ngcontent-%COMP%] {\n  top: 0;\n  left: 0;\n  right: 0;\n  bottom: 0;\n  height: 500px;\n}\n\n.map-frame[_ngcontent-%COMP%] {\n  height: 100%;\n}\n\n#mapId[_ngcontent-%COMP%] {\n  height: 100%;\n  padding: 0;\n}\n/*# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbImRhc2hib3JkLmNvbXBvbmVudC5zY3NzIl0sIm5hbWVzIjpbXSwibWFwcGluZ3MiOiJBQUFBO0VBQ0ksTUFBQTtFQUNBLE9BQUE7RUFDQSxRQUFBO0VBQ0EsU0FBQTtFQUVBLGFBQUE7QUFBSjs7QUFHQTtFQUVJLFlBQUE7QUFESjs7QUFJQTtFQUNJLFlBQUE7RUFDQSxVQUFBO0FBREoiLCJmaWxlIjoiZGFzaGJvcmQuY29tcG9uZW50LnNjc3MiLCJzb3VyY2VzQ29udGVudCI6WyIubWFwLWNvbnRhaW5lciB7XHJcbiAgICB0b3A6IDA7XHJcbiAgICBsZWZ0OiAwO1xyXG4gICAgcmlnaHQ6IDA7XHJcbiAgICBib3R0b206IDA7XHJcbiAgICAvLyBtYXJnaW46IDMwcHg7XHJcbiAgICBoZWlnaHQ6IDUwMHB4O1xyXG59XHJcblxyXG4ubWFwLWZyYW1lIHtcclxuICAgIC8vIGJvcmRlcjogMXB4IHNvbGlkIGJsYWNrO1xyXG4gICAgaGVpZ2h0OiAxMDAlO1xyXG59XHJcblxyXG4jbWFwSWQge1xyXG4gICAgaGVpZ2h0OiAxMDAlO1xyXG4gICAgcGFkZGluZzogMDtcclxufSJdfQ== */"]
      });
      /***/
    },

    /***/
    54727:
    /*!*****************************************************!*\
      !*** ./src/app/views/dashboard/dashboard.module.ts ***!
      \*****************************************************/

    /***/
    function _(__unused_webpack_module, __webpack_exports__, __webpack_require__) {
      "use strict";

      __webpack_require__.r(__webpack_exports__);
      /* harmony export */


      __webpack_require__.d(__webpack_exports__, {
        /* harmony export */
        "DashboardModule": function DashboardModule() {
          return (
            /* binding */
            _DashboardModule
          );
        }
        /* harmony export */

      });
      /* harmony import */


      var _angular_forms__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(
      /*! @angular/forms */
      24751);
      /* harmony import */


      var ng2_charts__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(
      /*! ng2-charts */
      69877);
      /* harmony import */


      var ngx_bootstrap_dropdown__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(
      /*! ngx-bootstrap/dropdown */
      12719);
      /* harmony import */


      var ngx_bootstrap_buttons__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(
      /*! ngx-bootstrap/buttons */
      37911);
      /* harmony import */


      var _dashboard_component__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(
      /*! ./dashboard.component */
      66101);
      /* harmony import */


      var _dashboard_routing_module__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(
      /*! ./dashboard-routing.module */
      32913);
      /* harmony import */


      var _angular_core__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(
      /*! @angular/core */
      74788);

      var _DashboardModule = function _DashboardModule() {
        _classCallCheck(this, _DashboardModule);
      };

      _DashboardModule.ɵfac = function DashboardModule_Factory(t) {
        return new (t || _DashboardModule)();
      };

      _DashboardModule.ɵmod = /*@__PURE__*/_angular_core__WEBPACK_IMPORTED_MODULE_2__["ɵɵdefineNgModule"]({
        type: _DashboardModule
      });
      _DashboardModule.ɵinj = /*@__PURE__*/_angular_core__WEBPACK_IMPORTED_MODULE_2__["ɵɵdefineInjector"]({
        imports: [[_angular_forms__WEBPACK_IMPORTED_MODULE_3__.FormsModule, _dashboard_routing_module__WEBPACK_IMPORTED_MODULE_1__.DashboardRoutingModule, ng2_charts__WEBPACK_IMPORTED_MODULE_4__.ChartsModule, ngx_bootstrap_dropdown__WEBPACK_IMPORTED_MODULE_5__.BsDropdownModule, ngx_bootstrap_buttons__WEBPACK_IMPORTED_MODULE_6__.ButtonsModule.forRoot()]]
      });

      (function () {
        (typeof ngJitMode === "undefined" || ngJitMode) && _angular_core__WEBPACK_IMPORTED_MODULE_2__["ɵɵsetNgModuleScope"](_DashboardModule, {
          declarations: [_dashboard_component__WEBPACK_IMPORTED_MODULE_0__.DashboardComponent],
          imports: [_angular_forms__WEBPACK_IMPORTED_MODULE_3__.FormsModule, _dashboard_routing_module__WEBPACK_IMPORTED_MODULE_1__.DashboardRoutingModule, ng2_charts__WEBPACK_IMPORTED_MODULE_4__.ChartsModule, ngx_bootstrap_dropdown__WEBPACK_IMPORTED_MODULE_5__.BsDropdownModule, ngx_bootstrap_buttons__WEBPACK_IMPORTED_MODULE_6__.ButtonsModule]
        });
      })();
      /***/

    }
  }]);
})();
//# sourceMappingURL=src_app_views_dashboard_dashboard_module_ts-es5.js.map