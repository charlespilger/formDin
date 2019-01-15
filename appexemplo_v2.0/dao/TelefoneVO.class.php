<?php
class TelefoneVO {
	private $idtelefone = null;
	private $numero = null;
	private $idpessoa = null;
	private $idtipo_telefone = null;
	private $idendereco = null;
	private $sit_fixo = null;
	private $whastapp = null;
	private $telegram = null;
	public function __construct( $idtelefone=null, $numero=null, $idpessoa=null, $idtipo_telefone=null, $idendereco=null, $sit_fixo=null, $whastapp=null, $telegram=null ) {
		$this->setIdtelefone( $idtelefone );
		$this->setNumero( $numero );
		$this->setIdpessoa( $idpessoa );
		$this->setIdtipo_telefone( $idtipo_telefone );
		$this->setIdendereco( $idendereco );
		$this->setSit_fixo( $sit_fixo );
		$this->setWhastapp( $whastapp );
		$this->setTelegram( $telegram );
	}
	//--------------------------------------------------------------------------------
	public function setIdtelefone( $strNewValue = null )
	{
		$this->idtelefone = $strNewValue;
	}
	public function getIdtelefone()
	{
		return $this->idtelefone;
	}
	//--------------------------------------------------------------------------------
	public function setNumero( $strNewValue = null )
	{
		$this->numero = $strNewValue;
	}
	public function getNumero()
	{
		return $this->numero;
	}
	//--------------------------------------------------------------------------------
	public function setIdpessoa( $strNewValue = null )
	{
		$this->idpessoa = $strNewValue;
	}
	public function getIdpessoa()
	{
		return $this->idpessoa;
	}
	//--------------------------------------------------------------------------------
	public function setIdtipo_telefone( $strNewValue = null )
	{
		$this->idtipo_telefone = $strNewValue;
	}
	public function getIdtipo_telefone()
	{
		return $this->idtipo_telefone;
	}
	//--------------------------------------------------------------------------------
	public function setIdendereco( $strNewValue = null )
	{
		$this->idendereco = $strNewValue;
	}
	public function getIdendereco()
	{
		return $this->idendereco;
	}
	//--------------------------------------------------------------------------------
	public function setSit_fixo( $strNewValue = null )
	{
		$this->sit_fixo = $strNewValue;
	}
	public function getSit_fixo()
	{
		return $this->sit_fixo;
	}
	//--------------------------------------------------------------------------------
	public function setWhastapp( $strNewValue = null )
	{
		$this->whastapp = $strNewValue;
	}
	public function getWhastapp()
	{
		return $this->whastapp;
	}
	//--------------------------------------------------------------------------------
	public function setTelegram( $strNewValue = null )
	{
		$this->telegram = $strNewValue;
	}
	public function getTelegram()
	{
		return $this->telegram;
	}
	//--------------------------------------------------------------------------------
}
?>