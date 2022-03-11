function _classCallCheck(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}var _createClass=function(){function t(t,e){for(var r=0;r<e.length;r++){var i=e[r];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(t,i.key,i)}}return function(e,r,i){return r&&t(e.prototype,r),i&&t(e,i),e}}(),DCFTabs=function(){function t(e){_classCallCheck(this,t),this.tabGroups=e}return _createClass(t,[{key:"switchTab",value:function(t,e,r,i){e.focus(),e.removeAttribute("tabindex"),e.setAttribute("aria-selected","true"),t.removeAttribute("aria-selected"),t.setAttribute("tabindex","-1");var a=Array.prototype.indexOf.call(r,e);i[Array.prototype.indexOf.call(r,t)].hidden=!0,i[a].hidden=!1}},{key:"initialize",value:function(){var t=this;Array.prototype.forEach.call(this.tabGroups,function(e){var r=e.querySelector(".dcf-tabs > ol, .dcf-tabs > ul"),i=r.querySelectorAll("a"),a=e.querySelectorAll(".dcf-tabs > div, .dcf-tabs > section"),c=DCFUtility.uuidv4();e.setAttribute("id",c.concat("-tab-group")),Array.prototype.forEach.call(i,function(e,n){e.classList.add("dcf-tab","dcf-d-block");var l=n+DCFUtility.magicNumbers("int1");e.setAttribute("id",c.concat("-tab-",l)),e.setAttribute("role","tab"),e.setAttribute("tabindex","-1"),e.parentNode.classList.add("dcf-tabs-list-item","dcf-mb-0"),e.parentNode.setAttribute("role","presentation"),e.addEventListener("click",function(e){e.preventDefault();var c=r.querySelector("[aria-selected]");e.currentTarget!==c&&t.switchTab(c,e.currentTarget,i,a)}),e.addEventListener("keydown",function(e){var r=Array.prototype.indexOf.call(i,e.currentTarget),c=0;null!==(c=e.which===DCFUtility.magicNumbers("arrowLeftCode")?r-DCFUtility.magicNumbers("int1"):e.which===DCFUtility.magicNumbers("arrowRightCode")?r+DCFUtility.magicNumbers("int 1"):e.which===DCFUtility.magicNumbers("arrowDownCode")?"down":null)&&(e.preventDefault(),"down"===c?a[n].focus():i[c]&&t.switchTab(e.currentTarget,i[c],i,a))})}),Array.prototype.forEach.call(a,function(t,e){t.setAttribute("role","tabpanel"),t.setAttribute("tabindex","-1"),t.classList.add("dcf-tabs-panel"),t.setAttribute("aria-labelledby",i[e].id),t.hidden=!0}),r.classList.add("dcf-tabs-list","dcf-list-bare","dcf-mb-0"),r.setAttribute("role","tablist"),i[DCFUtility.magicNumbers("int0")].removeAttribute("tabindex"),i[DCFUtility.magicNumbers("int0")].setAttribute("aria-selected","true"),a[DCFUtility.magicNumbers("int0")].hidden=!1})}}]),t}();
//# sourceMappingURL=dcf-tabs.js.map