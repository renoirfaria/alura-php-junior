<?php
include 'cabecalho.php';
include 'conecta.php';
include 'banco-produto.php';
include 'logica-usuario.php';

if(isset($_SESSION['success'])){
  echo '<p class="alert alert-success">'.$_SESSION['success'].'</p>';
  unset($_SESSION['success']);
}
?>




<table class="table table-striped table-bordered">
  <?php
    $produtos = listaProdutos($conexao);
    foreach ($produtos as $produto):
  ?>
  <tr>
    <td><?=$produto['nome']?></td>
    <td><?=$produto['preco']?></td>
    <td><?= substr($produto['descricao'],0,40)?></td>
    <td><?=$produto['categoria_nome']?></td>
    <td><a href="produto-altera-formulario.php?id=<?=$produto['id']?>" class="btn btn-primary">Alterar</a></td>
    <td>
      <form  action="remove-produto.php" method="post">
        <input type="hidden" name="id" id="id" value="<?=$produto['id']?>">
        <button type="submit" class="btn btn-danger">Remover</a>
      </form>
    </td>
  </tr>
<?php endforeach ?>
</table>


<?php include 'rodape.php'; ?>
