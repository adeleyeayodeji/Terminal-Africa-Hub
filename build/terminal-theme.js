/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./src/Functions/core.js":
/*!*******************************!*\
  !*** ./src/Functions/core.js ***!
  \*******************************/
/***/ (() => {

jQuery(document).ready(function ($) {
  $(".terminal-faq-header").each(function (index, element) {
    $(this).click(function (e) {
      e.preventDefault();
      //get the parent
      let parentDiv = $(this).parent();
      //close all open terminal-faq-body
      $(".terminal-faq-body").each(function (index, element) {
        //get the prev element
        let prevElement = $(this).prev();
        //replace img src from accordion-close.svg to accordion-open.svg
        prevElement.find("img").attr("src", (i, val) => {
          return val.replace("accordion-close.svg", "accordion-open.svg");
        });

        //slide up
        $(this).slideUp();
      });
      //find .terminal-faq-body and slide down
      parentDiv.find(".terminal-faq-body").slideDown();
      //replace img src from accordion-open.svg to accordion-close.svg
      $(this).find("img").attr("src", (i, val) => {
        return val.replace("accordion-open.svg", "accordion-close.svg");
      });
    });
  });

  /**
   * terminal-form-fields
   *
   */
  $("#terminal-submit-contact").submit(function (e) {
    e.preventDefault();
    //get the form
    var form = $(this);
    //get name, email and message
    var name = form.find("input[name='name']").val();
    var email = form.find("input[name='email']").val();
    var message = form.find("textarea[name='message']").val();
    var contact_mail = form.find("input[name='contact_mail']").val();
    //ajax
    $.ajax({
      type: "POST",
      url: terminal_africa_hub.ajax_url,
      data: {
        name,
        email,
        message,
        contact_mail,
        nonce: terminal_africa_hub.nonce,
        action: "terminal_hub_contact_form"
      },
      dataType: "json",
      beforeSend: function () {
        //block the form
        form.block({
          message: null,
          overlayCSS: {
            background: "#fff",
            opacity: 0.6
          }
        });
      },
      success: function (response) {
        //unblock the form
        form.unblock();
        console.log(response);
        //show the message
        if (response.success) {
          //show success message
          form.find(".terminal-form-message").html(`<div class="alert alert-success">${response.data.message}</div>`).show();
          //clear the form
          form[0].reset();
        } else {
          //show error message
          form.find(".terminal-form-message").html(`<div class="alert alert-danger">${response.data.message}</div>`).show();
        }
      },
      error: function (response) {
        //unblock the form
        form.unblock();
        //show error message
        form.find(".terminal-form-message").html(`<div class="alert alert-danger">An error occurred, please try again later</div>`).show();
      }
    });
  });

  /**
   * terminal-mobile-menu-content-trigger
   *
   */
  $(".terminal-mobile-menu-content-trigger").click(function (e) {
    e.preventDefault();
    //toggle fade in and out on .terminal-mobile-menu-content
    $(".terminal-mobile-menu-content").toggle();
  });

  /**
   * Listen for .terminal-mobile-menu-content dropdown
   *
   */
  setInterval(() => {
    //check if .terminal-mobile-menu-content display is block
    if ($(".terminal-mobile-menu-content").css("display") === "block") {
      //get the src
      var src = $(".terminal-mobile-menu-content-trigger").find("img").attr("data-close-menu-icon");
      //change the src
      $(".terminal-mobile-menu-content-trigger").find("img").attr("src", src);
    } else {
      //get the src
      var src = $(".terminal-mobile-menu-content-trigger").find("img").attr("data-open-menu-icon");
      //change the src
      $(".terminal-mobile-menu-content-trigger").find("img").attr("src", src);
    }
  }, 50);

  //check if current with is above 1200px then hide the mobile menu content
  $(window).resize(function () {
    if ($(window).width() > 1200) {
      $(".terminal-mobile-menu-content").hide();
    }
  });

  //check if user scroll then hide the mobile menu content
  $(window).scroll(function () {
    $(".terminal-mobile-menu-content").hide();
  });

  //hide all .customize-partial-edit-shortcut under .t-hub-menu-ul
  setInterval(() => {
    //ul
    var ul_terminal_menu = $(".t-hub-menu-ul");
    //hide all .customize-partial-edit-shortcut
    ul_terminal_menu.find(".customize-partial-edit-shortcut").hide();
  }, 100);

  /**
   * Get all links with text ['Get Quotes', 'Book Shipment', 'Track Shipment']
   *
   */
  var linkTexts = ["Get Quotes", "Book Shipment", "Track Shipment", "Track Package", "Send Cargo", "Send Express", "Travels"];
  linkTexts.forEach(linkText => {
    //get current site url
    var currentSiteUrl = new URL(window.location.href);
    var currentSiteDomain = currentSiteUrl.hostname;
    //check if the url has sub domain
    if (currentSiteDomain.split(".").length > 2) {
      //explode .
      var currentSiteDomain = currentSiteDomain.split(".");
      //remove the first element
      currentSiteDomain.shift();
      //join the elements
      currentSiteDomain = currentSiteDomain.join(".");
    }

    //get all links with text
    var links = $(`a:contains(${linkText})`);
    //switch
    switch (linkText) {
      case "Get Quotes":
        //update the link href
        links.each(function (index, element) {
          //parse the href
          $(this).attr("href", `https://app.${currentSiteDomain}/quotes`);
        });
        break;
      case "Book Shipment":
        //https://app.thepep.africa/book
        links.each(function (index, element) {
          //parse the href
          $(this).attr("href", `https://app.${currentSiteDomain}/shipments/book`);
        });
        break;
      case "Track Shipment":
        //https://app.thepep.africa/track
        links.each(function (index, element) {
          //parse the href
          $(this).attr("href", `https://app.${currentSiteDomain}/track`);
        });
        break;
      case "Track Package":
        //https://app.thepep.africa/track
        links.each(function (index, element) {
          //parse the href
          $(this).attr("href", `https://app.${currentSiteDomain}/track`);
        });
        break;
      case "Send Cargo":
        //https://app.thepep.africa/book
        links.each(function (index, element) {
          //parse the href
          $(this).attr("href", `https://app.${currentSiteDomain}/shipments/book-cargo`);
        });
        break;
      case "Send Express":
        //https://app.thepep.africa/book
        links.each(function (index, element) {
          //parse the href
          $(this).attr("href", `https://app.${currentSiteDomain}/shipments/book`);
        });
        break;
      case "Travels":
        //https://app.thepep.africa/travels
        links.each(function (index, element) {
          $(this).attr("href", `https://app.${currentSiteDomain}/shipments/book`);
        });
        break;
      case "Login":
        //https://app.thepep.africa/auth/login
        links.each(function (index, element) {
          $(this).attr("href", `https://app.${currentSiteDomain}/auth/login`);
        });
        break;
      case "Sign Up":
        //https://app.thepep.africa/auth/register
        links.each(function (index, element) {
          $(this).attr("href", `https://app.${currentSiteDomain}/auth/register`);
        });
        break;
    }
  });

  /**
   * .terminal-hub-ivato-faqs--right--items
   *
   */
  $(".terminal-hub-ivato-faqs--right--items--item--question").each(function (index, element) {
    $(this).click(function (e) {
      e.preventDefault();
      //close all .terminal-hub-ivato-faqs--right--items--item--answer
      $(".terminal-hub-ivato-faqs--right--items--item--answer").each(function (index, element) {
        $(this).slideUp();
      });
      //get all .terminal-hub-ivato-faqs--right--items--item--question
      $(".terminal-hub-ivato-faqs--right--items--item--question").each(function (index, element) {
        $(this).find("img").removeClass("rotate");
      });
      //get the parent
      let parentDiv = $(this).parent();
      //toggle the .terminal-hub-ivato-faqs--right--items--item--answer
      parentDiv.find(".terminal-hub-ivato-faqs--right--items--item--answer").slideToggle();
      //toggle the img
      $(this).find("img").toggleClass("rotate");
    });
  });

  /**
   * init scroll
   *
   */
  var initScroll = function () {
    if ($(window).scrollTop() > 90) {
      $(".ivato-header").addClass("ivato-header--sticky");
      //check if scroll is greater than 375
      if ($(window).scrollTop() > 365) {
        $(".ivato-header").addClass("ivato-header--sticky--sticky-on-scroll");
      } else {
        $(".ivato-header").removeClass("ivato-header--sticky--sticky-on-scroll");
      }
    } else {
      $(".ivato-header").removeClass("ivato-header--sticky");
      $(".ivato-header").removeClass("ivato-header--sticky--sticky-on-scroll");
    }
  };

  //init
  initScroll();

  /**
   * .ivato-header
   *
   */
  $(window).scroll(initScroll);
});

/***/ }),

/***/ "./src/scss/responsive.scss":
/*!**********************************!*\
  !*** ./src/scss/responsive.scss ***!
  \**********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./src/scss/styles.scss":
/*!******************************!*\
  !*** ./src/scss/styles.scss ***!
  \******************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./src/scss/terminal_bootstrap.scss":
/*!******************************************!*\
  !*** ./src/scss/terminal_bootstrap.scss ***!
  \******************************************/
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
/************************************************************************/
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
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be in strict mode.
(() => {
"use strict";
/*!*******************************!*\
  !*** ./src/terminal-theme.js ***!
  \*******************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _scss_styles_scss__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./scss/styles.scss */ "./src/scss/styles.scss");
/* harmony import */ var _scss_terminal_bootstrap_scss__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./scss/terminal_bootstrap.scss */ "./src/scss/terminal_bootstrap.scss");
/* harmony import */ var _scss_responsive_scss__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./scss/responsive.scss */ "./src/scss/responsive.scss");
/* harmony import */ var _Functions_core_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./Functions/core.js */ "./src/Functions/core.js");
/* harmony import */ var _Functions_core_js__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_Functions_core_js__WEBPACK_IMPORTED_MODULE_3__);




})();

/******/ })()
;
//# sourceMappingURL=terminal-theme.js.map