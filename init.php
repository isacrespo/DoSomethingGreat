<?php

if (!file_exists(__DIR__ . '/config.php')) { // __DIR__ manda a php que busque config.php en su directorio no en la página desde donde venga
  die('ERROR: No existe config.php');
}

session_start();
require('config.php');

setlocale(LC_TIME,SITE_LANG);
date_default_timezone_set(SITE_TIMEZONE);

require('inc/class-db.php');
require('inc/posts.php');
require('inc/helpers.php');

// Iniciamos la base de datos
$app_db = new Db(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE,DB_PORT);

if (isset($_GET['logout'])) {
  logout();
}
