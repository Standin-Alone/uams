<?php

// Route::resource('user-management', 'UserManagementController');


Route::group(["prefix"=>'/crops'],function(){
    Route::get('/','CropsManagementController@index')->name('crops.index')->middleware('ensure.user.has.role');
    Route::get('/get-crop-records','CropsManagementController@get_records')->name('get-crops');
    Route::post('/add-crop','CropsManagementController@add_crop')->name('add-crop');
    Route::post('/update-crop','CropsManagementController@update_crop')->name('update-crop');
    Route::post('/set-status-crop','CropsManagementController@set_status_crop')->name('set-status-crop');
    
});



