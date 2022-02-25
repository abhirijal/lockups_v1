define(["exports"],function(e){"use strict";function n(e,o){for(var t=0;t<o.length;t++){var n=o[t];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(e,n.key,n)}}Object.defineProperty(e,"__esModule",{value:!0}),e.DCFUtility=void 0;var o=function(){function a(){if(!(this instanceof a))throw new TypeError("Cannot call a class as a function")}var e,o,t;return e=a,t=[{key:"magicNumbers",value:function(e){var o={int0:0,int1:1,int2:2,int3:3,int4:4,int5:5,int6:6,int7:7,int16:16,intMinus1:-1,hex0x3:3,hex0x8:8,tabCode:9,escCode:27,spaceKeyCode:32,arrowLeftCode:37,arrowUpCode:38,arrowRightCode:39,arrowDownCode:40};return Object.freeze(o),e in o?o[e]:void 0}},{key:"keyEvents",value:function(e){var o={arrowDown:{code:"ArrowDown",key:"ArrowDown",keyCode:40},arrowLeft:{code:"ArrowLeft",key:"ArrowLeft",keyCode:37},arrowRight:{code:"ArrowRight",key:"ArrowRight",keyCode:39},arrowUp:{code:"ArrowUp",key:"ArrowUp",keyCode:38},escape:{code:"Escape",key:"Escape",keyCode:27},keyC:{code:"KeyC",key:"c",keyCode:67},space:{code:"Space",key:" ",keyCode:32},tab:{code:"Tab",key:"Tab",keyCode:9}};return Object.freeze(o),e in o?o[e]:void 0}},{key:"isKeyEvent",value:function(e,o){var t=e.key&&e.key===o.key&&e.key===o.key,n=e.code&&o.code&&e.code===o.code,e=e.keyCode&&o.keyCode&&e.keyCode===o.keyCode;return t||n||e}},{key:"uuidv4",value:function(){var t=a.magicNumbers("int0"),n=a.magicNumbers("int16"),r=a.magicNumbers("hex0x3"),i=a.magicNumbers("hex0x8");return"xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx".replace(/[xy]/g,function(e){var o=Math.random()*n|t;return("x"===e?o:o&r|i).toString(n)})}},{key:"checkSetElementId",value:function(e){var o=1<arguments.length&&void 0!==arguments[1]?arguments[1]:null,e=e.getAttribute("id");return e=e||(o||a.uuidv4())}},{key:"testWebp",value:function(o){var t,n=null;try{n=window.sessionStorage?window.sessionStorage.getItem("webpSupport"):null}catch(e){n=null}null===n?((t=new Image).onload=t.onerror=function(){var e=t.height===a.magicNumbers("int2");window.sessionStorage&&window.sessionStorage.setItem("webpSupport",e),o(e)},t.src="data:image/webp;base64,UklGRjoAAABXRUJQVlA4IC4AAACyAgCdASoCAAIALmk0mk0iIiIiIgBoSygABc6WWgAA/veff/0PP8bA//LwYAAA"):o("true"===n)}},{key:"flagSupportsWebP",value:function(){var o=0<arguments.length&&void 0!==arguments[0]?arguments[0]:document.documentElement;a.testWebp(function(e){e&&(o.classList.contains("dcf-no-webp")&&o.classList.remove("dcf-no-webp"),o.classList.add("dcf-webp"))})}},{key:"flagSupportsJavaScript",value:function(){var e=0<arguments.length&&void 0!==arguments[0]?arguments[0]:document.documentElement;e.classList.contains("dcf-no-js")&&e.classList.remove("dcf-no-js"),e.classList.add("dcf-js")}}],(o=null)&&n(e.prototype,o),t&&n(e,t),Object.defineProperty(e,"prototype",{writable:!1}),a}();e.DCFUtility=o});