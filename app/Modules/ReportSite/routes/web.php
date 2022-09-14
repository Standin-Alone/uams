<?php

use Illuminate\Support\Facades\Route;

Route::group([], function(){
    Route::get('report-list', 'ReportSiteController@index')->name('report.site')->middleware('ensure.user.has.role');
    // Route::get('report-list', 'ReportSiteController@index')->name('report.site');
    Route::get('report-list/show', 'ReportSiteController@get')->name('get.list-site');
    Route::get('report-list/export', 'ReportSiteController@export')->name('export.site');
});