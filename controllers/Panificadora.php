<?php
namespace controllers{

  class Panificadora extends \Dao\Conexao {

    public function __construct() {}

    //LISTAR PANIFICADORAS POR BAIRRO
    public function getPanificadoraBairro($bairro){
      global $app;
      $query = Parent::getInstanceConexao()->prepare("SELECT * FROM panificadora WHERE bairro = :bairro");
      $query->bindValue(':bairro',$bairro);
      $query->execute();
      $result = $query->fetchAll(\PDO::FETCH_ASSOC);

      $app->render('default.php',["data"=>$result],200);
    }

    //LISTAR TODAS PANIFICADORA PARA O ADMINISTRADOR DO SISTEMA
    public function getPanificadora(){
      global $app;
      $query = Parent::getInstanceConexao()->prepare("SELECT * FROM panificadora");
      $query->execute();
      $result = $query->fetchAll(\PDO::FETCH_ASSOC);

      $app->render('default.php',["data"=>$result],200);
    }

    //LISTA PARA UM RETORNO CUSTOMIZADO DAS PANIFICADORA PARA O ADMINISTRADOR DO SISTEMA
    public function getCustom($query){
      global $app;
      $query = Parent::getInstanceConexao()->prepare("SELECT * FROM panificadora {$query}");
      $query->execute();
      $result = $query->fetchAll(\PDO::FETCH_ASSOC);

      $app->render('default.php',["data"=>$result],200);
    }
  }
}
