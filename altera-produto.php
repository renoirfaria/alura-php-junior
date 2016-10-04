<?php
require_once 'cabecalho.php';

$categoria = new Categoria();
$categoria->setId($_POST['categoria_id']);

if(array_key_exists('usado',$_POST)){
  $usado = 1;
} else {
  $usado = 0;
}

if($_POST['tipoProduto'] == "Livro") {
  $produto = new Livro($_POST['nome'],$_POST['preco'],$_POST['descricao'],$categoria,$usado);
  $produto->setIsbn($_POST['isbn']);
} else {
  $produto = new Produto($_POST['nome'],$_POST['preco'],$_POST['descricao'],$categoria,$usado);
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
