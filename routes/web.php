<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\DeviceInfoController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\ActivityController;
use Illuminate\Support\Facades\Artisan;

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
    $portfolio = DB::table('portfolio_hdr')
        ->whereIn('category', ['web-sites', 'ui-ux-design'])
        ->orderByRaw("CASE WHEN category = 'web-sites' THEN 0 WHEN category = 'ui-ux-design' THEN 1 ELSE 2 END")
        ->orderByDesc('date')
        ->orderByDesc('id')
        ->get();

    return view('welcome', compact('portfolio'));
});

Route::get('fetchdetails',[PortfolioController::class, 'fetchdetails'])->name('fetchdetails');
Route::post('postContact',[PortfolioController::class, 'postContact'])->name('postContact');


Route::get('xgetctk',[PortfolioController::class, 'xgetctk'])->name('xgetctk');
Route::post('/api/store-device-info', [DeviceInfoController::class, 'store'])->name('/api/store-device-info');


Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');

    return "All cache cleared successfully!";
});



Auth::routes();


Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('messages', [MessagesController::class, 'index'])->name('messages');
    Route::get('activity-logs', [ActivityController::class, 'index'])->name('activity-logs');
});



