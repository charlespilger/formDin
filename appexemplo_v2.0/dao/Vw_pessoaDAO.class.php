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
class Vw_pessoaDAO 
{

    private static $sqlBasicSelect = 'select
                                      idpessoa
                                     ,cpfcnpj
                                     ,nome
                                     ,tipo
                                     ,sit_ativo
                                     ,dat_inclusao
                                     ,dat_inclusao_format
                                     ,cpf
                                     ,idpessoa_fisica
                                     ,cod_municipio_nascimento
                                     ,dat_nascimento
                                     ,dat_nascimento_format
                                     ,idnatureza_juridica
                                     ,cnpj
                                     from form_exemplo.vw_pessoa ';

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
            $where = SqlHelper::getAtributeWhereGridParameters($where, $whereGrid, 'IDPESSOA', SqlHelper::SQL_TYPE_NUMERIC);
            $where = SqlHelper::getAtributeWhereGridParameters($where, $whereGrid, 'CPFCNPJ', SqlHelper::SQL_TYPE_TEXT_LIKE);
            $where = SqlHelper::getAtributeWhereGridParameters($where, $whereGrid, 'NOME', SqlHelper::SQL_TYPE_TEXT_LIKE);
            $where = SqlHelper::getAtributeWhereGridParameters($where, $whereGrid, 'TIPO', SqlHelper::SQL_TYPE_TEXT_LIKE);
            $where = SqlHelper::getAtributeWhereGridParameters($where, $whereGrid, 'SIT_ATIVO', SqlHelper::SQL_TYPE_TEXT_LIKE);
            $where = SqlHelper::getAtributeWhereGridParameters($where, $whereGrid, 'DAT_INCLUSAO', SqlHelper::SQL_TYPE_TEXT_LIKE);
            $where = SqlHelper::getAtributeWhereGridParameters($where, $whereGrid, 'DAT_INCLUSAO_FORMAT', SqlHelper::SQL_TYPE_TEXT_LIKE);
            $where = SqlHelper::getAtributeWhereGridParameters($where, $whereGrid, 'CPF', SqlHelper::SQL_TYPE_TEXT_LIKE);
            $where = SqlHelper::getAtributeWhereGridParameters($where, $whereGrid, 'IDPESSOA_FISICA', SqlHelper::SQL_TYPE_NUMERIC);
            $where = SqlHelper::getAtributeWhereGridParameters($where, $whereGrid, 'COD_MUNICIPIO_NASCIMENTO', SqlHelper::SQL_TYPE_NUMERIC);
            $where = SqlHelper::getAtributeWhereGridParameters($where, $whereGrid, 'DAT_NASCIMENTO', SqlHelper::SQL_TYPE_TEXT_LIKE);
            $where = SqlHelper::getAtributeWhereGridParameters($where, $whereGrid, 'DAT_NASCIMENTO_FORMAT', SqlHelper::SQL_TYPE_TEXT_LIKE);
            $where = SqlHelper::getAtributeWhereGridParameters($where, $whereGrid, 'IDNATUREZA_JURIDICA', SqlHelper::SQL_TYPE_NUMERIC);
            $where = SqlHelper::getAtributeWhereGridParameters($where, $whereGrid, 'CNPJ', SqlHelper::SQL_TYPE_TEXT_LIKE);
            $result = $where;
        }
        return $result;
    }
    //--------------------------------------------------------------------------------
    public function selectById( $id )
    {
        FormDinHelper::validateIdIsNumeric($id,__METHOD__,__LINE__);
        $values = array($id);
        $sql = self::$sqlBasicSelect.' where idpessoa = ?';
        $result = $this->tpdo->executeSql($sql, $values);
        return $result;
    }
    //--------------------------------------------------------------------------------
    public function selectCount( $where=null )
    {
        $where = $this->processWhereGridParameters($where);
        $sql = 'select count(idpessoa) as qtd from form_exemplo.vw_pessoa';
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
    public function getVoById( $id )
    {
        FormDinHelper::validateIdIsNumeric($id,__METHOD__,__LINE__);
        $result = $this->selectById( $id );
        $result = \ArrayHelper::convertArrayFormDin2Pdo($result,false);
        $result = $result[0];
        $vo = new Vw_pessoaVO();
        $vo = \FormDinHelper::setPropertyVo($result,$vo);
        return $vo;
    }
}
?>