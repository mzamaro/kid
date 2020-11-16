<?php
//INICIALIZA A SESSÃO
session_start();

//seleciona as sessions
unset($_SESSION['usuariosession']);
unset($_SESSION['senhasession']);

//DESTRÓI AS SESSOES

session_destroy();
//REDIRECIONA PARA A TELA DE LOGIN
header("Location: index.php");
?> 