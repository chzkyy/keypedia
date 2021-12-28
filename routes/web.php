<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

//homePage
Route::get('/', 'App\Http\Controllers\HomeController@index')
    ->name('home');

//show keyboard
Route::get('/category/{id}', 'App\Http\Controllers\CategoryController@index')
    ->name('category');

//detail keyboardPage
Route::get('/keyboard/{id}', 'App\Http\Controllers\DetailController@index')
    ->name('keyboard')
    ->middleware('auth');

//searcPage
Route::get('/search', 'App\Http\Controllers\SearchController@index')
    ->name('search');

//cartPage
Route::get('/cart', 'App\Http\Controllers\CartController@index')
    ->name('cart')
    ->middleware('auth');

Route::post('/cart/store', 'App\Http\Controllers\DetailController@store')
    ->name('cart.store')
    ->middleware('auth');

Route::put('/cart/update/{id}', 'App\Http\Controllers\CartController@update')
    ->name('cart.update')
    ->middleware('auth');

//checkoutPage
Route::get('/checkout', 'App\Http\Controllers\CheckoutController@store')
    ->name('checkout')
    ->middleware('auth');

//transactionHistoryPage
Route::get('/transactionhistory', 'App\Http\Controllers\TransactionController@index')
    ->name('history')
    ->middleware('auth');

//transactionHistoryDetailPage
Route::get('/transactionhistory/{id}', 'App\Http\Controllers\DetailTransactionController@index')
    ->name('historydetail')
    ->middleware('auth');

//ManageKeyboard
//addKeyboard
Route::get('/addkeyboard', 'App\Http\Controllers\ManageKeyboardController@index')
    ->name('addkeyboard')
    ->middleware('auth');

Route::post('/add', 'App\Http\Controllers\ManageKeyboardController@store')
    ->name('add')
    ->middleware('auth');

//updateKeyboard
Route::get('/editkeyboard/{id}', 'App\Http\Controllers\ManageKeyboardController@edit')
    ->name('editkeyboard')
    ->middleware('auth');

Route::post('/updatekeyboard/{id}', 'App\Http\Controllers\ManageKeyboardController@update')
    ->name('updatekeyboard')
    ->middleware('auth');

//deletekeyboard
Route::get('/deletekeyboard/{id}', 'App\Http\Controllers\ManageKeyboardController@destroy')
    ->name('deletekeyboard')
    ->middleware('auth');

//ManageCategory
Route::get('/managecategory', 'App\Http\Controllers\ManageCategoryController@index')
    ->name('managecategory')
    ->middleware('auth');

//updateCategory
Route::get('/update/{id}', 'App\Http\Controllers\ManageCategoryController@showEditPage')
    ->name('editCategory')
    ->middleware('auth');

Route::post('/update/{id}', 'App\Http\Controllers\ManageCategoryController@update')
    ->name('edit')
    ->middleware('auth');

//DeleteCategory
Route::get('/deletecategory/{id}', 'App\Http\Controllers\ManageCategoryController@destroy')
    ->name('deletecategory')
    ->middleware('auth');

//changePasswordPage
Route::group(['middleware'=> 'auth'], function () {
    Route::get('/password', 'App\Http\Controllers\PasswordController@edit')
        ->name('change_password');
    Route::patch('/password', 'App\Http\Controllers\PasswordController@update')
        ->name('update_password');
});

    
Auth::routes(['verify' => true]);
