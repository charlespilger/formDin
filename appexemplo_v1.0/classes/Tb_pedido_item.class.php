<?php
/**
 * System generated by SysGen (System Generator with Formdin Framework) 
 * Download SysGen: https://github.com/bjverde/sysgen
 * Download Formdin Framework: https://github.com/bjverde/formDin
 * 
 * SysGen  Version: 0.8.0-alpha
 * FormDin Version: 4.2.6-alpha
 * 
 * System sysinfra created in: 2018-09-11 01:58:11
 */

class Tb_pedido_item {


	public function __construct(){
	}
	//--------------------------------------------------------------------------------
	public static function selectById( $id ){
	    $result = Tb_pedido_itemDAO::selectById( $id );
		return $result;
	}
	//--------------------------------------------------------------------------------
	public static function selectCount( $where=null ){
	    $result = Tb_pedido_itemDAO::selectCount( $where );
		return $result;
	}
	//--------------------------------------------------------------------------------
	public static function selectAll( $orderBy=null, $where=null ){
	    $result = Tb_pedido_itemDAO::selectAll( $orderBy, $where );
		return $result;
	}
	//--------------------------------------------------------------------------------
	public static function selectByIdPedido( $idPedido ){
	    $result = Tb_pedido_itemDAO::select_itens_pedido( $idPedido );
	    return $result;
	}
	//--------------------------------------------------------------------------------
	public static function save( Tb_pedido_itemVO $objVo ){
		$result = null;
		if( $objVo->getId_pedido() ) {
		    $result = Tb_pedido_itemDAO::update( $objVo );
		} else {
		    $result = Tb_pedido_itemDAO::insert( $objVo );
		}
		return $result;
	}
	//--------------------------------------------------------------------------------
	public static function delete( $id ){
	    $result = Tb_pedido_itemDAO::delete( $id );
		return $result;
	}
	//--------------------------------------------------------------------------------
	public static function deleteByIdPedido( $idPedido ){
	    $listItens = self::selectByIdPedido( $idPedido );
	    $result = array();
	    foreach ($listItens['ID_ITEM'] as $key => $id) {
	        $result[$key]=self::delete($id);
	    }
	    return $result;
	}
}
?>