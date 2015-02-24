<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LocalAuthenProvider
 *
 * @author Nontapon
 */
class LocalAuthenProvider implements iAuthentication  {
    //put your code here
    public function ValidateUser($username, $password) {
        return DB::table('user')->where('UserID', '=', $username)
                ->where('Password','=', $password)->first();
    }
}
