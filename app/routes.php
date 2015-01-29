 <?php

// /*
// |--------------------------------------------------------------------------
// | Application Routes
// |--------------------------------------------------------------------------
// |
// | Here is where you can register all of the routes for an application.
// | It's a breeze. Simply tell Laravel the URIs it should respond to
// | and give it the Closure to execute when that URI is requested.
// |
// */

// Route::get('/', function()
// {
// 	return View::make('pages.home');
// });

Route::get('/', array('uses'=>'HomeController@showHomeProducts'));


Route::get('category/{category_name}/{noOfPages}', array('uses'=>'CategoryController@showProducts'));
Route::get('category/{category_name}/', array('uses'=>'CategoryController@showProducts'));
// Route::get('category/{category_name}/{category_id}', array('uses'=>'CategoryController@showProducts'));


Route::any('product/{category_id}/{product_id}', array('uses'=>'ProductController@showProductDetails'));
//Route::get('category/{i}', array('uses'=>'CategoryController@showFiction'));


Route::any('addtocart/{category_id}/{product_id}', array('uses'=>'CartController@showAddToCart'));


Route::get('registration', function()
{
	return View::make('pages.registration');
});

Route::any('registration', array('uses' => 'RegistrationController@register'));

Route::any('login', array('uses' => 'LoginController@login'));

Route::any('search', array('uses' => 'SearchController@search'));

//Route::any('/', array('uses'=>'CartController@showWidgetCart'));

Route::any('edit', function(){
	return View::make('pages.edit');
});
Route::any('cart', array('uses'=>'CartController@showMyCart'));

Route::any('logout', array('uses' =>'LogoutController@getLogout'));

Route::any('checkout', array('uses' => 'CartController@showCheckout'));

Route::any('profile', array('uses' => 'CustomerController@showCustomerProfile'));

Route::any('cart/thankyou', array('uses' => 'CartController@showThankYou'));

Route::get('admin', array('uses' => 'AdminController@dashboard'));

Route::get('admin/admins', array('uses' => 'AdminController@showAdmins'));

Route::any('admin/categories', array('uses' => 'AdminController@showCategories'));

Route::get('admin/users', array('uses' => 'AdminController@showUsers'));

Route::get('admin/products', array('uses' => 'AdminController@showProducts'));

Route::get('admin/orders', array('uses' => 'AdminController@showOrders'));

Route::any('noaccess', array('uses' => 'AdminController@showNoAccess'));

Route::any('admin/category/createCategory', array('uses' => 'AdminController@createNewCategory'));

Route::any('admin/orders/viewOrderDetail/{id_order}', array('uses' => 'AdminController@viewOrderDetails'));

Route::any('admin/orders/updateOrder/{id_order}', array('uses' => 'AdminController@updateOrder'));

Route::any('admin/orders/deleteOrder/{id_order}', array('uses' => 'AdminController@deleteOrder'));

Route::any('profile/viewShoppingCart/{id_order}', array('uses' => 'CustomerController@viewShoppingCart'));

Route::any('profile/ajaxResponder/savePersonalInfo', array('uses' => 'AjaxResponderController@savePersonalInfo'));

Route::any('profile/ajaxResponder/saveAddressInfo', array('uses' => 'AjaxResponderController@saveAddressInfo'));
