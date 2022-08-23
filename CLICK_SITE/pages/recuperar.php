<?php 

include_once("lib/includes.php");

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Recuperar | CLICK MARKETING</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <link href=<?=URL."/src/css/login.css"?> type="text/css" rel="stylesheet" media="screen,projection"/>

  <link rel="icon" href=<?=URL."/src/img/favicon.ico"?>>

</head>

<body class="body">
 
<div class="container">

    <div class="imagem">
      <img class="responsive-img" src=<?=URL."/src/img/LOGO.png"?>>
    </div>
    
    <div class="title">
          <p>Recuperar senha</p>
    </div>

    <form id="signin" class="col s12" method="POST">
        <div class="row">
          <div class="input-field col s12">
            <i class="material-icons prefix">mail</i>
            <input id="email" name="email" type="email" class="validate" placeholder="Email" maxlength="50">
          </div>
        </div>
        
        <button id="enviar" name="enviar" type="submit">ENVIAR</button>
    </form>

    <?php 
        verificaDados($conexao);
    ?>
</div>


  <script>
  M.AutoInit();
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script src=<?=URL."/src/js/login.js"?>></script>
</body>
</html>

