<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PropertyController
 *
 * @author Nontapon
 */
class PropertyController extends BaseController {
    //put your code here
    
    public function getPropertyTypes() {
        return DB::table('propertytype')->get();
    }
    
    public function getPropertyTypeByID($id)
    {
        return DB::table('propertytype')->where('ID','=', $id)->first();
    }
    
}
