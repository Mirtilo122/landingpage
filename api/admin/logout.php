<?php

if (!defined('BASE_PATH')) {
    define('BASE_PATH', __DIR__ . '../');
}

if (!defined('BASE_URL')) {
    define('BASE_URL', '/landingpages/');
}



$linkParaInicio = BASE_URL . 'index.php';

require_once __DIR__ . '/../conexao.php';

if(!isset($_SESSION)){
    session_start();
}

session_destroy();

echo $linkParaInicio;