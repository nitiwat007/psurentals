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
        
        
        //and then
        if (TRUE) {
            $userInfo = new UserInfo();
            $userInfo->name = $username;
        } else {
            return null;
        }
        return $userInfo;
    }
}

