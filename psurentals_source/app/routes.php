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

//NR
App::missing(function(exception $e) {
    $message = $e->getMessage();
    return (strlen($message) > 0) ? $message : $e;
});

Route::get('/', function() {
    return View::make('home');
    //return Redirect::to('/home');
});
Route::get('/home', function() {
    //return View::make('home');
    return Redirect::to('/');
    //return Redirect::route('/');
});
//NR
//Route::get('/result', function() {
//    return View::make('result');
//});
Route::get('/detail', function() {
    return View::make('detail');
});
//NR
Route::get('/detail/{rentalID}', function() {
    return View::make('detail');
});
Route::get('/rentals', function() {
    return View::make('rentals');
});
Route::get('/profile', function() {
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
Route::get('/login', function() {
    return View::make('login');
});

//RENTALS GET
Route::get('propertytype', array('uses' => 'RentalsController@getPropertyType'));
Route::get('property2/{PropertyTypeID}', array('uses' => 'RentalsController@getProperty'));
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
Route::get('status', array('uses' => 'RentalsController@getStatus'));
Route::get('provider', array('uses' => 'RentalsController@getProvider'));
Route::get('getrentals', array('uses' => 'RentalsListController@getRentals'));
Route::get('getrentalsall', array('uses' => 'RentalsListController@getRentalAll'));
Route::get('getrentalspage/{username}', array('uses' => 'RentalsListController@getRentalPage'));
Route::get('getrentalsbystatus/{status}', array('uses' => 'RentalsListController@getRentalByStatus'));
//RENTALS EDIT
Route::get('getrentaldataedit/{RentalID}', array('uses' => 'RentalsListController@getRentalDataEdit'));
Route::post('updaterental/{RentalID}', array('uses' => 'RentalsListController@updateRental'));
Route::get('test', array('uses' => 'RentalsListController@test'));

//RENTALS INSERT
Route::post('newrentals', array('uses' => 'RentalsController@newtRentals'));

//RENTALS ACTION
Route::delete('deleterentals/{RentalID}', array('uses' => 'RentalsListController@deleteRentals'));

//DETAIL
Route::get('getrentaldetail/{RentalID}', array('uses' => 'RentalsListController@getRentalDetail'));

//UPLOAD
Route::post('upload', array('uses' => 'RentalsController@uploadFile'));

//TEST
Route::get('test/{AmphoeID}', array('uses' => 'RentalsController@getCampusByAmphoe'));


//ROLE PROVIDER
Route::get('roles/isinroles/{username}/{role}', array('uses' => 'TestRoleController@isInRoles'));
Route::get('authen/{username}/{password}', array('uses' => 'TestRoleController@authen'));

//NR
include 'routes2.php';
include 'routeapi.php';