<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of APIPropertyTypeController
 *
 * @author Nontapon
 */
class APIPropertyTypeController extends BaseController {
    //put your code here
    
    public function getAll(){
        return PropertyType::all();
    }
    
    public function getPropertyTypeByID ($propTypeID) {
        return PropertyType::where('id','=', $propTypeID)->first();
    }
    
}
