!function(){var e=document.querySelector(".block.submenu"),t=document.querySelector(".site-header");if(e){var n=e.querySelector(".menu__trigger");n&&(n.onclick=function(e){e.currentTarget.parentElement.classList.toggle("is-open")});var o=e.getElementsByClassName("menu__item"),i=e.offsetHeight+10;if(o){Array.from(o).forEach((function(e){e.onclick=function(t){t.preventDefault();var n=t.target.getAttribute("href");if(document.getElementById(n.substring(1))){var o=document.getElementById(n.substring(1)).getBoundingClientRect().top,i=o+window.pageYOffset-265;window.innerWidth>992&&(i=o+window.pageYOffset-90),window.scrollTo({top:i,behavior:"smooth"}),history.replaceState(null,null,document.location.pathname+n),e.parentElement.classList.remove("is-open"),e.classList.add("is-active")}}}));var r=Array.from(o).map((function(e){return e.getAttribute("href").substring(1)}));r=r.filter((function(e){return""!==e}));var s=0;onscroll=function(){if(r){var n=window.pageYOffset;r.forEach((function(t){var o=document.getElementById(t),r=o.offsetHeight,s=o.getBoundingClientRect().top+window.pageYOffset-i;n>s&&n<=s+r?e.querySelector("nav.menu a[href*="+t+"]").classList.add("is-active"):e.querySelector("nav.menu a[href*="+t+"]").classList.remove("is-active")}))}var o=window.pageYOffset||document.documentElement.scrollTop;o>s?(e.style.top="0px",e.getBoundingClientRect().top<=t.offsetHeight&&(t.style.top="-"+(t.offsetHeight-e.getBoundingClientRect().top)+"px")):(t.style.top="0px",e.getBoundingClientRect().top<t.offsetHeight&&(e.style.top=t.offsetHeight+"px")),s=o<=0?0:o}}var a=e.querySelector("div.buttons");a&&(l(a.offsetHeight),window.onresize=function(){l(a)})}function l(e){var t=document.querySelector("footer.footer"),n=window.innerWidth;if(t&&n<=992){var o=window.getComputedStyle(t,null).getPropertyValue("padding-bottom");t.style.paddingBottom=o?parseInt(o.substring(0,o.length-2))+e+"px":e+"px"}}}();
//# sourceMappingURL=submenu.js.map