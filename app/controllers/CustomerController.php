<?php
class CustomerController extends FrontController {
	public function showCustomerProfile() {
		$customer_model = new CustomerModel();
		$customer_profile_details = $customer_model-> getCustomerProfileDetails();
		$customer_profile_address = $customer_model->getCustomerProfileAddress();
		$customer_profile_orders = $customer_model->getCustomerProfileOrders();

		if (Input::get('save')!=null) {
			$address = Input::get('address');
			$city = Input::get('city');

			$new_address = $customer_model->insertNewAddress($address, $city);
		}

	return View::make('pages.profile')
		->with('customer_profile_details', $customer_profile_details)
		->with('customer_profile_address', $customer_profile_address)
		->with('customer_profile_orders', $customer_profile_orders)
		->with('new_address', $new_address);
	}

	public function viewShoppingCart() {
		$customer_model = new CustomerModel();
		$id_order = Route::input('id_order');
		$shopping_cart = $customer_model->getCustomerProfileCart($id_order);

		return View::make('pages.profileCart')
			->with('id_order', $id_order)
			->with('shopping_cart', $shopping_cart);
	}

	

}