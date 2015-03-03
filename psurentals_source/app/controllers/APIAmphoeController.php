<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of APIAmphoeController
 *
 * @author Nontapon
 */
class APIAmphoeController extends BaseController {
    //put your code here
    function getAll() {
        return Amphoe::all();
    }
    
    function getAmphoeByID($amphoeID) {
        return Amphoe::where('id','=',$amphoeID)->first();
    }
//    
//    function getAmphoeByCampusID($campusID) {
//        return Campus::where('id', '=', $campusID)->first()->amphoe;
////         $amphoeObj = DB::table('vcampus')
////                        ->where('id', '=', $campusID)
////                        ->select('AmphoeID')->first();
////         return $amphoeObj;
//    }
}
