<?php


/*Route::get('/', function () {
    return view('front/home');
});*/

Route::get('/', 'HomeController@index')->name('home');

Route::get('/admin', function () {
    return view('admin/index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/shop', 'HomeController@shop')->name('shop');

Route::get('/category/{id}','HomeController@showCates');

Route::get('/contact', function () {
    return view('front/contact');
});

Route::get('/cart', 'CartController@index');

Route::put('/cart/update/{id}', 'CartController@update');

Route::get('/cart/remove/{id}', 'CartController@destroy');

Route::get('/cart/addItem/{id}', 'CartController@addItem');

Route::get('/productDetail/{id}','HomeController@detailPro');

Route::get('/checkout', 'CheckoutController@index');

Route::post('/formvalidate','CheckoutController@address');


Route::get('/wishlist', 'HomeController@view_wishlist');

Route::post('/addWishlist','HomeController@addWishlist')->name('addWishlist');

Route::get('/removeWishList/{id}','HomeController@removeWishList');
Route::group(['middleware'=>'auth'],function(){
	Route::get('/profile', 'ProfileController@index');
	
	Route::get('/orders', 'ProfileController@orders');
	
	Route::get('/address', 'ProfileController@address');
	
	Route::post('/updateAddress', 'ProfileController@updateAddress');
	
	Route::get('/password', 'ProfileController@password');
	
	Route::put('/updatePassword', 'ProfileController@updatePassword');
});

Route::group(['prefix'=>'admin','middleware'=>['auth','admin']], function () {
    
	Route::get('/', function () {
    return view('admin/index');
});
	Route::resource('product','ProductController');
	Route::resource('category','CategoriesController');
});


	
	
	
	
	
	
	
	
	
	
	