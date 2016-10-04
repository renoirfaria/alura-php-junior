<?php
require_once 'conecta.php';
require_once 'class/Produto.php';
require_once 'class/Categoria.php';

function listaProdutos($conexao){
  $produtos = array();
  $resultado = mysqli_query($conexao,"select p.*, c.nome as categoria_nome from produtos as p join categorias as c on p.categoria_id = c.id");
  while($produto_array = mysqli_fetch_assoc($resultado)){

    $categoria = new Categoria();
    $categoria->setNome($produto_array['categoria_nome']);

    $produto = new Produto($produto_array['nome'],$produto_array['preco'],$produto_array['descricao'],$categoria,$produto_array['usado']);
    $produto->setId($produto_array['id']);

    array_push($produtos,$produto);
  }
  return $produtos;
}

function insereProduto($conexao,Produto $produto){
  $query = "insert into produtos (nome,preco,descricao,categoria_id,usado) values ('{$produto->getNome()}',{$produto->getPreco()},'{$produto->getDescricao()}',{$produto->getCategoria()->getId()},'{$produto->getUsado()}')";
  return mysqli_query($conexao,$query);
}

function alteraProduto($conexao,Produto $produto) {
  $query = "UPDATE produtos SET nome = '{$produto->getNome()}', preco = '{$produto->getPreco()}', descricao = '{$produto->getDescricao()}',categoria_id = '{$produto->getCategoria()->getId()}',usado = '{$produto->getUsado()}' WHERE id = {$produto->getId()}";
  return mysqli_query($conexao,$query);
}

function removeProduto($conexao,$id) {
  $query = "delete from produtos where id = {$id}";
  return mysqli_query($conexao,$query);
}

function buscaProduto($conexao,$id) {
  $query           = "select * from produtos where id = {$id}";
  $resultado       = mysqli_query($conexao, $query);
  $produto_buscado = mysqli_fetch_assoc($resultado);

  $categoria     = new Categoria();
  $categoria->setId($produto_buscado['categoria_id']);

  $produto            = new Produto();
  $produto->setId($produto_buscado['id']);
  $produto->setNome($produto_buscado['nome']);
  $produto->setDescricao($produto_buscado['descricao']);
  $produto->setCategoria($categoria);
  $produto->setPreco($produto_buscado['preco']);
  $produto->setUsado($produto_buscado['usado']);
  return $produto;
}
