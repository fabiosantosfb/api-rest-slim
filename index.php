<?php
//Autoload
$loader = require_once 'vendor/autoload.php';

//Instanciando objeto
$app = new \Slim\Slim(array(
    'templates.path' => 'templates'
));

//Listar panificadora por bairro
$app->get('/padatec/api/rest/panificadora/?bairro=:bairro', function($bairro) use ($app){
	(new \controllers\Panificadora($app))->getPanificadoraBairro($bairro);
});

//Listar produtos da panificadora selecionada
$app->get('/padatec/api/rest/produto/:panificadora', function($panificadora) use ($app){
	(new \controllers\Produto($app))->getProdutoPanificadora($panificadora);
});

//Login de usuario
$app->post('/padatec/api/rest/usuario/login/', function() use ($app){
	(new \controllers\Usuario($app))->login();
});

//Cadastro de usuario
$app->post('/padatec/api/rest/usuario/registre', function() use ($app){
	(new \controllers\Usuario($app))->cadastrarUser();
});



//Listar todas panificadora para administrador
$app->get('/padatec/api/rest/panificadora/', function() use ($app){
	(new \controllers\Panificadora($app))->getPanificadora();
});

//Listar dados das panificadora customisado para administrador
$app->get('/padatec/api/rest/panificadora/custom/query/:query', function($query) use ($app){
	(new \controllers\Panificadora($app))->getCustom($query);
});










//nova pessoa
$app->post('/pessoas/', function() use ($app){
	(new \controllers\Pessoa($app))->nova();
});

//edita pessoa
$app->put('/pessoas/:id', function($id) use ($app){
	(new \controllers\Pessoa($app))->editar($id);
});

//apaga pessoa
$app->delete('/pessoas/:id', function($id) use ($app){
	(new \controllers\Pessoa($app))->excluir($id);
});

//Rodando aplicação
$app->run();
