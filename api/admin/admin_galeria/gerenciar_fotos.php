<?php

if (!defined('BASE_PATH')) {
    define('BASE_PATH', realpath(__DIR__ . '/../../') . '/'); 
}

if (!defined('BASE_URL')) {
    define('BASE_URL', '/landingpages/'); 
}

require_once BASE_PATH . 'conexao.php';

$linkParaHeader = $_SERVER['DOCUMENT_ROOT'] . '/landingpages/admin/header_admin.php';
$linkParaCss = "../css/main.css";

// Adicionar foto
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['imagem'])) {
    $imagem = $_FILES['imagem'];
    $nomeImagem = uniqid() . "_" . basename($imagem['name']);
    $caminho = "uploads/" . $nomeImagem;

    if (move_uploaded_file($imagem['tmp_name'], $caminho)) {
        $sql = "INSERT INTO fotos (imagem, visivel) VALUES (:imagem, 'sim')";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':imagem' => $nomeImagem]);
    }
}

// Atualizar visibilidade
if (isset($_POST['toggle_visivel'])) {
    $id = $_POST['id'];
    $visivel = $_POST['visivel'] === 'sim' ? 'nao' : 'sim';

    $sql = "UPDATE fotos SET visivel = :visivel WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':visivel' => $visivel, ':id' => $id]);
}

// Deletar foto
if (isset($_POST['delete'])) {
    $id = $_POST['id'];

    // Apagar o arquivo de imagem
    $sql = "SELECT imagem FROM fotos WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
    $imagem = $stmt->fetch(PDO::FETCH_ASSOC)['imagem'];

    if ($imagem && file_exists("uploads/" . $imagem)) {
        unlink("uploads/" . $imagem);
    }

    // Deletar do banco de dados
    $sql = "DELETE FROM fotos WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
}

// Listar todas as fotos
$sql = "SELECT * FROM fotos ORDER BY data DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$fotos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Gerenciar Fotos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="<?php echo $linkParaCss; ?>">
</head>
<body>
    
<div class="espacodaheaderkkkkkkk"></div>

<div class="espacodaheaderkkkkkkk"></div>
    <h1>Gerenciar Fotos</h1>

    <!-- Formulário para adicionar foto -->
    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="imagem" required>
        <button type="submit">Adicionar Foto</button>
    </form>

    <!-- Lista de fotos -->
    <table>
        <thead>
            <tr>
                <th>Imagem</th>
                <th>Data</th>
                <th>Visível</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($fotos as $foto): ?>
                <tr>
                    <td>
                        <img src="uploads/<?php echo htmlspecialchars($foto['imagem']); ?>" alt="Foto <?php echo $foto['id']; ?>" style="width: 100px;">
                    </td>
                    <td><?php echo $foto['data']; ?></td>
                    <td>
                        <form method="POST">
                            <input type="hidden" name="id" value="<?php echo $foto['id']; ?>">
                            <input type="hidden" name="visivel" value="<?php echo $foto['visivel']; ?>">
                            <label>
                                <input type="checkbox" name="toggle_visivel" onchange="this.form.submit()" <?php echo $foto['visivel'] === 'sim' ? 'checked' : ''; ?>>
                                <?php echo ucfirst($foto['visivel']); ?>
                            </label>
                        </form>
                    </td>
                    <td>
                        <form method="POST">
                            <input type="hidden" name="id" value="<?php echo $foto['id']; ?>">
                            <button type="submit" name="delete">Deletar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php include($linkParaHeader); ?>
</body>
</html>
