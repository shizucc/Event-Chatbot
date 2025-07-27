<?php

use Illuminate\Support\Facades\Route;

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

// Route::view('/', 'welcome');
Route::get('/', function(){
	return redirect()->route('dashboard');
} );

// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');
Route::get('dashboard', function () {
		return view('admin/dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('user-management', function () {
		return view('laravel-examples/user-management');
	})->name('user-management');

    Route::get('tables', function () {
		return view('tables');
	})->name('tables');

    Route::get('billing', function () {
		return view('billing');
	})->name('billing');

Route::prefix('admin')->middleware(['auth'])->group(function () {
    // Dashboard admin
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // Users CRUD
    Route::view('users', 'admin.users.index')->name('admin.users.index');
    Route::view('users/create', 'admin.users.create')->name('admin.users.create');
    Route::view('users/{user}/edit', 'admin.users.edit')->name('admin.users.edit');
    Route::view('users/{user}', 'admin.users.show')->name('admin.users.show');

    // Events CRUD
    Route::get('events', [\App\Http\Controllers\Admin\EventController::class, 'index'])->name('admin.events.index');
    Route::get('events/create', [\App\Http\Controllers\Admin\EventController::class, 'create'])->name('admin.events.create');
    Route::get('events/{event}/edit', [\App\Http\Controllers\Admin\EventController::class, 'edit'])->name('admin.events.edit');
    Route::get('events/{event}', [\App\Http\Controllers\Admin\EventController::class, 'show'])->name('admin.events.show');
    Route::get('events/{event}/scanner', [\App\Http\Controllers\Admin\EventController::class, 'scanner'])->name('admin.events.scanner');
    Route::get('events/{event}/registration-flow', [\App\Http\Controllers\Admin\EventController::class, 'registrationFlow'])->name('admin.events.registration-flow');
    Route::get('/admin/events/{id}/flow', [\App\Http\Controllers\Admin\EventController::class, 'getFlow']);
    Route::post('/admin/events/{id}/flow', [\App\Http\Controllers\Admin\EventController::class, 'saveFlow']);
    // Tickets CRUD
    Route::view('tickets', 'admin.tickets.index')->name('admin.tickets.index');
    Route::view('tickets/create', 'admin.tickets.create')->name('admin.tickets.create');
    Route::view('tickets/{ticket}/edit', 'admin.tickets.edit')->name('admin.tickets.edit');
    Route::view('tickets/{ticket}', 'admin.tickets.show')->name('admin.tickets.show');

    // Payments CRUD
    Route::view('payments', 'admin.payments.index')->name('admin.payments.index');
    Route::view('payments/create', 'admin.payments.create')->name('admin.payments.create');
    Route::view('payments/{payment}/edit', 'admin.payments.edit')->name('admin.payments.edit');
    Route::view('payments/{payment}', 'admin.payments.show')->name('admin.payments.show');

    // Entity Corrections CRUD
    Route::view('entity-corrections', 'admin.entity_corrections.index')->name('admin.entity_corrections.index');
    Route::view('entity-corrections/create', 'admin.entity_corrections.create')->name('admin.entity_corrections.create');
    Route::view('entity-corrections/{entityCorrection}/edit', 'admin.entity_corrections.edit')->name('admin.entity_corrections.edit');
    Route::view('entity-corrections/{entityCorrection}', 'admin.entity_corrections.show')->name('admin.entity_corrections.show');

    // Visitors CRUD
    Route::view('visitors', 'admin.visitors.index')->name('admin.visitors.index');
    Route::view('visitors/create', 'admin.visitors.create')->name('admin.visitors.create');
    Route::view('visitors/{visitor}/edit', 'admin.visitors.edit')->name('admin.visitors.edit');
    Route::view('visitors/{visitor}', 'admin.visitors.show')->name('admin.visitors.show');

    // Settings
    Route::view('settings', 'admin.settings.index')->name('admin.settings.index');

    // E

});

require __DIR__.'/auth.php';
