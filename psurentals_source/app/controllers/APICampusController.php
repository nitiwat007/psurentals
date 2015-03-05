<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of APICampusController
 *
 * @author Nontapon
 */
class APICampusController extends BaseController {
    private function getCampusQuery() {
        return Campus::orderby('ID');
    }
    
    function getAll() {
        return $this->getCampusQuery()->get();
    }
    
    function getCampusByID($CampusID) {
        return $this->getCampusQuery()->where('ID','=',$CampusID)->first();
    }
    
    function getCampusesByAmphoeID($AmphoeID) {
        return $this->getCampusQuery()->where('AmphoeID','=',$AmphoeID)->get();
    }
}
