<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class PSUPKTProfileProvider extends ProfileProvider {
    function __construct() {
        
    }

    function getUserDetails($username, $password) {
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
        
        $function = $config->getProfileOperation();
        $client = new SoapClient($config->getProfileServiceURL(), 
                array('stream_context' => $context,
                      'cache_wsdl' => WSDL_CACHE_NONE));
        $request = array(
            'username' => $username,
            'password' => $password        
        );
        
        try {
            $result = $client->$function($request);
            $result = $result->GetUserDetailsResult->string;
        } catch (Exception $ex) {
            $result = $ex->getMessage();
        }
        
        return $result;
    }

}
