<?php

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\LgaController;
use App\Http\Controllers\WardController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\PollingController;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
    Route::get('/state', function () {
        return Inertia::render('State');
    })->name('state');
    Route::get('/lga', function () {
        return Inertia::render('Lga');
    })->name('lga');
    Route::get('/ward', function () {
        return Inertia::render('Ward');
    })->name('ward');
    Route::get('/polling', function () {
        return Inertia::render('Polling');
    })->name('polling');
    Route::get('/test', function () {
        return Inertia::render('Test');
    })->name('test');
    Route::get('/base', function () {
        return Inertia::render('Base');
    })->name('base');
});

// Route::get('/state', [StateController::class, 'index'])->name('states.index');
// Route::post('/states', [StateController::class, 'store']);
Route::get('states/create', [Statecontroller::class, 'create']);
// Route::get('states', [Statecontroller::class, 'index'])->name('states.index');
Route::post('states', [StateController::class, 'store']);

Route::get('lgas/create', [LgaController::class, 'create']);
Route::get('lgas', [LgaController::class, 'index'])->name('lgas.index');
Route::post('lgas', [LgaController::class, 'store']);

// Route::get('/lgas', [LgaController::class, 'index'])->name('lgas.index');

// Route::get('/lgas/{Id}', [LgaController::class, 'index'])->name('lgas');

// Route::get('/state-list', [StateController::class, 'index']);
// Route::get('/lga-list/{id}', [LgaController::class, 'index']);

Route::get('/state-list', [StateController::class, 'index']);


// Route::get('/lgas/{state}', [LgaController::class, 'index']);
// Route::get('/states', [StateController::class, 'index']);

// Route::get('/states', [StateController::class, 'index']);
// Route::get('/lgas/{stateId}', [StateController::class, 'lgas']);


// Route::get('/states', [StateController::class, 'index'])->name('states.index');
// Route::post('/states', [StateController::class, 'submitForm'])->name('states.submitForm');

Route::get('/states', [StateController::class, 'getData']);


// Route to get the list of states
Route::get('/api/state-list', [WardController::class, 'getStateList']);

// Route to get the list of LGAs for a specific state
Route::get('/api/lga-list/{states}', [WardController::class, 'getLgaList']);

// Route to get the list of Ward within a LGAs for a specific state
Route::get('/api/ward-list/{lgas}', [PollingController::class, 'getWardList']);



// Route to store a new ward
Route::post('wards', [WardController::class, 'store']);

// Route to store a new polling Unit
Route::post('pollings', [PollingController::class, 'store']);
