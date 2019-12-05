<?php
/**
 * System generated by SysGen (System Generator with Formdin Framework) 
 * Download SysGen: https://github.com/bjverde/sysgen
 * Download Formdin Framework: https://github.com/bjverde/formDin
 * 
 * SysGen  Version: 1.10.1-alpha
 * FormDin Version: 4.7.9-alpha
 * 
 * System appev2 created in: 2019-11-01 22:23:14
 */
class SelfilhosmenuqtdDAO 
{

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
    public function execProcedure( SelfilhosmenuqtdVO $objVo )
    {
        $parameters = null;

        $qtd = $objVo->getQtd();
        $qtd = SqlHelper::attributeIsset($qtd,' qtd ='.$qtd,'');
        $parameters = $parameters.$qtd;

        $idmenu_pai = $objVo->getIdmenu_pai();
        $idmenu_pai = SqlHelper::attributeIsset($idmenu_pai,' , idmenu_pai ='.$idmenu_pai,'');
        $parameters = $parameters.$idmenu_pai;
        $sql = 'CALL form_exemplo.selfilhosmenuqtd('.$parameters.')';
        $result = $this->tpdo->executeSql($sql);
        return $result;
    }
}
?>