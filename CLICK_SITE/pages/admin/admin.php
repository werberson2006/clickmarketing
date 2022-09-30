<?php

include_once("lib/includes.php");

if (!isset($_SESSION['logado'])) { //SE O USUÁRIO NÃO FEZ LOGIN

    $_SESSION['mensagem_erro'] = "É necessário efetuar login!";
    header("Location: ?pagina=login");
}

$id = $_SESSION['id'];

$sql = "SELECT * FROM estabelecimentos WHERE id_vendedor = '$id'"; //SELECIONA O ESTABELECIMENTOS
$executa = mysqli_query($conexao, $sql);
$dados = mysqli_fetch_assoc($executa);

$loja = $dados['id_loja'];

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
    <title>Admin | CLICK MARKETING</title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href=<?= URL . "/src/css/admini.css" ?> type="text/css" rel="stylesheet" media="screen,projection" />

    <link rel="icon" href=<?= URL . "/src/img/favicon.ico" ?>>

</head>

<body>

    <ul id="slide-out" class="sidenav sidenav-fixed">

        <li> <a style="color: white; font-size: 18px;"><i class="material-icons prefix">person</i>OLÁ
                <?php echo $_SESSION['nome'] ?>!</a></li>

        <li> <a style="color: white;"><span>Loja:</span><i class="material-icons prefix">store</i> <?php if (!empty($dados['nome_loja'])) {
                                                                                                        echo $dados['nome_loja'];
                                                                                                    } else {
                                                                                                        echo "...";
                                                                                                    } ?> </a></li>

        <li> <a style="color: white;"><span>EDITAR ESTABELECIMENTO</span><i class="material-icons prefix">edit</i></a>
        </li>

        <li> <a style="color: white;" href=<?= URL . "?pagina=actions/sair" ?>><i
                    class="material-icons prefix">logout</i>SAIR DO SISTEMA</a></li>

    </ul>

    <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>

    <div class="row">
        <div class="col s9 right">
            <ul class="tabs">
                <li class="tab col s4"><a href="#cadastro">CADASTRAR LOJA</a></li>
                <li class="tab col s4"><a href="#novo">CADASTRAR PRODUTO</a></li>
                <li class="tab col s4"><a href="#lista">LISTAR PRODUTOS</a></li>

            </ul>
        </div>

        <div id="cadastro" class="col s9 right" style="padding-top: 40px;">

            <div class="container">

                <!-- FORMULÁRIO CADASTRAR LOJA -->
                <div class="row">
                    <form class="col s12" method="POST" action="?pagina=admin/cadastraLoja"
                        enctype="multipart/form-data">

                        <!-- RECUPERAR ID DO VENDEDOR -->
                        <input value="<?php echo $_SESSION['id'] ?>" id="id" name="id" type="hidden" class="validate">

                        <!-- LINHA 1 -->
                        <div class="row">
                            <div class="input-field col s6">
                                <input placeholder="Nome do seu estabelecimento..." id="nome" name="nome" type="text"
                                    class="validate" required>
                                <label for="nome">NOME DO ESTABELECIMENTO</label>
                            </div>

                            <div class="input-field col s6">
                                <input placeholder="(XX) XXXX-XXXX" id="telefone" name="telefone" type="text"
                                    class="validate" required>
                                <label for="telefone">TELEFONE</label>
                            </div>
                        </div>

                        <!-- LINHA 2 -->
                        <div class="row">
                            <div class="input-field col s4">
                                <input placeholder="Nome da rua..." id="rua" name="rua" type="text" class="validate"
                                    required>
                                <label for="rua">RUA</label>
                            </div>

                            <div class="input-field col s4">
                                <input placeholder="Nome do bairro..." id="bairro" name="bairro" type="text"
                                    class="validate" required>
                                <label for="bairro">BAIRRO</label>
                            </div>

                            <div class="input-field col s4">
                                <input placeholder="Número..." id="numero" name="numero" type="number" class="validate"
                                    required>
                                <label for="numero">NÚMERO</label>
                            </div>
                        </div>

                        <!-- LINHA 3 -->
                        <div class="row">
                            <div class="input-field col s4">
                                <input value="ARAÇUAÍ" id="cidade" name="cidade" type="text" class="validate" required>
                                <label for="cidade">CIDADE</label>
                            </div>

                            <div class="input-field col s4">
                                <select id="categoria" name="categoria" required>
                                    <option value="" disabled selected>Categorias</option>
                                    <option value="BRINQUEDOS">BRINQUEDOS</option>
                                    <option value="ROUPAS">ROUPAS</option>
                                    <option value="ALIMENTOS">ALIMENTOS</option>
                                    <option value="OUTROS">OUTROS</option>
                                </select>
                                <label>SELECIONE UMA CATEGORIA</label>
                            </div>

                            <div class="file-field input-field col s4">
                                <div class="btn blue">
                                    <span>LOGO da EMPRESA</span>
                                    <input type="file" name="logo" id="logo" required>
                                </div>

                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text">
                                </div>
                            </div>
                        </div>

                        <!-- BOTÃO CADASTRAR -->
                        <div class="row">
                            <button class="btn waves-effect waves-light" type="submit" id="cadastrar"
                                name="cadastrar">CADASTRAR LOJA
                                <i class="material-icons right">store</i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div id="novo" class="col s9 right" style="padding-top: 40px;">

            <div class="container">

                <!-- FORMULÁRIO CADASTRAR PRODUTOS -->
                <div class="row">
                    <form class="col s12" method="POST" action="?pagina=admin/cadastraProduto"
                        enctype="multipart/form-data">

                        <!-- RECUPERAR ID DO VENDEDOR -->
                        <input value="<?php echo $dados['id_loja'] ?>" id="id" name="id" type="hidden" class="validate">

                        <!-- LINHA 1 -->
                        <div class="row">
                            <div class="input-field col s6">
                                <input placeholder="Nome do produto..." id="nome" name="nome" type="text"
                                    class="validate" required>
                                <label for="nome">NOME DO PRODUTO</label>
                            </div>

                            <div class="input-field col s6">
                                <input placeholder="Ex: 10,00" id="preco" name="preco" type="number" class="validate"
                                    required>
                                <label for="preco">PREÇO</label>
                            </div>
                        </div>

                        <!-- LINHA 2 -->
                        <div class="row">
                            <div class="input-field col s6">
                                <textarea id="descricao" name="descricao"
                                    placeholder="Digite aqui brevemente a descrição do seu produto..."
                                    class="materialize-textarea" maxlength="50"></textarea>
                                <label for="descricao">DESCRIÇÃO</label>
                            </div>

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

                        <!-- LINHA 3 -->
                        <div class="row">
                            <button class="btn waves-effect waves-light" type="submit" id="cadastrar"
                                name="cadastrar">CADASTRAR
                                PRODUTO
                                <i class="material-icons right">add_shopping_cart</i>
                            </button>
                        </div>

                </div>

                <!-- BOTÃO CADASTRAR -->

                </form>
            </div>
        </div>

    </div>
    <div id="lista" class="col s9 right" style="padding-right: 90px;">
        <div class="container">
            <table class="striped centered">
                <thead>
                    <tr>
                        <th>NOME PRODUTO</th>
                        <th>DESCRIÇÃO</th>
                        <th>PREÇO</th>
                        <th>FOTO</th>
                        <th>Adicionado em:</th>
                        <th>Editado em:</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM produtos WHERE id_loja = '$loja' ORDER BY `produtos`.`id_produto` DESC";
                    $resultado = mysqli_query($conexao, $sql);

                    if (mysqli_num_rows($resultado) > 0) :


                        while ($dados = mysqli_fetch_array($resultado)) :

                    ?>
                    <tr>
                        <td><?php echo ($dados['nome_produto']); ?></td>
                        <td><?php echo ($dados['descricao_produto']); ?></td>
                        <td><?php echo ($dados['preco_produto']); ?></td>
                        <td><?php if (strlen($dados['imagem']) > 5) {
                                        echo utf8_encode(substr($dados['imagem'], 0, 8) . "...");
                                    } ?></td>
                        </td>

                        <?php $dados['data_criacao'] = implode("/", array_reverse(explode("-", $dados['data_criacao']))); ?>
                        <td><?php echo utf8_encode($dados['data_criacao']); ?></td>

                        <?php $dados['data_edicao'] = implode("/", array_reverse(explode("-", $dados['data_edicao']))); ?>
                        <td><?php echo utf8_encode($dados['data_edicao']); ?></td>

                        <td> <a href="?pagina=admin/edit&&id=<?php echo $dados['id_produto']; ?>"
                                class="btn-floating blue"><i class="material-icons">
                                    edit</i></a>
                        </td>

                        <!-- Modal Trigger -->
                        <td><a class="btn-floating red modal-trigger"
                                href="#modal1 <?php echo $dados['id_produto']; ?>"><i class="material-icons">
                                    delete</i></a>
                        <td>

                            <!-- Modal Structure -->
                            <div id="modal1 <?php echo $dados['id_produto']; ?>" class="modal">
                                <div class="modal-content">
                                    <h1>Opa!</h1>
                                    <h5>Tem certeza que deseja excluir esse produto?</h5>
                                </div>
                                <div class="modal-footer">
                                    <form action="?pagina=admin/delete" method="POST">
                                        <input type="hidden" name="id" value="<?php echo $dados['id_produto']; ?>">
                                        <button type="submit" name="btn-deletar" class="btn red">Sim, quero
                                            excluir!</button>
                                        <a href="#!"
                                            class="modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a>
                                    </form>
                                </div>
                            </div>
                    </tr>
                    <?php
                        endwhile;
                    else : ?>
                    <tr>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>

                    </tr>
                    <?php
                    endif;
                    ?>
                </tbody>
            </table>
        </div>


    </div>
    </div>




    <script>
    M.AutoInit();
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src=<?= URL . "/src/js/admin.js" ?>></script>
</body>

</html>