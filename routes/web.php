<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/redirect',[HomeController::class,'redirect']);
Route::get('/',[HomeController::class,'index']);

Route::get('view_catagory',[AdminController::class,'view_catagory']);

Route::post('/catagories', [AdminController::class, 'storeCatagory'])->name('catagories.store');

Route::delete('catagories/{catagory}',[AdminController::class, 'destroy'])->name('catagories.destroy');

Route::get('view_product',[AdminController::class,'viewproduct'])->name('view_product');

Route::post('add_product',[AdminController::class,'add_product'])->name('add_product');

Route::get('show_product', [AdminController::class, 'showProducts'])->name('show_products');

Route::get('delete_product/{id}', [AdminController::class, 'delete_product'])->name('delete_product');

Route::get('update_product/{id}', [AdminController::class, 'update_product'])->name('update_product');

Route::get('Order',[AdminController::class,'Order'])->name('Order');

Route::get('delivered/{id}', [AdminController::class, 'delivered'])->name('delivered');

Route::get('print_pdf/{id}', [AdminController::class, 'print_pdf'])->name('print_pdf');

Route::get('search',[AdminController::class,'search'])->name('search');







Route::get('product_details/{id}', [HomeController::class, 'product_details'])->name('product_details');

Route::post('add_cart/{id}', [HomeController::class, 'add_cart'])->name('add_cart');

Route::get('show_card', [HomeController::class, 'show_card'])->name('show_card');

Route::get('remove_card/{id}', [HomeController::class, 'remove_card'])->name('remove_card');

Route::get('cash_order', [HomeController::class, 'cash_order'])->name('cash_order');

Route::get('stripe/{Total}', [HomeController::class,'stripe'])->name('stripe');
Route::post('stripe/{total}', [HomeController::class, 'stripePost'])->name('stripe.post');

Route::get('show_Order', [HomeController::class, 'show_Order'])->name('show_Order');

Route::get('cancel_order/{id}', [HomeController::class, 'cancel_order'])->name('cancel_order');

Route::post('add_comment', [HomeController::class, 'add_comment'])->name('add_comment');

Route::post('add_reply', [HomeController::class, 'add_reply'])->name('add_reply');

Route::get('product_search', [HomeController::class, 'product_search'])->name('product_search');




