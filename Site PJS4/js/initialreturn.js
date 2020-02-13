document.addEventListener('DOMContentLoaded', function() {
	window.onscroll = function(ev) {
		  document.getElementById("backtotop").className = (window.pageYOffset > 100) ? "Visible" : "notVisible";
	};
});

function backtotop() {
	window.scrollTo({
		top: 0,
		left: 0,
		behavior: 'smooth'
	});
}