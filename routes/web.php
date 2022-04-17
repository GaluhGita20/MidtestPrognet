<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\EmailController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Login;
use App\Http\Controllers\CartController;

//Controller Admin
use App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PackageController;



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


Auth::routes(['verify'=>true]);
Route::middleware(['guest:web'])->group(function(){
    Route::view('/','user.home')->name('welcome');
    Route::get('login',[Login::class,'login'])->name('login');
    Route::get('register',[Login::class,'register'])->name('register');
    route::post('registers_proses',[Login::class,'proses_register'])->name('register_proses');
    Route::post('logins_proses',[Login::class,'proses_login'])->name('login_proses');
});

//kiyomasaaaaa 


Route::middleware(['auth:web'])->group(function(){
    Route::get('home', [HomeController::class, 'index'])->middleware('verified')->name('home');
    Route::get('myAccount',[MyAccount::class,'index'])->name('myaccount');

    //CART
    Route::post('/cart/add',[CartController::class,'create'])->name('cart.add');


    Route::post('/logout',[Login::class,'logout'])->name('logout');
    // route::get('toko',[Toko::class,'toko'])->name('home');
});


Route::prefix('admin')->name('admin.')->group(function(){
        Route::middleware(['guest:admin'])->group(function(){
            Route::get('login',[Admin::class,'login'])->name('login');
            route::post('logins_proses',[Admin::class,'proses_login'])->name('login_proses');
        });
        Route::middleware(['auth:admin'])->group(function(){
            Route::view('home','admin.home')->name('home');


            // CRUD PRODUCT MASTER
            Route::get('products',[ProductController::class,'index'])->name('product.index');
            Route::get('addProduct',[ProductController::class,'addProduct'])->name('add.product');
            Route::post('saveProduct',[ProductController::class,'saveProduct'])->name('save.product');
            Route::get('editProduct/{id}/',[ProductController::class,'editProduct'])->name('edit.product');
            Route::post('saveEditProduct/{id}/',[ProductController::class,'saveEditProduct'])->name('saveEdit.product');
            Route::get('detailProduct/{id}/',[ProductController::class,'detailProduct'])->name('detail.product');
            Route::post('deleteProduct/{id}/',[ProductController::class,'deleteProduct'])->name('delete.product');

            //CRUD KATEGORI MASTER
            Route::get('category',[CategoryController::class,'index'])->name('category.index');
            Route::get('addCategory',[CategoryController::class,'addCategory'])->name('add.category');
            Route::post('saveCategory',[CategoryController::class,'saveCategory'])->name('save.category');
            Route::get('editCategory/{id}/',[CategoryController::class,'editCategory'])->name('edit.category');
            Route::post('saveEditCategory/{id}/',[CategoryController::class,'saveEditCategory'])->name('saveEdit.category');
            Route::get('detailCategory/{id}/',[CategoryController::class,'detailCategory'])->name('detail.category');
            Route::post('deleteCategory/{id}/',[CategoryController::class,'deleteCategory'])->name('delete.category');

            //CRUD Package
            Route::get('packages',[PackageController::class,'index'])->name('package.index');
            Route::get('addPackage',[PackageController::class,'addPackage'])->name('add.package');
            Route::post('savePackage',[PackageController::class,'savePackage'])->name('save.package');
            Route::get('editPackage/{id}/',[PackageController::class,'editPackage'])->name('edit.package');
            Route::post('saveEditPackage/{id}/',[PackageController::class,'saveEditPackage'])->name('saveEdit.package');
            Route::get('detailPackage/{id}/',[PackageController::class,'detailPackage'])->name('detail.package');
            Route::post('deletePackage/{id}/',[PackageController::class,'deletePackage'])->name('delete.package');
            
            //CRUD PRODUCT PACKAGE
            Route::post('saveProductPackage-{id}',[PackageController::class,'saveProductPackage'])->name('save.productPackage');


            Route::post('/logout',[Admin::class,'logout'])->name('logout');
        });
});

