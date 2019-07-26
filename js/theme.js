// JavaScript Document


// create a root instance
new Vue({
	
	el: '#site-header-wrap',

    data: {
		searchBtn: false,
		menuBtn: false,
    },

    computed: {
	
	},
	
	methods: {
		
		toggleSearch: function() {
			this.searchBtn = ! this.searchBtn;
			
			if (this.searchBtn) {
				document.querySelector('.main-search').focus();
			}
		},
		
		toggleMenu: function() {
			this.menuBtn = ! this.menuBtn;
		}
	}
	
});


/*--------------------------------------------------------------
# Block: Accordion
--------------------------------------------------------------*/
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
		
	acc[i].addEventListener("click", function() {
			
		this.classList.toggle("active");
		var panel = this.nextElementSibling;
			
		if (panel.style.maxHeight){
			panel.style.maxHeight = null;
		} 
		else {
			panel.style.maxHeight = panel.scrollHeight + "px";
		} 
	});
}

/*--------------------------------------------------------------
# Add 'download' attribute to WP file blocks
--------------------------------------------------------------*/
//var downloadBtn = document.getElementsByClassName("wp-block-file").getElementsByTagName("a");
var downloadBtn = document.getElementsByClassName("wp-block-file");
var i;

for (i = 0; i < downloadBtn.length; i++) {
		
	downloadBtn[i].getElementsByTagName("a")[0].setAttribute('download', "");
	
}

/*--------------------------------------------------------------
# Expand Categories dropdown on Blog page
--------------------------------------------------------------*/
/*var btn = document.getElementById("btn-categories");

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
}*/


/*--------------------------------------------------------------
# Expand Dates dropdown on Blog page
--------------------------------------------------------------*/
/*var btn = document.getElementById("btn-date");

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
}*/



