<?php

use Illuminate\Support\Facades\Route;

Route::prefix('/map')->group(function () {

    Route::get('/index', 'MapModuleController@map_index')->name('map.index')->middleware('ensure.user.has.role');
    Route::get('/index/{reg_code?}', 'MapModuleController@get_province')->name('map.get_province');
    Route::get('/index/{reg_code?}/{prov_code?}', 'MapModuleController@get_city')->name('map.get_municipality');
    Route::get('/index/{reg_code?}/{prov_code?}/{mun_code?}', 'MapModuleController@get_barangay')->name('map.get_barangay');
    
});