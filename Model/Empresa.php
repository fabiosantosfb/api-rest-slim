<?php

class Empresa extends Endereco{
		private  $nomeEmpresa;
		private  $statusEmpresa;
		private  $cnpj;
		private  $razaoSocial;

		public function __construct() {}

		public function __get(){ return $this->nomeEmpresa;}
		public function __get(){ return $this->statusEmpresa;}
		public function __get(){ return $this->cnpj;}
		public function __get(){ return $this->razaoSocial;}

		public function __set($nome){ $this->nomeEmpresa = $nome;}
		public function __set($status){ $this->statusEmpresa = $status;}
		public function __set($cnpj){ $this->cnpj = $cnpj;}
		public function __set($razao){ $this->razaoSocial = $razao;}
	}
