<?php
include 'cabecalho.php';
$nome = $_GET['nome'];
$preco = $_GET['preco'];
$conexao = mysqli_connect('localhost','root','','loja');

$query = "insert into produtos (nome,preco) values ('{$nome}',{$preco})";
if(mysqli_query($conexao,$query)){
  ?>
  <p class="alert alert-success">
    Produto <?php echo $nome; ?>, <?=$preco?> adicionado com sucesso!
  </p>
  <?php
} else {
  ?>
  <p class="alert alert-danger">
    O produto <?=$nome?> não foi adicionado!
  </p>
  <?php
}

$nome = $_GET['nome'];
$preco = $_GET['preco'];
include 'rodape.php';
?>
