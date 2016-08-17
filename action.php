<?php


	$post_text = $_POST['search_text'];



	/*temp block*/
/*	$temp_inner_data = file_get_contents('temp_file.html');

	$dom = new DOMDocument;
	$dom->loadHTML($temp_inner_data);
	$dom->preserveWhiteSpace = false;
	$dom->saveHTML();


	$nodes = array();
	$nodes = $dom->getElementsByTagName("div");
	foreach ($nodes as $element) {
	   	$current_class = $element->getAttribute("class");
	   	if ($current_class == 'content__left') {
	   		$iterator = 0;
	   		$_nodes = $element->getElementsByTagName("a");
	   		foreach ($_nodes as $key => $_value) {
	   			//$current_a_class = $_value->getElementsByTagName("a");
	   			$current_a_class = $_value->getAttribute("class");
	   			//print_r($current_a_class);
	   			//echo "<br>";
	   			if ($current_a_class == 'path organic__path' && $iterator < 5) {//path organic__path (каждый второй)
	   				print_r($_value->getAttribute('href'));
	   				echo "<br>";
	   				$iterator++;
	   			}
	   		}
			break;
	   	}

	}



*/


	/*/temp block*/


	/*for google*/


	$curl = curl_init();

	$search_string = 'http://google.com/search?q=' . $post_text;

	curl_setopt($curl, CURLOPT_URL, $search_string);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
	$out = curl_exec($curl);
	curl_close($curl);
	/*/for google*/


	$dom = new DOMDocument;
	$dom->loadHTML($out);
	$dom->preserveWhiteSpace = false;
	$dom->saveHTML();

	var_dump($dom);

	die('stop');

	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, 'http://yandex.ru/search/');
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_POST, 1);
	curl_setopt($curl, CURLOPT_POSTFIELDS, array ('text' => $post_text));
	curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);  
	$out = curl_exec($curl);
	//Добавить проверку на getError

	

	curl_close($curl);

	var_dump($out);
	die('stop');