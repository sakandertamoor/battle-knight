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

/*
Route::get('/', function () {
    $repo = new KnightRepository();

    return view('battle', ['knight' => Knight::find(1)]);
});
*/
Route::get('/', [App\Http\Controllers\KnightsController::class, 'fight'])->name('fight');
Route::get(
    '/knights/{knightId}',
    [App\Http\Controllers\KnightsController::class, 'show']
)->name('knightShow');

/*
Route::get('/generate', function (NameFakeGeneratorService $service) {
    $service->getName();
});

Route::get('/new', function (NameFakeGeneratorService $service) {
    echo \App\Facades\RandomAgeGenerator::getAge();exit;
    echo $service->getName();exit;
});*/
