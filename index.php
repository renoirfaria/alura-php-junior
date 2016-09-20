<?php
require_once 'cabecalho.php';
require_once 'logica-usuario.php';
?>
<?php if(usuarioEstaLogado()): ?>
  <p class="text-success">
    Você está logado como <?=usuarioLogado()?>
    <a href="logout.php">Deslogar</a>
  </p>
<?php else: ?>
<h1>Bem vindo!</h1>
<h2>Login</h2>
<form class="" action="login.php" method="post">
  <table class="table">
    <tr>
      <td>Email</td>
      <td><input type="email" name="email" value="" class="form-control"></td>
    </tr>
    <tr>
      <td>Senha</td>
      <td><input type="password" name="senha" value="" class="form-control"></td>
    </tr>
    <tr>
      <td colspan="2">
        <button type="submit" class="btn btn-primary">Login</button>
      </td>
    </tr>
  </table>
</form>
<?php endif ?>
<?php
require_once('rodape.php');
?>
