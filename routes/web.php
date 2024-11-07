<?php

use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\UsersController;
use App\Http\Livewire\LogoutOtherDevices;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('landing');
})->name('landing');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::get('/user/other-sessions',function(){
    return view('close-seessions');
})
->name('other-sessions.logout')
->middleware('auth:sanctum');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    Route::resource('/usuarios', UsersController::class);
    Route::resource('/empleados', EmployeesController::class)->middleware('can:employees.index');

      
});
