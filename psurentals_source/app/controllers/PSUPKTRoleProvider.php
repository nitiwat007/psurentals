<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PSUPKTProvider
 *
 * @author Nontapon
 */
class PSUPKTRoleProvider extends RoleProvider {

    /**
     * 
     * @var Singleton
     */
    private static $instance;

    private function __construct() {
        // Your "heavy" initialization stuff here
    }
    
    public static function getInstance() {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public static function getRoles($username) {
        $config = new APIConfigurationController();
        $appKey = $config->getApplicationKey();
        $providerURL = $config->getRoleProviderURL();
        
        $result = json_decode(file_get_contents(sprintf("%s/%s/%s", $providerURL, $appKey, $username)), true);
        //return $result['result'][0];
        $roles = [];
      
        foreach ($result['result'] as $role) {
            $r = new Role();
            $r->code = $role['role_id'];
            $r->nameTH = $role['role_name_thai'];
            $r->nameEN = $role['role_name_eng'];
            $r->provider = get_class(PSUPKTRoleProvider::getInstance());
            array_push($roles, $r);
        }
        
        return $roles;
    }

    public static function isInRoles($username, $rolesNameEn) {
         try {
            $userRoles = PSUPKTRoleProvider::getInstance()->getRoles($username);
            
            $rolesNameEn = explode(',', $rolesNameEn);
            
            foreach ($userRoles as $urole) {
              
                foreach ($rolesNameEn as $key => $role) {
                    if (strtolower($urole->nameEN) === strtolower($role)) {
                        return TRUE;
                    }
                }
            }
        } catch (Exception $exc) {
            return FALSE;
            return $exc->getTraceAsString();
        }
        return FALSE;
    }
}
