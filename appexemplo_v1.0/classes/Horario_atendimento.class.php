<?php
/**
 * System generated by SysGen (System Generator with Formdin Framework) 
 * Download SysGen: https://github.com/bjverde/sysgen
 * Download Formdin Framework: https://github.com/bjverde/formDin
 * 
 * SysGen  Version: 1.3.1-alpha
 * FormDin Version: 4.4.3-alpha
 * 
 * System xx created in: 2019-04-11 00:32:52
 */

class Horario_atendimento
{


    public function __construct()
    {
    }
    //--------------------------------------------------------------------------------
    public static function selectById( $id )
    {
        $result = Horario_atendimentoDAO::selectById( $id );
        return $result;
    }
    //--------------------------------------------------------------------------------
    public static function selectCount( $where=null )
    {
        $result = Horario_atendimentoDAO::selectCount( $where );
        return $result;
    }
    //--------------------------------------------------------------------------------
    public static function selectAll( $orderBy=null, $where=null )
    {
        $result = Horario_atendimentoDAO::selectAll( $orderBy, $where );
        return $result;
    }
    //--------------------------------------------------------------------------------
    public function save( Horario_atendimentoVO $objVo )
    {
        $result = null;
        if( $objVo->getIdhorario_atendimento() ) {
            $result = Horario_atendimentoDAO::update( $objVo );
        } else {
            $result = Horario_atendimentoDAO::insert( $objVo );
        }
        return $result;
    }
    //--------------------------------------------------------------------------------
    public function delete( $id )
    {
        $result = Horario_atendimentoDAO::delete( $id );
        return $result;
    }

}
?>