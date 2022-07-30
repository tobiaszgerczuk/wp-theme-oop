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

/***/ "./assets/js/blocks/map.js":
/*!*********************************!*\
  !*** ./assets/js/blocks/map.js ***!
  \*********************************/
/***/ (function() {

eval("google.maps.event.addDomListener(window, 'load', initMap);\n\nfunction initMap() {\n  var mapContainer = document.getElementById('map');\n  var options = {\n    zoom: Number(mapContainer.dataset.zoom),\n    center: {\n      lat: Number(mapContainer.dataset.latidude),\n      lng: Number(mapContainer.dataset.longtude)\n    }\n  };\n  var map = new google.maps.Map(mapContainer, options);\n  var marker = new google.maps.Marker({\n    position: {\n      lat: Number(mapContainer.dataset.latidude),\n      lng: Number(mapContainer.dataset.longtude)\n    },\n    map: map,\n    icon: WLC.icon,\n    draggarble: true\n  });\n}//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJuYW1lcyI6WyJnb29nbGUiLCJtYXBzIiwiZXZlbnQiLCJhZGREb21MaXN0ZW5lciIsIndpbmRvdyIsImluaXRNYXAiLCJtYXBDb250YWluZXIiLCJkb2N1bWVudCIsImdldEVsZW1lbnRCeUlkIiwib3B0aW9ucyIsInpvb20iLCJOdW1iZXIiLCJkYXRhc2V0IiwiY2VudGVyIiwibGF0IiwibGF0aWR1ZGUiLCJsbmciLCJsb25ndHVkZSIsIm1hcCIsIk1hcCIsIm1hcmtlciIsIk1hcmtlciIsInBvc2l0aW9uIiwiaWNvbiIsIldMQyIsImRyYWdnYXJibGUiXSwic291cmNlcyI6WyJ3ZWJwYWNrOi8vY3VzdG9tLXRoZW1lLy4vYXNzZXRzL2pzL2Jsb2Nrcy9tYXAuanM/NmIxZSJdLCJzb3VyY2VzQ29udGVudCI6WyJnb29nbGUubWFwcy5ldmVudC5hZGREb21MaXN0ZW5lciggd2luZG93LCAnbG9hZCcsIGluaXRNYXAgKTtcclxuXHJcbmZ1bmN0aW9uIGluaXRNYXAoKSB7XHJcbiAgICB2YXIgbWFwQ29udGFpbmVyID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ21hcCcpO1xyXG4gICAgdmFyIG9wdGlvbnMgPSB7XHJcbiAgICAgICAgem9vbTogTnVtYmVyKCBtYXBDb250YWluZXIuZGF0YXNldC56b29tICksXHJcbiAgICAgICAgY2VudGVyOiB7XHJcbiAgICAgICAgICAgIGxhdDogTnVtYmVyKCBtYXBDb250YWluZXIuZGF0YXNldC5sYXRpZHVkZSApLFxyXG4gICAgICAgICAgICBsbmc6IE51bWJlciggbWFwQ29udGFpbmVyLmRhdGFzZXQubG9uZ3R1ZGUgKVxyXG4gICAgICAgIH1cclxuICAgIH1cclxuICAgIHZhciBtYXAgPSBuZXcgZ29vZ2xlLm1hcHMuTWFwKCBtYXBDb250YWluZXIsIG9wdGlvbnMgKTtcclxuICAgIHZhciBtYXJrZXIgPSBuZXcgZ29vZ2xlLm1hcHMuTWFya2VyKHtcclxuICAgICAgICBwb3NpdGlvbjoge1xyXG4gICAgICAgICAgICBsYXQ6IE51bWJlciggbWFwQ29udGFpbmVyLmRhdGFzZXQubGF0aWR1ZGUgKSxcclxuICAgICAgICAgICAgbG5nOiBOdW1iZXIoIG1hcENvbnRhaW5lci5kYXRhc2V0Lmxvbmd0dWRlIClcclxuICAgICAgICB9LFxyXG4gICAgICAgIG1hcDogICAgICAgICBtYXAsXHJcbiAgICAgICAgaWNvbjogICAgICAgIFdMQy5pY29uLFxyXG4gICAgICAgIGRyYWdnYXJibGU6IHRydWVcclxuICAgIH0pO1xyXG59Il0sIm1hcHBpbmdzIjoiQUFBQUEsTUFBTSxDQUFDQyxJQUFQLENBQVlDLEtBQVosQ0FBa0JDLGNBQWxCLENBQWtDQyxNQUFsQyxFQUEwQyxNQUExQyxFQUFrREMsT0FBbEQ7O0FBRUEsU0FBU0EsT0FBVCxHQUFtQjtFQUNmLElBQUlDLFlBQVksR0FBR0MsUUFBUSxDQUFDQyxjQUFULENBQXdCLEtBQXhCLENBQW5CO0VBQ0EsSUFBSUMsT0FBTyxHQUFHO0lBQ1ZDLElBQUksRUFBRUMsTUFBTSxDQUFFTCxZQUFZLENBQUNNLE9BQWIsQ0FBcUJGLElBQXZCLENBREY7SUFFVkcsTUFBTSxFQUFFO01BQ0pDLEdBQUcsRUFBRUgsTUFBTSxDQUFFTCxZQUFZLENBQUNNLE9BQWIsQ0FBcUJHLFFBQXZCLENBRFA7TUFFSkMsR0FBRyxFQUFFTCxNQUFNLENBQUVMLFlBQVksQ0FBQ00sT0FBYixDQUFxQkssUUFBdkI7SUFGUDtFQUZFLENBQWQ7RUFPQSxJQUFJQyxHQUFHLEdBQUcsSUFBSWxCLE1BQU0sQ0FBQ0MsSUFBUCxDQUFZa0IsR0FBaEIsQ0FBcUJiLFlBQXJCLEVBQW1DRyxPQUFuQyxDQUFWO0VBQ0EsSUFBSVcsTUFBTSxHQUFHLElBQUlwQixNQUFNLENBQUNDLElBQVAsQ0FBWW9CLE1BQWhCLENBQXVCO0lBQ2hDQyxRQUFRLEVBQUU7TUFDTlIsR0FBRyxFQUFFSCxNQUFNLENBQUVMLFlBQVksQ0FBQ00sT0FBYixDQUFxQkcsUUFBdkIsQ0FETDtNQUVOQyxHQUFHLEVBQUVMLE1BQU0sQ0FBRUwsWUFBWSxDQUFDTSxPQUFiLENBQXFCSyxRQUF2QjtJQUZMLENBRHNCO0lBS2hDQyxHQUFHLEVBQVVBLEdBTG1CO0lBTWhDSyxJQUFJLEVBQVNDLEdBQUcsQ0FBQ0QsSUFOZTtJQU9oQ0UsVUFBVSxFQUFFO0VBUG9CLENBQXZCLENBQWI7QUFTSCIsImZpbGUiOiIuL2Fzc2V0cy9qcy9ibG9ja3MvbWFwLmpzLmpzIiwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./assets/js/blocks/map.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./assets/js/blocks/map.js"]();
/******/ 	
/******/ })()
;