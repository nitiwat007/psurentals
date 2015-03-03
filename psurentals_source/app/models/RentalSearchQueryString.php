<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RentalSearchQueryString
 *
 * @author Nontapon
 */
class RentalSearchQueryString  {
    /*
     * For basic search
     */
    const DEFAULT_FEE_UNDER = INF;
    const DEFAULT_RENTAL_STATUS = "rap";
    
    private $_feeUnder;
    private $_rentalStatus;
    private $_nearCampusID;
    
    public $propertyTypeID;
    public $orderBy;
    
    public  function __constructor() {
        $this->setFeeUnder($this->DEFAULT_FEE_UNDER);
        $this->setRentalStatus($this->DEFAULT_RENTAL_STATUS);
        $this->setNearCampusID((new APIConfigurationController())->getDefaultCampusID());
    }
    
    public function getFeeUnder() {
        return $this->_feeUnder;
    }
    public function setFeeUnder($value) {
        if (empty($value)) {
            $this->_feeUnder = $this->DEFAULT_FEE_UNDER;
        } else {
            $this->_feeUnder = $value;
        }
    }
    
    public function getNearCampusID() {
        return $this->_nearCampusID;
    }
    
    public function setNearCampusID($value) {
         if (empty($value) || $value === '' || ctype_space($value) || !is_numeric($value)) {
            $this->_nearCampusID = (new APIConfigurationController())->getDefaultCampusID();
        } else {
            $this->_nearCampusID = $value;
        }
    }
    
    public function getRentalStatus() {
        return $this->_rentalStatus;
    }
    
    public function setRentalStatus($value) {
        if (empty($value)) {
            $this->_rentalStatus = $this->DEFAULT_RENTAL_STATUS;
        } else {
            $this->_rentalStatus = $value;
        }
    }
    
    /*
     * For advance search
     */
    
}
