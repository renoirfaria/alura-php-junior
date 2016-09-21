<?php
  

  $produto = new Produto();
  $produto->setNome('Livro da casa do código');
  $produto->setPreco(59.9);

  $outroProduto = new Produto;
  $outroProduto->setNome('Livro da casa do código');
  $outroProduto->setPreco(59.9);

  $outroProduto = $produto;

  if($produto === $outroProduto) {
    echo "São iguais";
  } else {
    echo "São diferentes";
  }

 ?>
