<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\Process_accout;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Process_accout;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('home', function(){
    return view("pages.top-page.index");
})->name('home');

Route::prefix('admin')->group(function(){
    Route::get('add_product', function(){
        return view("pages.admin.add_product");
    });
});

Route::get('login', function(){
    return view("pages.users.login");
})->name('login');

Route::get('register', [Process_accout::class,'index'])->name('register');
Route::post('register', [Process_accout::class,'register'])->name('post_register');