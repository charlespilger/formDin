<?php
/**
 * System generated by SysGen (System Generator with Formdin Framework) 
 * Download SysGen: https://github.com/bjverde/sysgen
 * Download Formdin Framework: https://github.com/bjverde/formDin
 * 
 * SysGen  Version: 1.9.0-alpha
 * FormDin Version: 4.7.5-alpha
 * 
 * System appev2 created in: 2019-09-01 16:03:50
 */

defined('APLICATIVO') or die();

$primaryKey = 'IDUSER';
$frm = new TForm('acesso_user_menu',800,950);
$frm->setShowCloseButton(false);
$frm->setFlat(true);
$frm->setMaximize(true);
$frm->setHelpOnLine('Ajuda',600,980,'ajuda/ajuda_tela.php',null);


$frm->addHiddenField( 'BUSCAR' ); //Campo oculto para buscas
$frm->addHiddenField( $primaryKey );   // coluna chave da tabela
$frm->addNumberField('LOGIN_USER', 'LOGIN_USER',10,false,0);
$frm->addNumberField('IDPERFIL', 'id Perfil',10,false,0);
$frm->addNumberField('NOM_PERFIL', 'NOM_PERFIL',10,false,0);
$frm->addNumberField('IDMENU', 'id Menu',10,false,0);
$frm->addNumberField('NOM_MENU', 'NOM_MENU',10,false,0);

$frm->addButton('Buscar', null, 'btnBuscar', 'buscar()', null, true, false);
$frm->addButton('Salvar', null, 'Salvar', null, null, false, false);
$frm->addButton('Limpar', null, 'Limpar', null, null, false, false);


$acao = isset($acao) ? $acao : null;
switch( $acao ) {
    //--------------------------------------------------------------------------------
    case 'Limpar':
        $frm->clearFields();
    break;
    //--------------------------------------------------------------------------------
    case 'Salvar':
        try{
            if ( $frm->validate() ) {
                $vo = new Acesso_user_menuVO();
                $frm->setVo( $vo );
                $controller = new Acesso_user_menu();
                $resultado = $controller->save( $vo );
                if($resultado==1) {
                    $frm->setMessage('Registro gravado com sucesso!!!');
                    $frm->clearFields();
                }else{
                    $frm->setMessage($resultado);
                }
            }
        }
        catch (DomainException $e) {
            $frm->setMessage( $e->getMessage() );
        }
        catch (Exception $e) {
            MessageHelper::logRecord($e);
            $frm->setMessage( $e->getMessage() );
        }
    break;
    //--------------------------------------------------------------------------------
    case 'gd_excluir':
        try{
            $id = $frm->get( $primaryKey ) ;
            $controller = new Acesso_user_menu();
            $resultado = $controller->delete( $id );
            if($resultado==1) {
                $frm->setMessage('Registro excluido com sucesso!!!');
                $frm->clearFields();
            }else{
                $frm->setMessage($resultado);
            }
        }
        catch (DomainException $e) {
            $frm->setMessage( $e->getMessage() );
        }
        catch (Exception $e) {
            MessageHelper::logRecord($e);
            $frm->setMessage( $e->getMessage() );
        }
    break;
}


function getWhereGridParameters(&$frm)
{
    $retorno = null;
    if($frm->get('BUSCAR') == 1 ){
        $retorno = array(
                'IDUSER'=>$frm->get('IDUSER')
                ,'LOGIN_USER'=>$frm->get('LOGIN_USER')
                ,'IDPERFIL'=>$frm->get('IDPERFIL')
                ,'NOM_PERFIL'=>$frm->get('NOM_PERFIL')
                ,'IDMENU'=>$frm->get('IDMENU')
                ,'NOM_MENU'=>$frm->get('NOM_MENU')
        );
    }
    return $retorno;
}

if( isset( $_REQUEST['ajax'] )  && $_REQUEST['ajax'] ) {
    $maxRows = ROWS_PER_PAGE;
    $whereGrid = getWhereGridParameters($frm);
    $controller = new Acesso_user_menu();
    $page = PostHelper::get('page');
    $dados = $controller->selectAllPagination( $primaryKey, $whereGrid, $page,  $maxRows);
    $realTotalRowsSqlPaginator = $controller->selectCount( $whereGrid );
    $mixUpdateFields = $primaryKey.'|'.$primaryKey
                    .',LOGIN_USER|LOGIN_USER'
                    .',IDPERFIL|IDPERFIL'
                    .',NOM_PERFIL|NOM_PERFIL'
                    .',IDMENU|IDMENU'
                    .',NOM_MENU|NOM_MENU'
                    ;
    $gride = new TGrid( 'gd'                        // id do gride
    				   ,'Gride with SQL Pagination. Qtd: '.$realTotalRowsSqlPaginator // titulo do gride
    				   );
    $gride->addKeyField( $primaryKey ); // chave primaria
    $gride->setData( $dados ); // array de dados
    $gride->setRealTotalRowsSqlPaginator( $realTotalRowsSqlPaginator );
    $gride->setMaxRows( $maxRows );
    $gride->setUpdateFields($mixUpdateFields);
    $gride->setUrl( 'acesso_user_menu.php' );

    $gride->addColumn($primaryKey,'id');
    $gride->addColumn('LOGIN_USER','LOGIN_USER');
    $gride->addColumn('IDPERFIL','id Perfil');
    $gride->addColumn('NOM_PERFIL','NOM_PERFIL');
    $gride->addColumn('IDMENU','id Menu');
    $gride->addColumn('NOM_MENU','NOM_MENU');


    $gride->show();
    die();
}

$frm->addHtmlField('gride');
$frm->addJavascript('init()');
$frm->show();

?>
<script>
function init() {
    var Parameters = {"BUSCAR":""
                    ,"IDUSER":""
                    ,"LOGIN_USER":""
                    ,"IDPERFIL":""
                    ,"NOM_PERFIL":""
                    ,"IDMENU":""
                    ,"NOM_MENU":""
                    };
    fwGetGrid('acesso_user_menu.php','gride',Parameters,true);
}
function buscar() {
    jQuery("#BUSCAR").val(1);
    init();
}
</script>