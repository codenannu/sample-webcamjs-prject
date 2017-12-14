<?php
	
	// current display images count
	$counter = $_POST['counter'];
	
	// images stored directory
	$directory = "upload/";

	// search .jpeg images from images stored directory
	$images = glob($directory."*.jpeg");

	// array that contain images names with path
	$filenames = array();

	$newcounter = 0;
	foreach ($images as $value) {
		$newcounter++;
		if($counter < $newcounter) {
			$filenames[] = $value;
		}
	}

	// array that contain current display images count
	// and images name with path
	$result = array(
		'counter' => $newcounter,
		'images' => $filenames
		);

	echo json_encode($result);

?>