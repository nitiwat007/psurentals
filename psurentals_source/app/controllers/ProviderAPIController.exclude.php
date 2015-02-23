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
class ProviderAPIController extends BaseController implements iProvider {

    public function IsInRoles($userroles, $roles) {
        $provider = new PSUPKTProvider();
        if ($provider instanceof Provider) {
            //return var_dump($provider);
            return $provider->IsInRoles($userroles, $roles);
        }
    }

}




