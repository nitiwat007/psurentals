<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Provider
 *
 * @author Nontapon
 */
class RoleProvider implements iRoleProvider { //extends BaseController
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
        return ['Not Implemented'];
    }
    
    //put your code here
    public static function isInRoles($userroles, $roles) {
        try {
            foreach ($userroles as $urole) {
                foreach ($roles as $role) {
                    if ($urole === $role) {
                        return TRUE;
                    }
                }
            }
        } catch (Exception $exc) {
            //echo $exc->getTraceAsString();
            return FALSE;
        }
    }

}
