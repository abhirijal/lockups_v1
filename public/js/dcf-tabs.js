define(["exports","./dcf-utility"],function(t,o){"use strict";function a(t,e){for(var i=0;i<e.length;i++){var a=e[i];a.enumerable=a.enumerable||!1,a.configurable=!0,"value"in a&&(a.writable=!0),Object.defineProperty(t,a.key,a)}}Object.defineProperty(t,"__esModule",{value:!0}),t.DCFTabs=void 0;var n=[],e=(window.addEventListener("hashchange",function(){var i=[];Array.prototype.forEach.call(n,function(t){var e=window.location.hash;e?t.displayTabByHash(e):Array.prototype.forEach.call(t.tabGroups,function(t){var e=t.getAttribute("id");i.includes(e)||(i.push(e),t.querySelector(".dcf-tabs > ol, .dcf-tabs > ul").dispatchEvent(new Event("resetTabGroup")))})})}),function(){function r(t){var e=1<arguments.length&&void 0!==arguments[1]?arguments[1]:{},i=this,a=r;if(!(i instanceof a))throw new TypeError("Cannot call a class as a function");this.tabGroups=t,this.tabHashLookup={},!(this.useHashChange=!0)===e.useHashChange&&(this.useHashChange=!1),n.push(this)}var t,e,i;return t=r,(e=[{key:"switchTab",value:function(t,e){var i,a=2<arguments.length&&void 0!==arguments[2]&&arguments[2],r=3<arguments.length&&void 0!==arguments[3]&&arguments[3],t=(t&&(t.removeAttribute("aria-selected"),t.setAttribute("tabindex","-1"),!(t=t.getAttribute("data-panel-id"))||(t=document.getElementById(t))&&(t.hidden=!0),this.focusTab(e)),e.getAttribute("data-panel-id"));t?(i=document.getElementById(t))?(i.hidden=!1,r&&i.scrollIntoView()):console.error("DCF Tabs: The tab panel with id ".concat(t," is not associated with a tab.")):(r=e.getAttribute("id"),console.error("DCF Tabs: The tab with id ".concat(r," is missing panel href to map to panel."))),a&&this.setPageHash(e.getAttribute("href"))}},{key:"focusTab",value:function(t){t.focus(),t.setAttribute("tabindex","0"),t.setAttribute("aria-selected","true")}},{key:"getCurrentTabByTab",value:function(t){var t=t.parentNode.parentNode,e=null;return e="OL"!==t.tagName&&"UL"!==t.tagName?e:t.querySelector("[aria-selected]")}},{key:"isHash",value:function(t){return t&&"#"===t.substr(o.DCFUtility.magicNumbers("int0"),o.DCFUtility.magicNumbers("int1"))}},{key:"setPageHash",value:function(t){t=this.isHash(t)?t:"";t&&history.pushState?history.pushState(null,null,window.location.origin+window.location.pathname+t):location.hash=t}},{key:"displayTabByHash",value:function(t){var e;this.useHashChange&&this.isHash(t)&&t&&this.tabHashLookup[t]&&(t=this.tabHashLookup[t],(e=this.getCurrentTabByTab(t))!==t?this.switchTab(e,t,!1,!0):this.focusTab(t))}},{key:"initialize",value:function(){var s=this;Array.prototype.forEach.call(this.tabGroups,function(t){var i=t.querySelector(".dcf-tabs > ol, .dcf-tabs > ul"),r=i.querySelectorAll("a"),e=t.querySelectorAll(".dcf-tabs > div, .dcf-tabs > section"),n=o.DCFUtility.uuidv4();t.setAttribute("id",o.DCFUtility.checkSetElementId(t,n.concat("-tab-group"))),Array.prototype.forEach.call(r,function(a,t){a.classList.add("dcf-tab","dcf-d-block");var e=t+o.DCFUtility.magicNumbers("int1"),e=(a.setAttribute("id",o.DCFUtility.checkSetElementId(a,n.concat("-tab-",e))),a.setAttribute("role","tab"),t===o.DCFUtility.magicNumbers("int0")?(a.setAttribute("tabindex","0"),a.setAttribute("aria-selected","true")):(a.setAttribute("tabindex","-1"),a.removeAttribute("aria-selected")),a.parentNode.classList.add("dcf-tabs-list-item","dcf-mb-0"),a.parentNode.setAttribute("role","presentation"),a.getAttribute("href"));s.isHash(e)&&(a.setAttribute("data-panel-id",e.substring(o.DCFUtility.magicNumbers("int1"))),s.tabHashLookup[e]=a),a.addEventListener("click",function(t){t.preventDefault();var e=i.querySelector("[aria-selected]");t.currentTarget!==e&&s.switchTab(e,t.currentTarget,s.useHashChange)}),a.addEventListener("keydown",function(t){var e=Array.prototype.indexOf.call(r,t.currentTarget),i=0;o.DCFUtility.isKeyEvent(t,o.DCFUtility.keyEvents("arrowLeft"))?i=e>o.DCFUtility.magicNumbers("int0")?e-o.DCFUtility.magicNumbers("int1"):r.length-o.DCFUtility.magicNumbers("int1"):o.DCFUtility.isKeyEvent(t,o.DCFUtility.keyEvents("arrowRight"))?e<r.length-o.DCFUtility.magicNumbers("int1")&&(i=e+o.DCFUtility.magicNumbers("int1")):i=o.DCFUtility.isKeyEvent(t,o.DCFUtility.keyEvents("arrowDown"))?"down":null,null!==i&&(t.preventDefault(),"down"===i?!(e=a.getAttribute("data-panel-id"))||(e=document.getElementById(e))&&e.focus():r[i]&&s.switchTab(t.currentTarget,r[i],!1))},!1)}),Array.prototype.forEach.call(e,function(t){t.setAttribute("role","tabpanel"),t.setAttribute("tabindex","-1"),t.classList.add("dcf-tabs-panel"),t.hidden=!0;var e,i=t.getAttribute("id");!i||(e=s.tabHashLookup["#".concat(i)])&&(t.setAttribute("aria-labelledby",e.getAttribute("id")),t.addEventListener("keydown",function(t){o.DCFUtility.isKeyEvent(t,o.DCFUtility.keyEvents("arrowUp"))&&(e.focus(),t.stopPropagation())}))}),i.classList.add("dcf-tabs-list","dcf-list-bare","dcf-mb-0"),i.setAttribute("role","tablist"),s.switchTab(null,r[o.DCFUtility.magicNumbers("int0")],!1),s.useHashChange&&i.addEventListener("resetTabGroup",function(){var t=r[o.DCFUtility.magicNumbers("int0")],e=s.getCurrentTabByTab(t);e!==t&&s.switchTab(e,t,!1)})}),this.useHashChange&&window.location.hash&&this.displayTabByHash(window.location.hash)}}])&&a(t.prototype,e),i&&a(t,i),Object.defineProperty(t,"prototype",{writable:!1}),r}());t.DCFTabs=e});