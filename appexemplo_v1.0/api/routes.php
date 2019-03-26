<?php
use Controllers\{
     SysinfoAPI
    ,Tb_pedidoAPI
    ,Tb_pedido_itemAPI
};

$app = new \Slim\App(slimConfiguration());

// =========================================

$app->group('', function() use ($app) {
    $app->get('/sysinfo', SysinfoAPI::class . ':getInfo');

    $app->get('/tb_pedido', Tb_pedidoAPI::class . ':selectAll');
    $app->get('/tb_pedido/{id:[0-9]+}', Tb_pedidoAPI::class . ':selectById');
    
    $app->get('/tb_pedido_item', Tb_pedido_itemAPI::class . ':selectAll');
    $app->get('/tb_pedido_item/{id:[0-9]+}', Tb_pedido_itemAPI::class . ':selectById');
    
    
});


/*
$app->post('/login', AuthController::class . ':login');
$app->post('/refresh-token', AuthController::class . ':refreshToken');

$app->get('/teste', function() { echo "oi"; })
    ->add(new JwtDateTimeMiddleware())
    ->add(jwtAuth());

$app->group('', function() use ($app) {
    $app->get('/loja', LojaController::class . ':getLojas');
    $app->post('/loja', LojaController::class . ':insertLoja');
    $app->put('/loja', LojaController::class . ':updateLoja');
    $app->delete('/loja', LojaController::class . ':deleteLoja');

    $app->get('/produto', ProdutoController::class . ':getProdutos');
    $app->post('/produto', ProdutoController::class . ':insertProduto');
    $app->put('/produto', ProdutoController::class . ':updateProduto');
    $app->delete('/produto', ProdutoController::class . ':deleteProduto');
})->add(basicAuth());
*/
// =========================================

$app->run();
