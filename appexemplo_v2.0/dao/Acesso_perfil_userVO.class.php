<?php
class Acesso_perfil_userVO {
	private $idperfiluser = null;
	private $idperfil = null;
	private $iduser = null;
	private $sit_ativo = null;
	private $dat_inclusao = null;
	private $dat_update = null;
	public function __construct( $idperfiluser=null, $idperfil=null, $iduser=null, $sit_ativo=null, $dat_inclusao=null, $dat_update=null ) {
		$this->setIdperfiluser( $idperfiluser );
		$this->setIdperfil( $idperfil );
		$this->setIduser( $iduser );
		$this->setSit_ativo( $sit_ativo );
		$this->setDat_inclusao( $dat_inclusao );
		$this->setDat_update( $dat_update );
	}
	//--------------------------------------------------------------------------------
	public function setIdperfiluser( $strNewValue = null )
	{
		$this->idperfiluser = $strNewValue;
	}
	public function getIdperfiluser()
	{
		return $this->idperfiluser;
	}
	//--------------------------------------------------------------------------------
	public function setIdperfil( $strNewValue = null )
	{
		$this->idperfil = $strNewValue;
	}
	public function getIdperfil()
	{
		return $this->idperfil;
	}
	//--------------------------------------------------------------------------------
	public function setIduser( $strNewValue = null )
	{
		$this->iduser = $strNewValue;
	}
	public function getIduser()
	{
		return $this->iduser;
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
	public function setDat_inclusao( $strNewValue = null )
	{
		$this->dat_inclusao = $strNewValue;
	}
	public function getDat_inclusao()
	{
		return is_null( $this->dat_inclusao ) ? date( 'Y-m-d h:i:s' ) : $this->dat_inclusao;
	}
	//--------------------------------------------------------------------------------
	public function setDat_update( $strNewValue = null )
	{
		$this->dat_update = $strNewValue;
	}
	public function getDat_update()
	{
		return is_null( $this->dat_update ) ? date( 'Y-m-d h:i:s' ) : $this->dat_update;
	}
	//--------------------------------------------------------------------------------
}
?>