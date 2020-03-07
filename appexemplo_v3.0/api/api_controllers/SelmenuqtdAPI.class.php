<?php
/**
 * System generated by SysGen (System Generator with Formdin Framework) 
 * Download SysGen: https://github.com/bjverde/sysgen
 * Download Formdin Framework: https://github.com/bjverde/formDin
 * 
 * SysGen  Version: 1.9.0-alpha
 * FormDin Version: 4.7.5
 * 
 * System appev2 created in: 2019-09-10 09:04:46
 */

namespace api_controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class SelmenuqtdAPI
{

    public function __construct()
    {
    }

    //--------------------------------------------------------------------------------
    public static function selectAll(Request $request, Response $response, array $args)
    {
        $controller = new \Selmenuqtd();
        $result = $controller->selectAll();
        $result = \ArrayHelper::convertArrayFormDin2Pdo($result);
        $msg = array( 'qtd'=> \CountHelper::count($result)
                    , 'result'=>$result
        );
        $response = $response->withJson($msg);
        return $response;
    }

    //--------------------------------------------------------------------------------
    private static function selectByIdInside(array $args)
    {
        $id = $args['id'];
        $controller = new \Selmenuqtd();
        $result = $controller->selectById($id);
        $result = \ArrayHelper::convertArrayFormDin2Pdo($result);
        return $result;
    }

    //--------------------------------------------------------------------------------
    public static function selectById(Request $request, Response $response, array $args)
    {
        $result = self::selectByIdInside($args);
        $msg = array( 'qtd'=> \CountHelper::count($result)
                    , 'result'=>$result
        );
        $response = $response->withJson($msg);
        return $response;
    }
}