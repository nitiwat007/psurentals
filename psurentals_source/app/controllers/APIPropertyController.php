<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of APIPropertyController
 *
 * @author Nontapon
 */
class APIPropertyController extends BaseController {
    //put your code here
    
    private function getPropertyQuery() {
         return Property::orderBy('PropertyNameEN');
    }
    
    public function getAll() {
        return $this->getPropertyQuery()->get();
    }
    
     public function getPropertyByID($id) {
         return $this->getPropertyQuery()->where('ID','=',$id)->first();
     }
    
    public function getPropertyByType($propertyType) {
        return $this->getPropertyQuery()
                ->where('PropertyTypeID', '=', $propertyType)->first();
    }
}
