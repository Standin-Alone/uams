<?php

// Route::resource('user-management', 'UserManagementController');


Route::group(["prefix"=>'/animal'],function(){
    Route::get('/','AnimalManagementController@index')->name('animal.index')->middleware('ensure.user.has.role');
    Route::get('/get-animal-records','AnimalManagementController@get_records')->name('get-animals');
    Route::post('/add-animal','AnimalManagementController@add_animal')->name('add-animal');
    Route::post('/update-animal','AnimalManagementController@update_animal')->name('update-animal');
    Route::post('/set-status-animal','AnimalManagementController@set_status_animal')->name('set-status-animal');
    
});



