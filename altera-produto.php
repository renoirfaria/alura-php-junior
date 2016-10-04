<?php
require_once 'cabecalho.php';

$tipoProduto   = $_POST['tipoProduto'];
$categoria_id  = $_POST['categoria_id'];

$factory = new ProdutoFactory();
$produto = $factory->criaPor($tipoProduto,$_POST);
$produto->atualizaBaseadoEm($_POST);

$produto->getCategoria()->setId($categoria_id);

if(array_key_exists('usado',$_POST)){
  $produto->setUsado('true');
} else {
  $produto->setUsado('false');
}

$produto->setId($_POST['id']);

$produtoDao = new ProdutoDao($conexao);

if($produtoDao->alteraProduto($produto)){
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
