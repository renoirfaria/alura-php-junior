<?php

include 'conecta.php';
include 'banco-usuario.php';

$usuario = buscaUsuario($conexao,$_POST['email'],$_POST['senha']);
if($usuario == null) {
  header('Location: index.php?login=false');
} else {
  setcookie("usuario_logado",$usuario['email'], time() + 60);
  header('Location: index.php?login=true');
}
die();
