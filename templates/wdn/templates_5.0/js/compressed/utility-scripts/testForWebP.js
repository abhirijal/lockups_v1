!function(e){"use strict";function s(){return!!window.sessionStorage&&!!window.sessionStorage.getItem("webpSupport")}function t(s){var t=e.documentElement;s?(t.classList?t.classList.add("webp"):t.className+=" webp",window.sessionStorage.setItem("webpSupport",!0)):t.classList?t.classList.add("no-webp"):t.className+=" no-webp"}!function(e){if(s())return void t(!0);var n=new Image;n.onload=n.onerror=function(){e(2===n.height)},n.src="data:image/webp;base64,UklGRi4AAABXRUJQVlA4TCEAAAAvAUAAEB8wAiMwAgSSNtse/cXjxyCCmrYNWPwmHRH9jwMA"}(t)}(document);
//# sourceMappingURL=testForWebP.js.map