<?php
require_once 'cabecalho.php';
require_once 'logica-usuario.php';

verificaUsuario();

$categoria     = new Categoria();
$categoria->setId($_POST['categoria_id']);

$nome        = $_POST['nome'];
$preco       = $_POST['preco'];
$descricao   = $_POST['descricao'];
$isbn        = $_POST['isbn'];
$tipoProduto = $_POST['tipoProduto'];

if(array_key_exists('usado',$_POST)){
  $usado = 1;
} else {
  $usado = 0;
}

if($tipoProduto == "Livro") {
  $produto = new Livro($nome,$preco,$descricao,$categoria,$usado);
  $produto->setIsbn($isbn);
} else {
  $produto    = new Produto($nome,$preco,$descricao,$categoria,$usado);
}

$produtoDao = new ProdutoDao($conexao);

if($produtoDao->insereProduto($produto)){
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
