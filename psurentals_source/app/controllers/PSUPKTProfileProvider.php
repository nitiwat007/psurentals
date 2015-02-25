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
                'verify_peer' => false,
                'verify_peer_name' => false,
            )
        );

        $context = stream_context_create($opts);

        $function = $config->getProfileOperation();
        $client = new SoapClient($config->getProfileServiceURL(), array('stream_context' => $context,
            'cache_wsdl' => WSDL_CACHE_NONE));
        $request = array(
            'username' => $username,
            'password' => $password
        );

        try {
            $result = $client->$function($request);
            $result = $result->GetUserDetailsResult->string;
            if (!is_null($result)) {
                $userInfo = new PSUUserPassport();
                $userInfo->userName = $username;
                $userInfo->fullName = sprintf("%s %s", $result[1], $result[2]);
                $userInfo->isLocalUser = FALSE;
                $userInfo->email = $result[13];
                $userInfo->organization = sprintf("%s %s", $result[8], $result[10]);
                $userInfo->position = $result[3];
                $userInfo->ou = $result[14];
                $result = $userInfo;
            }
        } catch (Exception $ex) {
            $result = $ex->getMessage();
        }

        return $result;
    }
}