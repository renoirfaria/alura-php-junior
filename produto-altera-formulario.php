<?php
require_once'cabecalho.php';
require_once 'banco-produto.php';
require_once 'banco-categoria.php';

$id         = $_GET['id'];
$produto    = buscaProduto($conexao,$id);
$categorias = listaCategorias($conexao);
$usado      = $produto['usado'] ? 'checked="checked"' : '';

?>
<h1>Alterando produto</h1>
<form class="" action="altera-produto.php" method="POST">
  <input type="hidden" name="id" value="<?=$id?>">
  <table class="table">
    <?php require_once 'produto-formulario-base.php'; ?>
    <tr>
      <td colspan="2">
        <button type="submit" name="button" class="btn btn-primary">Cadastrar</button>
      </td>
    </tr>
  </table>
</form>
<?php
require_once('rodape.php');
?>
