<?php

class Login extends conexao{

	public function logar($login,$senha){
			$validar = Login::getconexao()->prepare("SELECT login, senha FROM consumidor WHERE login = :login AND senha = :senha");
			$validar->bindValue(":login",$login);
			$validar->bindValue(":senha",$senha);
			$validar->execute();
			return $validar;
	}
}
