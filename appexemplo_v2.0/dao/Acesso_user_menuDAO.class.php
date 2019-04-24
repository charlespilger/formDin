<?php
/**
 * System generated by SysGen (System Generator with Formdin Framework) 
 * Download SysGen: https://github.com/bjverde/sysgen
 * Download Formdin Framework: https://github.com/bjverde/formDin
 * 
 * SysGen  Version: 1.3.1-alpha
 * FormDin Version: 4.5.1-alpha
 * 
 * System xx created in: 2019-04-14 20:35:32
 */
class Acesso_user_menuDAO extends TPDOConnection
{

    private static $sqlBasicSelect = 'select
                                      iduser
                                     ,login_user
                                     ,idperfil
                                     ,nom_perfil
                                     ,idmenu
                                     ,nom_menu
                                     from form_exemplo.acesso_user_menu ';

    private static function processWhereGridParameters( $whereGrid )
    {
        $result = $whereGrid;
        if ( is_array($whereGrid) ){
            $where = ' 1=1 ';
            $where = SqlHelper::getAtributeWhereGridParameters($where, $whereGrid, 'IDUSER', SqlHelper::SQL_TYPE_NUMERIC);
            $where = SqlHelper::getAtributeWhereGridParameters($where, $whereGrid, 'LOGIN_USER', SqlHelper::SQL_TYPE_NUMERIC);
            $where = SqlHelper::getAtributeWhereGridParameters($where, $whereGrid, 'IDPERFIL', SqlHelper::SQL_TYPE_NUMERIC);
            $where = SqlHelper::getAtributeWhereGridParameters($where, $whereGrid, 'NOM_PERFIL', SqlHelper::SQL_TYPE_NUMERIC);
            $where = SqlHelper::getAtributeWhereGridParameters($where, $whereGrid, 'IDMENU', SqlHelper::SQL_TYPE_NUMERIC);
            $where = SqlHelper::getAtributeWhereGridParameters($where, $whereGrid, 'NOM_MENU', SqlHelper::SQL_TYPE_NUMERIC);
            $result = $where;
        }
        return $result;
    }
    //--------------------------------------------------------------------------------
    public static function selectById( $id )
    {
        if( empty($id) || !is_numeric($id) ){
            throw new InvalidArgumentException();
        }
        $values = array($id);
        $sql = self::$sqlBasicSelect.' where iduser = ?';
        $result = self::executeSql($sql, $values );
        return $result;
    }
    //--------------------------------------------------------------------------------
    public static function selectCount( $where=null )
    {
        $where = self::processWhereGridParameters($where);
        $sql = 'select count(iduser) as qtd from form_exemplo.acesso_user_menu';
        $sql = $sql.( ($where)? ' where '.$where:'');
        $result = self::executeSql($sql);
        return $result['QTD'][0];
    }
    //--------------------------------------------------------------------------------
    public static function selectAllPagination( $orderBy=null, $where=null, $page=null,  $rowsPerPage= null )
    {
        $rowStart = PaginationSQLHelper::getRowStart($page,$rowsPerPage);
        $where = self::processWhereGridParameters($where);

        $sql = self::$sqlBasicSelect
        .( ($where)? ' where '.$where:'')
        .( ($orderBy) ? ' order by '.$orderBy:'')
        .( ' LIMIT '.$rowStart.','.$rowsPerPage);

        $result = self::executeSql($sql);
        return $result;
    }
    //--------------------------------------------------------------------------------
    public static function selectAll( $orderBy=null, $where=null )
    {
        $where = self::processWhereGridParameters($where);
        $sql = self::$sqlBasicSelect
        .( ($where)? ' where '.$where:'')
        .( ($orderBy) ? ' order by '.$orderBy:'');

        $result = self::executeSql($sql);
        return $result;
    }
    //--------------------------------------------------------------------------------
    public static function insert( Acesso_user_menuVO $objVo )
    {
        $values = array(  $objVo->getLogin_user() 
                        , $objVo->getIdperfil() 
                        , $objVo->getNom_perfil() 
                        , $objVo->getIdmenu() 
                        , $objVo->getNom_menu() 
                        );
        return self::executeSql('insert into form_exemplo.acesso_user_menu(
                                 login_user
                                ,idperfil
                                ,nom_perfil
                                ,idmenu
                                ,nom_menu
                                ) values (?,?,?,?,?)', $values );
    }
    //--------------------------------------------------------------------------------
    public static function update ( Acesso_user_menuVO $objVo )
    {
        $values = array( $objVo->getLogin_user()
                        ,$objVo->getIdperfil()
                        ,$objVo->getNom_perfil()
                        ,$objVo->getIdmenu()
                        ,$objVo->getNom_menu()
                        ,$objVo->getIduser() );
        return self::executeSql('update form_exemplo.acesso_user_menu set 
                                 login_user = ?
                                ,idperfil = ?
                                ,nom_perfil = ?
                                ,idmenu = ?
                                ,nom_menu = ?
                                where iduser = ?',$values);
    }
    //--------------------------------------------------------------------------------
    public static function delete( $id )
    {
        $values = array($id);
        return self::executeSql('delete from form_exemplo.acesso_user_menu where iduser = ?',$values);
    }
}
?>