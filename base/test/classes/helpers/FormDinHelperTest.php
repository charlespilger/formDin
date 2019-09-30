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
require_once $path.'constants.php';
require_once $path.'helpers/autoload_formdin_helper.php';

use PHPUnit\Framework\TestCase;

class FormDinHelperTest extends TestCase
{

    public function testVersion() {
		$expected = '4.7.6';
		$result =  FormDinHelper::version();
		$this->assertEquals( $expected , $result);
	}
	
	public function testVersionMinimum_false() {
	    $expected = false;
	    $result = FormDinHelper::versionMinimum('99.99.99');
	    $this->assertEquals( $expected , $result);
	}
	
	public function testVersionMinimum_true() {
	    $expected = true;
	    $result = FormDinHelper::versionMinimum('1.0.0');
	    $this->assertEquals( $expected , $result);
	}
	
	public function testVersionMinimum_equal() {
	    $expected = true;
	    $result = FormDinHelper::versionMinimum('4.6.3-alpha');
	    $this->assertEquals( $expected , $result);
	}

    public function testIssetOrNotZero_arrayNull() {
        $expected = false;
        $variable = array();
        $result = FormDinHelper::issetOrNotZero($variable);
        $this->assertEquals( $expected , $result);
    }
    
    public function testIssetOrNotZero_arrayNotNull() {
        $expected = true;
        $variable = array(0,1);
        $result = FormDinHelper::issetOrNotZero($variable);
        $this->assertEquals( $expected , $result);
    }
    
    public function testIssetOrNotZero_stringBlank() {
        $expected = false;
        $variable = '';
        $result = FormDinHelper::issetOrNotZero($variable);
        $this->assertEquals( $expected , $result);
    }
    
    public function testIssetOrNotZero_stringNull() {
        $expected = false;
        $variable = null;
        $result = FormDinHelper::issetOrNotZero($variable);
        $this->assertEquals( $expected , $result);
    }
    
    public function testIssetOrNotZero_stringZero() {
        $expected = false;
        $variable = '0';
        $result = FormDinHelper::issetOrNotZero($variable);
        $this->assertEquals( $expected , $result);
    }
    
    public function testIssetOrNotZero_stringZeroNoTest() {
        $expected = true;
        $variable = '0';
        $result = FormDinHelper::issetOrNotZero($variable,false);
        $this->assertEquals( $expected , $result);
    }
    
}