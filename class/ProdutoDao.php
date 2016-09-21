<?php

  class ProdutoDao {

    private $conexao;

    function __construct($conexao){
      $this->conexao = $conexao;
    }

    function listaProdutos(){
      $produtos = array();
      $resultado = mysqli_query($this->conexao,"select p.*, c.nome as categoria_nome from produtos as p join categorias as c on p.categoria_id = c.id");
      while($produto_array = mysqli_fetch_assoc($resultado)){

        $categoria = new Categoria();
        $categoria->setNome($produto_array['categoria_nome']);

        $produto = new Produto($produto_array['nome'],$produto_array['preco'],$produto_array['descricao'],$categoria,$produto_array['usado']);
        $produto->setId($produto_array['id']);

        array_push($produtos,$produto);
      }
      return $produtos;
    }

    function insereProduto(Produto $produto){
      $query = "insert into produtos (nome,preco,descricao,categoria_id,usado) values ('{$produto->getNome()}',{$produto->getPreco()},'{$produto->getDescricao()}',{$produto->getCategoria()->getId()},'{$produto->getUsado()}')";
      return mysqli_query($this->conexao,$query);
    }

    function alteraProduto(Produto $produto) {
      $query = "UPDATE produtos SET nome = '{$produto->getNome()}', preco = '{$produto->getPreco()}', descricao = '{$produto->getDescricao()}',categoria_id = '{$produto->getCategoria()->getId()}',usado = '{$produto->getUsado()}' WHERE id = {$produto->getId()}";
      return mysqli_query($this->conexao,$query);
    }

    function removeProduto($id) {
      $query = "delete from produtos where id = {$id}";
      return mysqli_query($this->conexao,$query);
    }

    function buscaProduto($id) {
      $query           = "select * from produtos where id = {$id}";
      $resultado       = mysqli_query($this->conexao, $query);
      $produto_buscado = mysqli_fetch_assoc($resultado);

      $categoria     = new Categoria();
      $categoria->setId($produto_buscado['categoria_id']);

      $produto = new Produto($produto_buscado['nome'],$produto_buscado['preco'],$produto_buscado['descricao'],$categoria,$produto_buscado['usado']);
      $produto->setId($produto_buscado['id']);
      return $produto;
    }

  }//produtoDao
