<?php

require_once 'functions.php';
require_once 'config/db.php';

$link = mysqli_init();
mysqli_options($link, MYSQLI_OPT_INT_AND_FLOAT_NATIVE, 1);
$con = mysqli_real_connect($link, $db['host'], $db['user'], $db['password'], $db['database']);

mysqli_set_charset($link, "utf8");
date_default_timezone_set('Europe/Moscow');
