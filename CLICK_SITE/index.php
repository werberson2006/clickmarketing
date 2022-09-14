<?php

include_once("lib/includes.php");

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">


    <link rel="icon" href=<?= URL . "/src/img/favicon.ico" ?>>
</head>

<body class="body">

    <?php

  $url = (isset($_GET['pagina'])) ? $_GET['pagina'] : 'inicio';
  $dir = "pages/";
  $ext = ".php";
  $erro = "pages/404.php";

  if (file_exists($dir . $url . $ext)) {
    include($dir . $url . $ext);
  } else {
    include($erro);
  }

  ?>




    <!--  Scripts-->

    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>

</body>

</html>