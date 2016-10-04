<?php
require_once 'cabecalho.php';
require_once 'banco-produto.php';

?>

<?php  mostraAlerta('success');?>
<table class="table table-striped table-bordered">
  <?php
    $produtos = listaProdutos($conexao);
    foreach ($produtos as $produto):
  ?>
  <tr>
    <td><?=$produto->getNome() ?></td>
    <td><?=$produto->getPreco() ?></td>
    <td><?= $produto->precoComDesconto(0.1) ?></td>
    <td><?= substr($produto->getDescricao(),0,40)?></td>
    <td><?=$produto->getCategoria()->getNome() ?></td>
    <td><a href="produto-altera-formulario.php?id=<?=$produto->getId()?>" class="btn btn-primary">Alterar</a></td>
    <td>
      <form  action="remove-produto.php" method="post">
        <input type="hidden" name="id" id="id" value="<?=$produto->getId()?>">
        <button type="submit" class="btn btn-danger">Remover</a>
      </form>
    </td>
  </tr>
<?php endforeach ?>
</table>


<?php require_once 'rodape.php'; ?>