<?php
session_start();
require_once __DIR__ . '/assets/libs/facebook/autoload.php';
date_default_timezone_set('Asia/Kolkata');
	
	// new filename
	$filename = 'pic_'.date('YmdHis') . '.jpeg';

	$url = '';
	if( move_uploaded_file($_FILES['webcam']['tmp_name'],'upload/'.$filename) ){
		$url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI']) . '/upload/' . $filename;
	}

	// Return image url
	echo $url;
   
	/*if (isset($_SESSION["accessToken"])) {

		$url = "https://graph.facebook.com/v2.8/me/accounts?access_token={$_SESSION["accessToken"]}";
		$headers = array("Content-type: application/json");
			 
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_URL, $url);
	    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);  
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);  
		curl_setopt($ch, CURLOPT_COOKIEJAR,'cookie.txt');  
	 	curl_setopt($ch, CURLOPT_COOKIEFILE,'cookie.txt');  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  
		curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.3) Gecko/20070309 Firefox/2.0.0.3"); 
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
		   
		$st=curl_exec($ch); 
		$result=json_decode($st,TRUE);
		foreach ($result['data'] as $item) {
		 	
		 	if ($item['id'] == '308477386226281'){
		 		//
		 		$param = array(
					'access_token' => $item['access_token'],
					// use for server images
					'url' => 'https://scontent.fdel5-1.fna.fbcdn.net/v/t1.0-9/21150078_1676007459077458_1970818713689052469_n.jpg?oh=e67da09b81d8ba8496a582002bcaa08d&oe=5A634F55',
					// 'source' => '',		// use for source image
					'link' => 'http://www.fredericodecastro.com.br/postando-em-uma-pagina-do-facebook-com-php-curl/',			// provide clickable link image
					'description' => 'description',
				 	'message' => "message",
				 	'caption' => "caption",

				);
				
				$ch = curl_init();
				$url = "https://graph.facebook.com/308477386226281/photos";
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_HEADER, false);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_POST, true);
				curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
				
				$response = curl_exec($ch);
				$err = curl_error($ch);
				curl_close($ch);
				
				if ($err) {
				 echo "this is error".$err;
				} else {
				 echo $response;
				}
		 	}
		 }
	}*/