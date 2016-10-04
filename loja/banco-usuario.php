<?php
include 'conecta.php';

function buscaUsuario($conexao,$email,$senha){
  $senha     = md5($senha);
  $email     = mysqli_real_escape_string($conexao,$email);
  $query     = "SELECT * FROM usuarios WHERE email='{$email}' and senha='{$senha}'";
  $resultado = mysqli_query($conexao,$query);
  $usuario   = mysqli_fetch_assoc($resultado);
  return $usuario;
}
