<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class PSUPKTProfileProvider extends ProfileProvider {

    function __construct() {
        
    }

    public function getUserDetails($username, $password) {
        $config = new APIConfigurationController();

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
        $client = new SoapClient($config->getProfileServiceURL(), 
                array('stream_context' => $context,
                      'cache_wsdl' => WSDL_CACHE_NONE));
        $request = array(
            'username' => $username,
            'password' => $password
        );

        $userInfo = null;
        
        try {
            $providerResult = $client->$function($request);
            $providerValues = $providerResult->GetUserDetailsResult->string;
            if (!is_null($providerValues)) {
                $userInfo = new PSUUserPassport();
                $userInfo->userName = $username;
                $userInfo->fullName = sprintf("%s %s", $providerValues[1], $providerValues[2]);
                $userInfo->isLocalUser = FALSE;
                $userInfo->email = $providerValues[13];
                $userInfo->organization = sprintf("%s %s", $providerValues[8], $providerValues[10]);
                $userInfo->position = $providerValues[3];
                $userInfo->mailingAddress = "No Information from PSU Passport";
                $userInfo->telephone = "-";
                $userInfo->ou = $providerValues[14];
            }
        } catch (Exception $ex) {
            throw new Exception ($ex->getMessage());
        }

        return $userInfo;
    }
}