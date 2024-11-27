<?php
if (!defined('BASE_PATH')) {
    define('BASE_PATH', realpath(__DIR__ . '/../../') . '/'); 
}

if (!defined('BASE_URL')) {
    define('BASE_URL', '/landingpages/'); 
}


require_once BASE_PATH . 'conexao.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Excluir usuário
    $query = "DELETE FROM usuarios WHERE id = :id";
    $stmt = $pdo->prepare($query);

    if ($stmt->execute([':id' => $id])) {
        echo "<script>alert('Usuário excluído com sucesso!'); window.location.href = 'gerenciar_users.php';</script>";
    }
}