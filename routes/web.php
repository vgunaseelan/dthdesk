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
	
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

/* FrontEnd Location */
Route::get('/','IndexController@index');
Route::post('/','IndexController@index');
Route::get('/index','IndexController@index');
Route::post('/userChannels','IndexController@channels');
Route::post('/enquireform','IndexController@enquire');
Route::post('/subscribeform','IndexController@subscribe');
Route::get('/list-products','IndexController@shop');
Route::get('/cat/{id}','IndexController@listByCat')->name('cats');
Route::get('/product-detail/{id}','IndexController@detialpro');


////// get Attribute ////////////
Route::get('/get-product-attr','IndexController@getAttrs');

/* Addto cart ajax */
// Route::post('cartstore','AddtocartController@store');
Route::post('/cartstore/{id}','AddtocartController@store');
Route::post('/update/{id}','AddtocartController@updateCart');
Route::get('/deletecart/{id}','AddtocartController@deleteCart');
Route::get('/cart','AddtocartController@create');

///// Cart Area /////////
/* form */
// Route::get('/billing','ProcessformController@index');





/*  */
Route::post('/addToCart','CartController@addToCart')->name('addToCart');
Route::get('/viewcart','CartController@index');
Route::post('/viewcart','CartController@index');
Route::get('/cart/deleteItem/{id}','CartController@deleteItem');

Route::get('/cart/update-quantity/{id}/{quantity}','CartController@updateQuantity');
/////////////////////////

/// Apply Coupon Code
Route::post('/apply-coupon','CouponController@applycoupon');
/// Simple User Login /////
Route::get('/login_page','UsersController@index');
Route::get('/signup','UsersController@signup');
Route::post('/register_user','UsersController@register');
Route::post('/user_login','UsersController@login');
Route::get('/logout','UsersController@logout');


////// User Authentications ///////////
Route::group(['middleware'=>'FrontLogin_middleware'],function (){
    Route::get('/myaccount','UsersController@account');
    Route::get('/myorders','UsersController@myorders');
    Route::get('/myordersdelete/{id}','UsersController@myordersDelete');
    Route::put('/update-profile/{id}','UsersController@updateprofile');
    Route::put('/update-password/{id}','UsersController@updatepassword');
    Route::get('/check-out','CheckOutController@index');
    Route::post('/submit-checkout','CheckOutController@submitcheckout');
    Route::get('/order-review','OrdersController@index');
    Route::post('/submit-order','OrdersController@order');
    // Route::get('/cod','CheckOutController@cod');
    Route::get('/paypal','CheckOutController@paypal');
});
///
/* mail function  */
// Route::get('sendmail','MailController@basic_email');


/* end mail function */


/* Xstream link */

Route::get('/xstream','XstreamController@index');


/* Xstream end link */
/* Packages link */

Route::get('/channelpackages','ChannelPackagesController@index');
Route::get('/channelpackages/{id}','ChannelPackagesController@show');
Route::post('/channelpackages','ChannelPackagesController@ajax');

/* ajax using buy channel */
Route::post('/buypackage/{id}','ChannelPackagesController@store');
Route::get('/buypackage/{id}','ChannelPackagesController@store');
Route::post('/deletepackage/{id}','ChannelPackagesController@destroy');

/* Packages end link */

/* Channels link */

Route::get('/channelList','ChannelsController@index');
Route::get('/channelList/{id}','ChannelsController@show');

/* Channels end link */

/* contactus  */
Route::get('/contactus','ContactController@index');

/* end contactus */
/* Admin Location */
Auth::routes(['register'=>false]);
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix'=>'admin','middleware'=>['auth','admin']],function (){
    Route::get('/', 'AdminController@index')->name('admin_home');
    
    /// Setting Area
    Route::get('/settings', 'AdminController@settings');
    Route::get('/check-pwd','AdminController@chkPassword');
    Route::post('/update-pwd','AdminController@updatAdminPwd');
    /// Category Area
    Route::resource('/category','CategoryController');
    Route::get('delete-category/{id}','CategoryController@destroy');
    Route::get('/check_category_name','CategoryController@checkCateName');
    /// Products Area
    Route::resource('/product','ProductsController');
    Route::get('delete-product/{id}','ProductsController@destroy');
    Route::get('delete-image/{id}','ProductsController@deleteImage');
    /// Product Attribute
    Route::resource('/product_attr','ProductAtrrController');
    Route::get('delete-attribute/{id}','ProductAtrrController@deleteAttr');
    /// Product Images Gallery
    Route::resource('/image-gallery','ImagesController');
    Route::get('delete-imageGallery/{id}','ImagesController@destroy');
    /// ///////// Coupons Area //////////
    Route::resource('/coupon','CouponController');
    Route::get('delete-coupon/{id}','CouponController@destroy');
///

    /// Main Package Area
    Route::resource('/packages','BackendPackagesController');
    Route::get('delete-packages/{id}','BackendPackagesController@destroy');
    Route::get('deletepackage-image/{id}','BackendPackagesController@deleteImage');
    /// Main Package End

    /// Sub Package Area
    Route::resource('/subpackages','BackendSubpackagesController');
    Route::get('delete-subpackages/{id}','BackendSubpackagesController@destroy');
    Route::get('delete-image/{id}','BackendSubpackagesController@deleteImage');
    /// Sub Package End

    /// language Type
    Route::resource('/languageType','BackendlanguageTypeController');
    Route::get('delete-languageType/{id}','BackendlanguageTypeController@destroy');   
    /// type end 

    /// channels Area
    Route::resource('/channels','BackendChannelController');
    Route::get('delete-channels/{id}','BackendChannelController@destroy');
    Route::get('delete-channels-image/{id}','BackendChannelController@deleteImage');
    /// channels End


    /// customers Area
    Route::resource('/customers','BackendCustomerController');   
    Route::get('delete-customers/{id}','BackendCustomerController@destroy');
    Route::get('delete_enquiery/{id}','BackendCustomerController@edit');
    Route::get('/subscrib','BackendCustomerController@subscrib'); 
    Route::get('delete_subscrib/{id}','BackendCustomerController@deletesubscrib');
    // Route::get('delete-customers/{id}','BackendCustomerController@deleteImage');
    /// customers End
     
});
