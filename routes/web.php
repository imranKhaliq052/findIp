<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IpController;

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

Route::middleware(['auth'])->get('/allSites',[IpController::class,'allSites'])->name('allSites');
Route::post('/sendIps', [IpController::class, 'sendIps'])->name('sendIps');

Route::view('/getIp','dashboard')->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
