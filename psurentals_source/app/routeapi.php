<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//Campus
Route::get('api/campus', ['uses' => 'CampusAPIController@getCampuses']);
Route::get('api/campus/{cid}', ['uses' => 'CampusAPIController@getCampusByID']);
Route::get('api/campus/amphoe/{aid}', ['uses' => 'CampusAPIController@getCampusesByAmphoeID']);


//Rental
Route::get('api/rentals/{propertyType}/{near}/{rentalFeeUnder}', array('uses' => 'RentalsControllerNR@basicSearchRentals'));
Route::get('api/rentals/cover/{rentalID}', ['uses' => 'RentalsControllerNR@getRentalCoverImage']);


//Configurations
Route::get('api/configuration/defaultCampusID', ['uses' => 'ConfigurationAPIController@getDefaultCampusID']);
Route::get('api/configuration/listPerPage', ['uses' => 'ConfigurationAPIController@getListPerPage']);
Route::get('api/configuration/limitTitleLength', ['uses' => 'ConfigurationAPIController@getLimitTitleLength']);
Route::get('api/configuration/limitDescriptionLength', ['uses' => 'ConfigurationAPIController@getLimitDescriptionLength']);
//Route::get('api/configuration/applicationKey', function() { return Config::get("roleProvider.applicationKey"); });
//Route::get('api/configuration/roleProviderURL', function() { return Config::get("roleProvider.url"); });
Route::get('api/configuration/applicationKey', ['uses' => 'ConfigurationAPIController@getApplicationKey']);
Route::get('api/configuration/roleProviderURL', ['uses' => 'ConfigurationAPIController@getRoleProviderURL']);
Route::get('api/configuration/authenServiceURL', ['uses' => 'ConfigurationAPIController@getAuthenServiceURL']);

Route::get('api/aaa/authentication/{user}/{passwd}', ['uses' => 'SecurityAPIController@authentication']);

Route::get('api/role/isInRoles/{urs}/{rs}', ['uses' => 'ProviderAPIController@IsInRoles']);