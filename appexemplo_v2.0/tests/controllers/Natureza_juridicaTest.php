<?php
/**
 * System generated by SysGen (System Generator with Formdin Framework) 
 * Download SysGen: https://github.com/bjverde/sysgen
 * Download Formdin Framework: https://github.com/bjverde/formDin
 * 
 * SysGen  Version: 1.8.1
 * FormDin Version: 4.7.5-alpha
 * 
 * System appev2 created in: 2019-09-01 01:48:51
 */

$path =  __DIR__.'/../../';
require_once $path.'includes/constantes.php';

require_once $path.'../base/classes/webform/TApplication.class.php';
require_once $path.'controllers/autoload_appev2.php';

use PHPUnit\Framework\TestCase;

class Natureza_juridicaTest extends TestCase
{

private $classTest;

    //--------------------------------------------------------------------------------
    protected function setUp()
    {
        parent::setUp();
        $this->classTest = new Natureza_juridica;
    }

    //--------------------------------------------------------------------------------
    protected function tearDown()
    {
        $this->classTest = null;
        parent::setUp();
    }
}