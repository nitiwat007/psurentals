<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Campus
 *
 * @author Nontapon
 */
class Campus extends Eloquent {
    //put your code here
    
    protected $table = 'campus';
    protected $primaryKey = 'ID';
    
    public function amphoe() {
        /* belongsTo('Model', 'local_key', 'parent_key') */
        //return $this->belongsTo('Amphoe', 'AmphoeID', 'ID');
        
        /* hasOne('Model', 'foreign_key', 'local_key') */
        return $this->hasOne('Amphoe', 'ID', 'AmphoeID');
    }
   
}
