<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'ensure.user.has.session', 'prefix' => '/partner-profile-module'], function () {
    Route::get('/index/{uuid?}', 'PartnerProfileModuleController@partner_profile_index')->name('partner_profile.index');
});
