<?php
$host = 'localhost';
$dbname = 'landingpageads';
$user = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro ao conectar ao banco de dados: " . $e->getMessage());
}
?>

<?php
if (!defined('BASE_PATH')) {
    define('BASE_PATH', __DIR__ . '/');
}
