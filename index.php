<?php
include 'cabecalho.php';
include 'logica-usuario.php';

if(isset($_GET['login']) && $_GET['login'] == 'true'){
  echo '<p class="alert alert-success">Logado com sucesso</p>';
}
if(isset($_GET['login']) && $_GET['login'] == 'false'){
  echo '<p class="alert alert-danger">Usuário ou senha inválida</p>';
}
if(isset($_GET['falhaDeSeguranca']) && $_GET['falhaDeSeguranca'] == 'true'){
  echo '<p class="alert alert-danger">Você não tem acesso a essa funcionalidade</p>';
}
?>
<?php if(usuarioEstaLogado()): ?>
  <p class="text-success">
    Você está logado como <?=usuarioLogado()?>
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
