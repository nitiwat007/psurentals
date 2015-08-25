<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class MemberController extends BaseController {
    
    public function getMemberAll() {
        $APIConfigurationController=new APIConfigurationController();
        $getListPerPage=$APIConfigurationController->getListPerPage();
        $results = DB::table('user')->leftJoin('vuserstatus', 'user.UserID', '=', 'vuserstatus.UserID')->orderBy('updated_at','desc')->paginate($getListPerPage); 
        
        return $results;
    }
}