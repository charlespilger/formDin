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
class TipoVO
{
    private $idtipo = null;
    private $descricao = null;
    private $idmeta_tipo = null;
    private $sit_ativo = null;
    public function __construct( $idtipo=null, $descricao=null, $idmeta_tipo=null, $sit_ativo=null ) {
        $this->setIdtipo( $idtipo );
        $this->setDescricao( $descricao );
        $this->setIdmeta_tipo( $idmeta_tipo );
        $this->setSit_ativo( $sit_ativo );
    }
    //--------------------------------------------------------------------------------
    public function setIdtipo( $strNewValue = null )
    {
        $this->idtipo = $strNewValue;
    }
    public function getIdtipo()
    {
        return $this->idtipo;
    }
    //--------------------------------------------------------------------------------
    public function setDescricao( $strNewValue = null )
    {
        $this->descricao = $strNewValue;
    }
    public function getDescricao()
    {
        return $this->descricao;
    }
    //--------------------------------------------------------------------------------
    public function setIdmeta_tipo( $strNewValue = null )
    {
        $this->idmeta_tipo = $strNewValue;
    }
    public function getIdmeta_tipo()
    {
        return $this->idmeta_tipo;
    }
    //--------------------------------------------------------------------------------
    public function setSit_ativo( $strNewValue = null )
    {
        $this->sit_ativo = $strNewValue;
    }
    public function getSit_ativo()
    {
        return $this->sit_ativo;
    }
    //--------------------------------------------------------------------------------
}
?>