<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of APIConfigurationController
 *
 * @author Nontapon
 */
class APIConfigurationController extends BaseController {
    //put your code here
    public function getDefaultCampusID() {
        $obj = Configuration::where('KeyName', '=', 'DefaultCampus')
                ->select('KeyValue')->first();

        if (is_null($obj)){
            throw new Exception('Default Campus not found');
        }
        return (int)$obj->KeyValue;
    }
    
    public function getListPerPage() {
        $obj = Configuration::where('KeyName', '=', 'ListPerPage')
                ->select('KeyValue')->first();
        if (is_null($obj)){
            return 999;
            //throw new Exception('Cannot get default of number items on page');
        }
        return (int)$obj->KeyValue;
    }
    
    public function getLimitTitleLength() {
        $obj = Configuration::where('KeyName', '=', 'LimitTitleLength')
                ->select('KeyValue')->first();
        if (is_null($obj)){
            return 999;
        }
        return (int)$obj->KeyValue;
    }
    
    public function getLimitDescriptionLength() {
        $obj = Configuration::where('KeyName', '=', 'LimitDescriptionLength')
                ->select('KeyValue')->first();
        if (is_null($obj)){
            return 9999;
        }
        return (int)$obj->KeyValue;
    }
    
    /*
     * Role Provider
     */
    public function getApplicationKey() {
        return Config::get('aaa.applicationKey');
    }
    
    public function getRoleProviderURL() {
        return Config::get('aaa.roleProviderURL'); 
    }
    
    /*
     *  Authentication Provider
     */
    public function getAuthenServiceURL() {
        return Config::get('aaa.authenServiceURL');
    }
      
    public function getAuthenOperation() {
        return Config::get('aaa.authenOperation');
    }
    
//    public function getAuthenResultProperty() {
//        return Config::get('aaa.authenResultProperty');
//    }
    
    /*
     * Profile Provider
     */
    public function getProfileServiceURL() {
        return Config::get('aaa.profileServiceURL');
    }
    
    public function getProfileOperation() {
        return Config::get('aaa.profileOperation');
    }
    
//    public function getProfileResultProperty() {
//        return Config::get('aaa.profileResultProperty');
//    }
}