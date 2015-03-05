<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RentalStatus
 * ดูข้อมูลจากฐานมาใช้งาน
 * 
 * @author Nontapon
 */
abstract class RentalStatus {
    const All = 'ral';
    const Approved = 'rap';
    const Closed = 'rco';
    const Deleted = 'rdl';
    const Unapproved = 'rup';
    const Wait = 'rwt';
}