<?php

include_once("lib/includes.php");

//Select
if (isset($_GET['id'])) :
    $id = mysqli_escape_string($conexao, $_GET['id']);

    $sql = "SELECT * FROM produtos WHERE id_produto = '$id'";
    $resultado = mysqli_query($conexao, $sql);

    $dados = mysqli_fetch_array($resultado);
endif;
?>

<head>
    <title>Editar | CLICK MARKETING</title>
</head>

<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 class="light"> Editar Produto </h3>
        <form action="?pagina=admin/update" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $dados['id_produto']; ?>">

            <div class="input-field col s12">
                <span> Nome Produto </span>
                <input placeholder="Nome do produto..." type="text" name="nome" id="nome"
                    value="<?php echo utf8_encode($dados['nome_produto']); ?>" required class="validate">
            </div>

            <div class="input-field col s12">
                <span> Preço </span>
                <input placeholder="Ex: 10,00" type="text" name="preco" id="preco"
                    value="<?php echo utf8_encode($dados['preco_produto']); ?>" required>

            </div>

            <div class="input-field col s12">
                <span> Descrição </span>
                <input placeholder="Descrição" type="text" name="descricao" id="descricao"
                    value="<?php echo utf8_encode($dados['descricao_produto']); ?>" maxlength="50" required>

            </div>

            <div class="row">
                <div class="file-field input-field col s6">
                    <div class="btn blue">
                        <span>FOTO DO PRODUTO</span>
                        <input type="file" name="imagem" id="imagem" required>
                    </div>

                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>
            </div>

            <div class="row">
                <button type="submit" name="btn-editar" class="btn"> Atualizar </button>
                <a href="?pagina=admin/admin" class="btn green"> Página de Administrador </a>

            </div>

    </div>
</div>