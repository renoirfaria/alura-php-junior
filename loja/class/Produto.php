<?php

class Produto {
  private $id;
  private $nome;
  private $preco;
  private $descricao;
  private $categoria;
  private $usado;

  function __construct($nome, $preco, $descricao, Categoria $categoria, $usado){
    $this->nome      = $nome;
    $this->preco     = $preco;
    $this->descricao = $descricao;
    $this->categoria = $categoria;
    $this->usado     = $usado;
  }

  public function precoComDesconto($desconto = 0.1){
    if($desconto > 0 && $desconto <= 0.5){
      $this->preco -= $this->preco * $desconto;
    }
    return $this->preco;
  }

  public function getId(){
    return $this->id;
  }

  public function setId($id){
    $this->id = $id;
  }

  public function getNome(){
    return $this->nome;
  }

  public function getPreco() {
    return $this->preco;
  }

  public function getDescricao(){
    return $this->descricao;
  }

  public function getCategoria(){
    return $this->categoria;
  }

  public function getUsado(){
    return $this->usado;
  }

  public function setUsado($usado){
    $this->usado = $usado;
  }

  function __toString() {
    return $this->nome .': R$: '.$this->preco;
  }

  function __destruct() {
    //oquefazer quando o produto é destruido;
  }
}//produto
