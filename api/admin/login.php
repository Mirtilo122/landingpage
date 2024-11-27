<?php



if (!defined('BASE_PATH')) {
    define('BASE_PATH', __DIR__ . '../');
}

if (!defined('BASE_URL')) {
    define('BASE_URL', '/landingpages/');
}

require_once __DIR__ . '/../conexao.php';

if(isset($_POST["email"]) || isset($_POST["password"])) {

    // Verificação se o campo de email e senha não estão vazios
    if(strlen($_POST["email"]) == 0) {
        echo "Preencha seu E-mail";
    } else if(strlen($_POST["senha"]) == 0) {
        echo "Preencha sua Senha";
    } else {
        // Aqui usamos PDO para proteger contra SQL Injection
        $email = $_POST["email"];
        $senha = $_POST["senha"];

        // Consultando no banco de dados com uma query preparada
        $sql_code = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha";
        
        // Prepara a query
        $stmt = $pdo->prepare($sql_code);
        
        // Bind dos parâmetros para evitar SQL Injection
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':senha', $senha, PDO::PARAM_STR);

        // Executa a consulta
        $stmt->execute();

        // Verifica se encontrou algum resultado
        $quantidade = $stmt->rowCount();

        if($quantidade > 0) {

            // Fetch do resultado (dado que a consulta retornou ao menos um usuário)
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            // Verifica se a sessão não foi iniciada e a inicia
            if(!isset($_SESSION)){
                session_start();
            }

            // Armazena os dados do usuário na sessão
            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            // Redireciona para a página do painel
            header("Location: painel.php");

        } else {
            // Caso não encontre o usuário
            echo "Falha na Autenticação! E-mail ou Senha incorretos";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste Banco de Dados</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <div class="bloco"> 
        <h1>GERENCIADOR</h1>
        <div class="imag"><img src="css/fasipe.jpg" alt="Logo"></div>
        <div class="login">
            <h2>Acesse sua Conta</h2>
            <form action="" method="POST">
                <p>
                    <label>E-mail</label>
                    <input type="text" name="email" id="email">
                </p>
                <p>
                    <label>Senha</label>
                    <input type="password" name="senha" id="senha">
                </p>
                <p>
                    <button type="submit">Entrar</button>
                </p>
            </form>
            

        </div>
    </div>
</body>
</html>