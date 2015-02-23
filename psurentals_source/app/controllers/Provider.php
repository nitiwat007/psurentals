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
abstract class Provider implements iProvider {

    //put your code here
    abstract function IsInRoles($userroles, $roles);
}