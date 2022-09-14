<?php

session_start();

include_once("lib/includes.php");


if (!empty($_POST['email']) && !empty($_POST['senha'])) {
    $email = mysqli_real_escape_string($conexao, $_POST['email']);
    $senha = mysqli_real_escape_string($conexao, $_POST['senha']);
    $senha = md5($senha);

    $sql = "SELECT * FROM vendedores WHERE email_vendedor = '$email' AND senha_vendedor = '$senha' LIMIT 1";
    $select = mysqli_query($conexao, $sql);
    $vendedor = mysqli_fetch_assoc($select);

    if (isset($vendedor)) {

        $_SESSION['logado'] = true;

        $_SESSION['id'] = $vendedor['id_vendedor'];
        $_SESSION['nome'] = $vendedor['nome_vendedor'];
        $_SESSION['email'] = $vendedor['email_vendedor'];
        $_SESSION['senha'] = $vendedor['senha_vendedor'];

        $_SESSION['mensagem_sucesso'] = "Login efetuado com sucesso!";
        header("Location: ?pagina=admin/admin");
    } else {
        $_SESSION['mensagem_erro'] = "Email ou senha inválidos! :(";
        header("Location: ?pagina=login");
    }
} else {
    $_SESSION['mensagem_erro'] = "Preencha todos os campos! :(";
    header("Location: ?pagina=login");
}
