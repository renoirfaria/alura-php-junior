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


      $tipoProduto = $produto_array['tipoProduto'];
      $factory = new ProdutoFactory();
      $produto = $factory->criaPor($tipoProduto,$produto_array);
      $produto->atualizaBaseadoEm($produto_array);

      $produto->setId($produto_array['id']);
      $produto->getCategoria()->setNome($produto_array['categoria_nome']);

      array_push($produtos,$produto);
    }
    return $produtos;
  }

  function insereProduto(Produto $produto){
    $tipoProduto = get_class($produto);

    //verifica particularidades do produto
    $isbn          = $produto->temIsbn()          ? $isbn           = $produto->getIsbn()              : '';
    $taxaImpressao = $produto->temTaxaImpressao() ? $taxaImpressao  = $produto->getTaxaImpressao()     : '';
    $waterMark     = $produto->temWaterMark()     ? $waterMark      = $produto->getWaterMark()         : '';

    $query = "insert into produtos (nome,preco,descricao,categoria_id,usado,isbn,tipoProduto,taxaImpressao,waterMark) values ('{$produto->getNome()}',{$produto->getPreco()},'{$produto->getDescricao()}',{$produto->getCategoria()->getId()},'{$produto->getUsado()}','{$isbn}','{$tipoProduto}','{$taxaImpressao}','{$waterMark}')";
    return mysqli_query($this->conexao,$query);
  }

  function alteraProduto(Produto $produto) {
    //verifica particularidades do produto
    $isbn          = $produto->temIsbn()          ? $isbn           = $produto->getIsbn()              : '';
    $taxaImpressao = $produto->temTaxaImpressao() ? $taxaImpressao  = $produto->getTaxaImpressao()     : '';
    $waterMark     = $produto->temWaterMark()     ? $waterMark      = $produto->getWaterMark()         : '';

    $tipoProduto = get_class($produto);

    $query = "update produtos set nome = '{$produto->getNome()}',
    preco = {$produto->getPreco()}, descricao = '{$produto->getDescricao()}',
    categoria_id= {$produto->getCategoria()->getId()},
    usado = {$produto->getUsado()}, isbn = '{$isbn}',
    tipoProduto = '{$tipoProduto}', waterMark = '{$waterMark}',
    taxaImpressao = '{$taxaImpressao}' where id = '{$produto->getId()}'";

    return mysqli_query($this->conexao, $query);
  }

  function removeProduto($id) {
    $query = "delete from produtos where id = {$id}";
    return mysqli_query($this->conexao,$query);
  }

  function buscaProduto($id) {
    $query = "select * from produtos where id = {$id}";
    $resultado = mysqli_query($this->conexao, $query);
    $produto_buscado = mysqli_fetch_assoc($resultado);

    $tipoProduto = $produto_buscado['tipoProduto'];
    $produto_id = $produto_buscado['id'];
    $categoria_id = $produto_buscado['categoria_id'];

    $factory = new ProdutoFactory();
    $produto = $factory->criaPor($tipoProduto, $produto_buscado);
    $produto->atualizaBaseadoEm($produto_buscado);

    $produto->setId($produto_id);
    $produto->getCategoria()->setId($categoria_id);

    return $produto;
  }


}
