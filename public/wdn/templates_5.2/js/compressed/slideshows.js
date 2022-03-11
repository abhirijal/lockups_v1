function _classCallCheck(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}function _classCallCheck(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}var _createClass=function(){function e(e,t){for(var i=0;i<t.length;i++){var n=t[i];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(e,n.key,n)}}return function(t,i,n){return i&&e(t.prototype,i),n&&e(t,n),t}}(),DCFUtility=function(){function e(){_classCallCheck(this,e)}return _createClass(e,null,[{key:"magicNumbers",value:function(e){var t={int0:0,int1:1,int2:2,int16:16,hex0x3:3,hex0x8:8,escCode:27,spaceKeyCode:32,arrowLeftCode:37,arrowUpCode:38,arrowRightCode:39,arrowDownCode:40};return Object.freeze(t),e in t?t[e]:void 0}},{key:"uuidv4",value:function(){var t=e.magicNumbers("int0"),i=e.magicNumbers("int16"),n=e.magicNumbers("hex0x3"),a=e.magicNumbers("hex0x8");return"xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx".replace(/[xy]/g,function(e){var c=Math.random()*i|t;return("x"===e?c:c&n|a).toString(i)})}},{key:"testWebp",value:function(t){var i=window.sessionStorage?window.sessionStorage.getItem("webpSupport"):null;if(null!==i)return void t("true"===i);var n=new Image;n.onload=n.onerror=function(){var i=n.height===e.magicNumbers("int2");window.sessionStorage&&window.sessionStorage.setItem("webpSupport",i),t(i)},n.src="data:image/webp;base64,UklGRjoAAABXRUJQVlA4IC4AAACyAgCdASoCAAIALmk0mk0iIiIiIgBoSygABc6WWgAA/veff/0PP8bA//LwYAAA"}},{key:"flagSupportsWebP",value:function(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:document.documentElement;e.testWebp(function(e){e&&(t.classList.contains("dcf-no-webp")&&t.classList.remove("dcf-no-webp"),t.classList.add("dcf-webp"))})}},{key:"flagSupportsJavaScript",value:function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:document.documentElement;e.classList.contains("dcf-no-js")&&e.classList.remove("dcf-no-js"),e.classList.add("dcf-js")}}]),e}();define("dcf-utility",function(){});var _createClass=function(){function e(e,t){for(var i=0;i<t.length;i++){var n=t[i];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(e,n.key,n)}}return function(t,i,n){return i&&e(t.prototype,i),n&&e(t,n),t}}(),DCFSlideshow=function(){function e(t,i,n,a){_classCallCheck(this,e),this.slideshows=t,this.uls=i,this.openCaptionEvent=n,this.closeCaptionEvent=a}return _createClass(e,[{key:"captionTransition",value:function(e){e.removeEventListener("transitionend",this.captionTransition,!0),e.classList.contains("dcf-invisible")||e.classList.add("dcf-invisible")}},{key:"captionClasses",value:function(e,t){t.classList.contains("dcf-invisible")?(t.classList.remove("dcf-invisible"),e.setAttribute("aria-expanded","true"),e.setAttribute("aria-label","Hide caption"),t.setAttribute("aria-hidden","false"),t.classList.remove("dcf-invisible","dcf-opacity-0","dcf-pointer-events-none"),t.classList.add("dcf-opacity-1","dcf-pointer-events-auto"),t.dispatchEvent(this.closeCaptionEvent)):(t.addEventListener("transitionend",this.captionTransition(t),!0),e.setAttribute("aria-expanded","false"),e.setAttribute("aria-label","Show caption"),t.setAttribute("aria-hidden","true"),t.classList.remove("dcf-opacity-1","dcf-pointer-events-auto"),t.classList.add("dcf-opacity-0","dcf-pointer-events-none","dcf-invisible"),t.dispatchEvent(this.openCaptionEvent))}},{key:"scrollIt",value:function(e,t,i){var n=Array.prototype.indexOf.call(t,e)*(i.scrollWidth/t.length);i.scrollLeft=n}},{key:"showSlide",value:function(e,t,i,n){var a=t.querySelectorAll(".dcf-slideshow .visible"),c="previous"===e?DCFUtility.magicNumbers("int0"):DCFUtility.magicNumbers("int1");if(a.length>DCFUtility.magicNumbers("int1"))this.scrollIt(a[c],i,n);else{var r=c===DCFUtility.magicNumbers("int0")?a[DCFUtility.magicNumbers("int0")].previousElementSibling:a[DCFUtility.magicNumbers("int0")].nextElementSibling;r&&this.scrollIt(r,i,n)}}},{key:"callback",value:function(e){Array.prototype.forEach.call(e,function(e){e.target.classList.remove("visible");var t=e.target.querySelector("div");if(t.setAttribute("tabindex","-1"),!(!e.intersectionRatio>DCFUtility.magicNumbers("int0"))){var i=e.target.querySelector("img");i.dataset.src&&(i.setAttribute("src",i.dataset.src),i.removeAttribute("data-src")),e.target.classList.add("visible"),t.removeAttribute("tabindex","-1")}})}},{key:"initialize",value:function(){var e=this;Array.prototype.forEach.call(this.slideshows,function(t,i){var n=e.uls[i],a=t.querySelectorAll(".dcf-slideshow li"),c=t.querySelectorAll(".dcf-slideshow figure"),r=t.querySelectorAll(".dcf-slideshow figcaption"),s=DCFUtility.uuidv4(),o="Slideshow "+i,l=t.getAttribute("aria-label");l&&(o=l),t.setAttribute("id",s.concat("-slideshow")),n.setAttribute("tabindex","0"),n.classList.add("dcf-slide-deck");var d=document.createElement("ul"),u=document.createElement("li"),f=document.createElement("li"),p=document.createElement("button"),b=document.createElement("button");d.classList.add("dcf-slideshow-controls","dcf-list-bare","dcf-btn-group","dcf-absolute","dcf-pin-right","dcf-pin-bottom","dcf-z-1"),d.setAttribute("aria-label",o+" controls"),d.setAttribute("role","list"),p.classList.add("dcf-btn","dcf-btn-primary","dcf-button-slide","dcf-btn-slide-prev"),p.setAttribute("aria-label",o+" previous"),b.classList.add("dcf-btn","dcf-btn-primary","dcf-btn-slide","dcf-btn-slide-next"),b.setAttribute("aria-label",o+" next"),u.setAttribute("id",s.concat("-previous")),u.classList.add("dcf-li-slide-prev"),f.setAttribute("id",s.concat("-next")),f.classList.add("dcf-li-slide-next"),t.classList.add("dcf-relative"),u.appendChild(p),f.appendChild(b),d.appendChild(u),d.appendChild(f),t.appendChild(d),Array.prototype.forEach.call(a,function(e,t){e.setAttribute("id",s.concat("-slide-",t)),e.classList.add("dcf-slide","dcf-relative"),e.querySelector("div").setAttribute("tabindex","-1")}),Array.prototype.forEach.call(c,function(e,t){var i=r[t];if(void 0!==i){var n=document.createElement("button");n.classList.add("dcf-btn","dcf-btn-slide","dcf-btn-slide-caption"),n.setAttribute("id",s.concat("-button-",t)),n.setAttribute("aria-controls",s.concat("-caption-",t)),n.setAttribute("aria-label",o+" Show caption"),n.setAttribute("aria-expanded","false"),e.classList.add("dcf-slide-figure"),e.appendChild(n),i.classList.add("dcf-opacity-0","dcf-pointer-events-none","dcf-invisible","dcf-slide-caption","dcf-figcaption"),i.setAttribute("id",s.concat("-caption-",t)),i.setAttribute("aria-labelledby",s.concat("-button-",t)),i.setAttribute("aria-hidden","true")}});var v={root:t,rootMargin:"-10px"};if("IntersectionObserver"in window){var h=new IntersectionObserver(e.callback,v);Array.prototype.forEach.call(a,function(e){h.observe(e)}),u.addEventListener("click",function(){e.showSlide("previous",t,a,n)}),f.addEventListener("click",function(){e.showSlide("next",t,a,n)})}else Array.prototype.forEach.call(a,function(e){var t=e.querySelector("img");t.setAttribute("src",t.getAttribute("data-src"))})});var t=document.querySelectorAll(".dcf-btn-slide-caption");[].forEach.call(t,function(t){var i=t.previousElementSibling;t.addEventListener("click",function(t){return e.captionClasses(t.currentTarget,i),!1},!1),t.addEventListener("keydown",function(t){t.which===DCFUtility.magicNumbers("spaceKeyCode")&&(t.preventDefault(),e.captionClasses(t.currentTarget,i))},!1)})}}]),e}();define("dcf-slideshow",function(){}),define("require-css/css!js-css/slideshows",[],function(){}),require(["dcf-utility","dcf-slideshow","css!js-css/slideshows"],function(){var e=new Event("openCaption"),t=new Event("closeCaption"),i=document.querySelectorAll(".dcf-slideshow"),n=document.querySelectorAll(".dcf-slideshow ul");new DCFSlideshow(i,n,e,t).initialize();var a=[{transform:"rotate(45deg)",transformOrigin:"50% 50%"},{transform:"rotate(0deg)",transformOrigin:"50% 50%"}],c=[{transform:"rotate(-45deg)",transformOrigin:"50% 50%"},{transform:"rotate(0deg)",transformOrigin:"50% 50%"}],r=[{transform:"rotate(0deg)",transformOrigin:"50% 50%"},{transform:"rotate(45deg)",transformOrigin:"50% 50%"}],s=[{transform:"rotate(0deg)",transformOrigin:"50% 50%"},{transform:"rotate(-45deg)",transformOrigin:"50% 50%"}],o={duration:250,fill:"forwards"};Array.prototype.forEach.call(i,function(e){var t=e.querySelector(".dcf-slideshow-controls"),i=t.querySelectorAll("li");Array.prototype.forEach.call(i,function(e){if(e.classList.contains("dcf-li-slide-prev")){var t=e.querySelector("button");t.classList.add("dcf-d-flex","dcf-ai-center","dcf-pt-4","dcf-pb-4","dcf-inverse"),t.innerHTML='<svg class="dcf-h-4 dcf-w-4 dcf-fill-current" width="24" height="24" viewBox="0 0 24 24" aria-hidden="true"><path d="M23.509 9.856c-.38-.55-.928-.852-1.542-.852H9.74l4.311-4.151c.995-.994.961-2.646-.074-3.682-1.001-1-2.722-1.033-3.68-.077L.148 11.144a.5.5 0 00-.003.707l9.978 10.079a2.445 2.445 0 001.737.705c.707 0 1.407-.294 1.92-.806a2.737 2.737 0 00.807-1.923 2.431 2.431 0 00-.708-1.733l-4.156-4.16h12.276c.618 0 1.161-.302 1.53-.851.304-.451.471-1.041.471-1.658 0-.596-.179-1.196-.491-1.648z"></path></svg>'}else if(e.classList.contains("dcf-li-slide-next")){var i=e.querySelector("button");i.classList.add("dcf-d-flex","dcf-ai-center","dcf-pt-4","dcf-pb-4","dcf-inverse"),i.innerHTML='<svg class="dcf-h-4 dcf-w-4 dcf-fill-current" width="24" height="24" viewBox="0 0 24 24" aria-hidden="true"><path d="M23.852 11.144L13.703 1.096c-.96-.96-2.678-.924-3.68.075-1.036 1.035-1.07 2.687-.069 3.69l4.321 4.143H2.03c-1.27 0-2.03 1.272-2.03 2.5 0 .617.168 1.207.472 1.659.369.549.913.851 1.53.851h12.276l-4.156 4.16a2.425 2.425 0 00-.708 1.734c0 .708.293 1.409.807 1.922a2.738 2.738 0 001.919.806c.664 0 1.28-.251 1.739-.708l9.977-10.076a.502.502 0 00-.004-.708z"></path></svg>'}});var n=e.querySelectorAll(".dcf-slideshow figure");Array.prototype.forEach.call(n,function(e){var t=e.querySelector("button");void 0!==t&&(t.innerHTML='<svg class="dcf-h-4 dcf-w-4 dcf-fill-current" width="24" height="24" viewBox="0 0 24 24" aria-hidden="true"><path class="unl-icon-slide-caption-open" d="M1,3h19c0.6,0,1-0.4,1-1c0-0.6-0.4-1-1-1H1C0.4,1,0,1.4,0,2C0,2.6,0.4,3,1,3z"/><path class="unl-icon-slide-caption-open" d="M1,8h15c0.6,0,1-0.4,1-1c0-0.6-0.4-1-1-1H1C0.4,6,0,6.4,0,7C0,7.6,0.4,8,1,8z"/><path class="unl-icon-slide-caption-close-1" d="M1,13h22c0.6,0,1-0.4,1-1c0-0.6-0.4-1-1-1H1c-0.6,0-1,0.4-1,1C0,12.6,0.4,13,1,13z"/><path class="unl-icon-slide-caption-close-2" d="M1,13h22c0.6,0,1-0.4,1-1c0-0.6-0.4-1-1-1H1c-0.6,0-1,0.4-1,1C0,12.6,0.4,13,1,13z"/><path class="unl-icon-slide-caption-open" d="M1,18h18c0.6,0,1-0.4,1-1c0-0.6-0.4-1-1-1H1c-0.6,0-1,0.4-1,1C0,17.6,0.4,18,1,18z"/><path class="unl-icon-slide-caption-open" d="M1,23h15c0.6,0,1-0.4,1-1c0-0.6-0.4-1-1-1H1c-0.6,0-1,0.4-1,1C0,22.6,0.4,23,1,23z"/></svg>')})});var l=document.querySelectorAll(".dcf-btn-slide");Array.prototype.forEach.call(l,function(e){e.classList.add("dcf-d-flex","dcf-ai-center","dcf-pt-4","dcf-pb-4","dcf-white")});var d=document.querySelectorAll(".dcf-btn-slide-caption");Array.prototype.forEach.call(d,function(e){var t=e.previousElementSibling,i=e.querySelector(".unl-icon-slide-caption-close-1"),n=e.querySelector(".unl-icon-slide-caption-close-2");t.addEventListener("openCaption",function(){i.animate(a,o),n.animate(c,o)},!1),t.addEventListener("closeCaption",function(){i.animate(r,o),n.animate(s,o)},!1)})}),define("slideshows",function(){}),function(e){var t=document,i="appendChild",n="styleSheet",a=t.createElement("style");a.type="text/css",t.getElementsByTagName("head")[0][i](a),a[n]?a[n].cssText=e:a[i](t.createTextNode(e))}(".unl .dcf-slide-deck{-webkit-clip-path:polygon(100% 0,100% calc(100% - 2.5rem - 7px),calc(100% - 5rem - 13px) calc(100% - 2.5rem - 7px),calc(100% - 5rem - 13px) 100%,0 100%,0 0);clip-path:polygon(100% 0,100% calc(100% - 2.5rem - 7px),calc(100% - 5rem - 13px) calc(100% - 2.5rem - 7px),calc(100% - 5rem - 13px) 100%,0 100%,0 0);scrollbar-width:none}.unl .dcf-slide-deck::-webkit-scrollbar{display:none}.unl .dcf-slide-caption[aria-hidden=true]{opacity:0;pointer-events:none;-webkit-transition:opacity .4s cubic-bezier(.25,.46,.45,.94);transition:opacity .4s cubic-bezier(.25,.46,.45,.94)}.unl .dcf-slide-caption[aria-hidden=false]{opacity:1;pointer-events:auto;-webkit-transition:opacity .2s cubic-bezier(.25,.46,.45,.94);transition:opacity .2s cubic-bezier(.25,.46,.45,.94)}.unl .dcf-btn-slide-caption,.unl .dcf-slide-caption{background-color:var(--bg-overlay-dark);position:absolute;z-index:1}.unl .dcf-btn-slide-caption{border-color:transparent;bottom:3px;color:var(--btn-inverse-tertiary);left:3px}.unl .dcf-slide-caption{-webkit-clip-path:polygon(100% 0,100% 100%,calc(10px + 2.5rem) 100%,calc(10px + 2.5rem) calc(100% - 10px - 2.5rem),0 calc(100% - 10px - 2.5rem),0 0);clip-path:polygon(100% 0,100% 100%,calc(10px + 2.5rem) 100%,calc(10px + 2.5rem) calc(100% - 10px - 2.5rem),0 calc(100% - 10px - 2.5rem),0 0);height:100%;left:0;padding:1em 1.13em;top:0;width:100%}.dcf-btn-slide-caption[aria-expanded=false] .unl-icon-slide-caption-open{opacity:1;-webkit-transition:opacity .25s ease-out 125ms;transition:opacity .25s ease-out 125ms}.dcf-btn-slide-caption[aria-expanded=true] .unl-icon-slide-caption-open{opacity:0;-webkit-transition:opacity .25s ease-out;transition:opacity .25s ease-out}");
//# sourceMappingURL=slideshows.js.map