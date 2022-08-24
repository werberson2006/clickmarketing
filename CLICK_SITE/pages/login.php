<?php 

include_once("lib/includes.php");
include_once("lib/mensagem.php");

?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Entrar | CLICK MARKETING</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <link href=<?=URL."/src/css/login.css"?> type="text/css" rel="stylesheet" media="screen,projection"/>

  <link rel="icon" href=<?=URL."/src/img/favicon.ico"?>>

</head>

<body class="body">
 <script>
  
 </script>
  <div class="container">

    <div class="imagem">
      <img class="responsive-img" src=<?=URL."/src/img/LOGO.png"?>>
    </div>

    <div class="buttonsForm">
      <div class="btnColor"></div>
      <button id="btnSignin">Login</button>
      <button id="btnSignup">Cadastro</button>
    </div>

    <div>
      <form id="signin" class="col s12" method="POST" action="?pagina=actions/loga">
        
        <div class="title">
          <p>Entre com sua conta</p>
        </div>

        <div class="row">
          <div class="input-field col s12">
            <i class="material-icons prefix">mail</i>
            <input id="email" name="email" type="email" class="validate" placeholder="Email" maxlength="50">
          </div>

          <div class="input-field col s12">
            <i class="material-icons prefix">lock</i>
            <input id="senha" name="senha" type="password" class="validate" placeholder="Senha" minlength="5" maxlength="6"> 
          </div>
        </div>
        
        <button id="logar" name="logar" type="submit">ENTRAR</button>

        <div class="esqueci">
          <a class="forgot" href="?pagina=recuperar">Esqueci a senha!</a>
        </div>

        <div class="esqueci">
          <a class="forgot" href="?pagina=inicio">Voltar para a tela de início</a>
        </div>
      </form>

      
      
      <form id="signup" class="col s12" method="POST" action="?pagina=actions/cadastra">

        <div class="title">
          <p>Cadastre-se</p>
        </div>
        
        <div class="row">
          <div class="input-field col s12">
            <i class="material-icons prefix">person</i>
            <input id="nome" name="nome" type="text" class="validate" placeholder="Nome" required>
          </div>

          <div class="input-field col s12">
            <i class="material-icons prefix">mail</i>
            <input id="email" name="email" type="email" class="validate" placeholder="Email" required>
          </div>

          <div class="input-field col s12">
            <i class="material-icons prefix">lock</i>
            <input id="senha" name="senha" type="password" class="validate" placeholder="Senha" minlength="5" maxlength="6" required> 
          </div>

          <div class="input-field col s12">
            <i class="material-icons prefix"></i>
            <input id="senha2" name="senha2" type="password" class="validate" placeholder="Confirme a senha" minlength="5" maxlength="6" required> 
          </div>
          
        </div>
        
          <button type="submit">CADASTRAR</button>
        

    
      </form>

      
    </div>
    
  </div>

  <script>
  M.AutoInit();
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script src=<?=URL."/src/js/login.js"?>></script>
</body>
</html>