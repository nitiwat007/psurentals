<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//NR
Route::get('rentals/results', array('uses' => 'PagesController@searchRentalResults'));
Route::get('rentals/search/{propertyType}/{near}/{rentalFeeUnder}', array('uses' => 'RentalsControllerNR@basicSearchRentals'));
Route::get('rentals/cover/{rentalID}', ['uses' => 'RentalsControllerNR@getRentalCoverImage']);
Route::get('user/{name?}', function($name='World') { return 'Hello ' .  $name; });
Route::get('config/defaultCampusID', ['uses' => 'ConfigurationController@getDefaultCampusID']);
Route::get('config/listPerPage', ['uses' => 'ConfigurationController@getListPerPage']);
