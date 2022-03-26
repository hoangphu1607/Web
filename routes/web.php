<?php


use App\Http\Controllers\Controller;
use App\Http\Controllers\Process_accout;
use App\Http\Controllers\Admin\manageController;
use App\Models\Users\Process;
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
    Route::get('/', function(){
        return view('pages.admin.login');
    });
    Route::get('register', function(){
        return view('pages.admin.register');
    });
    Route::get('manageCategories', [manageController::class,'manageCategories'])->name('manageCategories');
    Route::post('addCategories', [manageController::class,'addCategories'])->name('addCategories');

    Route::get('form_addSuppliers', [manageController::class,'form_addSuppliers'])->name('form_addSuppliers');

    Route::get('addSuppliers', [manageController::class,'addSuppliers'])->name('addSuppliers');
    Route::post('addSuppliers', [manageController::class,'addSuppliers'])->name('addSuppliers');
    
    Route::get('addCategories', [Manage::class,'showCategories'])->name('addCategories');
    Route::post('addCategories', [Manage::class,'addCategories'])->name('addCategories');    
});

Route::get('login',[Process_accout::class,'index_login'])->name('login');
Route::post('login',[Process_accout::class,'login'])->name('post_login');
Route::get('register', [Process_accout::class,'index_register'])->name('register');
Route::post('register', [Process_accout::class,'register'])->name('post_register');
Route::get('logout', [Process_accout::class,'logout'])->name('logout');


Route::get('add-img-product', function(){
    return view("pages.admin.add_img_product");
});



