<?php

	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	define('DEVELOPMENT', true);


	include_once('viewer.class.php');

	Viewer::view('form');

	if (!empty($_POST['search_text'])) {
		$search_text = $_POST['search_text'];
		$content = "";
		if ($_POST['searcher'] == 'G') {
			include_once('google.class.php');
			$searcher = new Google($search_text);
		} elseif ($_POST['searcher'] == 'Y') {
			include_once('yandex.class.php');
			$searcher = new Yandex($search_text);
		}

		$links = $searcher->_execute();


		//$links = array('5', '1', '2', '3');

		foreach ($links as $key => $link) {
			Viewer::view('result_list', $link);
		}

	}
