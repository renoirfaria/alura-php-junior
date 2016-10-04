<?php

class ProdutoDao {
  private $conexao;

  public function __construct($conexao){
    $this->conexao = $conexao;
  }

  function listaProdutos(){
    $produtos = array();
    $resultado = mysqli_query($this->conexao,"select p.*, c.nome as categoria_nome from produtos as p join categorias as c on p.categoria_id = c.id");
    while($produto_array = mysqli_fetch_assoc($resultado)){

      $categoria = new Categoria();
      $categoria->setNome($produto_array['categoria_nome']);

      if($produto_array['tipoProduto'] == "Livro") {
        $produto = new Livro($produto_array['nome'],$produto_array['preco'],$produto_array['descricao'],$categoria,$produto_array['usado']);
        $produto->setIsbn($produto_array['isbn']);
      } else {
        $produto = new Produto($produto_array['nome'],$produto_array['preco'],$produto_array['descricao'],$categoria,$produto_array['usado']);
      }

      $produto->setId($produto_array['id']);

      array_push($produtos,$produto);
    }
    return $produtos;
  }

  function insereProduto(Produto $produto){
    $tipoProduto = get_class($produto);
    $isbn = $produto->temIsbn() ? $isbn = $produto->getIsbn() : '';
    $query = "insert into produtos (nome,preco,descricao,categoria_id,usado,isbn,tipoProduto) values ('{$produto->getNome()}',{$produto->getPreco()},'{$produto->getDescricao()}',{$produto->getCategoria()->getId()},'{$produto->getUsado()}','{$isbn}','{$tipoProduto}')";
    return mysqli_query($this->conexao,$query);
  }

  function alteraProduto(Produto $produto) {
    $tipoProduto = get_class($produto);
    $isbn = $produto->temIsbn() ? $isbn = $produto->getIsbn() : '';
    $query = "UPDATE produtos SET nome = '{$produto->getNome()}', preco = '{$produto->getPreco()}', descricao = '{$produto->getDescricao()}',categoria_id = '{$produto->getCategoria()->getId()}',usado = '{$produto->getUsado()}', isbn = '{$isbn}', tipoProduto = '{$tipoProduto}' WHERE id = {$produto->getId()}";
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

    if($produto_buscado['tipoProduto'] == "Livro") {
      $produto = new Livro($produto_buscado['nome'],$produto_buscado['preco'],$produto_buscado['descricao'],$categoria,$produto_buscado['usado']);
      $produto->setIsbn($produto_buscado['isbn']);
    } else {
      $produto = new Produto($produto_buscado['nome'],$produto_buscado['preco'],$produto_buscado['descricao'],$categoria,$produto_buscado['usado']);
    }
    $produto->setId($produto_buscado['id']);

    return $produto;
  }


}
