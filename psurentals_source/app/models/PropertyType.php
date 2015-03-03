<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PropertyType
 *
 * @author Nontapon
 */
class PropertyType extends Eloquent {
    //put your code here
    protected $table = 'propertytype';
    protected $primaryKey = 'ID';
    
    public function properties() {
        return $this->hasMany('Property','PropertyTypeID','ID');
    }
}
