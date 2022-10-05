<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilterController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::middleware(['verify.shopify','billable'])->group(function(){

Route::get('/', 
    [FilterController::class, 'index']
    )->name('home');

Route::post('/createNewFilteritem', 
    [FilterController::class, 'newFilterItem']
    )->name('newFilterItem');

Route::post('/deleteFilter', 
    [FilterController::class, 'removeFilter']
    )->name('removeFilter');

Route::post('/updateFilterStatus', 
    [FilterController::class, 'filterStatus']
    )->name('filterStatus');

Route::post('/editFilter', 
    [FilterController::class, 'updateFilter']
    )->name('updateFilter');    

Route::post('/updateFilterItem', 
    [FilterController::class, 'updateFilterItem']
    )->name('updateFilterItem');    
    
});