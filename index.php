<?php

    $php_version = phpversion();
    if (!version_compare($php_version, '5.3.0')) {
        die("Minimal required PHP version is  5.3.0");
    }

    ?>


    <style>

    	/*.search_form li:first-child, .search_form li:last-child {
    		border-bottom: 1px solid #777;
    	}

    	li {
    		display: list-item;
		    text-align: -webkit-match-parent;
    	}

    	.search_form ul {
		    width: 750px;
		    list-style-type: none;
		    list-style-position: outside;
		    margin: 0px;
		    padding: 0px;
		}
		.search_form li {
			padding: 12px;
			border-bottom: 1px solid #eee;
			position: relative;
		}
		.search_form label {
		    width: 150px;
		    margin-top: 3px;
		    display: inline-block;
		    float: left;
		    padding: 3px;
		}
		.search_form textarea {
		    border: 1px solid #aaa;
		    box-shadow: 0px 0px 3px #ccc, 0 10px 15px #eee inset;
		    border-radius: 2px;
		    padding-right: 30px;
		    -moz-transition: padding .25s;
		    -webkit-transition: padding .25s;
		    -o-transition: padding .25s;
		    transition: padding .25s;
		}
		button.submit {
			background-color: #68b12f;
			border: 1px solid #509111;
    		border-bottom: 1px solid #5b992b;
        	border-radius: 3px;
		}

		button.submit:hover {
			opacity: .85;
    		cursor: pointer;
		}*/


		.wrapper {
		    width: 640px;
		    margin: 200px auto;
		    border: 2px solid #1b94d4;
		}
		#application {
		    width: 300px;
		    margin: 40px auto;
		}

		.searcher-wrapper {
		    width: 300px;
		    margin: 0 auto 10px;
		    overflow: hidden;
		}

		.applicationButton {
		    width: 100%;
		    height: 45px;
		    background: #1b94d4;
		    border: none;
		    border-radius: 3px;
		    text-transform: uppercase;
		    color: #fff;
		    font-size: 14px;
		    cursor: pointer;
		}

		.search_text {
		    width: 276px;
		    padding: 0 10px;
		    height: 40px;
		    border-radius: 3px;
		    background: none;
		    border: 2px solid #1b94d4;
		    margin-bottom: 10px;
		}
    </style>
    

    <form class="search_form" action="action.php" method="post" name="search_form">
	    <ul>
	        <li>
	             <h2>Searcher</h2>
	        </li>
	        <li>
	            <label for="message">search_text:</label>
	            <textarea name="search_text" cols="40" rows="6" required=""></textarea>
	        </li>
	        <li>
	        	<button class="submit" type="submit">Submit Form</button>
	        </li>
	    </ul>
	</form>




	<div class="wrapper">
		<form id="application" action="action.php" method="POST" name="application">
			<input name="search_text" class="search_text" maxlength="20" placeholder="Введите ваш запрос">
			<div class="searcher-wrapper">
				<span>Выберете поисковик: </span>
				<select class="searcher" name="searcher">
					<option value="G">Google</option>
					<option value="Y">Yandex</option>
				</select>
			</div>
			<button class="applicationButton" type="submit" form="application">Отправить запрос</button>
		</form>
	</div>



    <?php

    	if (!empty($_POST['search_text'])) {
    		$search_text = $_POST['search_text'];
    		include_once('yandex.class.php');
            $yandex = new Yandex($search_text);
            $yandex->_curlRequest();
            //$yandex->_parseResponce();
            var_dump($yandex->_getContent());
            die('stop'); 
    	}
