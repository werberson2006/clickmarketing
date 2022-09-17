<?php

include_once("lib/includes.php");

if (isset($_POST['cadastrar'])) {

    $id_loja = $_POST['id']; //RECUPERA O ID DA LOJA

    $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
    $preco = mysqli_real_escape_string($conexao, $_POST['preco']);
    $descricao = mysqli_real_escape_string($conexao, $_POST['descricao']);

    $imagem = $_FILES['imagem'];

    if (isset($imagem["name"])) {


        if (!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $imagem["type"])) { //PADRÃO DE IMAGEM
            $_SESSION['mensagem_erro'] = "Formato de imagem inválido!";
            header("Location: ?pagina=admin/admin");
        } else {

            //SE NÃO OCORREU NENHUM ERRO

            preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $imagem["name"], $ext);

            $nome_foto = md5(uniqid(time())) . "." . $ext[1];


            $caminho_foto = "../CLICK_SITE/pages/imagens/produto/" . $nome_foto;

            move_uploaded_file($imagem["tmp_name"], $caminho_foto);

            $sql = "INSERT INTO produtos (id_loja, nome_produto, descricao_produto, preco_produto, imagem, data_criacao) 
                    VALUES ('$id_loja', '$nome', '$descricao', '$preco', '$nome_foto', NOW()) LIMIT 1"; //INSERE NO BANCO DE DADOS
            $resultado = mysqli_query($conexao, $sql);

            if (mysqli_affected_rows($conexao)) {
                $_SESSION['mensagem_sucesso'] = "Produto cadastrado!"; //SUCESSO AO CADASTRAR
                header("Location: ?pagina=admin/admin");
            } else {
                $_SESSION['mensagem_erro'] = "Não foi possível cadastrar!"; //ERRO AO CADASTRAR
                header("Location: ?pagina=admin/admin");
            }
        }
    } else {
        $_SESSION['mensagem_erro'] = "A imagem é obrigatória!"; //ERRO AO ENVIAR DADOS
        header("Location: ?pagina=admin/admin");
    }
} else {
    $_SESSION['mensagem_erro'] = "Preencha todos os campos!"; //ERRO AO CADASTRAR
    header("Location: ?pagina=admin/admin");
}