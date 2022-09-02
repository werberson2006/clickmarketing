<?php 

include_once("lib/includes.php");

if(!isset($_SESSION['logado'])){

    $_SESSION['mensagem_erro'] = "É necessário efetuar login!";
    header("Location: ?pagina=login");
    
}

$id = $_SESSION['id'];

$sql = "SELECT * FROM estabelecimentos WHERE id_vendedor = '$id'"; 
    $executa = mysqli_query($conexao, $sql);
    $dados = mysqli_fetch_assoc($executa)

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Admin | CLICK MARKETING</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <link href=<?=URL."/src/css/admini.css"?> type="text/css" rel="stylesheet" media="screen,projection"/>

  <link rel="icon" href=<?=URL."/src/img/favicon.ico"?>>

</head>

<body>

    <ul id="slide-out" class="sidenav sidenav-fixed">
      
      <li>
        
      <a style="color: white; font-size: 18px;"><i class="material-icons prefix">person</i>OLÁ <?php echo $_SESSION['nome'] ?>!</a></li>

      <li>
        <a style="color: white;" ><span>Loja:</span><i class="material-icons prefix">store</i> <?php echo $dados['nome_loja']; ?></a>
      </li>

      <li><a style="color: white;" href=<?=URL."?pagina=actions/sair"?>><i class="material-icons prefix">logout</i>SAIR DO SISTEMA</a></li>
      
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
            <form class="col s12" method="POST" action="?pagina=admin/cadastraLoja"  enctype="multipart/form-data">

              <!-- RECUPERAR ID DO VENDEDOR -->
              <input value="<?php echo $_SESSION['id'] ?>" id="id" name="id" type="hidden" class="validate">
                
              <!-- LINHA 1 -->
              <div class="row">
                <div class="input-field col s6">
                  <input placeholder="Nome do seu estabelecimento..." id="nome" name="nome" type="text" class="validate" required>
                  <label for="nome">NOME DO ESTABELECIMENTO</label>
                </div>

                <div class="input-field col s6">
                  <input placeholder="(XX) XXXX-XXXX" id="telefone" name="telefone" type="text" class="validate" required>
                  <label for="telefone">TELEFONE</label>
                </div>
              </div>

              <!-- LINHA 2 -->
              <div class="row">
                <div class="input-field col s4">
                  <input placeholder="Nome da rua..." id="rua" name="rua" type="text" class="validate" required>
                  <label for="rua">RUA</label>
                </div>

                <div class="input-field col s4">
                  <input placeholder="Nome do bairro..." id="bairro" name="bairro" type="text" class="validate" required>
                  <label for="bairro">BAIRRO</label>
                </div>

                <div class="input-field col s4">
                  <input placeholder="Número..." id="numero" name="numero" type="number" class="validate" required>
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
                <button class="btn waves-effect waves-light" type="submit" id="cadastrar" name="cadastrar">CADASTRAR LOJA
                <i class="material-icons right">send</i>
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <div id="novo" class="col s12">



      </div>
      <div id="lista" class="col s12">



      </div>
    </div>
    
    


  <script>
  M.AutoInit();
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script src=<?=URL."/src/js/admin.js"?>></script>
</body>
</html>