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

$path =  __DIR__.'/../../../classes/';
require_once $path.'helpers/DateTimeHelper.class.php';
require_once $path.'helpers/StringHelper.class.php';

use PHPUnit\Framework\TestCase;

/**
 * DateTimeHelper test case.
 */
class DateTimeHelperTest extends TestCase
{

    public function testDate2MySql_null_HoraNaoPermitida() {
        $esperado = null;
        $estrada = null;
        $retorno = DateTimeHelper::date2Mysql($estrada,false);
        $this->assertEquals($esperado, $retorno);
    }
    
    public function testDate2MySql_null_HoraPermitida() {
        $esperado = null;
        $estrada = null;
        $retorno = DateTimeHelper::date2Mysql($estrada,true);
        $this->assertEquals($esperado, $retorno);
    }

    public function testDate2MySql_white_HoraNaoPermitida() {
        $esperado = null;
        $estrada = '';
        $retorno = DateTimeHelper::date2Mysql($estrada,false);
        $this->assertEquals($esperado, $retorno);
    }
    
    public function testDate2MySql_white_HoraPermitida() {
        $esperado = null;
        $estrada = '';
        $retorno = DateTimeHelper::date2Mysql($estrada,true);
        $this->assertEquals($esperado, $retorno);
    }
    
    public function testDate2MySql_stringQualquer_HoraNaoPermitida() {
        $esperado = null;
        $estrada = 'fdafdlj';
        $retorno = DateTimeHelper::date2Mysql($estrada,false);
        $this->assertEquals($esperado, $retorno);
    }
    
    public function testDate2MySql_stringQualquer_HoraPermitida() {
        $esperado = null;
        $estrada = 'fdafdlj';
        $retorno = DateTimeHelper::date2Mysql($estrada,true);
        $this->assertEquals($esperado, $retorno);
    }
    
    public function testDate2MySql_stringParecendoData_HoraNaoPermitida() {
        $esperado = null;
        $estrada = 'dd/mm/yyyy';
        $retorno = DateTimeHelper::date2Mysql($estrada,false);
        $this->assertEquals($esperado, $retorno);
    }
    
    public function testDate2MySql_stringParecendoData_HoraPermitida() {
        $esperado = null;
        $estrada = 'dd/mm/yyyy';
        $retorno = DateTimeHelper::date2Mysql($estrada,true);
        $this->assertEquals($esperado, $retorno);
    }
    
    public function testDate2MySql_naoAlteraDataSemHora_HoraNaoPermitida() {
        $esperado = '2019-10-02';
        $estrada = '2019-10-02';
        $retorno = DateTimeHelper::date2Mysql($estrada,false);
        $this->assertEquals($esperado, $retorno);
    }
    
    public function testDate2MySql_naoAlteraDataSemHora_HoraPermitida() {
        $esperado = '2019-10-02';
        $estrada = '2019-10-02';
        $retorno = DateTimeHelper::date2Mysql($estrada,true);
        $this->assertEquals($esperado, $retorno);
    }
    
    public function testDate2MySql_naoAlteraDataComHora_HoraNaoPermitida() {
        $esperado = '2019-10-02';
        $estrada = '2019-10-02 13:45';
        $retorno = DateTimeHelper::date2Mysql($estrada,false);
        $this->assertEquals($esperado, $retorno);
    }
    
    public function testDate2MySql_naoAlteraDataComHora_HoraPermitida() {
        $esperado = '2019-10-02 13:45';
        $estrada = '2019-10-02 13:45';
        $retorno = DateTimeHelper::date2Mysql($estrada,true);
        $this->assertEquals($esperado, $retorno);
    }
    
    public function testDate2MySql_naoAlteraDataComSegundos_HoraNaoPermitida() {
        $esperado = '2019-10-02';
        $estrada = '2019-10-02 13:45:12';
        $retorno = DateTimeHelper::date2Mysql($estrada,false);
        $this->assertEquals($esperado, $retorno);
    }
    
    public function testDate2MySql_naoAlteraDataComSegundos_HoraPermitida() {
        $esperado = '2019-10-02 13:45:12';
        $estrada = '2019-10-02 13:45:12';
        $retorno = DateTimeHelper::date2Mysql($estrada,true);
        $this->assertEquals($esperado, $retorno);
    }
    
    public function testDate2MySql_dtBr01_HoraNaoPermitida() {
        $esperado = '2019-10-02';
        $estrada = '02/10/2019';
        $retorno = DateTimeHelper::date2Mysql($estrada,false);
        $this->assertEquals($esperado, $retorno);
    }
    
    public function testDate2MySql_dtBr01_HoraPermitida() {
        $esperado = '2019-10-02';
        $estrada = '02/10/2019';
        $retorno = DateTimeHelper::date2Mysql($estrada,true);
        $this->assertEquals($esperado, $retorno);
    }
    
    public function testDate2MySql_dtBr01ComHora_HoraNaoPermitida() {
        $esperado = '2019-10-02';
        $estrada = '02/10/2019 15:42';
        $retorno = DateTimeHelper::date2Mysql($estrada,false);
        $this->assertEquals($esperado, $retorno);
    }
    
    public function testDate2MySql_dtBr01ComHora_HoraPermitida() {
        $esperado = '2019-10-02 15:42';
        $estrada = '02/10/2019 15:42';
        $retorno = DateTimeHelper::date2Mysql($estrada,true);
        $this->assertEquals($esperado, $retorno);
    }
    
    public function testDate2MySql_dtBr01ComSegundo_HoraNaoPermitida() {
        $esperado = '2019-10-02';
        $estrada = '02/10/2019 15:42:30';
        $retorno = DateTimeHelper::date2Mysql($estrada,false);
        $this->assertEquals($esperado, $retorno);
    }
    
    public function testDate2MySql_dtBr01ComSegundo_HoraPermitida() {
        $esperado = '2019-10-02 15:42:30';
        $estrada = '02/10/2019 15:42:30';
        $retorno = DateTimeHelper::date2Mysql($estrada,true);
        $this->assertEquals($esperado, $retorno);
    }

    public function testDate2MySql_dtBr02_HoraNaoPermitida() {
        $esperado = '1900-01-02';
        $estrada = '02/01/1900';
        $retorno = DateTimeHelper::date2Mysql($estrada,false);
        $this->assertEquals($esperado, $retorno);
    }
    
    public function testDate2MySql_dtBr02_HoraPermitida() {
        $esperado = '1900-01-02';
        $estrada = '02/01/1900';
        $retorno = DateTimeHelper::date2Mysql($estrada,true);
        $this->assertEquals($esperado, $retorno);
    }
    
    //------------------------------------------------------------
    //------------------------------------------------------------
    //------------------------------------------------------------
    public function testGetDateTimeLong() {
        $esperado = '29 DE ABRIL DE 2019';
        $entrada = '2019-04-29';
        $retorno = DateTimeHelper::getDateTimeLong($entrada);
        $this->assertEquals($esperado, $retorno);
    }
    
    public function testConvertToDateTime() {
        $esperado = DateTime::class;
        $entrada = '28/04/2019';
        $retorno = DateTimeHelper::convertToDateTime($entrada);
        $this->assertInstanceOf($esperado, $retorno);
    }
    
    public function testIsWeekendTrue() {
        $esperado = true;
        $entrada = '28/04/2019';
        $retorno = DateTimeHelper::isWeekend($entrada);
        $this->assertEquals($esperado, $retorno);
    }
    
    public function testIsWeekendFalse() {
        $esperado = false;
        $entrada = '29/04/2019';
        $retorno = DateTimeHelper::isWeekend($entrada);
        $this->assertEquals($esperado, $retorno);
    }
    
    public function testIsWorkingDayTrue() {
        $esperado = true;
        $entrada = '29/04/2019';
        $retorno = DateTimeHelper::isWorkingDay($entrada);
        $this->assertEquals($esperado, $retorno);
    }
    
    public function testIsWorkingDayFalse() {
        $esperado = false;
        $entrada = '28/04/2019';
        $retorno = DateTimeHelper::isWorkingDay($entrada);
        $this->assertEquals($esperado, $retorno);
    }
}