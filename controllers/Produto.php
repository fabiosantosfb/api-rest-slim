<?php
namespace controllers{

  class Produto extends \Dao\Conexao {

    public function __construct() {}

    //LISTAR PANIFICADORAS POR BAIRRO
    public function getProdutoPanificadora($panificadora){
      global $app;
      $query = Parent::getInstanceConexao()->prepare("SELECT * FROM produto WHERE id_panificadora = :panificadora");
      $query->bindValue(':panificadora',$panificadora);
      $query->execute();
      $result = $query->fetch(\PDO::FETCH_ASSOC);

      $app->render('default.php',["data"=>$result],200);
    }

  }
}
