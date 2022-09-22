<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

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
    return view('welcome');
});
Route::get('/test', function () {
    // dd(Hash::make('admin@123'));
    return view('theme');
});

Route::get('/home', [MainController::class, 'productListing'])->name('productListing');
Route::get('/contactUs', [MainController::class, 'contactUs'])->name('contact');
Route::get('/special-offer', [MainController::class, 'specialOffer'])->name('specialOffer');
Route::get('/delivery', [MainController::class, 'delivery'])->name('delivery');
Route::get('/cart', [MainController::class, 'cart'])->name('cart');
Route::get('/product-detail', [MainController::class, 'productDetail'])->name('product.detail');


/**  Admin routes */
Route::get('/admin/login', [adminController::class, 'adminLogin'])->name('admin.login');
Route::post('/admin/login', [adminController::class, 'adminLogined'])->name('admin.logined');


/**  Use auth middleware to prevent from unaithorized admin */
Route::group(['middleware' => 'auth'], function()
{    
    Route::get('admin/dashboard', [adminController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [adminController::class, 'adminLogout'])->name('admin.logout');
    Route::get('/add/category', [CategoryController::class, 'create'])->name('create.category');
    Route::post('/add/category', [CategoryController::class, 'store'])->name('add.category');
    Route::get('/categories', [CategoryController::class, 'show'])->name('show.categories');
    Route::get('/edit/categories/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/update/categories/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::post('/delete/category', [CategoryController::class, 'destroy'])->name('category.delete');
<<<<<<< HEAD

    /*  Category routes */
    Route::get('/product/create', [ProductController::class, 'productCreate'])->name('product.create');
    Route::get('/product/show', [ProductController::class, 'productShow'])->name('product.show');
    Route::post('/product/add', [ProductController::class, 'productAdd'])->name('product.add');
    Route::get('/product/show', [ProductController::class, 'productShow'])->name('product.show');
    Route::get('/product/edit/{id}', [ProductController::class, 'productEdit'])->name('product.edit');
    Route::post('/product/edit/{id}', [ProductController::class, 'productUpdate'])->name('product.update');
    Route::post('/product/delete/', [ProductController::class, 'productDelete'])->name('product.update');
    Route::get('/extra/detail/{id}', [ProductController::class, 'productExtraDetail'])->name('extra.detail');
    Route::post('/extra/detail/{id}', [ProductController::class, 'productExtraDetailStore'])->name('extra.detail.store');

=======
>>>>>>> 909ea79... move data with standard using promise in js
});
