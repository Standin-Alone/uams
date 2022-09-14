<?php

use Illuminate\Support\Facades\Route;
use App\Modules\CreatePartner\Http\Controllers\CreatePartnerController;

Route::get('/login', 'LoginController@index')->name('main.page');
Route::get('create-partner', 'CreatePartnerController@welcome')->name('createPartner.index');
Route::get('preview', [CreatePartnerController::class, 'preview'])->name('preview');

Route::get('drop', [CreatePartnerController::class, 'dropData'])->name('partnerdrop');


//partner site
Route::post('save-site', [CreatePartnerController::class, 'saveSite'])->name('partner.site');
Route::get('/viewsite', [CreatePartnerController::class, 'getSite'])->name('partnersite.data');


//partnertech

Route::post('partnersite-saved', [CreatePartnerController::class, 'saveTech'])->name('partnersite.tech');

//partnertraining
Route::post('pstraining-saved', [CreatePartnerController::class, 'saveTraining'])->name('partnersite.training');

//partnerorganization
Route::post('psorganization-saved', [CreatePartnerController::class, 'saveOrganization'])->name('partnersite.organization');


//partneranimal
Route::post('psanimal-saved', [CreatePartnerController::class, 'saveAnimal'])->name('partnersite.animal');
//partnerharvest
Route::post('psharvest-saved', [CreatePartnerController::class, 'saveHarvest'])->name('partnersite.harvest');

Route::get('save-partner', [CreatePartnerController::class, 'savepartner'])->name('get.partner');
Route::post('savepartner', [CreatePartnerController::class, 'save'])->name('save.partner');
Route::get('/save-partner/filter-province/{region_code}', [CreatePartnerController::class, 'filter_province'])->name('ab-filter-province');
Route::get('/save-partner/filter-municipality/{region_code}/{province_code}','CreatePartnerController@filter_municipality')->name('abc-filter-municipality');
Route::get('/save-partner/filter-barangay/{region_code}/{province_code}/{municipality_code}','CreatePartnerController@filter_barangay')->name('abcd-filter-barangay');


//viewdata
Route::get('/viewdata', [CreatePartnerController::class, 'getData'])->name('partner.view');
    Route::get('/viewdata/{partner_id}', [CreatePartnerController::class, 'getbyID'])->name('partnersite.view');


//editdata
Route::post('/editsite', [CreatePartnerController::class, 'editSite'])->name('partnersite.edit');
Route::post('/edittech', [CreatePartnerController::class, 'editTech'])->name('partnertechnology.edit');
Route::post('/edittraining', [CreatePartnerController::class, 'editTraining'])->name('partnertraining.edit');
Route::post('/editorganization', [CreatePartnerController::class, 'editOrganization'])->name('partnerorganization.edit');
Route::post('/editAnimal', [CreatePartnerController::class, 'editAnimal'])->name('partneranimal.edit');
Route::post('/editHarvest', [CreatePartnerController::class, 'editHarvest'])->name('partnerharvest.edit');


Route::post('/updatedata', [CreatePartnerController::class, 'updateData'])->name('partner.update');

Route::get('/delete-data', [CreatePartnerController::class, 'removeSite'])->name('site.delete');

/** * * * * * * * * * * * */

/** Delete Technology */
Route::post('/partner/delete-technology', [CreatePartnerController::class, 'delete_technology'])->name('partner.delete-technology');
Route::post('/partner/delete-training', [CreatePartnerController::class, 'delete_training'])->name('partner.delete-training');
Route::post('/partner/delete-organization', [CreatePartnerController::class, 'delete_organization'])->name('partner.delete-organization');
Route::post('/partner/delete-animal', [CreatePartnerController::class, 'delete_animal'])->name('partner.delete-animal');
Route::post('/partner/delete-harvest', [CreatePartnerController::class, 'delete_harvest'])->name('partner.delete-harvest');
