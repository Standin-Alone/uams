<?php

// Route::resource('user-management', 'UserManagementController');


Route::group(["prefix"=>'/organization'],function(){
    Route::get('/','OrganizationManagementController@index')->name('organization.index')->middleware('ensure.user.has.role');
    Route::get('/get-organization-records','OrganizationManagementController@get_records')->name('get-orgs');
    Route::post('/add-organization','OrganizationManagementController@add_organization')->name('add-organization');
    Route::post('/update-organization','OrganizationManagementController@update_organization')->name('update-organization');
    Route::post('/set-status-organization','OrganizationManagementController@set_status_organization')->name('set-status-organization');
    
});



