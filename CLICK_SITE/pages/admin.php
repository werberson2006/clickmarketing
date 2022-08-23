<?php 

session_start();

include_once("lib/includes.php");

if(!isset($_SESSION['logado'])){

    $_SESSION['mensagem_erro'] = "É necessário efetuar login!";
    header("Location: ?pagina=login");

}else {
    echo "Bem-vindo ".$_SESSION['nome'];
}

?>

<a href="?pagina=actions/sair">Sair</a>