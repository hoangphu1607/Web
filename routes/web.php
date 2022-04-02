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

Route::prefix('admin')->group( function(){
    //login admin
    Route::get('/', [manageController::class,'form_login'])->name('adminLogin');
    Route::post('/', [manageController::class,'login_admin'])->name('adminLogin');
    //register Admin
    Route::get('register', [manageController::class,'form_register'])->name('form_Register');
    Route::post('register', [manageController::class,'register_admin'])->name('adminRegister');
    //admin logout
    Route::get('logout', [manageController::class,'adminLogout'])->name('admin_logout');  
    // Thêm sản phẩm
    Route::get('form-addProduct',[manageController::class, 'form_addProduct'])->middleware('checkLogin')->name('form_addProduct');
    Route::post('form-addProduct',[manageController::class, 'addProduct'])->middleware('checkLogin')->name('addProduct');

    // Thêm loại sản phẩm
    Route::get('manageCategories', [manageController::class,'manageCategories'])->middleware('checkLogin')->name('manageCategories');
    Route::post('addCategories', [manageController::class,'addCategories'])->middleware('checkLogin')->name('addCategories');
    // Thêm nhà cung cấp
    Route::get('form-addSuppliers', [manageController::class,'form_addSuppliers'])->middleware('checkLogin')->name('form_addSuppliers');
    Route::post('form-addSuppliers', [manageController::class,'addSuppliers'])->middleware('checkLogin')->name('addSuppliers');    
    //edit sản Phẩm
    Route::get('form-editCategories',[manageController::class,'form_editCategories'])->middleware('checkLogin')->name('form_editCategories');
    //Lấy 1 loại sản phẩm
    Route::post('getOneCategories',[manageController::class,'getOneCategori'])->middleware('checkLogin')->name('getOneCategories');
        
});

Route::get('login',[Process_accout::class,'index_login'])->name('login');
Route::post('login',[Process_accout::class,'login'])->name('post_login');
Route::get('register', [Process_accout::class,'index_register'])->name('register');
Route::post('register', [Process_accout::class,'register'])->name('post_register');
Route::get('logout', [Process_accout::class,'logout'])->name('logout');


Route::get('add-img-product', function(){
    return view("pages.admin.add_img_product");
});

Route::get('details', function(){
    return view("pages.users.details");
});



