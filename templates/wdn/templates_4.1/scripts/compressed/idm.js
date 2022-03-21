define(["wdn","jquery","require"],function(n,e,t){"use strict";var i,o=function(n){return e("link[rel="+n+"]")},r=function(){var e=o("login"),t=o("logout");return e.length&&n.setPluginParam("idm","login",e.attr("href")),t.length&&n.setPluginParam("idm","logout",t.attr("href")),n.getPluginParam("idm")||{}},u="#wdn_identity_management",a="#wdn_idm_",l=a+"username",s=encodeURIComponent(window.location),d="https://shib.unl.edu/idp/profile/cas/logout?url="+s,g="https://shib.unl.edu/idp/profile/cas/login?service="+s,c=!1,f=function(n){var e=n;return n?c.uid&&c.uid===n?m():e:m()},m=function(){var n="";return c.eduPersonNickname?n=c.eduPersonNickname[0]:c.givenName?n=c.givenName[0]:c.displayName&&(n=c.displayName[0]),n},p=function(n){return!(!c||!c[n])&&c[n][0]},h={initialize:function(o){var u=function(){e(function(){var n=r();i=e(l).html(),n.login?h.setLoginURL(n.login):h.displayLogin()}),o&&o()},a=n.getCookie("unl_sso");a?t(["https://whoami.unl.edu/?id="+a],function(){n.idm.user&&(c=n.idm.user,delete n.idm.user),h.getUserId()?(o&&o(),e(function(){h.displayNotice(h.getUserId())})):(h.logout(),u())}):u()},logout:function(){n.setCookie("unl_sso","0",-1),c=!1},isLoggedIn:function(){return!!h.getUserId()},getUserId:function(){return c&&c.uid},getDisplayName:function(){return m()},getFirstName:function(){return p("givenName")},getLastName:function(){return p("sn")},getPrimaryAffiliation:function(){return p("eduPersonPrimaryAffiliation")},getEmailAddress:function(){return p("mail")},getPostalAddress:function(){return p("postalAddress")},getTelephoneNumber:function(){return p("telephoneNumber")},getTitle:function(){return p("title")},displayNotice:function(n){var t=r(),i=e(u),o=(e(l),"unl_");"s-"===n.substring(2,0)?o+=n.replace("-","_"):o+=n,i.addClass("loggedin"),e("#wdn_idm_toggle_label").css("backgroundImage","url(https://directory.unl.edu/avatar/"+n+")").html('<span class="wdn-text-hidden">Account actions for </span>'+f(n)),e("#wdn_idm_profile").attr("href","https://planetred.unl.edu/pg/profile/"+o),e("#wdn_idm_notice_container").removeClass("hidden"),e(l).hide(),e("#wdn_idm_logout").off("click").click(h.logout),h.setLogoutURL(t.logout)},displayLogin:function(){if(!h.getUserId()){var n=e(u),t=e(l);n.removeClass("loggedin"),t.css("backgroundImage",null).attr("href",g).html(i),e(l).show()}},setLogoutURL:function(n){var t=e("#wdn_idm_logout");n&&(d=n),t.attr("href",d)},setLoginURL:function(n){n&&(g=n),h.displayLogin()}};return n.idm={},h});
//# sourceMappingURL=idm.js.map