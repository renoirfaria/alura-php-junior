<?php
require_once 'cabecalho.php';
require_once 'banco-produto.php';
require_once 'logica-usuario.php';
require_once 'class/Produto.php';
require_once 'class/Categoria.php';

verificaUsuario();

$categoria     = new Categoria();
$categoria->setId($_POST['categoria_id']);

$nome      = $_POST['nome'];
$preco     = $_POST['preco'];
$descricao = $_POST['descricao'];
if(array_key_exists('usado',$_POST)){
  $usado = 1;
} else {
  $usado = 0;
}

$produto = new Produto($nome,$preco,$descricao,$categoria,$usado);

if(insereProduto($conexao,$produto)){
?>
  <p class="text-success">
    O Produto <?php echo $produto->getNome(); ?>, <?=$produto->getPreco()?> adicionado com sucesso!
  </p>
  <?php
} else {
  $msg = mysqli_error($conexao);
  ?>
  <p class="text-danger">
    O produto <?=$produto->getNome?> não foi adicionado: <?= $msg ?>
  </p>
  <?php
}
require_once 'rodape.php';
?>
