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
    const DEFAULT_RENTAL_STATUS = RentalStatus::Approved;
    
    private $_config;
    private $_feeUnder;
    private $_rentalStatus;
    private $_nearCampusID;
    private $_page;
    private $_pageSize;
    
    public $_propertyTypeID; 
    public $_orderBy;
    
    public function __construct() {
        $this->config = new APIConfigurationController();
        $this->setFeeUnder(self::DEFAULT_FEE_UNDER);
        $this->setRentalStatus(self::DEFAULT_RENTAL_STATUS);
        $this->setPageSize($this->config->getListPerPage());
        $this->setNearCampusID($this->config->getDefaultCampusID());
    }
    
     public function getPropertyTypeID() {
        return $this->_propertyTypeID;
    }
    
    public function setPropertyTypeID($value) {
            $this->_propertyTypeID = $value;
    }
    
    public function getOrderBy() {
        return $this->_orderBy;
    }
    
    public function setOrderBy($value) {
            $this->_orderBy = $value;
    }
    
    public function getFeeUnder() {
        return $this->_feeUnder;
    }
    
    public function setFeeUnder($value) {
        if (empty($value)) {
            $this->_feeUnder = self::DEFAULT_FEE_UNDER;
        } else {
            $this->_feeUnder = $value;
        }
    }
    
    public function getNearCampusID() {
        return $this->_nearCampusID;
    }
    
    public function setNearCampusID($value) {
         if (empty($value) || $value === '' || ctype_space($value) || !is_numeric($value)) {
            $this->_nearCampusID = $this->config->getDefaultCampusID();
        } else {
            $this->_nearCampusID = $value;
        }
    }
    
    public function getRentalStatus() {
        return $this->_rentalStatus;
    }
    
    public function setRentalStatus($value) {
        if (empty($value)) {
            $this->_rentalStatus = self::DEFAULT_RENTAL_STATUS;
        } else {
            $this->_rentalStatus = $value;
        }
    }
    
    public function getPageSize() {
        return $this->_pageSize;
    }
    
     public function setPageSize($value) {
        if (empty($value)) {
            $this->_pageSize = $this->config->getListPerPage();
        } else {
            $this->_pageSize = $value;
        }
    }
    
    /*
     * For advance search
     */
    
}
