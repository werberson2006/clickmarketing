<?php 

session_start();

include_once("lib/includes.php");

if(!isset($_SESSION['logado'])){

    $_SESSION['mensagem_erro'] = "É necessário efetuar login!";
    header("Location: ?pagina=login");

}

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
  <link href=<?=URL."/src/css/admin.css"?> type="text/css" rel="stylesheet" media="screen,projection"/>

  <link rel="icon" href=<?=URL."/src/img/favicon.ico"?>>

</head>

<body>
    
<ul id="slide-out" class="sidenav sidenav-fixed">
      <li><a href="#!">First Sidebar Link</a></li>
      <li><a href="#!">Second Sidebar Link</a></li>
    </ul>
    <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    
    


  <script>
  M.AutoInit();
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script src="../src/js/home.js"></script>
</body>
</html>