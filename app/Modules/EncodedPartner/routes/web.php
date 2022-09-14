<?php

use Illuminate\Support\Facades\Route;
Route::group([], function(){
    Route::get('encoded-partner', 'EncodedPartnerController@index')->name('report.encodedpartner')->middleware('ensure.user.has.role');
    Route::get('encoded-partner/show', 'EncodedPartnerController@get')->name('get.list-encodedpartner');
    // Route::get('encoded-partner/export', 'EncodedPartnerController@export')->name('export.encodedpartner-profile');

    Route::post('encoded-partner/update-partner', 'EncodedPartnerController@update_partner')->name('set-status-partner');

    /** View Partner Site and Update status */
    Route::get('encoded-partner/show-site', 'EncodedPartnerController@get_site')->name('get.list-encodedsite');
    Route::post('encoded-partner/update-site', 'EncodedPartnerController@update_site')->name('set-status-site');
});
