
//Document ready
//Slider1
$(function(){
	var slider= $('#slider');
	var slides= slider.find('.slides');
	var slide= slides.find('.slide');
	var animationSpeed= 2000;
	var currentSlide= 0;
	var interval;
	

	//make it run every ....
	function startSlider(){
		interval= setInterval(function(){
			//every two seconds were gonna change slides
			slides.animate({'margin-left':'-=570px'}, animationSpeed, function(){
				++currentSlide;
				if(currentSlide === slide.length){
					currentSlide= 0;
					slides.css('margin-left', 0);

					
					// slides.fadeOut(3000);
				}
			});

		}, 7000);
	}

	function stopSlider(){
		clearInterval(interval);
	}

	//on mouse-on
	slider.on('mouseenter', stopSlider).on('mouseleave', startSlider);

	startSlider();


	//Slider2
	var slider2= $('#slider2');
	var slides2= slider2.find('.slides2');
	var slide2= slides2.find('.slide2');
	var animationSpeed2= 4000;
	var currentSlide2= 0;
	var interval2;
	
	function startSlider2(){
		interval2= setInterval(function(){
			//every four seconds were gonna change slides
			slides2.animate({'margin-left':'-=540px'}, animationSpeed2, function(){
				++currentSlide2;
				if(currentSlide2 === slide2.length){
					currentSlide2= 0;
					slides2.css('margin-left', 0);
				}
			});

		}, 6000);
	}

	function stopSlider2(){
		clearInterval(interval2);
	}

	//on mouse-on
	slider2.on('mouseenter', stopSlider2).on('mouseleave', startSlider2);

	startSlider2();



	//Slider3
	$('.cycle1').cycle({
		fx:      'scrollDown', 
	    speed:    300, 
	    timeout:  2000 
	});


	//Slider4 
	$('.cycle2').cycle({
            next: '#next2',
            prev: '#prev2'
      });

});
	

