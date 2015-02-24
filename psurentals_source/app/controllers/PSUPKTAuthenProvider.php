<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class PSUPKTAuthenProvider implements iAuthentication  {
    
    function __construct() {
        
    }
    
    public function ValidateUser($username, $password) {
        $config = new ConfigurationAPIController();
        
        //do something with PSU Passport
        $opts = array(
            'http' => array(
                'user_agent' => 'PHPSoapClient'
            ),
            'ssl' => array(
                'verify_peer'       => false,
                'verify_peer_name'  => false,
            )
        );
        
        $context = stream_context_create($opts);
        
        $function = $config->getAuthenOperation();
        $client = new SoapClient($config->getAuthenServiceURL(), 
                array('stream_context' => $context,
                      'cache_wsdl' => WSDL_CACHE_NONE));
        $request = array(
            'username' => $username,
            'password' => $password
        );
        $result = $client->$function($request);
        $authen = $result->$config->getAuthenResultProperty();

//        if ($authen) {
//            
//        } else {
//            return Response::json(array('login_status' => $authen, 'username' => $username));
//        }       
        
        //and then
        if ($authen) {
            $userInfo = new UserInfo();
            $userInfo->userName = $username;
        } else {
            return null;
        }
        return $userInfo;
    }
}

