<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;

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
    return redirect()->route('dashboard');
})->name('home');

Auth::routes([
    'register' => true, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


Route::group([
    'prefix' => '/goruntulemeler'
], function () {
    Route::get('/thermal', function () {
        return view('goruntulemelerthermal');
    })->name('goruntulemeler.thermal');

    Route::get('/el', function () {
        return view('goruntulemelerel');
    })->name('goruntulemeler.el');
})->middleware('auth');


Route::get('/temizlik', function () {
    return view('temizlik');
})->middleware('auth')->name('temizlik');

Route::get('/bakimonarim', function () {
    return view('bakimonarim');
})->middleware('auth')->name('bakimonarim');


Route::get('/temizlik-detayi/{id}', function ($id) {
    return view('temizlikdetayi', compact('id'));
})->middleware('auth')->name('temizlik-detayi');

Route::get('/dashboard-data/{id}', function ($id) {
    $contents = File::get(base_path('public/data/dashboard.json'));
    $json = json_decode(json: $contents, associative: true);

    return collect($json ?? [])
        ->firstWhere('id', $id);
});

Route::get('/cleanings-data/{firmId}', function ($firmId) {
    $contents = File::get(base_path('public/data/cleanings.json'));
    $json = json_decode(json: $contents, associative: true);

    return collect($json ?? [])
        ->where('firmId', $firmId)->values()->all();
});

Route::get('/cleaningdetails/{cleaningId}', function ($cleaningId) {
    $contents = File::get(base_path('public/data/cleaningdetails.json'));
    $json = json_decode(json: $contents, associative: true);

    return collect($json ?? [])
        ->firstWhere('cleaningId', $cleaningId);
});


Route::get('/personneldocuments/{personnelId}', function ($personnelId) {
    $contents = File::get(base_path('public/data/personneldocuments.json'));
    $json = json_decode(json: $contents, associative: true);

    return collect($json ?? [])
        ->firstWhere('personnelId', $personnelId);
});

Route::get('/personel-dokumanlari/{id}', function ($id) {
    return view('personneldocuments', compact('id'));
})->middleware('auth')->name('personel-dokumanlari');
