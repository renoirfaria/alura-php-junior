<?php
include'cabecalho.php';
include 'conecta.php';
include 'banco-produto.php';
include 'banco-categoria.php';

$id         = $_GET['id'];
$produto    = buscaProduto($conexao,$id);
$categorias = listaCategorias($conexao);
$usado      = $produto['usado'] ? 'checked="checked"' : '';

?>
<h1>Alterando produto</h1>
<form class="" action="altera-produto.php" method="POST">
  <input type="hidden" name="id" value="<?=$id?>">
  <table class="table">
    <?php include 'produto-formulario-base.php'; ?>
    <tr>
      <td colspan="2">
        <button type="submit" name="button" class="btn btn-primary">Cadastrar</button>
      </td>
    </tr>
  </table>
</form>
<?php
include('rodape.php');
?>
