<?php

use Illuminate\Support\Facades\Route;

Route::group([], function(){
    Route::get('report-crop', 'ReportCropController@index')->name('report.crop')->middleware('ensure.user.has.role');
    Route::get('report-crop/show', 'ReportCropController@get')->name('get.list-crop');
    Route::get('report-crop/export', 'ReportCropController@export')->name('export.crop');
});