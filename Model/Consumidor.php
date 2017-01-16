<?php

abstract class Consumidor extends Endereco {
	private $id;
	private $nome;
	private $telefone;

	public function __construct() {}

	public function __get(){return $this->id;}
	public function __get(){return $this->nome;}
	public function __get(){return $this->telefone;}

	public function __set($id){$this->id = $id;}
	public function __set($nome){$this->nome = $nome;}
	public function __set($telefone){$this->telefone = $telefone;}
}
