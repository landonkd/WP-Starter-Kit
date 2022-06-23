"use strict";

// JavaScript Document
// create a root instance

/*new Vue({
  el: '#page',
  data: {

  },

  computed: {

  },

  methods: {

  }
});*/


/*--------------------------------------------------------------
# Debounce
# 
# We will run this function with X amount of frequency to 
# unecessary function calls
--------------------------------------------------------------*/
function debounce(func, wait = 20, immediate = true) {
    var timeout;
    return function() {
    var context = this, args = arguments;
    var later = function() {
        timeout = null;
        if (!immediate) func.apply(context, args);
    };
    var callNow = immediate && !timeout;
    clearTimeout(timeout);
    timeout = setTimeout(later, wait);
    if (callNow) func.apply(context, args);
    };
}


/*--------------------------------------------------------------
# Toggle Mobile Menu
--------------------------------------------------------------*/
var mobileMenu = document.getElementById( 'page' );

function toggleMenu() {
  mobileMenu.classList.toggle( 'menu-active' );
}

// Close menu if click away from it
var primary = document.getElementById( 'primary' );
window.addEventListener('click', function(e){
    if (primary.contains(e.target)){
		mobileMenu.classList.remove( 'menu-active' );
  	} 
})


/*--------------------------------------------------------------
# Toggle Accordion Block
--------------------------------------------------------------*/
function toggleAccordion(event) {
	console.log(event.target);
  	event.target.classList.toggle( 'active' );
	event.target.setAttribute(
		'aria-expanded', 
		event.target.getAttribute('aria-expanded') === 'true' 
			? 'false' 
			: 'true'
	);
}


/*--------------------------------------------------------------
# Make gutenberg table block responsive 
--------------------------------------------------------------*/
// element that will be wrapped
var el = document.querySelector( "figure.wp-block-table" );

if (el) {
	// create wrapper container
	var wrapper = document.createElement('div');
	wrapper.className = "table-responsive";

	// insert wrapper before el in the DOM tree
	el.parentNode.insertBefore(wrapper, el);

	// move el into wrapper
	wrapper.appendChild(el);
}


/*--------------------------------------------------------------
# Expand Categories dropdown on Blog page
--------------------------------------------------------------*/
var btn = document.getElementById("btn-categories");

if (btn) {
	
	btn.addEventListener("click", function() {

		this.classList.toggle("active");

		var blogCategories = document.getElementById("blog-categories");

		if (blogCategories.style.maxHeight){
			blogCategories.style.maxHeight = null;
		} 
		else {
			blogCategories.style.maxHeight = blogCategories.scrollHeight + "px";
		} 

	});
}


/*--------------------------------------------------------------
# Expand Dates dropdown on Blog page
--------------------------------------------------------------*/
var btn = document.getElementById("btn-date");

if (btn) {
	
	btn.addEventListener("click", function() {

		this.classList.toggle("active");

		var blogCategories = document.getElementById("blog-date");

		if (blogCategories.style.maxHeight){
			blogCategories.style.maxHeight = null;
		} 
		else {
			blogCategories.style.maxHeight = blogCategories.scrollHeight + "px";
		} 

	});
}


/*---------------------------------------------------------------------------
# Animate on Scroll into View
# 
# Uses Animate.css
# https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css
---------------------------------------------------------------------------*/

// Get all the elements that are to be animated
const animateElements = document.querySelectorAll('.animate__animated');

// Check for elements scrolling into view, then add the animation class
function checkAnimateElements(e) {
	
	animateElements.forEach(animateEl => {
	
		// Set opacity 0 before animating
		animateEl.style.opacity = 0;

		// slide in when halfway through the image
		const slideInAt = (window.scrollY + window.innerHeight) - (animateEl.clientHeight / 2);
		
		// for scrolling back up from bottom of page
		const elBottom = animateEl.offsetTop + animateEl.clientHeight;
		const isHalfShown = slideInAt > animateEl.offsetTop;
		const isNotScrolledPast = window.scrollY < elBottom;

		// Add the class to trigger the desired animation
		if (isHalfShown && isNotScrolledPast) {
			animateEl.classList.add('animate__fadeInLeft');
			animateEl.style.opacity = 1;
		}
		// If you want to re-animate when you scroll back up
		// else {
		// 	animateEl.classList.remove('animate__fadeInLeft');
		// }
    });
}

// Run the check function with debounce
window.addEventListener('scroll', debounce(checkAnimateElements));