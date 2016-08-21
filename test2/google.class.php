<?php
	include_once('parser.class.php');

	class Google extends Parser
	{
		private $search;
		private $url;
		private $responce;
		private $content;

		public function __construct($_search)
		{
			$this->search = $_search;
			$this->url = 'http://google.com/search?q=';
			$this->responce = null;
			$this->content = null;
		}	

		public function _parseResponce()
		{
			/*$temp_inner_data = file_get_contents('temp_file.html'); */


			$dom = new DOMDocument();
			$dom->loadHTML($this->responce);

			foreach($dom->getElementsByTagName('cite') as $link) {
		        echo $link->getAttribute('href');
		        echo "<br />";
			}


			die('stop');

			$dom = new DOMDocument;
			$dom->loadHTML($this->responce);
			$dom->preserveWhiteSpace = false;
			$dom->saveHTML();

			var_dump($dom);
			die('stop');

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
			$search_string = $this->url . $this->search;
			curl_setopt($curl, CURLOPT_URL, $search_string);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
			curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
			$this->responce = curl_exec($curl);
			$error = curl_error($curl);
			curl_close($curl);

			if (!empty($error)) {
	            return $error;
	        }
	        return $this->responce;
	    }

	    public function _execute()
	    {
	    	$this->_curlRequest();
	    	if (!empty($this->responce)) {
	    		$this->_parseResponce();
	    	}

	    }


	}