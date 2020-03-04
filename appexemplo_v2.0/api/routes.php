<?php
/**
 * System generated by SysGen (System Generator with Formdin Framework) 
 * Download SysGen: https://github.com/bjverde/sysgen
 * Download Formdin Framework: https://github.com/bjverde/formDin
 * 
 * SysGen  Version: 1.9.0-alpha
 * FormDin Version: 4.7.5
 * 
 * System appev2 created in: 2019-09-10 09:04:46
 */

use api_controllers\SysinfoAPI;
use api_controllers\SelfilhosmenuAPI;
use api_controllers\SelfilhosmenuqtdAPI;
use api_controllers\SelmenuqtdAPI;
use api_controllers\Acesso_menuAPI;
use api_controllers\Acesso_perfilAPI;
use api_controllers\Acesso_perfil_menuAPI;
use api_controllers\Acesso_perfil_userAPI;
use api_controllers\Acesso_userAPI;
use api_controllers\Acesso_user_menuAPI;
use api_controllers\AutoridadeAPI;
use api_controllers\EnderecoAPI;
use api_controllers\MarcaAPI;
use api_controllers\Meta_tipoAPI;
use api_controllers\MunicipioAPI;
use api_controllers\Natureza_juridicaAPI;
use api_controllers\PedidoAPI;
use api_controllers\Pedido_itemAPI;
use api_controllers\PessoaAPI;
use api_controllers\Pessoa_fisicaAPI;
use api_controllers\Pessoa_juridicaAPI;
use api_controllers\ProdutoAPI;
use api_controllers\RegiaoAPI;
use api_controllers\TelefoneAPI;
use api_controllers\TipoAPI;
use api_controllers\UfAPI;
use api_controllers\Vw_acesso_user_menuAPI;
use api_controllers\Vw_pessoaAPI;
use api_controllers\Vw_pessoa_marca_produtoAPI;

$app = new \Slim\App(slimConfiguration());

$app->get("/", function ($request, $response, $args) use ($app) {
    $url = \ServerHelper::getCurrentUrl();
    $url = substr($url,0,strlen($url)-1);
    $routes = $app->getContainer()->router->getRoutes();
    $routesArray = array();
    foreach ($routes as $route) {
        $routeArray = array();
        $met = $route->getMethods();
        $routeArray['methods']  = $met[0];
        $routeArray['url']  = $url.$route->getPattern();
        $routesArray[] = $routeArray;
    }

    $msg = array( 'info'=> SysinfoAPI::info()
                , 'endpoints'=>array( 'qtd'=> \CountHelper::count($routesArray)
                                    ,'result'=>$routesArray
                                    )
                );

    $response = $response->withJson($msg);
    return $response;
});
//})->add(basicAuth());

$app->get('/sysinfo', SysinfoAPI::class . ':getInfo');



//--------------------------------------------------------------------
//  VIEW: selFilhosMenu
//--------------------------------------------------------------------
$app->group('/selfilhosmenu', function() use ($app) {
    $app->get('', SelfilhosmenuAPI::class . ':selectAll');
    $app->get('/{id:[0-9]+}', SelfilhosmenuAPI::class . ':selectById');

});


//--------------------------------------------------------------------
//  VIEW: selFilhosMenuQtd
//--------------------------------------------------------------------
$app->group('/selfilhosmenuqtd', function() use ($app) {
    $app->get('', SelfilhosmenuqtdAPI::class . ':selectAll');
    $app->get('/{id:[0-9]+}', SelfilhosmenuqtdAPI::class . ':selectById');

});


//--------------------------------------------------------------------
//  VIEW: selMenuQtd
//--------------------------------------------------------------------
$app->group('/selmenuqtd', function() use ($app) {
    $app->get('', SelmenuqtdAPI::class . ':selectAll');
    $app->get('/{id:[0-9]+}', SelmenuqtdAPI::class . ':selectById');

});


//--------------------------------------------------------------------
//  TABLE: acesso_menu
//--------------------------------------------------------------------
$app->group('/acesso_menu', function() use ($app) {
    $app->get('', Acesso_menuAPI::class . ':selectAll');
    $app->get('/{id:[0-9]+}', Acesso_menuAPI::class . ':selectById');


    $app->post('', Acesso_menuAPI::class . ':save');
    $app->put('/{id:[0-9]+}', Acesso_menuAPI::class . ':save');
    $app->delete('/{id:[0-9]+}', Acesso_menuAPI::class . ':delete');
});


//--------------------------------------------------------------------
//  TABLE: acesso_perfil
//--------------------------------------------------------------------
$app->group('/acesso_perfil', function() use ($app) {
    $app->get('', Acesso_perfilAPI::class . ':selectAll');
    $app->get('/{id:[0-9]+}', Acesso_perfilAPI::class . ':selectById');


    $app->post('', Acesso_perfilAPI::class . ':save');
    $app->put('/{id:[0-9]+}', Acesso_perfilAPI::class . ':save');
    $app->delete('/{id:[0-9]+}', Acesso_perfilAPI::class . ':delete');
});


//--------------------------------------------------------------------
//  TABLE: acesso_perfil_menu
//--------------------------------------------------------------------
$app->group('/acesso_perfil_menu', function() use ($app) {
    $app->get('', Acesso_perfil_menuAPI::class . ':selectAll');
    $app->get('/{id:[0-9]+}', Acesso_perfil_menuAPI::class . ':selectById');


    $app->post('', Acesso_perfil_menuAPI::class . ':save');
    $app->put('/{id:[0-9]+}', Acesso_perfil_menuAPI::class . ':save');
    $app->delete('/{id:[0-9]+}', Acesso_perfil_menuAPI::class . ':delete');
});


//--------------------------------------------------------------------
//  TABLE: acesso_perfil_user
//--------------------------------------------------------------------
$app->group('/acesso_perfil_user', function() use ($app) {
    $app->get('', Acesso_perfil_userAPI::class . ':selectAll');
    $app->get('/{id:[0-9]+}', Acesso_perfil_userAPI::class . ':selectById');


    $app->post('', Acesso_perfil_userAPI::class . ':save');
    $app->put('/{id:[0-9]+}', Acesso_perfil_userAPI::class . ':save');
    $app->delete('/{id:[0-9]+}', Acesso_perfil_userAPI::class . ':delete');
});


//--------------------------------------------------------------------
//  TABLE: acesso_user
//--------------------------------------------------------------------
$app->group('/acesso_user', function() use ($app) {
    $app->get('', Acesso_userAPI::class . ':selectAll');
    $app->get('/{id:[0-9]+}', Acesso_userAPI::class . ':selectById');


    $app->post('', Acesso_userAPI::class . ':save');
    $app->put('/{id:[0-9]+}', Acesso_userAPI::class . ':save');
    $app->delete('/{id:[0-9]+}', Acesso_userAPI::class . ':delete');
});


//--------------------------------------------------------------------
//  TABLE: autoridade
//--------------------------------------------------------------------
$app->group('/autoridade', function() use ($app) {
    $app->get('', AutoridadeAPI::class . ':selectAll');
    $app->get('/{id:[0-9]+}', AutoridadeAPI::class . ':selectById');


    $app->post('', AutoridadeAPI::class . ':save');
    $app->put('/{id:[0-9]+}', AutoridadeAPI::class . ':save');
    $app->delete('/{id:[0-9]+}', AutoridadeAPI::class . ':delete');
});


//--------------------------------------------------------------------
//  TABLE: endereco
//--------------------------------------------------------------------
$app->group('/endereco', function() use ($app) {
    $app->get('', EnderecoAPI::class . ':selectAll');
    $app->get('/{id:[0-9]+}', EnderecoAPI::class . ':selectById');


    $app->post('', EnderecoAPI::class . ':save');
    $app->put('/{id:[0-9]+}', EnderecoAPI::class . ':save');
    $app->delete('/{id:[0-9]+}', EnderecoAPI::class . ':delete');
});


//--------------------------------------------------------------------
//  TABLE: marca
//--------------------------------------------------------------------
$app->group('/marca', function() use ($app) {
    $app->get('', MarcaAPI::class . ':selectAll');
    $app->get('/{id:[0-9]+}', MarcaAPI::class . ':selectById');


    $app->post('', MarcaAPI::class . ':save');
    $app->put('/{id:[0-9]+}', MarcaAPI::class . ':save');
    $app->delete('/{id:[0-9]+}', MarcaAPI::class . ':delete');
});


//--------------------------------------------------------------------
//  TABLE: meta_tipo
//--------------------------------------------------------------------
$app->group('/meta_tipo', function() use ($app) {
    $app->get('', Meta_tipoAPI::class . ':selectAll');
    $app->get('/{id:[0-9]+}', Meta_tipoAPI::class . ':selectById');


    $app->post('', Meta_tipoAPI::class . ':save');
    $app->put('/{id:[0-9]+}', Meta_tipoAPI::class . ':save');
    $app->delete('/{id:[0-9]+}', Meta_tipoAPI::class . ':delete');
});


//--------------------------------------------------------------------
//  TABLE: municipio
//--------------------------------------------------------------------
$app->group('/municipio', function() use ($app) {
    $app->get('', MunicipioAPI::class . ':selectAll');
    $app->get('/{id:[0-9]+}', MunicipioAPI::class . ':selectById');


    $app->post('', MunicipioAPI::class . ':save');
    $app->put('/{id:[0-9]+}', MunicipioAPI::class . ':save');
    $app->delete('/{id:[0-9]+}', MunicipioAPI::class . ':delete');
});


//--------------------------------------------------------------------
//  TABLE: natureza_juridica
//--------------------------------------------------------------------
$app->group('/natureza_juridica', function() use ($app) {
    $app->get('', Natureza_juridicaAPI::class . ':selectAll');
    $app->get('/{id:[0-9]+}', Natureza_juridicaAPI::class . ':selectById');


    $app->post('', Natureza_juridicaAPI::class . ':save');
    $app->put('/{id:[0-9]+}', Natureza_juridicaAPI::class . ':save');
    $app->delete('/{id:[0-9]+}', Natureza_juridicaAPI::class . ':delete');
});


//--------------------------------------------------------------------
//  TABLE: pedido
//--------------------------------------------------------------------
$app->group('/pedido', function() use ($app) {
    $app->get('', PedidoAPI::class . ':selectAll');
    $app->get('/{id:[0-9]+}', PedidoAPI::class . ':selectById');


    $app->post('', PedidoAPI::class . ':save');
    $app->put('/{id:[0-9]+}', PedidoAPI::class . ':save');
    $app->delete('/{id:[0-9]+}', PedidoAPI::class . ':delete');
});


//--------------------------------------------------------------------
//  TABLE: pedido_item
//--------------------------------------------------------------------
$app->group('/pedido_item', function() use ($app) {
    $app->get('', Pedido_itemAPI::class . ':selectAll');
    $app->get('/{id:[0-9]+}', Pedido_itemAPI::class . ':selectById');


    $app->post('', Pedido_itemAPI::class . ':save');
    $app->put('/{id:[0-9]+}', Pedido_itemAPI::class . ':save');
    $app->delete('/{id:[0-9]+}', Pedido_itemAPI::class . ':delete');
});


//--------------------------------------------------------------------
//  TABLE: pessoa
//--------------------------------------------------------------------
$app->group('/pessoa', function() use ($app) {
    $app->get('', PessoaAPI::class . ':selectAll');
    $app->get('/{id:[0-9]+}', PessoaAPI::class . ':selectById');


    $app->post('', PessoaAPI::class . ':save');
    $app->put('/{id:[0-9]+}', PessoaAPI::class . ':save');
    $app->delete('/{id:[0-9]+}', PessoaAPI::class . ':delete');
});


//--------------------------------------------------------------------
//  TABLE: pessoa_fisica
//--------------------------------------------------------------------
$app->group('/pessoa_fisica', function() use ($app) {
    $app->get('', Pessoa_fisicaAPI::class . ':selectAll');
    $app->get('/{id:[0-9]+}', Pessoa_fisicaAPI::class . ':selectById');


    $app->post('', Pessoa_fisicaAPI::class . ':save');
    $app->put('/{id:[0-9]+}', Pessoa_fisicaAPI::class . ':save');
    $app->delete('/{id:[0-9]+}', Pessoa_fisicaAPI::class . ':delete');
});


//--------------------------------------------------------------------
//  TABLE: pessoa_juridica
//--------------------------------------------------------------------
$app->group('/pessoa_juridica', function() use ($app) {
    $app->get('', Pessoa_juridicaAPI::class . ':selectAll');
    $app->get('/{id:[0-9]+}', Pessoa_juridicaAPI::class . ':selectById');


    $app->post('', Pessoa_juridicaAPI::class . ':save');
    $app->put('/{id:[0-9]+}', Pessoa_juridicaAPI::class . ':save');
    $app->delete('/{id:[0-9]+}', Pessoa_juridicaAPI::class . ':delete');
});


//--------------------------------------------------------------------
//  TABLE: produto
//--------------------------------------------------------------------
$app->group('/produto', function() use ($app) {
    $app->get('', ProdutoAPI::class . ':selectAll');
    $app->get('/{id:[0-9]+}', ProdutoAPI::class . ':selectById');


    $app->post('', ProdutoAPI::class . ':save');
    $app->put('/{id:[0-9]+}', ProdutoAPI::class . ':save');
    $app->delete('/{id:[0-9]+}', ProdutoAPI::class . ':delete');
});


//--------------------------------------------------------------------
//  TABLE: regiao
//--------------------------------------------------------------------
$app->group('/regiao', function() use ($app) {
    $app->get('', RegiaoAPI::class . ':selectAll');
    $app->get('/{id:[0-9]+}', RegiaoAPI::class . ':selectById');


    $app->post('', RegiaoAPI::class . ':save');
    $app->put('/{id:[0-9]+}', RegiaoAPI::class . ':save');
    $app->delete('/{id:[0-9]+}', RegiaoAPI::class . ':delete');
});


//--------------------------------------------------------------------
//  TABLE: telefone
//--------------------------------------------------------------------
$app->group('/telefone', function() use ($app) {
    $app->get('', TelefoneAPI::class . ':selectAll');
    $app->get('/{id:[0-9]+}', TelefoneAPI::class . ':selectById');


    $app->post('', TelefoneAPI::class . ':save');
    $app->put('/{id:[0-9]+}', TelefoneAPI::class . ':save');
    $app->delete('/{id:[0-9]+}', TelefoneAPI::class . ':delete');
});


//--------------------------------------------------------------------
//  TABLE: tipo
//--------------------------------------------------------------------
$app->group('/tipo', function() use ($app) {
    $app->get('', TipoAPI::class . ':selectAll');
    $app->get('/{id:[0-9]+}', TipoAPI::class . ':selectById');


    $app->post('', TipoAPI::class . ':save');
    $app->put('/{id:[0-9]+}', TipoAPI::class . ':save');
    $app->delete('/{id:[0-9]+}', TipoAPI::class . ':delete');
});


//--------------------------------------------------------------------
//  TABLE: uf
//--------------------------------------------------------------------
$app->group('/uf', function() use ($app) {
    $app->get('', UfAPI::class . ':selectAll');
    $app->get('/{id:[0-9]+}', UfAPI::class . ':selectById');


    $app->post('', UfAPI::class . ':save');
    $app->put('/{id:[0-9]+}', UfAPI::class . ':save');
    $app->delete('/{id:[0-9]+}', UfAPI::class . ':delete');
});


//--------------------------------------------------------------------
//  VIEW: vw_acesso_user_menu
//--------------------------------------------------------------------
$app->group('/vw_acesso_user_menu', function() use ($app) {
    $app->get('', Vw_acesso_user_menuAPI::class . ':selectAll');
    $app->get('/{id:[0-9]+}', Vw_acesso_user_menuAPI::class . ':selectById');

});


//--------------------------------------------------------------------
//  VIEW: vw_pessoa
//--------------------------------------------------------------------
$app->group('/vw_pessoa', function() use ($app) {
    $app->get('', Vw_pessoaAPI::class . ':selectAll');
    $app->get('/{id:[0-9]+}', Vw_pessoaAPI::class . ':selectById');

});


//--------------------------------------------------------------------
//  VIEW: vw_pessoa_marca_produto
//--------------------------------------------------------------------
$app->group('/vw_pessoa_marca_produto', function() use ($app) {
    $app->get('', Vw_pessoa_marca_produtoAPI::class . ':selectAll');
    $app->get('/{id:[0-9]+}', Vw_pessoa_marca_produtoAPI::class . ':selectById');

});

$app->run();