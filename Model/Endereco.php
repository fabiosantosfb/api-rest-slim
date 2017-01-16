<?php

abstract class endereco {
		private $rua;
		private $cep;
		private $bairro;
		private $cidade;
		private $estado;
		private $numero;
		private $pais;

		public function __construct() {}

		public function __get() {return $this->rua;}
		public function __get() {return $this->cep;}
		public function __get() {return $this->bairro;}
		public function __get() {return $this->cidade;}
		public function __get() {return $this->estado;}
		public function __get() {return $this->numero;}
		public function __get() {return $this->pais;}

		public function __set($rua) {$this->rua = $rua;}
		public function __set($cep) {$this->cep = $cep;}
		public function __set($bairro) {$this->bairro = $bairro;}
		public function __set($cidade) {$this->cidade = $cidade;}
		public function __set($estado) {$this->estado = $estado;}
		public function __set($numero) {$this->numero = $numero;}
		public function __set($pais) {$this->pais = $pais;}
}
