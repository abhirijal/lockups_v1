define(["exports","./dcf-utility"],function(t,e){"use strict";function n(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}function i(t,e){for(var n=0;n<e.length;n++){var i=e[n];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(t,i.key,i)}}function r(t,e,n){return e&&i(t.prototype,e),n&&i(t,n),Object.defineProperty(t,"prototype",{writable:!1}),t}Object.defineProperty(t,"__esModule",{value:!0}),t.DCFTable=void 0;var a=function(){function t(e){n(this,t),this.tables=e}return r(t,[{key:"initialize",value:function(){Array.prototype.forEach.call(this.tables,function(t){var n=t.parentNode;n&&n.classList.contains("dcf-overflow-x-auto")&&(n.hasAttribute("tabIndex")||n.setAttribute("tabIndex",e.DCFUtility.magicNumbers("int0")))})}}]),t}();t.DCFTable=a});
//# sourceMappingURL=dcf-table.js.map