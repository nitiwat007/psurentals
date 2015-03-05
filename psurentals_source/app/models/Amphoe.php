<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Amphoe
 *
 * @author Nontapon
 */
class Amphoe extends Eloquent {
    //put your code here
    
    protected $table = 'amphoe';
    protected $primaryKey = 'ID';
    
    public function province()
    {
        return $this->belongsTO('Province', 'ProvinceCode', 'ProvinceCode');
    }
  
}
