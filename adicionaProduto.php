<?php
$nome = $_GET['nome'];
$preco = $_GET['preco'];
include 'cabecalho.php';
?>
<p class="alert alert-success">
  Produto <?php echo $nome; ?>, <?=$preco?> adicionado com sucesso!
</p>
<?php
$nome = $_GET['nome'];
$preco = $_GET['preco'];
include 'rodape.php';
?>
