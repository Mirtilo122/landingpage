<?php 

if(!isset($_SESSION)){
    session_start();
}

if(!isset($_SESSION['id'])){
    die("Você precisa estar logado para acessar essa página. <p><a href=\"login.php\">ENTRAR</a></p>");
}

?>