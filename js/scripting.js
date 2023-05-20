
// scroll navigation effect
var header = document.getElementById("header");
var banner = document.getElementById("banner");
var logo = document.getElementById("logo");
var sublogo = document.getElementById("sublogo");
var navi = document.getElementById("navi");



function initScroll(){
  if(window.pageYOffset > 30){
    header.style.padding = "10px 0 10px 0";
    header.style.background = "#fafcff";
    header.style.boxShadow = "0 2px 10px 0 rgba(0,0,0,0.5)";
    logo.style.fontSize = "36px";
    logo.style.top = "7.5px";
    sublogo.style.color = "#ff6b09";
    sublogo.style.fontSize = "16px";
    navi.style.fontSize = "12px";
    navi.style.padding = "";
    banner.style.opacity = "0";
  }else{
    header.style.padding = "30px 0 30px 0";
    header.style.background = "transparent";
    header.style.boxShadow = "";
    logo.style.fontSize = "56px";
    logo.style.top = "15px";
    sublogo.style.fontSize = "18px";
    sublogo.style.color = "#fc9f6c";
    navi.style.fontSize = "16px";
    banner.style.opacity = "40"
  }
}

window.addEventListener("scroll", initScroll);
// end scroll navigation effect



// navigation menu
$("nav.nav_btn").click(function () {
    $("ul.nav").fadeToggle();
})

$(window).resize(function(){
    if ( $(window).width() > 600 ) {
        $("ul.nav").removeAttr("style");
    }
})
// end navigation menu



// start smooth scroll
$(function() {
   $('a[href*=#]:not([href=#])').click(function() {
     if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {

       var target = $(this.hash);
       target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
       if (target.length) {
         $('html,body').animate({
           scrollTop: target.offset().top
         }, 700);
         return false;
       }
     }
   });
 });
// end smooth scroll


//Smooth Scroll

$(document).ready(function(){
    $(window).scroll(function(){
        if ($(this).scrollTop() > 100) {
            $('.scrollToTop').fadeIn();
        } else {
            $('.scrollToTop').fadeOut();
        }
    });

    $('.scrollToTop').click(function(){
        $('html, body').animate({scrollTop : 0},800);
        return false;
    });
});



$('.myMenu ul li').hover(function(){
    $(this).children('ul.drop-menu').stop(true, false, true).fadeToggle(600);
});



(function($) {
$.fn.menumaker = function(options) {  
 var cssmenu = $(this), settings = $.extend({
   format: "dropdown",
   sticky: false
 }, options);
 return this.each(function() {
   $(this).find(".button").on('click', function(){
     $(this).toggleClass('menu-opened');
     var mainmenu = $(this).next('ul');
     if (mainmenu.hasClass('open')) { 
       mainmenu.slideToggle().removeClass('open');
     }
     else {
       mainmenu.slideToggle().addClass('open');
       if (settings.format === "dropdown") {
         mainmenu.find('ul').show();
       }
     }
   });
   cssmenu.find('li ul').parent().addClass('has-sub');
multiTg = function() {
     cssmenu.find(".has-sub").prepend('<span class="submenu-button"></span>');
     cssmenu.find('.submenu-button').on('click', function() {
       $(this).toggleClass('submenu-opened');
       if ($(this).siblings('ul').hasClass('open')) {
         $(this).siblings('ul').removeClass('open').slideToggle();
       }
       else {
         $(this).siblings('ul').addClass('open').slideToggle();
       }
     });
   };
   if (settings.format === 'multitoggle') multiTg();
   else cssmenu.addClass('dropdown');
   if (settings.sticky === true) cssmenu.css('position', 'fixed');
resizeFix = function() {
  var mediasize = 700;
     if ($( window ).width() > mediasize) {
       cssmenu.find('ul').show();
     }
     if ($(window).width() <= mediasize) {
       cssmenu.find('ul').hide().removeClass('open');
     }
   };
   resizeFix();
   return $(window).on('resize', resizeFix);
 });
  };
})(jQuery);

(function($){
$(document).ready(function(){
$("#cssmenu").menumaker({
   format: "multitoggle"
});
});
})(jQuery);


