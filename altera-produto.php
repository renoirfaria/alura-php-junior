
<?php
require_once 'cabecalho.php';
require_once 'banco-produto.php';
require_once 'class/Produto.php';
require_once 'class/Categoria.php';


$categoria = new Categoria();
$categoria->setId($_POST['categoria_id']);

if(array_key_exists('usado',$_POST)){
  $usado = 1;
} else {
  $usado = 0;
}
$produto = new Produto($_POST['nome'],$_POST['preco'],$_POST['descricao'],$categoria,$usado);
$produto->setId($_POST['id']);

if(alteraProduto($conexao,$produto)){
  ?>
  <p class="text-success">
    O Produto <?php echo $produto->getNome(); ?>, <?=$produto->getPreco()?> foi alterado com sucesso!
  </p>
  <?php
} else {
  $msg = mysqli_error($conexao);
  ?>
  <p class="text-danger">
    O produto <?=$produto->getNome()?> não foi alterado: <?= $msg ?>
  </p>
  <?php
}
require_once 'rodape.php';
?>
