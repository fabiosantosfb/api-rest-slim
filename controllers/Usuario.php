<?php
namespace controllers{

  class Usuario extends \Dao\Conexao {

    function __construct(){ }

      //LISTAR PANIFICADORAS POR BAIRRO
      public function login(){
        global $app;
        $dados = json_decode($app->request->getBody(), true);
        $dados = (sizeof($dados)==0)? $_POST : $dados;
        $keys = array_keys($dados);

        $query = Parent::getInstanceConexao()->prepare("SELECT * FROM usuario WHERE login = :login AND senha = :senha");
        foreach ($dados as $key => $value) {
          $query->bindValue(':'.$key,$value);
        }
        $query->execute();
        $result = $query->fetch(\PDO::FETCH_ASSOC);

        $app->render('default.php',["data"=>$result],200);
      }

      public function cadastrarUser(){
        global $app;
        $dados = json_decode($app->request->getBody(), true);
        $dados = (sizeof($dados)==0)? $_POST : $dados;
        $keys = array_keys($dados);


        $sth = Parent::getInstanceConexao()->prepare("INSERT INTO usuario (".implode(',', $keys).") VALUES (:".implode(",:", $keys).")");
        foreach ($dados as $key => $value) {
          $sth ->bindValue(':'.$key,$value);
        }
        $sth->execute();

        //Retorna o id inserido
        $app->render('default.php',["data"=>['id'=>Parent::getInstanceConexao()->lastInsertId()]],200);
      }
  }
}
