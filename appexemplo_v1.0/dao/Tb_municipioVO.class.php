<?php
class Tb_municipioVO {
	private $cod_municipio = null;
	private $cod_uf = null;
	private $nom_municipio = null;
	public function __construct( $cod_municipio=null, $cod_uf=null, $nom_municipio=null ) {
		$this->setCod_municipio( $cod_municipio );
		$this->setCod_uf( $cod_uf );
		$this->setNom_municipio( $nom_municipio );
	}
	//--------------------------------------------------------------------------------
	function setCod_municipio( $strNewValue = null )
	{
		$this->cod_municipio = $strNewValue;
	}
	function getCod_municipio()
	{
		return $this->cod_municipio;
	}
	//--------------------------------------------------------------------------------
	function setCod_uf( $strNewValue = null )
	{
		$this->cod_uf = $strNewValue;
	}
	function getCod_uf()
	{
		return $this->cod_uf;
	}
	//--------------------------------------------------------------------------------
	function setNom_municipio( $strNewValue = null )
	{
		$this->nom_municipio = $strNewValue;
	}
	function getNom_municipio()
	{
		return $this->nom_municipio;
	}
	//--------------------------------------------------------------------------------
}
?>