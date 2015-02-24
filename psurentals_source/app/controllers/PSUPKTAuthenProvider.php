<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class PSUPKTAuthenProvider implements iAuthentication  {
    private $authenService;
    
    function __construct() {
        $this->authenService = (new ConfigurationAPIController())->getAuthenServiceURL();
    }
    
    public function ValidateUser($username, $password) {
        //do something with PSU Passport
        $opts = array(
            'http' => array(
                'user_agent' => 'PHPSoapClient'
            )
        );
        
        $context = stream_context_create($opts);
        
        $function = "Authenticate";
        $client = new SoapClient($this->authenService, 
                array('stream_context' => $context,
                      'cache_wsdl' => WSDL_CACHE_NONE));
        $request = array(
            'username' => $username,
            'password' => $password
        );
        $result = $client->$function($request);
        $authen = $result->AuthenticateResult;

//        if ($authen) {
//            
//        } else {
//            return Response::json(array('login_status' => $authen, 'username' => $username));
//        }       
        
        //and then
        if ($authen) {
            $userInfo = new UserInfo();
            $userInfo->name = $username;
        } else {
            return null;
        }
        return $userInfo;
    }
}

