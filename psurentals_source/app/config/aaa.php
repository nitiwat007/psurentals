<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
return array(
    
    'authenServiceURL' => 'https://passport.phuket.psu.ac.th/Authentication/Authentication.asmx?wsdl',
    'authenOperation' => 'Authenticate',
    //'authenResultProperty' => 'AuthenticateResult', //cannot do Property as string
    
    'profileServiceURL' => 'https://passport.phuket.psu.ac.th/Authentication/Authentication.asmx?wsdl',
    'profileOperation' => 'GetUserDetails',
    //'profileResultProperty' => 'GetUserDetailsResult',  //cannot do Property as string
    
    'applicationKey' => '606f0bc0-b8d1-11e4-b73d-654aaaff5424',
    'roleProviderURL' => 'http://api.phuket.psu.ac.th/roleprovider/service/getroles',
    
);
