<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LocalProfileProvider
 *
 * @author Nontapon
 */
class LocalProfileProvider extends ProfileProvider {
    public function getUserDetails($username, $password) {
        $user = DB::table('user')->where('UserID', '=', $username)
                ->where('Password','=', md5($password))
                ->first();
        
        if (!is_null($user)) {
            $userInfo = new UserInfo();
            $userInfo->userName = $username;
            $userInfo->fullName = sprintf("%s %s", $user->FirstName, $user->LastName);
            $userInfo->isLocalUser = TRUE;
            $userInfo->email = $user->Email;
            $userInfo->organization = $user->Organization;
            $userInfo->position = $user->Position;
            $userInfo->mailingAddress = $user->MailingAddress;
            $userInfo->telephone = $user->TelephoneNumber;
            
            return $userInfo; // ? FALSE : TRUE);
        }  else {
            throw new Exception("The user name or password is incorrect or is not Local Member");
        }
        
        return null; //"";
    }
}