<?php


use App\Http\Controllers\Controller;
use App\Http\Controllers\Process_accout;
use App\Http\Controllers\Admin\manageController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\SuppliersController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Models\Users\Process;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user;
use App\Http\Controllers\user\HomeController;
use App\Http\Controllers\user\Order;
use App\Http\Controllers\user\Bill;
use App\Http\Controllers\User\UserController;

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

    Route::get('getDesById',[Order::class,'getDesById'])->name('getDesById');
    //user order product
    Route::post('orderProduct',[Order::class,'orderProduct'])->name('orderProduct');
    // show bill
    Route::get('bill',[Bill::class,'showBill'])->name('showBill');
    Route::get('checkout',[Bill::class,'showCheckOut'])->name('showCheckOut');
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

    // Thêm loại sản phẩm
    Route::get('manageCategories', [CategoriesController::class,'manageCategories'])->middleware('checkLogin')->name('manageCategories');
    Route::post('addCategories', [CategoriesController::class,'addCategories'])->middleware('checkLogin')->name('addCategories');
    //edit loại sản Phẩm
    Route::get('form-editCategories',[CategoriesController::class,'form_editCategories'])->middleware('checkLogin')->name('form_editCategories');
        //Lấy tất cả loại sản Phẩm
    Route::get('allCategories', [CategoriesController::class,'getAllCategories'])->middleware('checkLogin')->name('allCategories');
    //Lấy tất cả loại sản Phẩm
    Route::get('allCategories', [CategoriesController::class,'getAllCategories'])->middleware('checkLogin')->name('allCategories');
    //Lấy 1 loại sản phẩm
    Route::post('getOneCategories',[CategoriesController::class,'getOneCategori'])->middleware('checkLogin')->name('getOneCategories');
    //Update loại sản phẩm
    Route::post('updateCategories',[CategoriesController::class,'updateCategories'])->middleware('checkLogin')->name('updateCategories');    
    //delete categories
    Route::post('deleteCategories', [CategoriesController::class,'deleteCategories'])->middleware('checkLogin')->name('deleteCategories');

    // Thêm nhà cung cấp
    Route::get('form-addSuppliers', [SuppliersController::class,'form_addSuppliers'])->middleware('checkLogin')->name('form_addSuppliers');
    Route::post('form-addSuppliers', [SuppliersController::class,'addSuppliers'])->middleware('checkLogin')->name('addSuppliers');    
    //show manage suppliers page get
    Route::get('manageSuppliers',[SuppliersController::class,'manageSuppliers'])->middleware('checkLogin')->name('getmanageSuppliers');
    //show manage suppliers page get
    Route::post('manageSuppliers',[SuppliersController::class,'manageSuppliers'])->middleware('checkLogin')->name('postmanageSuppliers');
    //get all suppliers get
    Route::get('showSuppliers',[SuppliersController::class,'showSuppliers'])->middleware('checkLogin')->name('showSuppliers');
    //get supplier by it's id
    Route::get('getSupplierById',[SuppliersController::class,'getSupplierById'])->middleware('checkLogin')->name('getSupplierById');
    //update supplier
    Route::post('updateSupplierById',[SuppliersController::class,'updateSupplierById'])->middleware('checkLogin')->name('updateSupplierById');
    //delele supplier
    Route::get('deleteSupplierById',[SuppliersController::class,'deleteSupplierById'])->middleware('checkLogin')->name('deleteSupplierById');
    
    //edit sản Phẩm
    Route::get('form-editProduct',[ProductsController::class,'editProduct'])->middleware('checkLogin')->name('form-editProduct');
    //lất tất cả sản phẩm
    Route::get('getAllProduct', [ProductsController::class,'getAllProduct'])->middleware('checkLogin')->name('getAllProduct');
    //Lấy 1 sản Phẩm
    Route::post('getOneProduct', [ProductsController::class,'getOneProduct'])->middleware('checkLogin')->name('getOneProduct');
    //Update Sản Phẩm
    Route::post('updateProduct', [ProductsController::class,'updateProduct'])->middleware('checkLogin')->name('updateProduct');
    //Delete product
    Route::post('deleteProduct',[ProductsController::class,'deleteProduct'])->middleware('checkLogin')->name('deleteProduct');
    // Thêm sản phẩm
    Route::get('form-addProduct',[ProductsController::class, 'form_addProduct'])->middleware('checkLogin')->name('form_addProduct');
    Route::post('form-addProduct',[ProductsController::class, 'addProduct'])->middleware('checkLogin')->name('addProduct');
    //update content
    Route::POST('updateContent',[ProductsController::class, 'updateContent'])->middleware('checkLogin')->name('updateContent');
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

Route::group(['prefix' => 'user', 'as' => 'user.'], function(){
    Route::get('',[UserController::class,'index'])->name('index');
});