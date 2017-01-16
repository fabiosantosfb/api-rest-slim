<?php 

require_once ('../vendor/autoload.php');
	require_once('conexao.php');



	class DaoProduto extends conexao {

		public function inserirProduto($produto){




				$cadastrando = DaoProduto::getconexao()->prepare("INSERT INTO produto (nome_produto,cnpj,preco_produto,tipo_preco,descricao_produto,disponivel,grupo) VALUES (:nome_produto,:cnpj,:preco_produto,:tipo_preco,:descricao_produto,:disponivel,:grupo)");

					$cadastrando->bindValue(":nome_produto",$produto->getNome_produto());
					$cadastrando->bindValue("cnpj",$produto->getCnpj());
					$cadastrando->bindValue(":preco_produto",$produto->getPreco_produto());
					$cadastrando->bindValue(":tipo_preco",$produto->getTipo_preco());
					$cadastrando->bindValue(":descricao_produto",$produto->getDescricao());
					$cadastrando->bindValue(":disponivel",$produto->getDisponivel());
					$cadastrando->bindValue(":grupo",$produto->getGrupo());

					if($cadastrando->execute()){

						echo "<br>produto cadastrado com sucesso";
					} else {

						echo "<br>falha ao cadastrar o produto";
					}



	}

}

 ?>