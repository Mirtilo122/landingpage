<?php

if (!defined('BASE_PATH')) {
    define('BASE_PATH', __DIR__ . '../');
}

if (!defined('BASE_URL')) {
    define('BASE_URL', '/landingpages/');
}



$linkParaInicio = BASE_URL . 'admin/login.php';

require_once __DIR__ . '/../conexao.php';

if(!isset($_SESSION)){
    session_start();
}

session_destroy();

?>

<html>
    <a href="<?php echo $linkParaInicio; ?>">Voltar</a>
</html>
