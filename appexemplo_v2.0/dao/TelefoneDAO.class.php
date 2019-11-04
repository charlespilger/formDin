<?php
/**
 * System generated by SysGen (System Generator with Formdin Framework) 
 * Download SysGen: https://github.com/bjverde/sysgen
 * Download Formdin Framework: https://github.com/bjverde/formDin
 * 
 * SysGen  Version: 1.10.1-alpha
 * FormDin Version: 4.7.9-alpha
 * 
 * System appev2 created in: 2019-11-01 22:23:15
 */
class TelefoneDAO 
{

    private static $sqlBasicSelect = 'select
                                      idtelefone
                                     ,numero
                                     ,idpessoa
                                     ,idtipo_telefone
                                     ,idendereco
                                     ,sit_fixo
                                     ,whastapp
                                     ,telegram
                                     ,dat_inclusao
                                     ,dat_alteracao
                                     from form_exemplo.telefone ';

    private $tpdo = null;

    public function __construct($tpdo=null)
    {
        FormDinHelper::validateObjTypeTPDOConnectionObj($tpdo,__METHOD__,__LINE__);
        if( empty($tpdo) ){
            $tpdo = New TPDOConnectionObj();
        }
        $this->setTPDOConnection($tpdo);
    }
    public function getTPDOConnection()
    {
        return $this->tpdo;
    }
    public function setTPDOConnection($tpdo)
    {
        FormDinHelper::validateObjTypeTPDOConnectionObj($tpdo,__METHOD__,__LINE__);
        $this->tpdo = $tpdo;
    }
    private function processWhereGridParameters( $whereGrid )
    {
        $result = $whereGrid;
        if ( is_array($whereGrid) ){
            $where = ' 1=1 ';
            $where = SqlHelper::getAtributeWhereGridParameters($where, $whereGrid, 'IDTELEFONE', SqlHelper::SQL_TYPE_NUMERIC);
            $where = SqlHelper::getAtributeWhereGridParameters($where, $whereGrid, 'NUMERO', SqlHelper::SQL_TYPE_TEXT_LIKE);
            $where = SqlHelper::getAtributeWhereGridParameters($where, $whereGrid, 'IDPESSOA', SqlHelper::SQL_TYPE_NUMERIC);
            $where = SqlHelper::getAtributeWhereGridParameters($where, $whereGrid, 'IDTIPO_TELEFONE', SqlHelper::SQL_TYPE_NUMERIC);
            $where = SqlHelper::getAtributeWhereGridParameters($where, $whereGrid, 'IDENDERECO', SqlHelper::SQL_TYPE_NUMERIC);
            $where = SqlHelper::getAtributeWhereGridParameters($where, $whereGrid, 'SIT_FIXO', SqlHelper::SQL_TYPE_TEXT_LIKE);
            $where = SqlHelper::getAtributeWhereGridParameters($where, $whereGrid, 'WHASTAPP', SqlHelper::SQL_TYPE_TEXT_LIKE);
            $where = SqlHelper::getAtributeWhereGridParameters($where, $whereGrid, 'TELEGRAM', SqlHelper::SQL_TYPE_TEXT_LIKE);
            $result = $where;
        }
        return $result;
    }
    //--------------------------------------------------------------------------------
    public function selectById( $id )
    {
        FormDinHelper::validateIdIsNumeric($id,__METHOD__,__LINE__);
        $values = array($id);
        $sql = self::$sqlBasicSelect.' where idtelefone = ?';
        $result = $this->tpdo->executeSql($sql, $values);
        return $result;
    }
    //--------------------------------------------------------------------------------
    public function selectCount( $where=null )
    {
        $where = $this->processWhereGridParameters($where);
        $sql = 'select count(idtelefone) as qtd from form_exemplo.telefone';
        $sql = $sql.( ($where)? ' where '.$where:'');
        $result = $this->tpdo->executeSql($sql);
        return $result['QTD'][0];
    }
    //--------------------------------------------------------------------------------
    public function selectAllPagination( $orderBy=null, $where=null, $page=null,  $rowsPerPage= null )
    {
        $rowStart = SqlHelper::getRowStart($page,$rowsPerPage);
        $where = $this->processWhereGridParameters($where);

        $sql = self::$sqlBasicSelect
        .( ($where)? ' where '.$where:'')
        .( ($orderBy) ? ' order by '.$orderBy:'')
        .( ' LIMIT '.$rowStart.','.$rowsPerPage);

        $result = $this->tpdo->executeSql($sql);
        return $result;
    }
    //--------------------------------------------------------------------------------
    public function selectAll( $orderBy=null, $where=null )
    {
        $where = $this->processWhereGridParameters($where);
        $sql = self::$sqlBasicSelect
        .( ($where)? ' where '.$where:'')
        .( ($orderBy) ? ' order by '.$orderBy:'');

        $result = $this->tpdo->executeSql($sql);
        return $result;
    }
    //--------------------------------------------------------------------------------
    public function insert( TelefoneVO $objVo )
    {
        $values = array(  $objVo->getNumero() 
                        , $objVo->getIdpessoa() 
                        , $objVo->getIdtipo_telefone() 
                        , $objVo->getIdendereco() 
                        , $objVo->getSit_fixo() 
                        , $objVo->getWhastapp() 
                        , $objVo->getTelegram() 
                        );
        $sql = 'insert into form_exemplo.telefone(
                                 numero
                                ,idpessoa
                                ,idtipo_telefone
                                ,idendereco
                                ,sit_fixo
                                ,whastapp
                                ,telegram
                                ) values (?,?,?,?,?,?,?)';
        $result = $this->tpdo->executeSql($sql, $values);
        $result = $this->tpdo->getLastInsertId();
        return intval($result);
    }
    //--------------------------------------------------------------------------------
    public function update ( TelefoneVO $objVo )
    {
        $values = array( $objVo->getNumero()
                        ,$objVo->getIdpessoa()
                        ,$objVo->getIdtipo_telefone()
                        ,$objVo->getIdendereco()
                        ,$objVo->getSit_fixo()
                        ,$objVo->getWhastapp()
                        ,$objVo->getTelegram()
                        ,$objVo->getIdtelefone() );
        $sql = 'update form_exemplo.telefone set 
                                 numero = ?
                                ,idpessoa = ?
                                ,idtipo_telefone = ?
                                ,idendereco = ?
                                ,sit_fixo = ?
                                ,whastapp = ?
                                ,telegram = ?
                                where idtelefone = ?';
        $result = $this->tpdo->executeSql($sql, $values);
        return intval($result);
    }
    //--------------------------------------------------------------------------------
    public function delete( $id )
    {
        FormDinHelper::validateIdIsNumeric($id,__METHOD__,__LINE__);
        $values = array($id);
        $sql = 'delete from form_exemplo.telefone where idtelefone = ?';
        $result = $this->tpdo->executeSql($sql, $values);
        return $result;
    }
    //--------------------------------------------------------------------------------
    public function getVoById( $id )
    {
        FormDinHelper::validateIdIsNumeric($id,__METHOD__,__LINE__);
        $result = $this->selectById( $id );
        $result = \ArrayHelper::convertArrayFormDin2Pdo($result,false);
        $result = $result[0];
        $vo = new TelefoneVO();
        $vo = \FormDinHelper::setPropertyVo($result,$vo);
        return $vo;
    }
}
?>