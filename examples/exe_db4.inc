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

$frm = new TForm('Campo Banco de Dados Textual DB4',250,600);
$frm->addHtmlField('texto','<b>Exemplo de utilização do DBM Database<BR>Clique no botão gravar para gravar o texto do campo observação em disco e Recuperar para trazer o<br>texto salvo para o campo novamente.</b>');
$frm->addMemoField('obs','Observação:',1000,false,50,5);
$frm->setAction('Gravar,Recuperar');

if($acao=='Recuperar')
{
	$dir  	= 'base/tmp/';
	$type	= 'db4';
	$file 	= 'sisteste.'.$type;
	$key  	= md5('SISTESTE_EXE_CAMPO_MEMO_OBS');
	$dbh = dba_open($dir.$file,'c',$type) or die('Erro');
	// retrieve and change values
	if (dba_exists($key,$dbh)) 
	{
		$frm->setValue('obs',dba_fetch($key,$dbh));
	}
	dba_close($dbh);
}
else if($acao=='Gravar')
{
	$dir  	= 'base/tmp/';
	$type	= 'db4';
	$file 	= 'sisteste.'.$type;
	$key  	= md5('SISTESTE_EXE_CAMPO_MEMO_OBS');
	$dbh = dba_open($dir.$file,'c',$type) or die('Erro');
	// retrieve and change values
	dba_replace($key,$frm->getValue('obs'),$dbh);
  	$frm->setPopUpMessage('Arquivo Atualizado');
  	/*
	// listar o arquivo
	for ($key = dba_firstkey($dbh);  $key !== false; $key = dba_nextkey($dbh)) 
	{
   		$value = dba_fetch($key,$dbh);
	}
    dba_close($dbh);
    */
    
	/*
	$dir_handle = opendir ($dir) or die ("Could not open directory <i>$dir</i>.");
	while ($entry = readdir ($dir_handle)) 
	{
	    $entry = $dir . '/' . $entry;

	    if (is_dir ($entry) and substr ($entry, 0, -3) == '.db')
	        $dbm_list[] = $entry;
	}

	foreach ($dbm_list as $dbm_file) 
	{
	    // Use the @ to ignore failed open attempts
	    $dba_handle = @ dba_open ($dbm_file, 'r', 'db4');
	    
	    $key = dba_firstkey ($dba_handle);

	    if ($key !== FALSE) 
	    {
	        echo "<br><br>DBM FILE: $dbm_file<br>";
	        while ($key !== FALSE) 
	        {
	            printf ("%-'.16s..%'.16s<br>", "<b>$key</b>", dba_fetch ($key, $dba_handle));
	            $key = dba_nextkey ($dba_handle);
	        }
	    }
	}
	*/
}	
// exibir o formulário
$frm->show();
?>