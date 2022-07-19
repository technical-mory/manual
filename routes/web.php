<?php

use App\Http\Controllers\StepController;
use App\Http\Controllers\ManualController;
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
    return view('welcome');
});


Route::get('/dashboard', function () {
    return redirect()->route('manual.index');
})->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('step', StepController::class);
    Route::resource('manual', ManualController::class);
    Route::post('step/form/{manual_id}', [StepController::class, 'form'])->name('step.form');
    Route::get('step/add/{manual_id}', [StepController::class, 'add'])->name('step.add');
    Route::post('step/save/{manual_id}', [StepController::class, 'save'])->name('step.save');
    Route::post('step/complete/{manual_id}', [StepController::class, 'complete'])->name('step.complete');
});

require __DIR__.'/auth.php';



