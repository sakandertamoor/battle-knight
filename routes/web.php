<?php

use App\Models\Knight;
use App\Repositories\KnightRepository;
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

Route::get('/', [App\Http\Controllers\KnightsController::class, 'fight'])->name('fight');
Route::get(
    '/knights/{knightId}',
    [App\Http\Controllers\KnightsController::class, 'show']
)->name('knightShow');

