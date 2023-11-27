<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserFraudController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ActivityTypeController;
use App\Http\Controllers\ChannelController;
use App\Http\Controllers\WelcomeController;

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

Route::get('/welcome', 'App\Http\Controllers\WelcomeController@index')->name('welcome');
Route::get('/penjelasan', 'App\Http\Controllers\PenjelasanController@index')->name('penjelasan');
Route::resource('user', UserFraudController::class);
Route::post('/user/import', 'App\Http\Controllers\UserFraudController@import')->name('user.import');
Route::resource('activity', ActivityController::class);
Route::post('/activity/import', 'App\Http\Controllers\ActivityController@import')->name('activity.import');
Route::resource('transaction', TransactionController::class);
Route::post('/transaction/import', 'App\Http\Controllers\TransactionController@import')->name('transaction.import');
Route::resource('activityType', ActivityTypeController::class);
Route::post('/activityType/import', 'App\Http\Controllers\ActivityTypeController@import')->name('activityType.import');
Route::resource('channel', ChannelController::class);
Route::post('/channel/import', 'App\Http\Controllers\ChannelController@import')->name('channel.import');
use App\Http\Controllers\SummaryController;

Route::get('/summary', [SummaryController::class, 'form'])->name('form');
Route::post('/summary/process', [SummaryController::class, 'process'])->name('process');
