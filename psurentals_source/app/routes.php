<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the Closure to execute when that URI is requested.
  |
 */

Route::get('/', function() {
    return View::make('main');
});
Route::get('/home', function() {
    return View::make('home');
});
Route::get('/result', function() {
    return View::make('result');
});
Route::get('/detail', function() {
    return View::make('detail');
});
Route::get('/rentals', function() {
    return View::make('rentals');
});
Route::get('/rentalslist', function() {
    return View::make('rentalslist');
});
Route::get('/testFileUpload', function() {
    return View::make('testFileUpload');
});
Route::post('/upload', function() {
    return View::make('upload');
});
Route::get('/rentalsedit', function() {
    return View::make('rentals_edit');
});

//RENTALS GET
Route::get('propertytype', array('uses' => 'RentalsController@getPropertyType'));
Route::get('property/{PropertyTypeID}', array('uses' => 'RentalsController@getProperty'));
Route::get('amphoe', array('uses' => 'RentalsController@getAmphoe'));
Route::get('rooms', array('uses' => 'RentalsController@getRooms'));
Route::get('bedrooms', array('uses' => 'RentalsController@getBedroomsAvailable'));
Route::get('bedroomfurnished', array('uses' => 'RentalsController@getBedroomFurnished'));
Route::get('utility', array('uses' => 'RentalsController@getUtilityIncludedInRent'));
Route::get('whitegoods', array('uses' => 'RentalsController@getWhiteGoogdsProvided'));
Route::get('facility', array('uses' => 'RentalsController@getOtherFacilities'));
Route::get('gender', array('uses' => 'RentalsController@getPreferredGender'));
Route::get('tenant', array('uses' => 'RentalsController@getPerferredTenant'));
Route::get('smoke', array('uses' => 'RentalsController@getSmoking'));
Route::get('pets', array('uses' => 'RentalsController@getPets'));
Route::get('provider', array('uses' => 'RentalsController@getProvider'));


Route::get('getrentals', array('uses' => 'RentalsListController@getRentals'));

//RENTALS EDIT
Route::get('getrentaldataedit/{RentalID}', array('uses' => 'RentalsListController@getRentalDataEdit'));

//RENTALS INSERT
Route::post('newrentals', array('uses' => 'RentalsController@newtRentals'));

//RENTALS ACTION
Route::delete('deleterentals/{RentalID}', array('uses' => 'RentalsListController@deleteRentals'));


//UPLOAD
Route::post('upload', array('uses' => 'RentalsController@uploadFile'));

//TEST
Route::get('test/{AmphoeID}', array('uses' => 'RentalsController@getCampusByAmphoe'));