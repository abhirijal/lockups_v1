define(["exports"],function(e){"use strict";function o(e,o){if(!(e instanceof o))throw new TypeError("Cannot call a class as a function")}function t(e,o){for(var t=0;t<o.length;t++){var n=o[t];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(e,n.key,n)}}function n(e,o,n){return o&&t(e.prototype,o),n&&t(e,n),Object.defineProperty(e,"prototype",{writable:!1}),e}Object.defineProperty(e,"__esModule",{value:!0}),e.DCFUtility=void 0;var r=function(){function e(){o(this,e)}return n(e,null,[{key:"magicNumbers",value:function(e){var o={int0:0,int1:1,int2:2,int3:3,int4:4,int5:5,int6:6,int7:7,int16:16,intMinus1:-1,hex0x3:3,hex0x8:8,tabCode:9,escCode:27,spaceKeyCode:32,arrowLeftCode:37,arrowUpCode:38,arrowRightCode:39,arrowDownCode:40};return Object.freeze(o),e in o?o[e]:void 0}},{key:"keyEvents",value:function(e){var o={arrowDown:{code:"ArrowDown",key:"ArrowDown",keyCode:40},arrowLeft:{code:"ArrowLeft",key:"ArrowLeft",keyCode:37},arrowRight:{code:"ArrowRight",key:"ArrowRight",keyCode:39},arrowUp:{code:"ArrowUp",key:"ArrowUp",keyCode:38},escape:{code:"Escape",key:"Escape",keyCode:27},keyC:{code:"KeyC",key:"c",keyCode:67},space:{code:"Space",key:" ",keyCode:32},tab:{code:"Tab",key:"Tab",keyCode:9}};return Object.freeze(o),e in o?o[e]:void 0}},{key:"isKeyEvent",value:function(e,o){var t=e.key&&e.key===o.key&&e.key===o.key,n=e.code&&o.code&&e.code===o.code,r=e.keyCode&&o.keyCode&&e.keyCode===o.keyCode;return t||n||r}},{key:"uuidv4",value:function(){var o=e.magicNumbers("int0"),t=e.magicNumbers("int16"),n=e.magicNumbers("hex0x3"),r=e.magicNumbers("hex0x8");return"xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx".replace(/[xy]/g,function(e){var i=Math.random()*t|o;return("x"===e?i:i&n|r).toString(t)})}},{key:"checkSetElementId",value:function(o){var t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:null,n=o.getAttribute("id");return n||(n=t||e.uuidv4()),n}},{key:"testWebp",value:function(o){var t=null;try{t=window.sessionStorage?window.sessionStorage.getItem("webpSupport"):null}catch(e){t=null}if(null!==t)return void o("true"===t);var n=new Image;n.onload=n.onerror=function(){var t=n.height===e.magicNumbers("int2");window.sessionStorage&&window.sessionStorage.setItem("webpSupport",t),o(t)},n.src="data:image/webp;base64,UklGRjoAAABXRUJQVlA4IC4AAACyAgCdASoCAAIALmk0mk0iIiIiIgBoSygABc6WWgAA/veff/0PP8bA//LwYAAA"}},{key:"flagSupportsWebP",value:function(){var o=arguments.length>0&&void 0!==arguments[0]?arguments[0]:document.documentElement;e.testWebp(function(e){e&&(o.classList.contains("dcf-no-webp")&&o.classList.remove("dcf-no-webp"),o.classList.add("dcf-webp"))})}},{key:"flagSupportsJavaScript",value:function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:document.documentElement;e.classList.contains("dcf-no-js")&&e.classList.remove("dcf-no-js"),e.classList.add("dcf-js")}}]),e}();e.DCFUtility=r});
//# sourceMappingURL=dcf-utility.js.map