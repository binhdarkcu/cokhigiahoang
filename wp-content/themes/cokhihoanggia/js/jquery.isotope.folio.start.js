jQuery(window).load(function(){
	jQuery('.nav-previous').delay(350).css({ 'opacity':'1' });
	
	(function($){
 
		var $container = $('.isotopefolio'),
	   
			// create a clone that will be used for measuring container width
			$containerProxy = $container.clone().empty().css({ visibility: 'hidden','min-height':'0' });   
	   
		$container.after( $containerProxy );  
	   
		  // get the first item to use for measuring columnWidth
		var $item = $container.find('.isoitem').eq(0);
		$container.imagesLoaded(function(){
		$(window).smartresize( function() {
	   
		  // calculate columnWidth
		  var colWidth = Math.floor( $containerProxy.width() / 12 ); // Change this number to your desired amount of columns
	   
		  // set width of container based on columnWidth
		  $container.css({
			  width: colWidth * 12 // Change this number to your desired amount of columns
		  })
		  .isotope({
	   
			// disable automatic resizing when window is resized
			resizable: true,
	   
			// set columnWidth option for masonry
			masonry: {
			  columnWidth: colWidth
			}
		  });
	   
		  // trigger smartresize for first time
		}).smartresize();
		 });
		 
		$container.show()// show whole container
 
		// filter items when filter link is clicked
		$('#filters a').click(function(){
		$('#filters a.active').removeClass('active');
		var selector = $(this).attr('data-filter');
		$container.isotope({ filter: selector, animationEngine : "css" });
		$(this).addClass('active');
		return false;
		 
		});
	  
	} ) ( jQuery );
	
});