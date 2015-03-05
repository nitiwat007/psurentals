<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/* 
 * Configuration => Not Object, Value Only
 */
Route::get('api/configuration/defaultCampusID', ['uses' => 'APIConfigurationController@getDefaultCampusID']);
Route::get('api/configuration/listPerPage', ['uses' => 'APIConfigurationController@getListPerPage']);
Route::get('api/configuration/limitTitleLength', ['uses' => 'APIConfigurationController@getLimitTitleLength']);
Route::get('api/configuration/limitDescriptionLength', ['uses' => 'APIConfigurationController@getLimitDescriptionLength']);
Route::get('api/configuration/applicationKey', ['uses' => 'APIConfigurationController@getApplicationKey']);
Route::get('api/configuration/roleProviderURL', ['uses' => 'APIConfigurationController@getRoleProviderURL']);
Route::get('api/configuration/authenServiceURL', ['uses' => 'APIConfigurationController@getAuthenServiceURL']);

/*
 * Security
 */
Route::get('api/aaa/authentication/{user}/{passwd}', ['uses' => 'SecurityAPIController@authenticationJSON']);
Route::get('api/aaa/isInRoles/{user}/{roles}', ['uses' => 'SecurityAPIController@isInRolesJSON']);


/*
 * Rental
 */
Route::get('api/rentals/search', ['uses' => 'APISearchRentalController@SearchRental']);
Route::get('api/rentals/cover/{rentalID}', ['uses' => 'APISearchRentalsController@getRentalCoverImage']);

/*
 * Property/PropertyType Model
 */
Route::get('api/property', ['uses' => 'APIPropertyController@getAll']);
Route::get('api/property/{propertyID}', ['uses' => 'APIPropertyController@getPropertyByID']);

Route::get('api/propertytype/{propTypeID}/property', function($propTypeID) {
        $propType = (new APIPropertyTypeController())->getPropertyTypeByID($propTypeID);
        return (is_null($propType)) ? null : $propType->properties;
});


/* 
 * Campus Model
 */
/* Get All Campuses */
Route::get('api/campus', ['uses' => 'APICampusController@getCampuses']);
/* Get Campus by ID*/
Route::get('api/campus/{campusID}', ['uses' =>'APICampusController@getCampusByID']);
/* Get Campus(es) that Exist in Specific Amphoe */
Route::get('api/amphoe/{amphoeID}/campus', ['uses' =>'APICampusController@getCampusesByAmphoeID']);

/*
 * Amphoe Model
 */
/* Get All Amphoes */
Route::get('api/amphoe', ['uses' => 'APIAmphoeController@getAll']);
//Route::get('api/amphoe', function() { return Amphoe::all();});
/* Get Amphoe by ID */
Route::get('api/amphoe/{amphoeID}', ['uses'=>'APIAmphoeController@getAmphoeByID']);
/* Get Amphoe of Campus */
Route::get('api/campus/{campusID}/amphoe', function($campusID) { 
   $campus = (new APICampusController())->getCampusByID($campusID);
   return (is_null($campus)) ? null : $campus->amphoe;
});
/* Get Amphoes of Province */
Route::get('api/province/{provinceCode}/amphoe', function($provinceCode) {
    $province = (new APIProvinceController())->getProvinceByCode($provinceCode);
    return (is_null($province)) ? null : $province->amphoes;
});


/*
 * Province Model
 */
/* Get All Province */
Route::get('api/province', ['uses' => 'APIProvinceController@getAll']);
/* Get Province of Amphoe */
Route::get('api/amphoe/{amphoeID}/province', function($amphoeID) {
    $amphoe = (new APIAmphoeController())->getAmphoeByID($amphoeID);
    return (is_null($amphoe)) ? null : $amphoe->province;
});

