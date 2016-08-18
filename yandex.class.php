<?php

	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	define('DEVELOPMENT', true);

	include_once('parser.class.php');

	class Yandex extends Parser
	{
		private $search;
		private $url;
		private $responce;
		private $content;

		public function __construct($_search)
		{
			$this->search = $_search;
			$this->url = 'http://yandex.ru/search/';
		}	

		public function _parseResponce()
		{
			die('stop');
			$temp_inner_data = file_get_contents('temp_file.html');
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
						$current_a_class = $_value->getAttribute("class");
						if ($current_a_class == 'path organic__path' && $iterator < 5) {//path organic__path (каждый второй)
							print_r($_value->getAttribute('href'));
							echo "<br>";
							$iterator++;
						}
					}
					break;
				}
			}
		}

		public function _curlRequest()
	    {
			$curl = curl_init();
			curl_setopt($curl, CURLOPT_URL, $this->url);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_POST, 1);
			curl_setopt($curl, CURLOPT_POSTFIELDS, array ('text' => $this->search));
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			$error = curl_error($curl);
			$this->content = curl_exec($curl);

			if (!empty($error)) {
	            return $error;
	        }
	        return $this->content;
	    }

	    public function _getContent()
	    {
	    	return $this->content;
	    }



	}