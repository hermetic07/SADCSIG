$(function () {

    
    $('.navbar-toggler').on('click', function(event) {
    	event.preventDefault();
		$(this).closest('.navbar-minimal').toggleClass('open');
	})
});
