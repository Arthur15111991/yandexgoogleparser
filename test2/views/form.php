<style>
		.wrapper {
		    width: 640px;
		    margin: 200px auto;
		    border: 2px solid #1b94d4;
		}
		#request {
		    width: 300px;
		    margin: 40px auto;
		}

		.searcher-wrapper {
		    width: 300px;
		    margin: 0 auto 10px;
		    overflow: hidden;
		}

		.request-button {
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
		.single-line {
			width: 300px;
		    margin: auto;
		}
    </style>


<div class="wrapper">
	<form id="request" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" name="request">
		<input name="search_text" class="search_text" maxlength="20" placeholder="Введите ваш запрос">
		<div class="searcher-wrapper">
			<span>Выберете поисковик: </span>
			<select class="searcher" name="searcher">
				<option value="G">Google</option>
				<option value="Y">Yandex</option>
			</select>
		</div>
		<button class="request-button" type="submit" form="request">Отправить запрос</button>
	</form>
</div>