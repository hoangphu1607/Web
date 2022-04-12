<?php


use App\Http\Controllers\Controller;
use App\Http\Controllers\Process_accout;
use App\Http\Controllers\Admin\manageController;
use App\Models\Users\Process;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user;
use App\Http\Controllers\user\HomeController;
use App\Http\Controllers\user\Order;
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

Route::prefix('home')->group( function(){
    //page main
    Route::get('/' , [HomeController::class,'get_product'])->name('home');
    //get Product by id
    Route::get('getProductById', [Order::class,'getProductById'])->name('getProductById');
    //show product detail by id
    Route::get('chi-tiet-san-pham/{id}', [Order::class,'showProductDetailById'])->name('showProductDetailById');
});

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
    //edit loại sản Phẩm
    Route::get('form-editCategories',[manageController::class,'form_editCategories'])->middleware('checkLogin')->name('form_editCategories');
    //edit sản Phẩm
    Route::get('form-editProduct',[manageController::class,'editProduct'])->middleware('checkLogin')->name('form-editProduct');
    //lất tất cả sản phẩm
    Route::get('getAllProduct', [manageController::class,'getAllProduct'])->middleware('checkLogin')->name('getAllProduct');
    //Lấy 1 sản Phẩm
    Route::post('getOneProduct', [manageController::class,'getOneProduct'])->middleware('checkLogin')->name('getOneProduct');
    //Lấy tất cả loại sản Phẩm
    Route::get('allCategories', [manageController::class,'getAllCategories'])->middleware('checkLogin')->name('allCategories');
    //Update Sản Phẩm
    Route::post('updateProduct', [manageController::class,'updateProduct'])->middleware('checkLogin')->name('updateProduct');
    //Delete product
    Route::post('deleteProduct',[manageController::class,'deleteProduct'])->middleware('checkLogin')->name('deleteProduct');
    //Lấy 1 loại sản phẩm
    Route::post('getOneCategories',[manageController::class,'getOneCategori'])->middleware('checkLogin')->name('getOneCategories');
    //Update loại sản phẩm
    Route::post('updateCategories',[manageController::class,'updateCategories'])->middleware('checkLogin')->name('updateCategories');    
    //delete categories
    Route::post('deleteCategories', [manageController::class,'deleteCategories'])->middleware('checkLogin')->name('deleteCategories');
    //show manage suppliers page get
    Route::get('manageSuppliers',[manageController::class,'manageSuppliers'])->middleware('checkLogin')->name('getmanageSuppliers');
    //show manage suppliers page get
    Route::post('manageSuppliers',[manageController::class,'manageSuppliers'])->middleware('checkLogin')->name('postmanageSuppliers');
    //get all suppliers get
    Route::get('showSuppliers',[manageController::class,'showSuppliers'])->middleware('checkLogin')->name('showSuppliers');
    //get supplier by it's id
    Route::get('getSupplierById',[manageController::class,'getSupplierById'])->middleware('checkLogin')->name('getSupplierById');
    //update supplier
    Route::post('updateSupplierById',[manageController::class,'updateSupplierById'])->middleware('checkLogin')->name('updateSupplierById');
    //delele
    Route::get('deleteSupplierById',[manageController::class,'deleteSupplierById'])->middleware('checkLogin')->name('deleteSupplierById');
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


