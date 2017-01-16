<?php
class Pedido extends LocalEntrega {
		private $id;
		private $idConsumidor;
		private $idPanificadora;
		private $quantidade;
		private $data;
		private $hora;
		private $statusPedido;
		private $precoTotal;
		private $itensPedido = array();

		public function __construct() {}

		public function __get() { return $this->id;}
		public function __get() { return $this->idConsumidor;}
		public function __get() { return $this->idPanificadora;}
		public function __get() { return $this->quantidade;}
		public function __get() { return $this->data;}
		public function __get() { return $this->hora;}
		public function __get() { return $this->statusPedido;}
		public function __get() { return $this->precoTotal;}
		public function __get() { return $this->itensPedido;}

		public function __set($id) {$this->id = $id;}
		public function __set($idConsumidor) {$this->idConsumidor = $idConsumidor;}
		public function __set($idPanificadora) {$this->idPanificadora = $idPanificadora;}
		public function __set($quantidade) {$this->quantidade = $quantidade;}
		public function __set($data) {$this->data = $data;}
		public function __set($hora) {$this->hora = $hora;}
		public function __set($statusPedido) {$this->statusPedido = $statusPedido;}
		public function __set($precoTotal) {$this->precoTotal = $precoTotal;}
		public function __set($itensPedido) {$this->itensPedido = $itensPedido;}

}
