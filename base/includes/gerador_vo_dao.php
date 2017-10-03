<?php

/*
 * Formdin Framework
 * Copyright (C) 2012 Ministério do Planejamento
 * ----------------------------------------------------------------------------
 * This file is part of Formdin Framework.
 *
 * Formdin Framework is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public License version 3
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License version 3
 * along with this program; if not,  see <http://www.gnu.org/licenses/>
 * or write to the Free Software Foundation, Inc., 51 Franklin Street,
 * Fifth Floor, Boston, MA  02110-1301, USA.
 * ----------------------------------------------------------------------------
 * Este arquivo é parte do Framework Formdin.
 *
 * O Framework Formdin é um software livre; você pode redistribuí-lo e/ou
 * modificá-lo dentro dos termos da GNU LGPL versão 3 como publicada pela Fundação
 * do Software Livre (FSF).
 *
 * Este programa é distribuído na esperança que possa ser útil, mas SEM NENHUMA
 * GARANTIA; sem uma garantia implícita de ADEQUAÇÃO a qualquer MERCADO ou
 * APLICAÇÃO EM PARTICULAR. Veja a Licença Pública Geral GNU/LGPL em português
 * para maiores detalhes.
 *
 * Você deve ter recebido uma cópia da GNU LGPL versão 3, sob o título
 * "LICENCA.txt", junto com esse programa. Se não, acesse <http://www.gnu.org/licenses/>
 * ou escreva para a Fundação do Software Livre (FSF) Inc.,
 * 51 Franklin St, Fifth Floor, Boston, MA 02111-1301, USA.
 */

 $frm = new TForm('Gerador de Objeto VO e DAO',500,500);
$frm->setFlat(true);
$frm->addGroupField('gpx2','Informações do VO e DAO');
	$frm->addTextField('diretorio','Diretório:',50,true);
	$frm->addTextField('tabela','Nome da Tabela:',30,true);
	$frm->addTextField('coluna_chave','Nome da Coluna Chave:',30);
	$frm->addMemoField('colunas','Colunas:',5000,true,45,20);
$frm->closeGroup();	

$frm->setAction('Gerar');

if(!$frm->get('diretorio')) {
	$frm->set('diretorio','dao/');
}

$acao = ( isset($acao) ) ? $acao : '';
switch( $acao ) {
	case 'Gerar':
		if( $frm->validate() ) {
			$diretorio = str_replace('//','/',$frm->get('diretorio').'/');
			@mkdir($diretorio,"775",true);
			if( ! file_exists( $diretorio ) ) {
				$frm->setMessage('Diretório '.$diretorio.' não existe!');
				break;
			}
			$txt = preg_replace('/'.chr(13).'/',',',$frm->get('colunas'));
			$txt = preg_replace('/'.chr(10).'/',',',$txt);
			$txt = preg_replace('/\,\,/',',',$txt);
			$txt = preg_replace('/ /','',$txt);
			$txt = preg_replace('/\,\,/',',',$txt);
			if( substr($txt,-1) ==',') {
				$txt=substr($txt,0,strlen($txt)-1);
			}
			$arr = explode(',',$txt);
			$coluna_chave = $frm->get('coluna_chave') ? $frm->get('coluna_chave') : $arr[0];
			//require_once('../base/classes/webform/TDAOCreate.class.php');
			$gerador = new TDAOCreate($frm->get('tabela'), $coluna_chave, $diretorio);
			foreach($arr as $k=>$v) {
				$gerador->addColumn($v);
			}
			$gerador->saveVO();
			$gerador->saveDAO();
			$frm->setMessage('Fim');
		}
	break;
}

$frm->show();
?>