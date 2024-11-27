<?php

if (!defined('BASE_PATH')) {
    define('BASE_PATH', realpath(__DIR__ . '/../../') . '/');
}

if (!defined('BASE_URL')) {
    define('BASE_URL', '/landingpages/');
}

// Caminho para o arquivo de configuração
$configFile = BASE_PATH . 'partes_essenciais/config.php';

// Valida se o arquivo de configuração existe
if (!file_exists($configFile)) {
    die('Erro: Arquivo de configuração não encontrado.');
}

// Lê o conteúdo do arquivo
$configContent = file_get_contents($configFile);
if ($configContent === false) {
    die('Erro ao ler o arquivo de configuração.');
}

// Remove o fechamento PHP se presente
if (strpos($configContent, '?>') !== false) {
    $configContent = str_replace('?>', '', $configContent);
}

// Sanitiza os dados recebidos
$rodapeData = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
if (!$rodapeData) {
    die('Erro: Dados inválidos enviados.');
}

// Constrói as configurações para salvar
$newConfig = "\n// Configurações do rodapé\n";
foreach ($rodapeData as $key => $value) {
    $newConfig .= sprintf("\$config['%s'] = '%s';\n", $key, addslashes($value));
}

// Adiciona as configurações ao arquivo
if (file_put_contents($configFile, $configContent . $newConfig) === false) {
    die('Erro ao salvar as configurações no arquivo.');
}

// Redireciona para a página de edição com sucesso
header('Location: editar_rodape.php?status=sucesso');
exit;
?>
