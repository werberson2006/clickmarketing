<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Bem-vindo | CLICK MARKETING</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <link href=<?=URL."/src/css/style.css"?> type="text/css" rel="stylesheet" media="screen,projection"/>

  <link rel="icon" href=<?=URL."/src/img/favicon.ico"?>>
</head>

<body class="body">

  <nav>
    <div class="nav-wrapper">
      <a href="#" class="texto">BEM-VINDO AO CLICK MARKETING!</a>
      <ul id="nav-mobile" class="sidenav">
        <li><a href="#usuario">Sou USUÁRIO</a></li>
        <li><a href="#vendedor">Sou VENDEDOR</a></li>
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>

  
    <div class="container">
      
      <div class="row">
        <div class="col m6 center">
          <div class="card">
            <div class="card-image">
              <img class="logo" src=<?=URL."/src/img/LOGO.png"?>>
            </div>
          </div>

          <p class="texto-card">Aqui você encontrará diversas opções de lojas e comércios para ficar por dentro de suas promoções, produtos e preços sem sair de sua casa.</p>
        
          <p class="texto-2">Entre e confira!</p>
        </div>

        <div class="col m6 s12 center">
          <div class="card2">
            
            <div class="texto-escolha">
              <p class="escolha">Escolha uma opção para começar:</p>
            </div>
            
            <div class="opcoes">
              <i class="material-icons" style="color: white; font-size: 40px;">person</i>
              <div class="subopcao">
                <a class="link" href="?pagina=home">Sou USUÁRIO</a>
              </div>
            </div>

            <br>

            <div class="opcoes">
              <i class="material-icons" style="color: white; font-size: 40px;">business_center</i>
              <div class="subopcao">
                <a class="link" href="?pagina=login">Sou VENDEDOR</a>
              </div>
              
            </div>
            
          </div>
        </div>
      </div>

    </div>

  


  <!--  Scripts-->
  
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src=<?=URL."/js/materialize.js"?>></script>
  <script src=<?=URL."/js/init.js"?>></script>

  </body>
</html>
