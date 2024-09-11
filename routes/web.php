<?php

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

Route::get('/', function () {
    return view('pages.404');
});

Route::get('index','App\Http\Controllers\PageController@index');

Route::get('product_type/{type}','App\Http\Controllers\PageController@getProductType');

Route::get('product_detail/{id_prod}','App\Http\Controllers\PageController@getProductDetail');

Route::get('contact','App\Http\Controllers\PageController@getContact');

Route::get('about_us','App\Http\Controllers\PageController@getAbout');

Route::get('check_out','App\Http\Controllers\PageController@getCheckout');
Route::post('order','App\Http\Controllers\PageController@postCheckOut');

Route::get('add2cart/{id}','App\Http\Controllers\PageController@getAdd2Cart');

Route::get('remove_item/{id}','App\Http\Controllers\PageController@getRemoveItem');
Route::get('reduce_item/{id}','App\Http\Controllers\PageController@getReduceItem');

Route::get('login','App\Http\Controllers\PageController@getLogin');
Route::post('login','App\Http\Controllers\PageController@postLogin');

Route::get('signup','App\Http\Controllers\PageController@getSignup');
Route::post('signup','App\Http\Controllers\PageController@postSignup');

Route::get('logout','App\Http\Controllers\PageController@getLogout');

Route::get('search','App\Http\Controllers\PageController@getSearch');

Route::get('profile/{id_user}','App\Http\Controllers\PageController@getProfileAccount');
Route::get('update_profile/{id}','App\Http\Controllers\PageController@getUpdateProfile');

Route::get('profile/security/{id_user}','App\Http\Controllers\PageController@getSecurity');
Route::get('change_pass/{id_user}','App\Http\Controllers\PageController@getChangePass');



////////////////////////////////////////////////////////////////////////////////
//// for admin
Route::get('list_product','App\Http\Controllers\AdminController@getListProd');
Route::get('search_list','App\Http\Controllers\AdminController@getSearchInList');
//...Add...
Route::get('add_product','App\Http\Controllers\AdminController@getAddProdPage');
Route::get('add_prod','App\Http\Controllers\AdminController@getAddProduct');
//...Edit...
Route::get('edit_product/{id}','App\Http\Controllers\AdminController@getEditProdPage');
Route::get('update_prod/{id}','App\Http\Controllers\AdminController@getUpdateProduct');
//...Delete...
Route::get('delete_prod/{id}','App\Http\Controllers\AdminController@getDelProduct');

//...Bills...
Route::get('list_bills','App\Http\Controllers\AdminController@getBills');
Route::get('checked_bill/{id}','App\Http\Controllers\AdminController@getCheckBill');
// Route::get('search_bill','App\Http\Controllers\AdminController@getSearchBill');

////////////////////////////////////////////////////////////////////////////////
Route::get('xmp','App\Http\Controllers\PageController@example');
