<?php

require_once ('../vendor/autoload.php');

class DaoConsumidor extends conexao {
	 public function cadastrar($inserir){
				$login = $inserir->getLogin();
				$cadastrando = DaoConsumidor::getconexao()->prepare("INSERT INTO consumidor(nome_cliente,cpf,login,senha,rua,cep,bairro,cidade,numero,complemento) VALUES(:nome,:cpf,:login,:senha,:rua,:cep,:bairro,:cidade,:numero,:complemento)");

				$cadastrando->bindValue(":nome",$inserir->getNome_cliente());
				$cadastrando->bindValue("cpf",$inserir->getCpf());
				$cadastrando->bindValue(":login",$inserir->getLogin());
				$cadastrando->bindValue(":senha",$inserir->getSenha());
				$cadastrando->bindValue(":rua",$inserir->getRua());
				$cadastrando->bindValue(":cep",$inserir->getCep());
				$cadastrando->bindValue(":bairro",$inserir->getBairro());
				$cadastrando->bindValue(":cidade",$inserir->getCidade());
				$cadastrando->bindValue(":numero",$inserir->getNumero());
				$cadastrando->bindValue("complemento",$inserir->getComplemento());


				$validar = DaoConsumidor::getconexao()->prepare("SELECT * FROM consumidor where login=?");
				$validar->execute(array($login));

				if($validar->rowCount()== 0){
					$cadastrando->execute();
						echo "<br> cadastro realizado com sucesso";

				} else{
					echo "<br> ja existe esse login em nosso banco dados";
				}


	}

	public function buscarIndex($index){

		 $buscar = DaoConsumidor::getconexao()->prepare("SELECT nome_cliente,cpf FROM consumidor WHERE id_consumidor = :id ");
				$buscar->bindValue(":id",$index);
				$buscar->execute();

					if($buscar->rowCount()== 0){

							echo "<br>nenhum cliente encontrado";

					} 	else {
								$testar = $buscar->fetch(PDO::FETCH_OBJ);

									return $testar;
					}
		}


			public function buscarNome($nome){

		 $buscar = DaoConsumidor::getconexao()->prepare("SELECT nome_cliente,cpf FROM consumidor WHERE nome_cliente = :nome ");
				$buscar->bindValue(":nome",$nome);
				$buscar->execute();

					if($buscar->rowCount()== 0){

							echo "<br>nenhum cliente encontrado";

					} 	else {

						return $buscar;

					}
		}



	}



 ?>
