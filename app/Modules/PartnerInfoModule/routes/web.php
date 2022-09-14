<?php

use Illuminate\Support\Facades\Route;

Route::get('partner-info-module', 'PartnerInfoModuleController@welcome');

Route::get('partner-info/index', 'PartnerInfoModuleController@partner_info_form_view');
