<?php

    $php_version = phpversion();
    if (!version_compare($php_version, '5.3.0')) {
        die("Minimal required PHP version is  5.3.0");
    }

    die('stop');
