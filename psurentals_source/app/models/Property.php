<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Property
 *
 * @author Nontapon
 */
class Property extends Eloquent {
    //put your code here
    protected $table = 'property';
    protected $primaryKey = 'ID';
    
    public function propertyType() {
        return $this->belongsTo('PeopertyType','PropertyTypeID','ID');
    }
    
}
