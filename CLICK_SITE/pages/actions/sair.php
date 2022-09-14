<?php

session_start();

unset(
    $_SESSION['logado'],
    $_SESSION['id'],
    $_SESSION['nome'],
    $_SESSION['email'],
    $_SESSION['senha']
);

$_SESSION['mensagem_sucesso'] = "VOCÊ SAIU! :)";

header("Location: ?pagina=login");
