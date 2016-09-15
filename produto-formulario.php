<?php
include('cabecalho.php');
?>
<h1>Formulário de produto</h1>
<form class="" action="adicionaproduto.php" method="get">
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
      <td colspan="2">
        <button type="submit" name="button" class="btn btn-primary">Cadastrar</button>
      </td>
    </tr>
  </table>
</form>
<?php
include('rodape.php');
?>
