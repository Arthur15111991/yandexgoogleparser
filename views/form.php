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