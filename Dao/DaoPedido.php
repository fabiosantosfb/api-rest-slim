<?php
//require_once ('../vendor/autoload.php');
//	require_once('conexao.php');

class DaoPedido extends conexao {
		public function criarPedido($pedido){
				$cadastrando = DaoPedido::getconexao()->prepare("INSERT INTO pedido (cnpj,quant_itens,data,hora,status_pedido,id_consumidor,rua,cep,bairro,cidade,numero,complemento) VALUES (:cnpj,:quant_itens,:data,:hora,:status_pedido,:id_consumidor,:rua,:cep,:bairro,:cidade,:numero,:complemento)");
				$cadastrando->bindValue(":cnpj",$pedido->getCnpj());
				$cadastrando->bindValue(":quant_itens",$pedido->getQuant_itens());
				$cadastrando->bindValue(":data",$pedido->getData());
				$cadastrando->bindValue(":hora",$pedido->getHora());
				$cadastrando->bindValue(":status_pedido",$pedido->getStatus_pedido());
				$cadastrando->bindValue(":id_consumidor",$pedido->getId_consumidor());
				$cadastrando->bindValue(":rua",$pedido->getRua());
				$cadastrando->bindValue(":cep",$pedido->getCep());
				$cadastrando->bindValue(":bairro",$pedido->getBairro());
				$cadastrando->bindValue(":cidade",$pedido->getCidade());
				$cadastrando->bindValue(":numero",$pedido->getNumero());
				$cadastrando->bindValue("complemento",$pedido->getComplemento());
			try{
				$cadastrando->execute();
					echo "<br>pedido registrado com sucesso";
						$valor = $pedido->setId_pedido($this->consultarID($pedido));

						echo $pedido->getId_pedido();

						 $this->cadastrarItensPedido($pedido);




					}	catch(PDOexception $e){


							echo "<br>falha ao registrar pedido". $e;
						}




	}


		public function consultarID($pedido) { // função que retorna a ID do pedido para inserir itens pedido


						$cadastrando = DaoPedido::getconexao()->prepare("SELECT id_pedido FROM pedido where cnpj = :cnpj and quant_itens = :quant_itens and data = :data and hora = :hora and status_pedido = :status_pedido and  id_consumidor = :id_consumidor ");
					$cadastrando->bindValue(":cnpj",$pedido->getCnpj());
					$cadastrando->bindValue(":quant_itens",$pedido->getQuant_itens());
					$cadastrando->bindValue(":data",$pedido->getData());
					$cadastrando->bindValue(":hora",$pedido->getHora());
					$cadastrando->bindValue(":status_pedido",$pedido->getStatus_pedido());
					$cadastrando->bindValue(":id_consumidor",$pedido->getId_consumidor());
							try{
									$cadastrando->execute();
							if($cadastrando->rowCount() > 0){

						$testar = $cadastrando->fetch(PDO::FETCH_OBJ);

						$codigoPedido = (int) $testar->id_pedido;



						return $codigoPedido;
						}
						 else {

							echo "<br> nenhum pedido encontrado";
						}

						}

						catch(PDOexception $e){


							echo "<br>nenum registro encontrado <br>". $e;
						}




		}


			private function cadastrarItensPedido($pedido) { // função que insere itens pedido

				foreach ($pedido->getItens_pedido() as $id) {
							 $id->setId_pedido($pedido->getId_pedido());


							$cadastrarItem  = DaoPedido::getconexao()->prepare("INSERT INTO itens_pedido(id_pedido,id_produto,nome_produto,valor_produto) VALUES (:id_pedido,:id_produto,:nome_produto,:valor_produto)");
							$cadastrarItem->bindValue(":id_pedido",$id->getId_pedido());
							$cadastrarItem->bindValue(":id_produto",$id->getId_produto());
							$cadastrarItem->bindValue(":nome_produto",$id->getNome_produto());
							$cadastrarItem->bindValue(":valor_produto",$id->getValor_produto());
								$cadastrarItem->execute();
								echo "<br> item pedido cadastrado com sucesso";

						}
			}

}

 ?>
