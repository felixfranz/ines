/*
 * Bones Scripts File
*/


/*
 * Get Viewport Dimensions
 * returns object with viewport dimensions to match css in width and height properties
 * ( source: http://andylangton.co.uk/blog/development/get-viewport-size-width-and-height-javascript )
*/
function updateViewportDimensions() {
	var w=window,d=document,e=d.documentElement,g=d.getElementsByTagName('body')[0],x=w.innerWidth||e.clientWidth||g.clientWidth,y=w.innerHeight||e.clientHeight||g.clientHeight;
	return { width:x,height:y };
}
// setting the viewport width
var viewport = updateViewportDimensions();


/*
 * Throttle Resize-triggered Events
 * Wrap your actions in this function to throttle the frequency of firing them off, for better performance, esp. on mobile.
 * ( source: http://stackoverflow.com/questions/2854407/javascript-jquery-window-resize-how-to-fire-after-the-resize-is-completed )
*/
var waitForFinalEvent = (function () {
	var timers = {};
	return function (callback, ms, uniqueId) {
		if (!uniqueId) { uniqueId = "Don't call this twice without a uniqueId"; }
		if (timers[uniqueId]) { clearTimeout (timers[uniqueId]); }
		timers[uniqueId] = setTimeout(callback, ms);
	};
})();

// how long to wait before deciding the resize has stopped, in ms. Around 50-100 should work ok.
var timeToWaitForLast = 100;

gsap.registerPlugin(Draggable,InertiaPlugin);
/*
 * Put all your regular jQuery in here.
*/
jQuery(document).ready(function($) {

// NAVI AUF UND ZU

var nav_toggle = $(".nav_toggle");

function toggle_menu(){

    $("body").toggleClass('menu_open');
    $("html").toggleClass('menu_open');

}

nav_toggle.click(function(){

  toggle_menu();

  return false;
});


  ///////////////////////
  // switch header style
  ///////////////////////
  var scrolled_class = "scrolled";

  $(function () {
    var pageHeader = 150;

    $(window).scroll(function () {

      var scroll = getCurrentScroll();
      if (scroll >= pageHeader) {
        $('body').addClass(scrolled_class);
      }
      else {
        $('body').removeClass(scrolled_class);
      }


    });

    // function to geht scrol position
    function getCurrentScroll() {
      return window.pageYOffset || document.documentElement.scrollTop;
    }
  });



  Draggable.create(".circle", {
    type: "x",
    bounds: ".line-container",
    inertia: true
  });







}); /* end of as page load scripts */
