<?php

use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\StudentController;
Use App\Http\Controllers\MonthController;
Use App\Http\Controllers\SavingController;
Use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;

/*
|---------------------------------------Web Routes-----------------------------------
| 
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

Route::group(['prefix' => 'students'], function(){
    route::get('/students',[StudentController::class,'index'])->name('students');
    route::get('create',[StudentController::class,'create'])->name('students.create');
    route::post('store',[StudentController::class,'store'])->name('students.store');
    route::get('edit/{student}',[StudentController::class,'edit'])->name('students.edit');
    route::patch('update/{student}',[StudentController::class,'update'])->name('students.update');
    route::delete('destroy/{student}',[StudentController::class,'destroy'])->name('students.destroy');
});

Route::group(['prefix' => 'months'], function(){
    route::get('/months',[MonthController::class,'index'])->name('months');
    route::get('create',[MonthController::class,'create'])->name('months.create');
    route::post('store',[MonthController::class, 'store'])->name('months.store');
});

Route::group(['prefix', 'savings'], function(){
    route::get('/savings', [SavingController::class,'index'])->name('savings');
    route::get('create/{month}', [SavingController::class,'create'])->name('savings.create');
    route::post('store/{month}',[SavingController::class,'store'])->name('savings.store');
    Route::get('cetak', [SavingController::class,'cetak'])->name('savings.cetak');
    Route::get('/print', [SavingController::class, 'printPDF'])->name('savings.print');
    Route::get('/savings/print/{id}', [SavingController::class, 'printPDFById'])->name('savings.printById');


});

Route::group(['prefix','withdrawals'], function(){
    route::get('/withdrawals', [TransactionController::class,'index'])->name('withdrawals');
    route::get('create/{saving}', [TransactionController::class,'create'])->name('withdrawals.create');
    route::post('store/{saving}',[TransactionController::class,'store'])->name('withdrawals.store');
    
});
Route::group(['prefix'=>'users'], function(){
    route::get('/',[UserController::class,'index'])->name('users');
    route::get('/create',[UserController::class,'create'])->name('users.create');
    route::post('/store',[UserController::class,'store'])->name('users.store');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
