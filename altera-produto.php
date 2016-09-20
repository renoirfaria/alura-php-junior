
<?php
require_once 'cabecalho.php';
require_once 'banco-produto.php';
require_once 'class/Produto.php';
require_once 'class/Categoria.php';

$produto   = new Produto();
$categoria = new Categoria();
$categoria->id = $_POST['categoria_id'];

$produto->id           = $_POST['id'];
$produto->nome         = $_POST['nome'];
$produto->preco        = $_POST['preco'];
$produto->descricao    = $_POST['descricao'];
$produto->categoria_id = $_POST['categoria_id'];
if(array_key_exists('usado',$_POST)){
  $usado = 1;
} else {
  $usado = 0;
}

$produto->categoria = $categoria;

if(alteraProduto($conexao,$produto)){
  ?>
  <p class="text-success">
    O Produto <?php echo $produto->nome; ?>, <?=$produto->preco?> foi alterado com sucesso!
  </p>
  <?php
} else {
  $msg = mysqli_error($conexao);
  ?>
  <p class="text-danger">
    O produto <?=$produto->nome?> não foi alterado: <?= $msg ?>
  </p>
  <?php
}
require_once 'rodape.php';
?>
