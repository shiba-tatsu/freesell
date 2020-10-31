<?php

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

Auth::routes();

// 商品一覧、詳細、出品、編集機能
Route::get('/', 'ItemController@index')->name('item.index');
Route::get('/items/create', 'ItemController@create')->name('item.create')->middleware('auth');
Route::post('/items/create', 'ItemController@store')->name('item.store');
Route::get('/items/{item}/', 'ItemController@show')->name('item.show');
Route::get('/items/{item}/edit', 'ItemController@edit')->name('item.edit')->middleware('auth');;
Route::patch('/items/{item}/', 'ItemController@update')->name('item.update')->middleware('auth');
Route::post('/items/{item}/destroy', 'ItemController@destroy')->name('item.destroy')->middleware('auth');

// 商品評価機能
Route::resource('reviews', 'ReviewController', ['only' => ['create','store']])->middleware('auth');

//検索機能
Route::get('/search', 'SearchController@search')->name('item.search');
Route::get('/refined', 'SearchController@refined')->name('item.refined');

/* axiosでのデータ取得
Route::get('/items/{item}',function(){
	return App\Item::all();
});*/


//ユーザー機能
Route::group(['prefix' => 'users', 'middleware' => 'auth'], function () {
  Route::get('{user}/show', 'UserController@show')->name('users.show');
  Route::get('{user}/profile', 'UserController@changeProfile')->name('users.profile');
  Route::post('{user}/profile', 'UserController@storeProfile')->name('users.storeProfile');
});

//いいね機能
Route::prefix('likes')->name('items.')->group(function () {
  Route::put('/{item}/like', 'LikeController@like')->name('like')->middleware('auth');
  Route::delete('/{item}/like', 'LikeController@unlike')->name('unlike')->middleware('auth');
});

// ログイン、新規ユーザー登録機能
Route::prefix('login')->name('login.')->group(function () {
  Route::get('/{provider}', 'Auth\LoginController@redirectToProvider')->name('{provider}');
  Route::get('/{provider}/callback', 'Auth\LoginController@handleProviderCallback')->name('{provider}.callback');
});

Route::prefix('register')->name('register.')->group(function () {
  Route::get('/{provider}', 'Auth\RegisterController@showProviderUserRegistrationForm')->name('{provider}');
  Route::post('/{provider}', 'Auth\RegisterController@registerProviderUser')->name('{provider}');
});

// チャット機能
Route::group(['prefix' => 'chat', 'middleware' => 'auth'], function () {
  Route::post('create', 'ChatController@create')->name('chat.create');
  Route::get('/show/{id}', 'ChatController@show')->name('chat.show');
  Route::post('chat', 'ChatController@chat')->name('chat.chat');
});

// クレジットカード登録と購入機能
Route::get('/users/payment', 'PaymentController@getCurrentPayment')->name('payment.payment');
Route::get('/users/payment/form', 'PaymentController@getPaymentForm')->name('payment.form');
Route::post('/users/payment/store', 'PaymentController@storePaymentInfo')->name('payment.store');
Route::post('/users/payment/destroy', 'PaymentController@deletePaymentInfo')->name('payment.destroy');

Route::post('/items/buy', 'PaymentController@buy')->name('payment.buy');
Route::post('/items/pay', 'PaymentController@pay')->name('payment.pay');
Route::get('/items/pay/complete', 'PaymentController@complete')->name('payment.complete');

//Route::prefix('users')->name('users.')->group(function () {
//  Route::get('/{name}', 'UserController@show')->name('show');
//});

