<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VatController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ClientTypeController;
use App\Http\Controllers\CampaignBillingController;
use App\Http\Controllers\ClientSheetImportController;
use App\Http\Controllers\BillingSheetImportController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});




require __DIR__.'/auth.php';
Route::middleware('auth')->group(function () {
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', 'DashboardController@topCards')->name('home');

        
    Route::get('/vat', 'VatController@index')->name('vat.index');
    Route::patch('/vat/{id}', 'VatController@update')->name('vat.update');


    /* ------------------------------------------------
    Client Type
    ------------------------------------------------- */
    Route::get('/client-type-lists', 'ClientTypeController@index')->name('clientType.lists');
    Route::post('/client-type', 'ClientTypeController@store');
    Route::put('/client-type/{id}', 'ClientTypeController@update');
    Route::delete('/client-type/{id}', 'ClientTypeController@destroy');

    /* ------------------------------------------------
    Client
    ------------------------------------------------- */
    Route::get('/clients', 'ClientController@index')->name('client.lists');
    Route::get('/clients/create-new-client', 'ClientController@create')->name('client.create');

    Route::post('/client', 'ClientController@store')->name('client.store');
    Route::get('/client/{uuid}/update', 'ClientController@edit')->name('client.edit');
    Route::patch('/client/{uuid}', 'ClientController@update')->name('client.update');
    Route::get('/client/{uuid}/view', 'ClientController@show')->name('client.view');

    Route::delete('/client/delete/{uuid}', 'ClientController@destroy')->name('client.destroy');

    Route::get('/client-sheet-import', 'ClientSheetImportController@import')->name('client.sheet.import');
    Route::post('/client-sheet-import', 'ClientSheetImportController@store')->name('client.import');

    /* ------------------------------------------------
    Campaign
    ------------------------------------------------- */
    Route::get('/campaigns', 'CampaignController@index')->name('campaign.lists');

    Route::get('/campaigns/create-new-campaign', 'CampaignController@create')->name('campaign.create');
    Route::post('/campaign', 'CampaignController@store')->name('campaign.store');
    Route::get('/campaign/{uuid}/update', 'CampaignController@edit')->name('campaign.edit');
    Route::get('/campaign/{campaign}/view', 'CampaignController@show')->name('campaign.view');

    Route::patch('/campaign/{uuid}', 'CampaignController@update')->name('campaign.update');

    // Route::delete('/campaign/trash/{id}', 'CampaignController@destroy')->name('campaign.trash');

    Route::get('/campaigns/data-refresh', 'DelayDateController@refreshData')->name('campaign.data.refresh');

    Route::get('/suggest/campaign-names', 'CampaignController@suggestName')->name('autocomplete_campaign_name');
    Route::get('/suggest/campaign-descriptions', 'CampaignController@suggestDescription')->name('autocomplete_campaign_description');
    Route::get('/suggest/campaign-estimate-number', 'CampaignController@suggestEstimateNumber')->name('autocomplete_campaign_estimate_number');
    Route::get('/suggest/campaign-bill-number', 'CampaignController@suggestBillNumber')->name('autocomplete_campaign_bill_number');


    Route::get('campaign/select/commission-value', 'CampaignController@getCommissionValue')->name('getCommissionValue');


    /* ------------------------------------------------
    Campaign Billing
    ------------------------------------------------- */
    Route::get('/campaigns/billings', 'CampaignBillingController@index')->name('billing.lists');
    Route::get('/campaigns/billings/create-new-bill', 'CampaignBillingController@create')->name('billing.create');
    Route::post('/campaigns/bill', 'CampaignBillingController@store')->name('billing.store');
    Route::get('/campaign/bill/{uuid}/update', 'CampaignBillingController@edit')->name('billing.edit');
    Route::patch('/campaign/bill/{uuid}', 'CampaignBillingController@update')->name('billing.update');
    Route::delete('/campaign/bill/{id}', 'CampaignBillingController@destroy');
    /* ------------------------------------------------
    Campaign Sheet Import
    ------------------------------------------------- */
    Route::get('/campaign/bulk-import', 'BillingSheetImportController@import')->name('billing.sheet.import');
    Route::post('/billing-sheet-import', 'BillingSheetImportController@store')->name('bill.import');

    /* ------------------------------------------------
    Trashed
    ------------------------------------------------- */

    Route::get('/trash/campaigns', 'CampaignController@trash')->name('trash.campaigns');
    Route::delete('/trash/delete-all-campaigns', 'CampaignController@removeAllFromTrash')->name('trash.remove.all.campaigns');

    /* ------------------------------------------------
    Report
    ------------------------------------------------- */
    Route::get('/billing-report', 'ReportController@index')->name('report.all');
    Route::get('/billing-due', 'ReportController@due')->name('report.due');
    Route::get('/billing-paid', 'ReportController@paid')->name('report.paid');
    Route::get('/get-billings', 'ReportController@getBillingsData')->name('getBillingData');
    Route::get('/billings-yearmonth', 'ReportController@yearmonth')->name('report.yearmonth');
});


