<?php

ini_set("display_errors",1);
error_reporting(E_ALL);
define('DEVELOPMENT', true);

    $php_version = phpversion();
    if (!version_compare($php_version, '5.3.0')) {
        die("Minimal required PHP version is  5.3.0");
    }

    ?>

    <form action="action.php" method="post">
        <input type="text" name="search_text" value="">
        <button type="submit"></button>
    </form>
