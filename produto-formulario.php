<?php
include'cabecalho.php';
include 'conecta.php';
include 'banco-categoria.php';

$categorias = listaCategorias($conexao);

?>
<h1>Formulário de produto</h1>
<form class="" action="adicionaproduto.php" method="POST">
  <table class="table">
    <tr>
      <td>
        Nome:
      </td>
      <td>
        <input type="text" name="nome" value="" class="form-control">
      </td>
    </tr>
    <tr>
      <td>
        Preco:
      </td>
      <td>
        <input type="number" name="preco" value="" class="form-control">
      </td>
    </tr>
    <tr>
      <td>
        Descrição:
      </td>
      <td>
        <textarea name="descricao" rows="8" cols="40" class="form-control"></textarea>
      </td>
    </tr>
    <tr>
      <td>
        Categoria:
      </td>
      <td>
        <?php foreach ($categorias as $categoria): ?>
          <input type="radio" name="categoria" value="<?=$categoria['id']?>"><?=$categoria['nome']?><br>
        <?php endforeach; ?>
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
