<?php
require_once 'conecta.php';
spl_autoload_register(function($nomeDaClasse){require_once 'class/'.$nomeDaClasse.'.php';});

error_reporting(E_ALL ^ E_NOTICE);
require_once 'mostra-alerta.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Minha loja</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" title="no title">
    <link rel="stylesheet" href="css/loja.css" media="screen" title="no title">
  </head>
  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a href="./" class="navbar-brand">Minha Loja</a>
        </div>
        <div class="">
          <ul class="nav navbar-nav">
            <li><a href="produto-formulario.php">Adicionar produto</a></li>
            <li><a href="produto-lista.php">Produtos</a></li>
            <li><a href="contato.php">Contato</a></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="principal">
        <?php mostraAlerta('success');
        mostraAlerta('danger'); ?>
