/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (function() { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./assets/js/blocks/faq.js":
/*!*********************************!*\
  !*** ./assets/js/blocks/faq.js ***!
  \*********************************/
/***/ (function() {

eval("window.onload = function () {\n  var faq = document.getElementsByClassName(\"faq-btn\");\n  var i;\n\n  for (i = 0; i < faq.length; i++) {\n    faq[i].addEventListener(\"click\", function () {\n      var panel = this.nextElementSibling;\n\n      if (panel.style.maxHeight) {\n        panel.style.maxHeight = null;\n        panel.classList.remove(\"open\");\n        this.setAttribute('aria-expanded', \"false\");\n      } else {\n        var active = document.querySelectorAll(\".faq-btn.active\");\n\n        for (var j = 0; j < active.length; j++) {\n          active[j].classList.remove(\"active\");\n          active[j].setAttribute('aria-expanded', \"false\");\n          active[j].nextElementSibling.style.maxHeight = null;\n          active[j].nextElementSibling.classList.remove(\"open\");\n        }\n\n        panel.style.maxHeight = panel.scrollHeight + \"px\";\n        panel.classList.add(\"open\");\n        this.setAttribute('aria-expanded', \"true\");\n      }\n\n      this.classList.toggle(\"active\");\n    });\n  }\n};//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJuYW1lcyI6WyJ3aW5kb3ciLCJvbmxvYWQiLCJmYXEiLCJkb2N1bWVudCIsImdldEVsZW1lbnRzQnlDbGFzc05hbWUiLCJpIiwibGVuZ3RoIiwiYWRkRXZlbnRMaXN0ZW5lciIsInBhbmVsIiwibmV4dEVsZW1lbnRTaWJsaW5nIiwic3R5bGUiLCJtYXhIZWlnaHQiLCJjbGFzc0xpc3QiLCJyZW1vdmUiLCJzZXRBdHRyaWJ1dGUiLCJhY3RpdmUiLCJxdWVyeVNlbGVjdG9yQWxsIiwiaiIsInNjcm9sbEhlaWdodCIsImFkZCIsInRvZ2dsZSJdLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly9jdXN0b20tdGhlbWUvLi9hc3NldHMvanMvYmxvY2tzL2ZhcS5qcz9jOGM5Il0sInNvdXJjZXNDb250ZW50IjpbIndpbmRvdy5vbmxvYWQgPSBmdW5jdGlvbiAoKSB7XHJcblx0Y29uc3QgZmFxID0gZG9jdW1lbnQuZ2V0RWxlbWVudHNCeUNsYXNzTmFtZShcImZhcS1idG5cIik7XHJcblx0bGV0IGk7XHJcblxyXG5cdGZvciAoaSA9IDA7IGkgPCBmYXEubGVuZ3RoOyBpKyspIHtcclxuXHRcdGZhcVtpXS5hZGRFdmVudExpc3RlbmVyKFwiY2xpY2tcIiwgZnVuY3Rpb24gKCkge1xyXG5cdFx0XHRjb25zdCBwYW5lbCA9IHRoaXMubmV4dEVsZW1lbnRTaWJsaW5nO1xyXG5cdFx0XHRpZiAocGFuZWwuc3R5bGUubWF4SGVpZ2h0KSB7XHJcblx0XHRcdFx0cGFuZWwuc3R5bGUubWF4SGVpZ2h0ID0gbnVsbDtcclxuXHRcdFx0XHRwYW5lbC5jbGFzc0xpc3QucmVtb3ZlKFwib3BlblwiKTtcclxuXHRcdFx0XHR0aGlzLnNldEF0dHJpYnV0ZSgnYXJpYS1leHBhbmRlZCcsIFwiZmFsc2VcIilcclxuXHRcdFx0fSBlbHNlIHtcclxuXHRcdFx0XHRsZXQgYWN0aXZlID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvckFsbChcIi5mYXEtYnRuLmFjdGl2ZVwiKTtcclxuXHRcdFx0XHRmb3IgKGxldCBqID0gMDsgaiA8IGFjdGl2ZS5sZW5ndGg7IGorKykge1xyXG5cdFx0XHRcdFx0YWN0aXZlW2pdLmNsYXNzTGlzdC5yZW1vdmUoXCJhY3RpdmVcIik7XHJcblx0XHRcdFx0XHRhY3RpdmVbal0uc2V0QXR0cmlidXRlKCdhcmlhLWV4cGFuZGVkJywgXCJmYWxzZVwiKVxyXG5cdFx0XHRcdFx0YWN0aXZlW2pdLm5leHRFbGVtZW50U2libGluZy5zdHlsZS5tYXhIZWlnaHQgPSBudWxsO1xyXG5cdFx0XHRcdFx0YWN0aXZlW2pdLm5leHRFbGVtZW50U2libGluZy5jbGFzc0xpc3QucmVtb3ZlKFwib3BlblwiKTtcclxuXHRcdFx0XHR9XHJcblx0XHRcdFx0cGFuZWwuc3R5bGUubWF4SGVpZ2h0ID0gcGFuZWwuc2Nyb2xsSGVpZ2h0ICsgXCJweFwiO1xyXG5cdFx0XHRcdHBhbmVsLmNsYXNzTGlzdC5hZGQoXCJvcGVuXCIpO1xyXG5cdFx0XHRcdHRoaXMuc2V0QXR0cmlidXRlKCdhcmlhLWV4cGFuZGVkJywgXCJ0cnVlXCIpXHJcblx0XHRcdH1cclxuXHRcdFx0dGhpcy5jbGFzc0xpc3QudG9nZ2xlKFwiYWN0aXZlXCIpO1xyXG5cclxuXHRcdH0pO1xyXG5cdH1cclxufTsiXSwibWFwcGluZ3MiOiJBQUFBQSxNQUFNLENBQUNDLE1BQVAsR0FBZ0IsWUFBWTtFQUMzQixJQUFNQyxHQUFHLEdBQUdDLFFBQVEsQ0FBQ0Msc0JBQVQsQ0FBZ0MsU0FBaEMsQ0FBWjtFQUNBLElBQUlDLENBQUo7O0VBRUEsS0FBS0EsQ0FBQyxHQUFHLENBQVQsRUFBWUEsQ0FBQyxHQUFHSCxHQUFHLENBQUNJLE1BQXBCLEVBQTRCRCxDQUFDLEVBQTdCLEVBQWlDO0lBQ2hDSCxHQUFHLENBQUNHLENBQUQsQ0FBSCxDQUFPRSxnQkFBUCxDQUF3QixPQUF4QixFQUFpQyxZQUFZO01BQzVDLElBQU1DLEtBQUssR0FBRyxLQUFLQyxrQkFBbkI7O01BQ0EsSUFBSUQsS0FBSyxDQUFDRSxLQUFOLENBQVlDLFNBQWhCLEVBQTJCO1FBQzFCSCxLQUFLLENBQUNFLEtBQU4sQ0FBWUMsU0FBWixHQUF3QixJQUF4QjtRQUNBSCxLQUFLLENBQUNJLFNBQU4sQ0FBZ0JDLE1BQWhCLENBQXVCLE1BQXZCO1FBQ0EsS0FBS0MsWUFBTCxDQUFrQixlQUFsQixFQUFtQyxPQUFuQztNQUNBLENBSkQsTUFJTztRQUNOLElBQUlDLE1BQU0sR0FBR1osUUFBUSxDQUFDYSxnQkFBVCxDQUEwQixpQkFBMUIsQ0FBYjs7UUFDQSxLQUFLLElBQUlDLENBQUMsR0FBRyxDQUFiLEVBQWdCQSxDQUFDLEdBQUdGLE1BQU0sQ0FBQ1QsTUFBM0IsRUFBbUNXLENBQUMsRUFBcEMsRUFBd0M7VUFDdkNGLE1BQU0sQ0FBQ0UsQ0FBRCxDQUFOLENBQVVMLFNBQVYsQ0FBb0JDLE1BQXBCLENBQTJCLFFBQTNCO1VBQ0FFLE1BQU0sQ0FBQ0UsQ0FBRCxDQUFOLENBQVVILFlBQVYsQ0FBdUIsZUFBdkIsRUFBd0MsT0FBeEM7VUFDQUMsTUFBTSxDQUFDRSxDQUFELENBQU4sQ0FBVVIsa0JBQVYsQ0FBNkJDLEtBQTdCLENBQW1DQyxTQUFuQyxHQUErQyxJQUEvQztVQUNBSSxNQUFNLENBQUNFLENBQUQsQ0FBTixDQUFVUixrQkFBVixDQUE2QkcsU0FBN0IsQ0FBdUNDLE1BQXZDLENBQThDLE1BQTlDO1FBQ0E7O1FBQ0RMLEtBQUssQ0FBQ0UsS0FBTixDQUFZQyxTQUFaLEdBQXdCSCxLQUFLLENBQUNVLFlBQU4sR0FBcUIsSUFBN0M7UUFDQVYsS0FBSyxDQUFDSSxTQUFOLENBQWdCTyxHQUFoQixDQUFvQixNQUFwQjtRQUNBLEtBQUtMLFlBQUwsQ0FBa0IsZUFBbEIsRUFBbUMsTUFBbkM7TUFDQTs7TUFDRCxLQUFLRixTQUFMLENBQWVRLE1BQWYsQ0FBc0IsUUFBdEI7SUFFQSxDQXBCRDtFQXFCQTtBQUNELENBM0JEIiwiZmlsZSI6Ii4vYXNzZXRzL2pzL2Jsb2Nrcy9mYXEuanMuanMiLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./assets/js/blocks/faq.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./assets/js/blocks/faq.js"]();
/******/ 	
/******/ })()
;