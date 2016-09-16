
<?php
include 'cabecalho.php';
include 'conecta.php';
include 'banco-produto.php';

$id           = $_POST['id'];
$nome         = $_POST['nome'];
$preco        = $_POST['preco'];
$descricao    = $_POST['descricao'];
$categoria_id = $_POST['categoria_id'];
if(array_key_exists('usado',$_POST)){
  $usado = 1;
} else {
  $usado = 0;
}

if(alteraProduto($conexao,$id,$nome,$preco,$descricao,$categoria_id,$usado)){
  ?>
  <p class="text-success">
    O Produto <?php echo $nome; ?>, <?=$preco?> foi alterado com sucesso!
  </p>
  <?php
} else {
  $msg = mysqli_error($conexao);
  ?>
  <p class="text-danger">
    O produto <?=$nome?> não foi alterado: <?= $msg ?>
  </p>
  <?php
}
include 'rodape.php';
?>
