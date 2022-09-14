<?php

use Illuminate\Support\Facades\Route;

Route::group(["prefix"=>'/audit-trail'],function(){
    Route::get('/','AuditTrailController@index')->name('audit-trail.index')->middleware('ensure.user.has.role');
    Route::get('/get-trail-records','AuditTrailController@get_trail')->name('get-trail');
 
});



