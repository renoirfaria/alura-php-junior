
<?php
require_once 'cabecalho.php';
require_once 'banco-produto.php';
require_once 'class/Produto.php';
require_once 'class/Categoria.php';

$produto   = new Produto();
$categoria = new Categoria();
$categoria->setId($_POST['categoria_id']);

$produto->setId($_POST['id']);
$produto->setNome($_POST['nome']);
$produto->setPreco($_POST['preco']);
$produto->setDescricao($_POST['descricao']);
if(array_key_exists('usado',$_POST)){
  $produto->setUsado(1);
} else {
  $produto->setUsado(0);
}
$produto->setCategoria($categoria);

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
