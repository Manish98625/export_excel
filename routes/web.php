<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ExcelExportCrudController;

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
    return view('welcome');
});

Route::get('/download-excel', [ExcelExportCrudController::class, 'export'])->name('download-excel');
Route::post('/import-excel', [ExcelExportCrudController::class, 'import'])->name('import-excel');
Route::get('/export-iris', [ExcelExportCrudController::class, 'exportIris'])->name('export-iris');
Route::get('/export-mtcars', [ExcelExportCrudController::class, 'exportMtcars'])->name('export-mtcars');

