
function sendData(pid,aid,data,resultFunction){
	$.post("index.php?p="+pid+"&a="+aid+"&d="+JSON.stringify(data), 
	function(result) {
		alert(result);
		window[resultFunction](result);
	})
	.fail(function() {
		alert("error");
	})
}
	
jQuery(function($) {'use strict',

	//#main-slider
	$(function(){
		$('#main-slider.carousel').carousel({
			interval: 8000
		});
		
		
		// portfolio filter
		var $portfolio_selectors = $('.portfolio-filter >li>button');
		var $portfolio = $('.portfolio-items');
		$portfolio.isotope({
			itemSelector : '.portfolio-item',
			layoutMode : 'fitRows'
		});
		
		$portfolio_selectors.on('click', function(){
			var selector = $(this).attr('data-filter');
			$portfolio.isotope({ filter: selector });
			$portfolio_selectors.removeClass('active');
			$(this).addClass('active');
			return false;
		});
	});


	// accordian
	$('.accordion-toggle').on('click', function(){
		$(this).closest('.panel-group').children().each(function(){
		$(this).find('>.panel-heading').removeClass('active');
		 });

	 	$(this).closest('.panel-heading').toggleClass('active');
	});

	//Initiat WOW JS
	new WOW().init();

	

	// Contact form
	var form = $('#main-contact-form');
	form.submit(function(event){
		event.preventDefault();
		var form_status = $('<div class="form_status"></div>');
		$.ajax({
			url: $(this).attr('action'),
			data:form.serialize(),
			type:'POST',
			beforeSend: function(){
				form.prepend( form_status.html('<p><i class="fa fa-spinner fa-spin"></i> Email is sending...</p>').fadeIn() );
			}
		}).done(function(data){
			$('#name').val('');
			$('#email').val('');
			$('#phone').val('');
			$('#company_name').val('');
			$('#subject').val('');
			$('#message').val('');
			form_status.html('<p class="text-success">' + data + '</p>').delay(3000).fadeOut();
		});
	});

	
	//goto top
	$('.gototop').click(function(event) {
		event.preventDefault();
		$('html, body').animate({
			scrollTop: $("body").offset().top
		}, 500);
	});	

	//Pretty Photo
	$("a[rel^='prettyPhoto']").prettyPhoto({
		social_tools: false
	});	
});