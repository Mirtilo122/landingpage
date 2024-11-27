<?php

if (!defined('BASE_PATH')) {
    define('BASE_PATH', realpath(__DIR__ . '/../../') . '/'); 
}

if (!defined('BASE_URL')) {
    define('BASE_URL', '/landingpages/'); 
}

$linkParaPainel = BASE_URL . 'admin/painel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $linkMentor = $_POST['linkMentor'] ?? '';
    $linkComercial = $_POST['linkComercial'] ?? '';

    $linkMentor = filter_var($linkMentor, FILTER_SANITIZE_URL);
    $linkComercial = filter_var($linkComercial, FILTER_SANITIZE_URL);

    $configPath = BASE_PATH . '/partes_essenciais/config.php';

    $configContent = <<<PHP
<?php
\$linkMentor = '$linkMentor';
\$linkComercial = '$linkComercial';
?>
PHP;

    if (file_put_contents($configPath, $configContent)) {
        echo "Configurações salvas com sucesso.";
    } else {
        echo "Erro ao salvar configurações.";
    }


}

?>
<html>
    <a href="<?php echo $linkParaPainel; ?>">Voltar</a>
</html>

