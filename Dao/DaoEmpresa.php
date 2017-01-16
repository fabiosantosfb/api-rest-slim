<?php 
	require_once ('../vendor/autoload.php');
	require_once('conexao.php');


	class DaoEmpresa extends conexao{


		public function inserirEmpresa($empresa){


			$inserir = $empresa;


						$CNPJ = $inserir->get_cnpj();

				$cadastrando = DaoEmpresa::getconexao()->prepare("INSERT INTO empresa (nome_empresa,cnpj,razao_social,status_empresa,rua,cep,bairro,cidade,numero,complemento) VALUES(:nome_empresa,:cnpj,:razao,:status,:rua,:cep,:bairro,:cidade,:numero,:complemento)");

					$cadastrando->bindValue(":nome_empresa",$inserir->getnome_empresa());
					$cadastrando->bindValue("cnpj",$inserir->get_cnpj());
					$cadastrando->bindValue(":razao",$inserir->getrazao_social());
					$cadastrando->bindValue(":status",$inserir->getstatus_empresa());
					$cadastrando->bindValue(":rua",$inserir->getRua());
					$cadastrando->bindValue(":cep",$inserir->getCep());
					$cadastrando->bindValue(":bairro",$inserir->getBairro());
					$cadastrando->bindValue(":cidade",$inserir->getCidade());
					$cadastrando->bindValue(":numero",$inserir->getNumero());
					$cadastrando->bindValue("complemento",$inserir->getComplemento());

					$validar = DaoEmpresa::getconexao()->prepare("SELECT * FROM empresa where cnpj=?");
					$validar->execute(array($CNPJ));

					if($validar->rowCount()== 0){
						$cadastrando->execute();
						echo " <br> empresa cadastrada com sucesso";

						}  else{
							echo " <br> ja existe esse CNPJ cadastrado <br>";
							}


		}

		public function buscarCnpj($valor){

		  $buscar = DaoEmpresa::getconexao()->prepare("SELECT nome_empresa,cnpj,razao_social,status_empresa FROM empresa WHERE cnpj = :cnpj ");
				$buscar->bindValue(":cnpj",$valor);
				$buscar->execute();

					if($buscar->rowCount()== 0){

							echo "nenhuma empresa com esse CNPJ encontrada";

					} 	else {
								$testar = $buscar->fetchAll(PDO::FETCH_ASSOC);

									return $testar;
					}
		}


				public function buscarBairro($bairro){

		  $buscar = DaoEmpresa::getconexao()->prepare("SELECT nome_empresa,bairro,rua,numero FROM empresa WHERE bairro = :bairro and status_empresa = :status_empresa");
				$buscar->bindValue(":bairro",$bairro);
				$buscar->bindValue(":status_empresa",'A');
				$buscar->execute();

					if($buscar->rowCount()== 0){

							echo "nenhuma padaria encontrada no seu endereco atual";

					} 	else {
								$testar = $buscar->fetchAll(PDO::FETCH_ASSOC);
										//print_r($testar);
									return $testar;
					}
		}





	}










 ?>