<?php include 'cabecalho.php'; ?>
<?php include 'conecta.php';
  $resultado = mysqli_query($conexao,"select * from produtos");
  $produto = mysqli_fetch_assoc($resultado);
  while($produto = mysqli_fetch_assoc($resultado)){
    echo $produto['nome'] . '<br>';
  }
?>


<?php include 'rodape.php'; ?>
