<?php

include 'conecta.php';
include 'banco-usuario.php';
include 'logica-usuario.php';

$usuario = buscaUsuario($conexao,$_POST['email'],$_POST['senha']);
if($usuario == null) {
  header('Location: index.php?login=false');
} else {
  logaUsuario($usuario['email']);
  header('Location: index.php?login=true');
}
die();
