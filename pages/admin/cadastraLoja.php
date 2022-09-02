<?php

include_once("lib/includes.php");


if(isset($_POST['cadastrar'])){
    
    $id = $_POST['id'];

    $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
    $telefone = mysqli_real_escape_string($conexao, $_POST['telefone']);
    $rua = mysqli_real_escape_string($conexao, $_POST['rua']);
    $bairro = mysqli_real_escape_string($conexao, $_POST['bairro']);
    $numero = mysqli_real_escape_string($conexao, $_POST['numero']);
    $cidade = mysqli_real_escape_string($conexao, $_POST['cidade']);

    $categoria = mysqli_real_escape_string($conexao, $_POST['categoria']);
    $logo = $_FILES['logo'];

    $sql = "SELECT * FROM estabelecimentos WHERE id_vendedor = '$id'"; //BUSCA PARA VERIFICAR SE O VENDEDOR JÁ POSSUI UM ESTABELECIMENTO
    $executa = mysqli_query($conexao, $sql);

    if(mysqli_num_rows($executa) > 0){
        $_SESSION['mensagem_erro'] = "Você já cadastrou um estabelecimento!"; //CASO ENCONTRE UM ESTABELECIMENTO NO ID DO VENDEDOR
        header("Location: ?pagina=admin/admin");
    }else{ 
        
        //CASO SEJA UM NOVO USUÁRIO, PROSSEGUE

        if(!empty($_POST['categoria'])){ //VERIFICA SE A CATEGORIA NÃO ESTÁ VAZIA

            if(isset($logo["name"])){


                if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $logo["type"])){ //PADRÃO DE IMAGEM
                    $_SESSION['mensagem_erro'] = "Formato de imagem inválido!";
                    header("Location: ?pagina=admin/admin");
                }else{
                    
                    //SE NÃO OCORREU NENHUM ERRO
        
                    preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $logo["name"], $ext);
        
                    $nome_logo = md5(uniqid(time())) . "." . $ext[1];
                    
                    
                    $caminho_logo = "../CLICK_SITE/pages/fotos/" . $nome_logo;
        
                    move_uploaded_file($logo["tmp_name"], $caminho_logo);
        
                    $sql = "INSERT INTO estabelecimentos (id_vendedor, nome_loja, telefone_loja, rua_loja, bairro_loja, numero_loja, cidade_loja, categoria, logo_loja)
                            VALUES ('$id', '$nome', '$telefone', '$rua', '$bairro', '$numero', '$cidade', '$categoria', '$nome_logo') LIMIT 1";
                    $resultado = mysqli_query($conexao, $sql);
        
                    if(mysqli_affected_rows($conexao)){
                        $_SESSION['mensagem_sucesso'] = "Estabelecimento cadastrado!"; //SUCESSO AO CADASTRAR
                        header("Location: ?pagina=admin/admin");
                    }else {
                        $_SESSION['mensagem_erro'] = "Não foi possível cadastrar!"; //ERRO AO CADASTRAR
                        header("Location: ?pagina=admin/admin");
                    }
                }
            }

        }else {
            $_SESSION['mensagem_erro'] = "Selecione uma categoria!"; //CASO A CATEGORIA VIER VAZIA
            header("Location: ?pagina=admin/admin");
        }
    }

}else { 
    $_SESSION['mensagem_erro'] = "Preencha todos os campos!"; //CASO VIER TUDO VAZIO
    header("Location: ?pagina=admin/admin");
}