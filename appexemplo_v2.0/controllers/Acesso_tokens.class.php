<?php
/**
 * System generated by SysGen (System Generator with Formdin Framework) 
 * Download SysGen: https://github.com/bjverde/sysgen
 * Download Formdin Framework: https://github.com/bjverde/formDin
 * 
 * SysGen  Version: 1.11.0
 * FormDin Version: 4.9.0
 * 
 * System xxx created in: 2020-03-04 21:02:53
 */
class Acesso_tokens
{


    private $dao = null;

    public function __construct($tpdo = null)
    {
        $this->dao = new Acesso_tokensDAO($tpdo);
    }
    public function getDao()
    {
        return $this->dao;
    }
    public function setDao($dao)
    {
        $this->dao = $dao;
    }
    //--------------------------------------------------------------------------------
    public function selectById( $id )
    {
        $result = $this->dao->selectById( $id );
        return $result;
    }
    //--------------------------------------------------------------------------------
    public function selectCount( $where=null )
    {
        $result = $this->dao->selectCount( $where );
        return $result;
    }
    //--------------------------------------------------------------------------------
    public function selectAllPagination( $orderBy=null, $where=null, $page=null,  $rowsPerPage= null)
    {
        $result = $this->dao->selectAllPagination( $orderBy, $where, $page,  $rowsPerPage );
        return $result;
    }
    //--------------------------------------------------------------------------------
    public function selectAll( $orderBy=null, $where=null )
    {
        $result = $this->dao->selectAll( $orderBy, $where );
        return $result;
    }
    //--------------------------------------------------------------------------------
    public function save( Acesso_tokensVO $objVo )
    {
        $result = null;
        if( $objVo->getIdacesso_tokens() ) {
            $result = $this->dao->update( $objVo );
        } else {
            $result = $this->dao->insert( $objVo );
        }
        return $result;
    }
    //--------------------------------------------------------------------------------
    public function delete( $id )
    {
        $result = $this->dao->delete( $id );
        return $result;
    }
    //--------------------------------------------------------------------------------
    public function getVoById( $id )
    {
        $result = $this->dao->getVoById( $id );
        return $result;
    }

}
?>