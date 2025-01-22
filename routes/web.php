<?php
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\UserCartController;
use App\Http\Controllers\UserDataController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserOrderController;

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/about', [FrontendController::class, 'about']);
Route::get('/contact', [FrontendController::class, 'contact']);
Route::get('/products', [FrontendController::class, 'products']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::middleware('guest')->group(function(){
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'register']);
});

Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/register', [AuthController::class, 'registerProccess']);
Route::middleware('auth')->group(function(){
    // Product
    Route::get('/products/{product}', [ProductController::class, 'getProduct']);
    // Payment
    Route::post('/payment', [UserOrderController::class, 'index']);
    //Cart
    Route::post('/cart', [UserCartController::class, 'store']);
    Route::get('/cart', [UserCartController::class, 'index']);
    Route::get('/cart/delete/{cart}', [UserCartController::class, 'delete']);
    Route::post('/cartpayment', [UserCartController::class, 'payment']);
    Route::post('/cartconfirmation', [UserCartController::class, 'confirmation']);
    // UserOrder
    Route::get('/orderstatus', [UserOrderController::class, 'orderStatus']);
    Route::post('/confirmation', [UserOrderController::class, 'confirmation']);

});

Route::middleware('isAdmin')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index']);
    // Category
    Route::get('/category', [CategoryController::class, 'index']);
    Route::get('/category/create', [CategoryController::class, 'create']);
    Route::post('/category', [CategoryController::class, 'store']);
    Route::get('/category/edit/{category}', [CategoryController::class, 'edit']);
    Route::put('/category', [CategoryController::class, 'update']);
    Route::get('/category/delete/{category}', [CategoryController::class, 'delete']);
    // Product
    Route::get('/product', [ProductController::class, 'index']);
    Route::get('/product/create', [ProductController::class, 'create']);
    Route::post('/product', [ProductController::class, 'store']);
    Route::get('/product/edit/{product}', [ProductController::class, 'edit']);
    Route::put('/product', [ProductController::class, 'update']);
    Route::get('/product/delete/{product}', [ProductController::class, 'delete']);
    // Order
    Route::get('/order', [OrderController::class, 'index']);
    Route::get('/order/{id}', [OrderController::class, 'show']);
    Route::put('/order/update/{order}', [OrderController::class, 'update']);
    Route::get('/order/delete/{order}', [OrderController::class, 'delete']);
    //Userdata
    Route::get('/userdata', [UserDataController::class, 'index']);
    //Sales
    Route::get('/sales', [OrderController::class, 'sales']);

});