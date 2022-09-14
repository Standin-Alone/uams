<?php

// Route::resource('user-management', 'UserManagementController');


Route::group(["prefix"=>'/technology'],function(){
    Route::get('/','TechnologyManagementController@index')->name('technology.index')->middleware('ensure.user.has.role');
    Route::get('/get-technology-records','TechnologyManagementController@get_records')->name('get-techs');
    Route::post('/add-technology','TechnologyManagementController@add_technology')->name('add-technology');
    Route::post('/update-technology','TechnologyManagementController@update_technology')->name('update-technology');
    Route::post('/set-status-technology','TechnologyManagementController@set_status_technology')->name('set-status-technology');
    
});



