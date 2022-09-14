<?php

use Illuminate\Support\Facades\Route;
Route::group([], function(){
    Route::get('report-partner', 'ReportPartnerController@index')->name('report.partner')->middleware('ensure.user.has.role');
    Route::get('report-partner/show', 'ReportPartnerController@get')->name('get.list-partner');
    Route::get('report-partner/export', 'ReportPartnerController@export')->name('export.partner-profile');
});
