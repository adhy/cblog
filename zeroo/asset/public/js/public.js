var url = window.location;
// Will only work if string in href matches with location
$('ul.main-menu li a[href="'+ url +'"]').parent().addClass('active');
$('ul.navbar-nav li a[href="'+ url +'"]').parent().addClass('active');
// Will also work for relative and absolute hrefs
$('ul.main-menu li a').filter(function() {return this.href == url;}).parent().addClass('active');
$('ul.navbar-nav li a').filter(function() {return this.href == url;}).parent().addClass('active');


    jQuery(function($) {
    //Goto Top
	$('.gototop').click(function(event) {
		 event.preventDefault();
		 $('html, body').animate({
			 scrollTop: $("body").offset().top
		 }, 5000);
	});	
	});
$('.carousel').carousel({
        interval: 2000 //changes the speed
    });	
    
