<?php

class ItemPedido {
	private $id;
	private $idProduto;
	private $nomeProduto;
	private $valorProduto;

	public function __construct() {}

	public function __get(){ return $this->id;}
	public function __get(){ return $this->idProduto;}
	public function __get(){ return $this->nomeProduto;}
	public function __get(){ return $this->valorProduto;}

	public function __set($id){ $this->id = $id;}
	public function __set($idProduto){ $this->idProduto = $idProduto;}
	public function __set($nomeProduto){ $this->nomeProduto = $nomeProduto;}
	public function __set($valorProduto){ $this->valorProduto = $valorProduto;}		
}
