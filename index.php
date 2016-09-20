<?php
include 'cabecalho.php';
include 'logica-usuario.php';

if(isset($_SESSION['success'])){
  echo '<p class="alert alert-success">'.$_SESSION['success'].'</p>';
  unset($_SESSION['success']);
}
if(isset($_SESSION['danger'])){
  echo '<p class="alert alert-danger">'.$_SESSION['danger'].'</p>';
  unset($_SESSION['danger']);
}
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
include('rodape.php');
?>
