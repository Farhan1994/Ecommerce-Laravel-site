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



// Admin Routes
Route::group(['prefix' => 'admin_index'], function(){
  Route::get('/', 'admin\AdminController@index')->name('admin.dashboard');

  // Admin Login Routes
  Route::get('/login', 'Auth\Admin\LoginController@showLoginForm')->name('admin.login');
  Route::post('/login/submit', 'Auth\Admin\LoginController@login')->name('admin.login.submit');
  Route::post('/logout/submit', 'Auth\Admin\LoginController@logout')->name('admin.logout');

  // Password Email Send
  Route::get('/password/reset', 'Auth\Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
  Route::post('/password/resetPost', 'Auth\Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');

  // Password Reset
  Route::get('/password/reset/{token}', 'Auth\Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
  Route::post('/password/reset', 'Auth\Admin\ResetPasswordController@reset')->name('admin.password.reset.post');


  // Product Routes
  Route::group(['prefix' => '/products'], function(){
    Route::get('/', 'admin\ProductsController@index')->name('admin.products');
    Route::get('/create', 'admin\ProductsController@create')->name('admin.product.create');
    Route::get('/edit/{id}', 'admin\ProductsController@edit')->name('admin.product.edit');

    Route::post('/store', 'admin\ProductsController@store')->name('admin.product.store');

    Route::post('/product/edit/{id}', 'admin\ProductsController@update')->name('admin.product.update');
    Route::post('/product/delete/{id}', 'admin\ProductsController@delete')->name('admin.product.delete');
  });


    // Orders Routes
  Route::group(['prefix' => '/orders'], function(){
    Route::get('/', 'admin\OrdersController@index')->name('admin.orders');
    Route::get('/view/{id}', 'admin\OrdersController@show')->name('admin.order.show');
    Route::post('/delete/{id}', 'admin\OrdersController@delete')->name('admin.order.delete');

    Route::post('/completed/{id}', 'admin\OrdersController@completed')->name('admin.order.completed');

    Route::post('/paid/{id}', 'admin\OrdersController@paid')->name('admin.order.paid');
    Route::post('/charge-update/{id}', 'admin\OrdersController@chargeUpdate')->name('admin.order.charge');

    Route::get('/invoice/{id}', 'admin\OrdersController@generateInvoice')->name('admin.order.invoice');

  });



  // Category Routes
  Route::group(['prefix' => '/categories'], function(){
    Route::get('/', 'admin\CategoriesController@index')->name('admin.categories');
    Route::get('/create', 'admin\CategoriesController@create')->name('admin.category.create');
    Route::get('/edit/{id}', 'admin\CategoriesController@edit')->name('admin.category.edit');

    Route::post('/store', 'admin\CategoriesController@store')->name('admin.category.store');

    Route::post('/category/edit/{id}', 'admin\CategoriesController@update')->name('admin.category.update');
    Route::post('/category/delete/{id}', 'admin\CategoriesController@delete')->name('admin.category.delete');
  });

  // Brand Routes
  Route::group(['prefix' => '/brands'], function(){
    Route::get('/', 'admin\BrandsController@index')->name('admin.brands');
    Route::get('/create', 'admin\BrandsController@create')->name('admin.brand.create');
    Route::get('/edit/{id}', 'admin\BrandsController@edit')->name('admin.brand.edit');

    Route::post('/store', 'admin\BrandsController@store')->name('admin.brand.store');

    Route::post('/brand/edit/{id}', 'admin\BrandsController@update')->name('admin.brand.update');
    Route::post('/brand/delete/{id}', 'admin\BrandsController@delete')->name('admin.brand.delete');
  });

  // Division Routes
  Route::group(['prefix' => '/divisions'], function(){
    Route::get('/', 'admin\DivisionsController@index')->name('admin.divisions');
    Route::get('/create', 'admin\DivisionsController@create')->name('admin.division.create');
    Route::get('/edit/{id}', 'admin\DivisionsController@edit')->name('admin.division.edit');

    Route::post('/store', 'admin\DivisionsController@store')->name('admin.division.store');

    Route::post('/division/edit/{id}', 'admin\DivisionsController@update')->name('admin.division.update');
    Route::post('/division/delete/{id}', 'admin\DivisionsController@delete')->name('admin.division.delete');
  });

  // District Routes
  Route::group(['prefix' => '/districts'], function(){
    Route::get('/', 'admin\DistrictsController@index')->name('admin.districts');
    Route::get('/create', 'admin\DistrictsController@create')->name('admin.district.create');
    Route::get('/edit/{id}', 'admin\DistrictsController@edit')->name('admin.district.edit');

    Route::post('/store', 'admin\DistrictsController@store')->name('admin.district.store');

    Route::post('/district/edit/{id}', 'admin\DistrictsController@update')->name('admin.district.update');
    Route::post('/district/delete/{id}', 'admin\DistrictsController@delete')->name('admin.district.delete');
  });


  // Slider Routes
  Route::group(['prefix' => '/sliders'], function(){
    Route::get('/', 'admin\SlidersController@index')->name('admin.sliders');
    Route::post('/store', 'admin\SlidersController@store')->name('admin.slider.store');
    Route::post('/slider/edit/{id}', 'admin\SlidersController@update')->name('admin.slider.update');
    Route::post('/slider/delete/{id}', 'admin\SlidersController@delete')->name('admin.slider.delete');
  });




});


//user

Route::get('/', 'user\PagesController@index')->name('index');
Route::get('/contact', 'user\PagesController@contact')->name('contact');



/*
Product Routes
All the routes for our product for user
*/
Route::group(['prefix' => 'products'], function(){

  Route::get('/', 'user\ProductsController@index')->name('products');
  Route::get('/{slug}', 'user\ProductsController@show')->name('products.details');
  Route::get('/new/search', 'user\PagesController@search')->name('search');

  //Category Routes
  Route::get('/categories', 'user\CategoriesController@index')->name('categories.index');
  Route::get('/category/{id}', 'user\CategoriesController@show')->name('categories.show');
});


// User Routes
Route::group(['prefix' => 'user'], function(){
Route::get('/token/{token}', 'user\VerificationController@verify')->name('user.verification');
Route::get('/dashboard', 'user\UsersController@dashboard')->name('user.dashboard');
Route::get('/profile', 'user\UsersController@profile')->name('user.profile');
Route::post('/profile/update', 'user\UsersController@profileUpdate')->name('user.profile.update');
});


// Cart Routes
Route::group(['prefix' => 'carts'], function(){
  Route::get('/', 'user\CartsController@index')->name('carts');
  Route::post('/store', 'user\CartsController@store')->name('carts.store');
  Route::post('/update/{id}', 'user\CartsController@update')->name('carts.update');
  Route::post('/delete/{id}', 'user\CartsController@destroy')->name('carts.delete');
});

// Checkout Routes
Route::group(['prefix' => 'checkout'], function(){
Route::get('/', 'user\CheckoutsController@index')->name('checkouts');
Route::post('/store', 'user\CheckoutsController@store')->name('checkouts.store');
});
Auth::routes();




// API routes
Route::get('get-districts/{id}', function($id){
  return json_encode(App\Models\District::where('division_id', $id)->get());
});
