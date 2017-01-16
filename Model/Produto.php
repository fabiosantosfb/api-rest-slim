<?php

class Produto {
	private $id;
	private $idPanificadora;
	private $nome;
	private $preco;
	private $tipoPreco;
	private $descricao;
	private $status;
	private $categoria;

	public function __construct(){}

	public function getId(){return $this->id;}
	public function getIdPanificadora(){return $this->idPanificadora;}
	public function getNome(){return $this->nome;}
	public function getPreco(){return $this->preco;}
	public function getTipoPreco(){return $this->tipoPreco;}
	public function getDescricao(){return $this->descricao;}
	public function getStatus(){return $this->status;}
	public function getCategoria(){return $this->categoria;}

	public function setId($id){$this->id = $id;}
	public function setPanificadora($panificadora){$this->idPanificadora = $idPanificadora;}
	public function setNome($nome){$this->nome = $nome;}
	public function setPerco($perco){$this->perco = $perco;}
	public function setTipoPreco($tipoPreco){$this->tipoPreco = $tipoPreco;}
	public function seDescricao($descricao){$this->descricao = $descricao;}
	public function setStatus($status){$this->status = $status;}
	public function setCategoria($categoria){$this->categoria = $categoria;}

}
