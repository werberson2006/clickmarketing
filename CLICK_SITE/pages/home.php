<?php

include_once("lib/includes.php");


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
    <title>Home | CLICK MARKETING</title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href=<?= URL . "/src/css/principal.css" ?> type="text/css" rel="stylesheet" media="screen,projection" />

    <link rel="icon" href=<?= URL . "/src/img/favicon.ico" ?>>

</head>

<body class="body">

    <nav>
        <div class="nav-wrapper">
            <div class="img">
                <img class="img" src=<?= URL . "/src/img/logo_negativa.png" ?>>
            </div>

            <ul id="nav-mobile" class="sidenav">
                <li><a href="#usuario"></a></li>
                <li><a href="#vendedor"></a></li>
            </ul>
            <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        </div>
    </nav>


    <div class="container">

        <div class="escolha">
            <p class="escolha-text">Escolha uma categoria:</p>
        </div>

        <ul class="collapsible">

            <!--BRINQUEDOS -->
            <li>
                <div class="collapsible-header">
                    <?php
                    $sql = "SELECT * FROM estabelecimentos WHERE categoria = 'BRINQUEDOS'";
                    $resultado = mysqli_query($conexao, $sql);
                    $qtdBrinq = mysqli_num_rows($resultado);
                    ?>
                    <i class="material-icons">child_friendly</i>
                    <p class="categoria">BRINQUEDOS</p>
                    <i class="material-icons">arrow_drop_down</i>

                    <div class="contador">
                        <p class="textContador"><?php echo $qtdBrinq;  ?> loja(s) cadastrada(s)</p>
                    </div>
                </div>

                <div class="collapsible-body row">
                    <?php while ($dados = mysqli_fetch_object($resultado)) : ?>
                    <div class="card col s4"
                        style="margin-right: 10px; align-items: center; text-align: center; border-radius: 20px;">

                        <div class="card-image" style="padding-top: 10px;">


                            <?php
                                echo "<img src='/CLICK_SITE/pages/imagens/logo/" . $dados->logo_loja . "' alt='Foto de exibição' />";

                                ?>

                        </div>

                        <div class="card-content">
                            <span class='card-title'
                                style="font-weight: bold;"><?php echo utf8_encode($dados->nome_loja); ?></span>

                            <a style="font-weight: bold; "
                                href="?pagina=produtos&&loja=<?php echo $dados->id_loja ?>">Ver produtos</a>
                        </div>


                        <!-- MANDA O ID DA LOJA ATRAVÉS DA URL -->
                    </div>

                    <?php endwhile; ?>
                </div>
            </li>

            <!--ROUPAS -->
            <li>
                <div class="collapsible-header">
                    <?php
                    $sql = "SELECT * FROM estabelecimentos WHERE categoria = 'ROUPAS'";
                    $resultado = mysqli_query($conexao, $sql);
                    $qtdRoupas = mysqli_num_rows($resultado);
                    ?>
                    <i class="material-icons">shopping_basket</i>
                    <p class="categoria">ROUPAS</p>
                    <i class="material-icons">arrow_drop_down</i>

                    <div class="contador">
                        <p class="textContador"><?php echo $qtdRoupas;  ?> loja(s) cadastrada(s)</p>
                    </div>
                </div>

                <div class="collapsible-body row">
                    <?php while ($roupas = mysqli_fetch_object($resultado)) : ?>
                    <div class="card col s4"
                        style="margin-right: 10px; align-items: center; text-align: center; border-radius: 20px;">

                        <div class="card-image" style="padding-top: 10px;">


                            <?php
                                echo "<img src='/CLICK_SITE/pages/imagens/logo/" . $roupas->logo_loja . "' alt='Foto de exibição' />";

                                ?>

                        </div>

                        <div class="card-content">
                            <span class='card-title'
                                style="font-weight: bold;"><?php echo utf8_encode($roupas->nome_loja); ?></span>

                            <a style="font-weight: bold; "
                                href="?pagina=produtos&&loja=<?php echo $roupas->id_loja ?>">Ver produtos</a>
                        </div>


                    </div>
                    <?php endwhile; ?>
                </div>
            </li>

            <!--ALIMENTOS -->
            <li>
                <div class="collapsible-header">
                    <?php
                    $sql = "SELECT * FROM estabelecimentos WHERE categoria = 'ALIMENTOS'";
                    $resultado = mysqli_query($conexao, $sql);
                    $qtdAlimentos = mysqli_num_rows($resultado);
                    ?>
                    <i class="material-icons">local_bar</i>
                    <p class="categoria">ALIMENTOS</p>
                    <i class="material-icons">arrow_drop_down</i>

                    <div class="contador">
                        <p class="textContador"><?php echo $qtdAlimentos;  ?> loja(s) cadastrada(s)</p>
                    </div>
                </div>

                <div class="collapsible-body row">
                    <?php while ($alimentos = mysqli_fetch_object($resultado)) : ?>
                    <div class="card col s4"
                        style="margin-right: 10px; align-items: center; text-align: center; border-radius: 20px;">

                        <div class="card-image" style="padding-top: 10px;">


                            <?php
                                echo "<img src='/CLICK_SITE/pages/imagens/logo/" . $alimentos->logo_loja . "' alt='Foto de exibição' />";

                                ?>

                        </div>

                        <div class="card-content">
                            <span class='card-title'
                                style="font-weight: bold;"><?php echo utf8_encode($alimentos->nome_loja); ?></span>

                            <a style="font-weight: bold; "
                                href="?pagina=produtos&&loja=<?php echo $alimentos->id_loja ?>">Ver produtos</a>
                        </div>


                    </div>
                    <?php endwhile; ?>
                </div>
            </li>

            <li>
                <div class="collapsible-header">
                    <?php
                    $sql = "SELECT * FROM estabelecimentos WHERE categoria = 'OUTROS'";
                    $resultado = mysqli_query($conexao, $sql);
                    $qtdOutros = mysqli_num_rows($resultado);
                    ?>
                    <i class="material-icons">?</i>
                    <p class="categoria">OUTROS</p>
                    <i class="material-icons">arrow_drop_down</i>

                    <div class="contador">
                        <p class="textContador"><?php echo $qtdOutros;  ?> loja(s) cadastrada(s)</p>
                    </div>
                </div>

                <div class="collapsible-body row">
                    <?php while ($outros = mysqli_fetch_object($resultado)) : ?>
                    <div class="card col s4"
                        style="margin-right: 10px; align-items: center; text-align: center; border-radius: 20px;">

                        <div class="card-image" style="padding-top: 10px;">


                            <?php
                                echo "<img src='/CLICK_SITE/pages/imagens/logo/" . $outros->logo_loja . "' alt='Foto de exibição' />";

                                ?>

                        </div>

                        <div class="card-content">
                            <span class='card-title'
                                style="font-weight: bold;"><?php echo utf8_encode($outros->nome_loja); ?></span>

                            <a style="font-weight: bold; "
                                href="?pagina=produtos&&loja=<?php echo $outros->id_loja ?>">Ver produtos</a>
                        </div>


                    </div>
                    <?php endwhile; ?>
                </div>
            </li>
        </ul>

    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src=<?= URL . "/src/js/principal.js" ?>></script>
</body>

</html>