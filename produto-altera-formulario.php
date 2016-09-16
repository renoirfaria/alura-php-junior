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
    <tr>
      <td>
        Nome:
      </td>
      <td>
        <input type="text" name="nome" value="<?=$produto['nome']?>" class="form-control">
      </td>
    </tr>
    <tr>
      <td>
        Preco:
      </td>
      <td>
        <input type="number" name="preco" value="<?=$produto['preco']?>" class="form-control">
      </td>
    </tr>
    <tr>
      <td>
        Descrição:
      </td>
      <td>
        <textarea name="descricao" rows="8" cols="40" class="form-control"><?=$produto['descricao']?></textarea>
      </td>
    </tr>
    <tr>
      <td>
        Usado:
      </td>
      <td>
        <input type="checkbox" name="usado" value="1" <?=$usado?>> Usado
      </td>
    </tr>
    <tr>
      <td>
        Categoria:
      </td>
      <td>
        <select class="form-control" name="categoria_id">
          <?php foreach ($categorias as $categoria):
            $essaEhACategoria = $produto['categoria_id'] == $categoria['id'];
            $selecao          = $essaEhACategoria ? 'selected="selected"' : '';
            ?>
            <option <?=$selecao?> value="<?=$categoria['id']?>"><?=$categoria['nome']?></option>
          <?php endforeach; ?>
        </select>
      </td>
    </tr>
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
