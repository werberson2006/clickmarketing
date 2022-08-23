<?php 

include_once("lib/includes.php");
include_once("lib/mensagem.php");

if(!empty($_POST['nome']) && !empty($_POST['email']) && !empty($_POST['senha']) && !empty($_POST['senha2'])){
    $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
    $email = mysqli_real_escape_string($conexao, $_POST['email']);
    $senha = mysqli_real_escape_string($conexao, $_POST['senha']);
    $senha = md5($senha);

    $senha2 = mysqli_real_escape_string($conexao, $_POST['senha2']);
    $senha2 = md5($senha2);

    $sql = "SELECT * FROM vendedores WHERE email_vendedor = '$email' LIMIT 1";
    $result_user = mysqli_query($conexao, $sql);
    $resultado = mysqli_num_rows($result_user);

    if($senha != $senha2){

        $_SESSION['mensagem_erro'] = "As senhas não são iguais! Corrija";
        header("Location: ?pagina=login");

    }else if($resultado == 1){
        $_SESSION['mensagem_erro'] = "Erro. Email já existe!";
        header("Location: ?pagina=login");
    }else {

        $query = "INSERT INTO vendedores (nome_vendedor, email_vendedor, senha_vendedor) VALUES ('$nome', '$email', '$senha')";
        $insert = mysqli_query($conexao, $query);

        if(mysqli_affected_rows($conexao)){
            $_SESSION['mensagem_sucesso'] = "Cadastro realizado com sucesso! :)";
            header("Location: ?pagina=login");
        }

    }


}else {
    $_SESSION['mensagem_erro'] = "Preencha todos os campos! :(";
    header("Location: ?pagina=login");
}

?>