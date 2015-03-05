<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of APIProvinceController
 *
 * @author Nontapon
 */
class APIProvinceController extends BaseController {
    //put your code here
    function getAll() {
        return Province::all();
    }
    
    function getProvinceByCode($code) {
        return Province::where('ProvinceCode','=',$code)->first();
    }
    
//    function getProvinceByAmphoeID($amphoeID) {
//        return Amphoe::where('id','=',$amphoeID)->first()->province;
//    }
}
