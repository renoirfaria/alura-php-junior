<?php
include'cabecalho.php';
include 'conecta.php';
include 'banco-categoria.php';
include 'logica-usuario.php';

verificaUsuario();

$produto    = array('nome' => '', 'preco' => 'vazio', 'descricao' => '', 'categoria' => '1');
$usado      = '';
$categorias = listaCategorias($conexao);

?>
<h1>Formulário de produto</h1>
<form class="" action="adicionaproduto.php" method="POST">
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
