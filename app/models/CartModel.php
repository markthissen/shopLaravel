<?php
class CartModel {

public function getProductNamebyId($id_product){
		return DB::table('product_lang')->select('name')->where('id_product','=', $id_product)->get();

	}

	public function getProductPricebyId($id_product){
		return DB::table('product')->select('price')->where('id_product','=',$id_product)->first();
	}




	public function addToCart($id_product, $qty=1) {
		$productName = $this->getProductNamebyId($id_product);
		$productPrice = $this->getProductPricebyId($id_product);

		$cart_id = Session::get('cart_id');

		$var = DB::table('cart_product')
			->select('id_product', 'qty')
			->where('cart_id', '=', $cart_id)
			->where('id_product', '=', $id_product)
			->first();

		$p = $productPrice->price;
		$q = $qty+$var->qty;


		if (empty($var)){
			DB::table('cart_product')
			->insert(array('id_product'=>$id_product, 'qty'=>$qty, 'price'=>$productPrice->price, 'cart_id'=>$cart_id, 'total'=>$productPrice->price));
		} else {
			DB::table('cart_product')
			->where('id_product', '=', $id_product)
			->where('cart_id', '=', $cart_id) 
			->update(array('qty' => $qty+$var->qty, 'total' =>$p * $q));
		}

	}

	public function getCartIdByUserId($user_id){
		return DB::table('cart')
		->join('customers', function($join) {
			$join->on('cart.cart_id', '=', 'customers.id');
		})
		->where('cart.ordered', '=', 0)
		->where('cart.user_id', '=', $user_id)
		->select('cart.cart_id')
		->first()->cart_id;
	}

	public function createCartByUserId($user_id){

		return DB::table('cart')
		->insertGetId(array('user_id'=>$user_id));
	}

	
	public function showCart() {
		return DB::table('cart_product')
		->where('cart_product.cart_id', '=', Session::get('cart_id'))
		->join('product_lang', function($join) {
			$join->on('product_lang.id_product', '=', 'cart_product.id_product');
		})
		->join('cart', function($join) {
			$join->on('cart_product.cart_id', '=', 'cart.cart_id');
		})
		->where('cart.ordered', '=', 0)
		->join('product', function($join) {
			$join->on('product.id_product', '=', 'cart_product.id_product');
		})
		->get();
	}

	public function getTotalPrice() {
		return DB::table('cart_product')
		->join('cart', function($join) {
			$join->on('cart_product.cart_id', '=', 'cart.cart_id');
		})
		->where('cart_product.cart_id', '=', Session::get('cart_id'))
		->where('cart.ordered', '=', 0)
		->sum('total');
	}

	public function getTotalQty() {
		return DB::table('cart_product')
		->join('cart', function($join) {
			$join->on('cart_product.cart_id', '=', 'cart.cart_id');
		})
		->where('cart.ordered', '=', 0)
		->where('cart_product.cart_id', '=', Session::get('cart_id'))
		->sum('qty');
	}

	public function update($quantity, $id_product) {
		for($i=0; $i<count($quantity); $i++) {
	
			$productPrice = $this->getProductPricebyId($id_product[$i]);
			$price = $productPrice->price;

			DB::table('cart_product')
			->where('cart_product.id_product', '=', $id_product[$i])
			->where('cart_product.cart_id', '=', Session::get('cart_id'))
			->update(array('qty' => $quantity[$i], 'total' => $quantity[$i] * $price));		
		}
	}

	public function remove($id_product) {
		DB::table('cart_product')
		->where('cart_product.id_product', '=', $id_product)
		->where('cart_product.cart_id', '=', Session::get('cart_id'))
		->delete();
	}

	public function getTotalSum() {
		$total = $this->getTotalPrice();
		$totalSum = $total + 5; 
		return $totalSum;
	}

	public function getCustomerDetails() {
		return DB::table('customers')
		->join('cart', function($join) {
			$join->on('cart.user_id', '=', 'customers.id');
		})
		->where('cart.cart_id', '=', Session::get('cart_id'))
		->get(array('customers.name', 'customers.email'));
	}

	public function getCustomerAddress() {
		$address = DB::table('addresses')
				->select('*')
				->join('customers', function($join) {
					$join->on('customers.id', '=', 'addresses.id_customer');
				})
				->where('addresses.id_customer', '=', Session::get('id'))
				->get();

		$select_options = array();
		
		foreach ($address as $ad) {
			$select_options[$ad->id_address] = $ad->address;
		}

		return $select_options;
	}


	public function insertOrder() {
		DB::table('orders')
		->insert(array('status' =>'new', 'id_customer'=> Session::get('id'), 'id_cart' => Session::get('cart_id')));

		return $order_id =  DB::getPdo()->lastInsertId();
	}

	public function insertOrderDetail($order) {
		$suma = $this->getTotalSum();
		DB::table('order_detail')
		->where('id_order', '=', $order['id_order'])
		->insert(array('address_billing'=>$order['address_billing'], 'address_shipping'=>$order['address_shipping'],'payment'=>$order['payment'], 'id_order'=>$order['id_order'], 'total_sum' => $suma));
	}

	public function changeCartStatus() {
		return DB::table('cart')
		->where('cart.cart_id', '=', Session::get('cart_id'))
		->where('cart.user_id', '=', Session::get('id'))
		->update(array('ordered'=>1));
	}






}