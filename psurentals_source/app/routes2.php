<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//NR
Route::get('rentals/search', array('uses' => 'SearchRentalController@doSearch'));//@searchRentalResults'));
Route::get('testRoles', function() { return View::make('testRoles'); });