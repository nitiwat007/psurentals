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
class PSUPKTRoleProvider extends Provider {

    /**
     * 
     * @var Singleton
     */
    private static $instance;

    private function __construct() {
        // Your "heavy" initialization stuff here
    }

    public static function getRoles($username) {
        //how to get data from 
        //http://api.phuket.psu.ac.th/roleprovider/service/getroles/%7Bappkey%7D/%7Busername%7D
        
        $config = new ConfigurationAPIController();
        $appKey = $config->getApplicationKey();
        $providerURL = $config->getRoleProviderURL();
        
        return file_get_contents(sprintf("%s/%s/%s", $providerURL, $appKey, $username));
        //return ['doctor', 'admin'];
    }

    public static function getInstance() {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public static function isInRoles($userroles, $roles) {
         try {
            foreach ($userroles as $urole) {
                foreach ($roles as $role) {
                    if ($urole->role === $role) {
                        return TRUE;
                    }
                }
            }
        } catch (Exception $exc) {
            //echo $exc->getTraceAsString();
            return FALSE;
        }
        
        return "FALSE";
    }

}
