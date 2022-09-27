<?php

use App\Http\Controllers\ShortingController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect()->route('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('import-stock-sales', [ShortingController::class, 'importStockSales'])->name('import.stock.sales');
Route::post('import-stock-sales', [ShortingController::class, 'storeStockSales'])->name('import.stock.sales');

Route::get('import-stock-accurate', [ShortingController::class, 'importStockaccurate'])->name('import.stock.accurate');
Route::post('import-stock-accurate', [ShortingController::class, 'storeStockaccurate'])->name('import.stock.accurate');

Route::get('shorting', [ShortingController::class, 'shorting'])->name('shorting');
Route::get('export/pdf', [ShortingController::class, 'exportPdf'])->name('export.pdf');
Route::get('export/excel', [ShortingController::class, 'exportExcel'])->name('export.excel');
