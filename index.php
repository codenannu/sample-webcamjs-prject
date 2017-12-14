<!doctype html>
<html>
	<head>
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <title>click</title>
	    
	    <!-- Latest compiled and minified CSS -->
	    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
		
		<!-- jQuery library -->
		<script type="text/javascript" src="assets/libs/jQuery/jquery-2.2.3.min.js"></script>
		<!-- Latest compiled JavaScript -->
		<script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
		<!-- Webcam Jquery -->
		<script type="text/javascript" src="assets/libs/webcam/webcam.min.js"></script>
	    
	    <!-- CSS -->
	    <style>
	    	.container, .row {
		    	width: 100%;
		    }

		    .container, .row, #camera_view, #slider_view {
		    	margin: 0;
		    	padding: 0;
		    }

		    #my_camera, video {
		        width: 100% !important;
		        height: 600px !important;
		        position: relative;
		        top: 0;
		        left: 0;
		    }

		    video {
		    	object-fit: fill;
		    }

		    #loading {
		    	position: absolute;
		    	top: 17%;
				left: 35%;
		    }

		    #loading-image {
		    	width: 50%;
		    }

		    #slider_view {
		    	height: 600px;
		    }

		    #results {
		    	overflow: auto;
			    overflow-x: hidden;
		    }

		</style>
	</head>
	<body>
		<div class="container">
		  	<div class="row">
		    	<div class="col-lg-10" id="camera_view">
					<!-- camera view -->
					<div id="my_camera"></div>
				</div>
				<div class="col-lg-2" id="slider_view">
					<!-- results display -->
				   	<div id="results"  ></div>
				</div>
			</div>
		</div>
		
		<input type=button value="Take Snapshot" onClick="clickSnap()">

		<!-- Code to handle taking the snapshot and displaying it locally -->
		<script language="JavaScript" type="text/javascript">
			// Configure a few settings and attach camera
			Webcam.set({
				width: 640,
				height: 480,
				image_format: 'jpeg',
				jpeg_quality: 90,

				// flip horizontal (mirror mode)
				//flip_horiz: true,

				// device capture size
				/*dest_width: 640,
				dest_height: 480,*/
					
				// final cropped size
				/*crop_width: 480,
				crop_height: 480,*/

				// using the HTML5 user media constraints object
				/*constraints: {
					width: 320, // { exact: 320 },
					height: 180, // { exact: 180 },
					facingMode: 'user',
					frameRate: 30,
				}*/

				// Flash on or off
				/*force_flash: true,
				enable_flash: false,*/

				/*user_callback: function(data_uri) {
					// display results in page
					document.getElementById('results').innerHTML = 
						'<h2>Here is your large image:</h2>' + 
						'<img src="'+data_uri+'"/>';
				}*/
			});
			Webcam.attach( '#my_camera' );

			// reset attach camera
			/*Webcam.reset();*/
			
			// freeze attach camera
			/*Webcam.freeze();*/
			
			// unfreeze attach camera
			/*Webcam.unfreeze();*/
			
			// preload shutter audio clip
			var shutter = new Audio();
			shutter.autoplay = false;
			shutter.src = navigator.userAgent.match(/Firefox/) ? 'assets/media/shutter.ogg' : 'assets/media/shutter.mp3';

			// A button for taking snaps
			var loading = '';
			function clickSnap () {
				var loading = $(' <div id="loading"> <img src="assets/media/timer.gif" id="loading-image" alt="Loading..." /> </div>');
				$( "#my_camera" ).append( loading );
				setTimeout(take_snapshot, 5000);
			}

			function take_snapshot() {
				var loading = '';
				$( "#loading-image" ).attr('src', null);
				$( "#loading" ).remove();
				// play sound effect
				shutter.play();

				// take snapshot and get image data
				Webcam.snap( function(data_uri) {
					// display results in page
					var img = new Image();
					img.src = data_uri;
					img.width = '250';
					img.height = '180'
					document.getElementById('results').appendChild( img );
					Webcam.upload( data_uri, 'upload.php', function(code, text) {
						console.log('Save successfully');
						console.error("text-",text);
						console.error("code-",code);
	            	});
				} );
			}
		</script>
	</body>
</html>