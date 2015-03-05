<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Province
 *
 * @author Nontapon
 */
class Province  extends Eloquent {
    //put your code here
    protected $table = 'province';
    protected $primaryKey = 'ProvinceCode';
    
    public function amphoes() {
        return $this->hasMany('Amphoe', 'ProvinceCode', 'ProvinceCode' );
    }
}
