<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of iProvider
 *
 * @author Nontapon
 */
interface iProvider {

    public static function getRoles($username);
    public static function isInRoles($userroles, $roles);
    
}
