<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CampusAPIController
 *
 * @author Nontapon
 */
class CampusAPIController extends BaseController {
    private function getCampusQuery() {
        return DB::table('vcampus')->orderby('ID');
    }
    
    function getCampuses() {
        return $this->getCampusQuery()->get();
    }
    
    function getCampusByID($CampusID) {
        return $this->getCampusQuery()->where('ID','=',$CampusID)->get();
    }
    
    function getCampusesByAmphoeID($AmphoeID) {
        return $this->getCampusQuery()->where('AmphoeID','=',$AmphoeID)->get();
    }
}
