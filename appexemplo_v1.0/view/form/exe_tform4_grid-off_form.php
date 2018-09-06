<?php

$html1 = 'Esse form é um outra visão do form <i>"Mestre visão com Ajax" e "Exemplo Form4 - Consulta Grid"</i>.
          <br>
          <br>Este exemplo utiliza as tabelas tb_pedido e tb_pedido_item do banco de dados bdApoio.s3db ( sqlite )  ';


$primaryKey = 'ID_PEDIDO';
$frm = new TForm('Exemplo Form4 - Grid Off', 800);
$frm->setFlat(true);
$frm->setMaximize(true);


$frm->addHiddenField($primaryKey); // coluna chave da tabela
$frm->addHtmlField('html1', $html1, null, null, null, null)->setCss('border', '1px solid #ffeb3b')->setCss('background-color', '#ffffcc')->setCss('margin-bottom', '10px');


$frm->addGroupField('gpx1', 'Pedido');
    $frm->addTextField('nome_comprador', 'Comprador:', 60, false, null);
    $frm->addDateField('data_pedido', 'Data:', false);
    $listFormas = array(1=>'Dinheiro',2=>'Cheque',3=>'Cartão');
    $frm->addSelectField('forma_pagamento', 'Forma Pagamento:', false, $listFormas,false);
$frm->closeGroup();
$frm->addGroupField('gpx2', 'Itens');
    // subformulário com campos "offline" 1-N
    $frm->addHtmlGride('grid_off', 'view/form/exe_tform4_grid-off_dados.php', 'gdx');

    /*
    $frm->addTextField('item', 'item:', 10, false, null);
    $frm->addTextField('produto', 'Produto:', 30, false, null);
    $frm->addNumberField('quantidade', 'Quantidade:', 5, true, 1, true)->setEnabled(false);
    $frm->addNumberField('preco', 'Preço:', 10, true, 2, true)->setEnabled(false);
    */
$frm->closeGroup();


$frm->addButton('Ver Fomr04 - Conulta Pedidos', 'backForm4p1', null, null, null, true, false);
$frm->addButton('Limpar', null, 'Limpar', null, null, false, false);

$acao = isset($acao) ? $acao : null;
switch ($acao) {
    case 'Salvar':
        if ($frm->validate()) {
            $vo = new Vw_pedido_qtd_itensVO();
            $frm->setVo($vo);
            $resultado = Vw_pedido_qtd_itensDAO::insert($vo);
            if ($resultado==1) {
                $frm->setMessage('Registro gravado com sucesso!!!');
                $frm->clearFields();
            } else {
                $frm->setMessage($resultado);
            }
        }
        break;
    //--------------------------------------------------------------------------------
    case 'Limpar':
        $frm->clearFields();
        break;
    //--------------------------------------------------------------------------------
    case 'backForm4p1':
        $frm->redirect('view/form/exe_tform4_consulta_tree_p1.php', null, true);
        break;
}



$frm->show();
?>