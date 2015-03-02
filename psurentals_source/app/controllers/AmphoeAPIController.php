<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AmphoeAPIController
 *
 * @author Nontapon
 */
class AmphoeAPIController extends BaseController {
    //put your code here
    function getAmphoeByCampusID($campusID) {
         $amphoeObj = DB::table('vcampus')
                        ->where('id', '=', $campusID)
                        ->select('AmphoeID')->first();
         return $amphoeObj;
    }
}
