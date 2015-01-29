<?php
class CustomerModel {
	public function getCustomerProfileDetails() {
		return DB::table('customers')
		->where('customers.id', '=', Session::get('id'))
		->get(array('customers.name', 'customers.email'));
	}

	public function getCustomerProfileAddress() {
		return DB::table('addresses')
		->where('addresses.id_customer', '=', Session::get('id'))
		->get(array('addresses.address', 'addresses.city', 'addresses.id_address'));
	}

	public function insertNewAddress($address, $city) {
		return DB::table('addresses')
		->where('addresses.id_customer', '=', Session::get('id'))
		->insert(array('address' => $address, 'city' =>$city, 'id_customer' => Session::get('id')));
	}

	public function getCustomerProfileCart($id_order){
		return DB::table('orders')
		->where('orders.id_customer', '=', Session::get('id'))
		->where('orders.id_order', '=', $id_order)
		->join('cart_product', function($join) {
			$join->on('cart_product.cart_id', '=', 'orders.id_cart');
		})
		->join('order_detail', function($join) {
			$join->on('orders.id_order', '=', 'order_detail.id_order');
		})
		->join('product_lang', function($join) {
			$join->on('product_lang.id_product', '=', 'cart_product.id_product');
		})
		
		->get(array('product_lang.name', 'cart_product.qty', 'cart_product.price'));
	}

	public function getCustomerProfileOrders() {
		return DB::table('orders')
		->where('orders.id_customer', '=', Session::get('id'))
		->join('order_detail', function($join) {
			$join->on('orders.id_order', '=', 'order_detail.id_order');
		})
		->join('addresses', function($join) {
			$join->on('order_detail.address_shipping', '=', 'addresses.id_address');
		})
		->get(array('orders.id_order', 'orders.date_created', 'orders.status', 'order_detail.total_sum', 'order_detail.payment', 'addresses.address'));
	}

	public function updateInfo($name, $email) {
		return DB::table('customers')
		->where('customers.id', '=', Session::get('id'))
		->update(array('name'=>$name, 'email'=>$email));
	}

	public function updateAddressInfo($id_address, $address, $city) {
		return DB::table('addresses')
		->where('addresses.id_customer', '=', Session::get('id'))
		->where('addresses.id_address', '=', $id_address)
		->update(array('address'=>$address, 'city'=>$city));
	}
}