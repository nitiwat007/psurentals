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

Route::get('/term', function() {
    return View::make('term');
});
//Route::get('/contact', array('before' => 'auth', function() {
//    return View::make('contact');
//}));
Route::get('/contact', function() {
    return View::make('contact');
});
Route::get('/about', function() {
    return View::make('about');
});
Route::get('/logout', function() {
    Auth::logout();
    return Redirect::to('/home');
});

Route::get('/login', function() {
    return View::make('login');
});
Route::get('/test/login', function() {
    return View::make('testlogin');
});
Route::get('/login2/{username}', function($username) {
    Auth::loginUsingId($username);
    return Redirect::to('/profile');
});

//RENTALS GET
//NECESSARY AUTHORIZATION
Route::group(array('before' => 'auth'), function() {

    Route::get('/rentals', function() {
        return View::make('rentals');
    });
    Route::get('/rentalsedit', function() {
        return View::make('rentals_edit');
    });
    Route::get('/profile', function() {
        return View::make('rentalslist');
    });

    Route::get('propertytype', array('uses' => 'RentalsController@getPropertyType'));
    Route::get('property2/{PropertyTypeID}', array('uses' => 'RentalsController@getProperty'));
    Route::get('amphoe', array('uses' => 'RentalsController@getAmphoe'));
    Route::get('campus', array('uses' => 'RentalsController@getAllCampus'));
    Route::get('amphoebycampus/{ProvinceCode}', array('uses' => 'RentalsController@getAmphoeByCampus'));
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

//UPLOAD
    Route::post('upload', array('uses' => 'RentalsController@uploadFile'));

//TEST

//Route::get('test/{AmphoeID}', array('uses' => 'RentalsController@getCampusByAmphoe'));
//ROLE PROVIDER
Route::get('roles/isinroles/{username}/{role}', array('uses' => 'TestRoleController@isInRoles'));
//Route::get('authen/{username}/{password}', array('uses' => 'TestRoleController@authen'));
});

//TEST
//Route::get('testhost', array('uses' => 'RentalsController@testHost'));

//UNNECESSARY AUTHORIZATION
//DETAIL
Route::get('getrentaldetail/{RentalID}', array('uses' => 'RentalsListController@getRentalDetail'));

//NR
include 'routes2.php';
include 'routeapi.php';
