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

use DateTime;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Firebase\JWT\JWT;

class AcessoAPI
{

    public function __construct()
    {
    }


    //--------------------------------------------------------------------------------
    private static function getParam(string $paramName, $bodyRequest, $required = true)
    {
        $paramValue = null;
        $paramValue = \ArrayHelper::get($bodyRequest,$paramName);
        if($required && empty($paramValue) ){
            throw new \InvalidArgumentException('Parametro '.$paramName.' não informado');
        }
        return $paramValue;
    }

    //--------------------------------------------------------------------------------
    private static function genToken(string $login_user,$expireDate=null)
    {
        $controller = new \Acesso_user();
        $user = $controller->selectByLogin($login_user);

        //Criado só para fins didaticos, no mundo real a data que expirada deve ser gerada
        if( empty($expireDate) ){
            $expireDate = (new DateTime())->modify('+1 days')->format('Y-m-d H:i:s');
        }

        $tokenPayload = [
            'sub' => $user['IDUSER'][0],
            'name' => $user['LOGIN_USER'][0],
            'expired_at' => $expireDate
        ];

        $token = JWT::encode($tokenPayload, getenv('JWT_SECRET_KEY'));

        $refreshTokenPayload = [
            'name' => $user['LOGIN_USER'][0],
            'ramdom' => uniqid()
        ];
        $refreshToken = JWT::encode($refreshTokenPayload, getenv('JWT_SECRET_KEY'));        

        $vo = new \Acesso_tokensVO();
        $vo->setIduser($user['IDUSER'][0]);
        $vo->setToken($token);
        $vo->setRefresh_token($refreshToken);
        $vo->setExpired_at($expireDate);
        $vo->setActive('Y');
        $controller = new \Acesso_tokens;
        $controller->save($vo);

        $result = array();
        $result['token']=$token;
        $result['refreshToken']=$refreshToken;

        return $result;
    }
    //--------------------------------------------------------------------------------
    public static function test(Request $request, Response $response, array $args)
    {
        $response = $response->withJson('OK!');
        return $response;
    }
    //--------------------------------------------------------------------------------
    public static function login(Request $request, Response $response, array $args)
    {
        $bodyRequest = json_decode($request->getBody(),true);

        $login_user = self::getParam('login_user',$bodyRequest);
        $pwd_user   = self::getParam('pwd_user',$bodyRequest);
        $expired_at = self::getParam('expired_at',$bodyRequest,false);

        $controller = new \Acesso;
        $msg = $controller->login($login_user,$pwd_user);
        $response = $response->withJson($msg);
        if($msg == true){
            $token = self::genToken($login_user,$expired_at);
            $response = $response->withJson([
                "token" => $token['token'],
                "refresh_token" => $token['refreshToken']
            ]);
        }else{
            $response = $response->withJson($msg,401); //401 Unauthorized  https://developer.mozilla.org/pt-BR/docs/Web/HTTP/Status/401
        }
        return $response;
    }

    //--------------------------------------------------------------------------------
    public function refreshToken(Request $request, Response $response, array $args): Response
    {
        $data = $request->getParsedBody();
        $refreshToken = self::getParam('refresh_token',$data);
        $expireDate   = self::getParam('expired_at',$data);

        $refreshTokenDecoded = JWT::decode(
            $refreshToken,
            getenv('JWT_SECRET_KEY'),
            ['HS256']
        );

        $controller = new \Acesso_tokens;
        $refreshTokenExists = $controller->verifyRefreshTokenAndDelete($refreshToken);
        if(!$refreshTokenExists){
            return $response->withStatus(401);
        }
        
        $token = self::genToken($refreshTokenDecoded->name,$expireDate);
        $response = $response->withJson([
            "token" => $token['token'],
            "refresh_token" => $token['refreshToken']
        ]);

        return $response;
    }
}