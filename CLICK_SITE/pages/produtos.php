<?php

include_once("lib/includes.php");

$id = $_GET['loja']; //RECUPERA O ID ATRAVÉS DA URL

$sql = "SELECT * FROM estabelecimentos WHERE id_loja = '$id'"; //SELECIONA DA TABELA ESTABELECIMENTOS ONDE O ID LOJA = ID DA URL
$resultado = mysqli_query($conexao, $sql);

$loja = mysqli_fetch_array($resultado);

$sql2 = "SELECT * FROM produtos WHERE id_loja = '$id'";  //SELECIONA DA TABELA PRODUTOS ONDE O ID LOJA = ID DA URL
$resultado2 = mysqli_query($conexao, $sql2); ?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Produtos</title>
    <link rel="stylesheet" href=<?= URL . "/src/css/produtos.css" ?>>
</head>

<body>

    <header>
        <div class="headerLeft">
            <div class="logo">
                <?php echo "<img src='/CLICK_SITE/pages/imagens/logo/" . $loja['logo_loja'] . "' alt='logo'>"; ?>
                <!-- EXIBE A LOGO DA LOJA -->
            </div>
            <span><?php echo $loja['nome_loja']; ?></span> <!-- EXIBE O NOME DA LOJA -->
        </div>
        <div class="headerRight">
            <span class="text">Você está em:</span>
            <div class="page">Produtos</div>
        </div>
    </header>
    <div class="container">

        <!-- EXIBIÇÃO DE PRODUTOS -->
        <div class="grid">
            <?php while ($dados = mysqli_fetch_object($resultado2)) : ?>
            <!-- OBJETO -->
            <div>
                <div class="card">
                    <div class="img">
                        <?php echo "<img src='/CLICK_SITE/pages/imagens/produto/" . $dados->imagem . "' alt='Produto'>"; ?>
                        <!-- EXIBE A IMAGEM DO PRODUTO -->
                    </div>
                    <div class="nome">
                        <?php echo $dados->nome_produto; ?>
                        <!-- EXIBE O NOME DO PRODUTO -->
                    </div>
                    <div class="description">
                        <?php echo $dados->descricao_produto; ?>
                        <!-- EXIBE A DESCRIÇÃO DO PRODUTO -->
                    </div>
                    <div class="price">
                        R$ <?php echo $dados->preco_produto; ?>
                        <!-- EXIBE O PREÇO DO PRODUTO -->
                    </div>
                </div>
            </div>

            <?php endwhile; ?>
        </div>
    </div>
</body>

</html>