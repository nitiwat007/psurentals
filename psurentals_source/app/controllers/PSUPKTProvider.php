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
class PSUPKTProvider extends Provider {

    public function IsInRoles($userroles, $roles) {
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

        return FALSE;
    }

}