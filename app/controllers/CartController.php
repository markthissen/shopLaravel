<?php

class CartController extends FrontController{
	public function showAddToCart($category_id,$product_id) {
		$add_to_cart_model = new CartModel();
		

		if (Auth::check()) {
			$mycart = $add_to_cart_model->addToCart($product_id, $qty=1);
			$mycart = $add_to_cart_model->showCart();
		
		}
		else {
			
			return Redirect::to('/login')->with('message', 'Please login');
		}

		return Redirect::to('/cart');

	}

	public function showMyCart(){

		$add_to_cart_model = new CartModel();

		if(!empty($_POST)) {
			$quantity = Input::get('qty');
			$id_product = Input::get('id_product');
			$my_cart = $add_to_cart_model->update($quantity, $id_product);
		}

		$checkboxes = Input::get('my_checkbox');
		//var_dump($checkboxes); exit; 

		$id_product = Input::get('id_product');

		if(!empty($checkboxes)) {
			foreach($checkboxes as $id_product_to_be_removed) {
				$add_to_cart_model->remove($id_product_to_be_removed);
			}
		}

		if (Auth::check()) {
			$cart = $add_to_cart_model->showCart();
			// var_dump($cart);
		} else {
			return Redirect::to('/login')->with('message', 'Please login');
		}


		
		return View::make('pages.cart')
			->with('mycart',$cart);

	}

	public function showCheckout() {

		$model = new CartModel();
		$total = $model->getTotalSum();
		$customer = $model->getCustomerDetails();

		$address = $model->getCustomerAddress(); 

		if (Input::get('order')!=null) {

			try {

			$address_billing = Input::get('billing');

			$address_shipping = Input::get('shipping');
			$payment = Input::get('payment');

			$order = $model->insertOrder();
			
			$order_details_array['address_billing'] = $address_billing;
			$order_details_array['address_shipping'] = $address_shipping;
			$order_details_array['payment'] = $payment;
			$order_details_array['id_order'] = $order;

			$order_detail = $model->insertOrderDetail($order_details_array);

			$cart_status = $model->changeCartStatus();

			Session::forget('cart_id');
			 

			$userId = Auth::user()->id;
    		$cart_id = $model->createCartByUserId($userId);

    		Session::put('cart_id', $cart_id);

    		echo Redirect::to('/cart/thankyou'); exit; 
    		} catch (Exception $e) {
				$e->getTraceAsString();
				$e->getMessage();
				return 'There was a problem in processing your order. Try again later.';		
			}
		

		}


		

		return View::make('pages.checkout')
			->with('total', $total)
			->with('customer', $customer)
			->with('address', $address)
			->with('order', $order)
			->with('order_detail', $order_detail)
			->with('cart_status', $cart_status)
			->with('cart_id', Session::get('cart_id'));

		
	}

	public function showThankYou() {
		return View::make('pages.checkoutThankYou');
	}


}