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
$path =  __DIR__.'/../../../';
require_once $path.'classes/constants.php';
require_once $path.'classes/webform/autoload_formdin.php';
require_once $path.'classes/helpers/autoload_formdin_helper.php';

use PHPUnit\Framework\TestCase;

class TPDOConnectionObjTest extends TestCase
{

    private $test;
	
    public static function setUpBeforeClass()
    {
        $tpdo = new TPDOConnectionObj(false);
        $tpdo->setDBMS(null);
        $tpdo->setDataBaseName(null);
    }
    
	/**
	 * Prepares the environment before running a test.
	 */
	protected function setUp() {
		parent::setUp ();
		$this->test = new TPDOConnectionObj(false);
	}
	
	/**
	 * Cleans up the environment after running a test.
	 */
	protected function tearDown() {
	    $this->test = null;		
		parent::tearDown ();
	}	
	//--------------------------------------------------------------------------------
	public function testGetDBMS_null() {
	    $expected = null;
	    $result = $this->test->getDBMS();
	    $this->assertEquals( $expected , $result);
	}
	
	public function testGetPort_null() {
	    $expected = null;
	    $result = $this->test->getPort();
	    $this->assertEquals( $expected , $result);
	}
	
	public function testGetHost_null() {
	    $expected = null;
	    $result = $this->test->getHost();
	    $this->assertEquals( $expected , $result);
	}
	
	public function testGetDataBaseName_null() {
	    $expected = null;
	    $result = $this->test->getDataBaseName();
	    $this->assertEquals( $expected , $result);
	}
	
	public function testGetDataBaseName_NotNull() {
	    $expected = 'form_exemplo';
	    $this->test->setDataBaseName('form_exemplo');
	    $result = $this->test->getDataBaseName();
	    $this->assertEquals( $expected , $result);
	}
	
	public function testGetUsername_null() {
	    $expected = null;
	    $result = $this->test->getUsername();
	    $this->assertEquals( $expected , $result);
	}
	
	public function testGetUsername_NotNull() {
	    $expected = 'form_exemplo';
	    $this->test->setUsername('form_exemplo');
	    $result = $this->test->getUsername();
	    $this->assertEquals( $expected , $result);
	}
	
	public function testGetPassword_null() {
	    $expected = null;
	    $result = $this->test->getPassword();
	    $this->assertEquals( $expected , $result);
	}
	
	public function testGetPassword_NotNull() {
	    $expected = '123456';
	    $this->test->setPassword('123456');
	    $result = $this->test->getPassword();
	    $this->assertEquals( $expected , $result);
	}
	
	public function testGetUtfDecode_null() {
	    $expected = true;
	    $result = $this->test->getUtfDecode();
	    $this->assertEquals( $expected , $result);
	}
	
	public function testConnect_ObjMySQL() {
	    $expected = DBMS_MYSQL;
	    $this->test->setDBMS(DBMS_MYSQL);
	    $this->test->setHost('localhost');
	    $this->test->setDataBaseName('test');
	    $this->test->setUsername('test');
	    $this->test->setPassword('test');
	    $this->test->connect();
	    $result = $this->test->getDBMS();
	    $this->assertEquals( $expected , $result);
	}
	
	public function testConnect_ObjSqLite() {
	    $expected = DBMS_SQLITE;
	    $this->test->setDBMS(DBMS_SQLITE);
	    $this->test->setDataBaseName('includes/exemplo.s3db');
	    $this->test->connect();
	    $result = $this->test->getDBMS();
	    $this->assertEquals( $expected , $result);
	}
	
	
	/**
	 * Work but very very slow. This test 
	public function testConnect_ArrayMySQL() {
	    $expected = DBMS_MYSQL;
	    $configArray= array(
	        'DBMS' => DBMS_MYSQL
	        ,'PORT' => null
	        ,'HOST' => 'locahost'
	        ,'DATABASE' => 'fake'
	        ,'USERNAME' => 'fake'
	        ,'PASSWORD' => 'fake'
	    );
	    $this->test->connect(null,null,null,$configArray);
	    $result = $this->test->getDBMS();
	    $this->assertEquals( $expected , $result);
	}
	**/
	
}
