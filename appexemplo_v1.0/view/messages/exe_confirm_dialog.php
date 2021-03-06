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

d($_REQUEST);
$frm = new TForm('Exemplo de Caixa de Confirmação 2');
$frm->addCssFile('css/css_form02.css');

$html ='O exemplo faz uso do addButton com a função JS fwConfirm (FormDin4.js), comparando com o uso parâmetro 5 ($strConfirmMessage) no botão "Confirmar 5 - submit"';
$html = $html.'<br>';
$html = $html
.'<pre>
/**
* fwConfirm - Dialogo de confirmação
*
* @param message     1: Mensagem 
* @param callbackYes 2: function call to Yes 
* @param callbackNo  3: function call to No
* @param yesLabel    4: label button to Yes
* @param noLabel     5: label button to No
* @param title       6: Title of dialog
*/
</pre>';
$frm->addHtmlField('html1', $html, null, null, null, 300)->setClass('notice2');

$frm->addTextField('field5', 'Resultado do Confirma5', 40);

$frm->addButton('Confirmar 1 - JS', null, 'btnConfirmar', 'fwConfirm("Tem certeza ?",confirmSim,confirmNao)');

$frm->addButton('Confirmar 3 - JS', null, 'btnConfirmar3', 'fwConfirm("O que deseja fazer?",confirmSim,confirmNao,"Repetir o Cadasro","Repetir a Consulta","Tome uma decisão")');

$frm->addButton('Confirmar 5 - submit', 'btn05', null, null, 'Quer submeter essa pagina e evitar JavaScript explicito? ');
$frm->addButton('Limpar', null, 'Limpar');

$acao = isset($acao) ? $acao : null;
switch ($acao) {
    case 'btn05':
        $frm->setFieldValue('field5', 'Você falou SIM !! :-) ');
        break;
    //--------------------------------------------------------------------------------
    case 'Limpar':
        $frm->clearFields(null);
        break;
    //--------------------------------------------------------------------------------
}

$frm->show();
?>
<script>
function confirmSim() {
    alert('sim');
}
function confirmNao() {
    alert('nao');
}
</script>
