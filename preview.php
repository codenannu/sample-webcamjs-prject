<!doctype html>
<html>
	<head>
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <title>click</title>
	    
	    <!-- Latest compiled and minified CSS -->
	    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	    <!-- Slider start -->
		<link rel="stylesheet" href="assets/libs/slider/owl.carousel.min.css">
		<link rel="stylesheet" href="assets/libs/slider/owl.theme.default.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
		<!-- Slider end -->
		
		<!-- jQuery library -->
		<script type="text/javascript" src="assets/libs/jQuery/jquery-2.2.3.min.js"></script>
		<!-- Latest compiled JavaScript -->
		<script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
		<!-- Slider start -->
		<script type="text/javascript" src="assets/libs/slider/owl.carousel.js"></script>
	    <!-- Slider end -->
	   
	    <!-- CSS -->
	    <style>
		    html, body {
		    	width: 100%;
		    	height: 100%;
		    	margin: 0;
		    	padding: 0;
		    }
		    .item, .owl-carousel, img {
		    	padding: 0;
		    	margin: 0;
		    	width: 100%;
		    	height: 650px;
		    }
	    </style>
    </head>
    <body>
		<div class="owl-carousel owl-theme">
        	<div class="item">
          		<img class="owl-item" data-src="upload/pic_20171123164212.jpeg" src="upload/pic_20171123164212.jpeg" alt="">
        	</div>
        	<div class="item">
          		<img class="owl-item" data-src="upload/pic_20171123164212.jpeg" src="upload/pic_20171123164212.jpeg" alt="">
        	</div>
    	</div>
            
    	<script type="text/javascript">
    		$(document).ready(function() {
    			// Counter value : count current display images
    			var counter = 0;
    			
    			setInterval(function(){
    				//console.error('counter',counter);
    				$.ajax({
    					type: 'POST',
	    				url: "getImages.php",
	    				data: {counter : counter},
	    				success: function (response) {
	    					//console.log("data",response);
	    					var data = JSON.parse(response);
	    					counter = data.counter;
	    					$.each(data.images, function (i, filename) {
	    						$('.owl-carousel').owlCarousel('add', '<div class="item"><img class="owl-item" data-src="'+filename+'" src="'+filename+'" alt=""></div>').owlCarousel('update');
	    						//$('.owl-carousel').trigger('add.owl.carousel', ['<div class="item"><img class="owl-item" data-src="'+filename+'" src="'+filename+'" alt=""></div>']).trigger('refresh.owl.carousel');
							});
						}
    				});
				}, 10000);
    			
    			// Slider start
              	var owl = $('.owl-carousel');
              	owl.owlCarousel({
	                items: 1,
	                loop: true,
	                margin:20,
	                mouseDrag: true,
	                touchDrag: true,
	                pullDrag: true,
	                freeDrag: true,
	                //rewind: true,
	                dots: false,
	                //video:true,
			        //lazyLoad:true,
			        center:true,
	                autoplay: true,
	                autoplayTimeout: 5000,
	                autoplaySpeed: 10,
	                animateOut: 'hinge',
	    			animateIn: 'hinge',
	    			stagePadding: 0,
	    			smartSpeed: 200,
	    			//autoHeight:true,
	    			//autoWidth:true,
	    			nav: false,
	    			//rtl: true,
	                //autoplayHoverPause: true
              	});

              	/*owl.on('mousewheel', '.owl-stage', function (e) {
				    if (e.deltaY>0) {
				        owl.trigger('next.owl');
				    } else {
				        owl.trigger('prev.owl');
				    }
				    e.preventDefault();
				});*/
			});
    	</script>
	</body>
</html>