<?php

include_once("lib/includes.php");


if (isset($_POST['btn-editar'])) {

    //Recupera os dados dos campos
    $nome = mysqli_escape_string($conexao, $_POST['nome']);
    $descricao = mysqli_escape_string($conexao, $_POST['descricao']);
    $foto = $_FILES['imagem'];
    $id = $_POST['id'];

    if (!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto["type"])) { //PADRÃO DE IMAGEM
        $_SESSION['mensagem_erro'] = "Formato de imagem inválido!";
        header("Location: ?pagina=admin/admin");
    } else {

        //SE NÃO OCORREU NENHUM ERRO
        preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);

        $nome_foto = md5(uniqid(time())) . "." . $ext[1];

        $caminho_foto = "../CLICK_SITE/pages/imagens/produto/" . $nome_foto;

        move_uploaded_file($foto["tmp_name"], $caminho_foto);

        //ATUALIZAR NO BANCO DE DADOS
        $sql = "UPDATE produtos SET nome_produto = '$nome', descricao_produto = '$descricao', imagem = '$nome_foto', data_edicao = NOW() WHERE id_produto = '$id' LIMIT 1";
        $resultado = mysqli_query($conexao, $sql);

        if (mysqli_affected_rows($conexao)) {
            $_SESSION['mensagem_sucesso'] = "Produto atualizado!"; //SUCESSO AO ATUALIZAR
            header("Location: ?pagina=admin/admin");
        } else {
            $_SESSION['mensagem_erro'] = "Não foi possível atualizar!"; //ERRO AO ATUALIZAR
            header("Location: ?pagina=admin/admin");
        }
    }
} else {
    $_SESSION['mensagem_erro'] = "Preencha todos os campos!"; //CASO VIER TUDO VAZIO
    header("Location: ?pagina=admin/admin");
}