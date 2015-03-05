<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RentalSearchParameter
 *
 * @author Nontapon
 */
class RentalSearchArgument extends RentalSearchQueryString {
    
    //private $_amphoe;
    private $_campus;
    
    public function __construct() {
        parent::__construct();
        
        //$this->_campus = (new APICampusController())->getCampusByID($this->getNearCampusID());
    }
    
//    public function setNearCampusID($value) {
//        
//         if (empty($value) || $value === '' || ctype_space($value) || !is_numeric($value)) {
//             $this->_nearCampusID = (new APIConfigurationController())->getDefaultCampusID();
//        } else {
//            $this->_nearCampusID = $value;
//        }
//        
//        $this->_campus = (new APICampusController())->getCampusByID($this->_nearCampusID);
//        if (!is_null($campus)) {
//            $this->amphoe = $campus->amphoe;
//        }
//    }
    
    public function getCampus() {
        //return $this->_campus;
        return (new APICampusController())->getCampusByID($this->getNearCampusID());
    }
    
}
