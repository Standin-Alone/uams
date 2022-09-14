<?php

use Illuminate\Support\Facades\Route;

Route::get('mobile-app', 'MobileAppController@welcome');


Route::group([ 'prefix' => 'api'],function(){
    
    Route::post('/login', 'MobileAppController@login')->name('mobile-app-login');    
});


