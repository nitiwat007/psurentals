<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class UserInfo extends UserBase
{
    public $isLocalUser;
    public $isAuthentication;
    public $authenticationProvider;
    public $authenticationProviderResult;
    public $profileProvider;
    public $profileProviderResult;
    public $roles;
}