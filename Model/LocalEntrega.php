<?php
class LocalEntrega extends Endereco {
    private $complemento;

    public function __construct() {}

    public function __get() { return $this->complemento;}
    public function __set($complemento) {$this->complemento = $complemento;}
}
