var navbarWrapper = document.getElementById('navbarWrapper');
var headerHeight = document.getElementById('pageHeader').clientHeight - 86;
window.onscroll = function () { 
    "use strict";
    if (document.body.scrollTop >= headerHeight || document.documentElement.scrollTop >= headerHeight) {
        navbarWrapper.classList.add("nav-opaque");
        navbarWrapper.classList.remove("nav-translucent");
    } 
    else {
        navbarWrapper.classList.add("nav-translucent");
        navbarWrapper.classList.remove("nav-opaque");
    }
};