<?php
/*
 * Formdin Framework
 * Copyright (C) 2012 Ministério do Planejamento
 * Criado por Luís Eugênio Barbosa
 * Essa versão é um Fork https://github.com/bjverde/formDin
 *
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
 * Este programa é distribuí1do na esperança que possa ser útil, mas SEM NENHUMA
 * GARANTIA; sem uma garantia implícita de ADEQUAÇÃO a qualquer MERCADO ou
 * APLICAÇÃO EM PARTICULAR. Veja a Licen?a Pública Geral GNU/LGPL em portugu?s
 * para maiores detalhes.
 *
 * Você deve ter recebido uma cópia da GNU LGPL versão 3, sob o título
 * "LICENCA.txt", junto com esse programa. Se não, acesse <http://www.gnu.org/licenses/>
 * ou escreva para a Fundação do Software Livre (FSF) Inc.,
 * 51 Franklin St, Fifth Floor, Boston, MA 02111-1301, USA.
 */

//d($_REQUEST);
// criar 2 eventos no calendário
$fimReuniaoDateTime = DateTimeHelper::getCurrentDateTime();
$fimReuniaoDateTime->add(new DateInterval('PT1H'));
$fimReuniao = $fimReuniaoDateTime->format(DateTime::ATOM);

$reuniao = array(
    'id' => 110
    ,'title' => "Reunião de Melhoria"
    ,'allDay'=> false 
    ,'start' => DateTimeHelper::getNowFormat(DateTime::ATOM)
    ,'end' => $fimReuniao
    ,'url' => "http://yahoo.com/"
    ,'color' => '#ff0000'
);

$diaSaoForm = array(
    'id' => 111,
    'title' => "Dia de São FormDin Luis Eugenio",
    'start' => date('Y-m-d'),
    'url' => "http://yahoo.com/"
);


$eventos = array( $diaSaoForm
                 ,$reuniao
    ,array(
        'id' => 222,
        'title' => "Viagem a serviço",
        'start' => "2012-04-20",
        'end' => "2012-04-21",
        'url' => "http://yahoo.com/"
    )
    
);

if (RequestHelper::get('ajax')) {
    // ver todos os atributos do evento em : http://arshaw.com/fullcalendar/docs/event_data/Event_Object/
    echo json_encode($eventos);
    die();
}

$frm = new TForm('Exemplo Agenda');
$frm->setFlat(true);
$frm->setMaximize(true);

$frm->addCalendarField('agenda'
                       ,'view/fields/exe_TCalendar.php'
                       , 300, null, null, null, null, null, 'onEventClick', 'onSelectDay');
$frm->setAction('Atualizar');
$frm->show();
?>
<script>
function onEventClick( event, jsEvent, view )
{
    // ajuda em: http://arshaw.com/fullcalendar/docs/mouse/eventClick/
    alert( 'Event Clicado');
}
function onSelectDay(  date, allDay, jsEvent, view )
{
    // ajuda em : http://arshaw.com/fullcalendar/docs/mouse/dayClick/
    alert( 'Dia selecionado');
}
</script>
