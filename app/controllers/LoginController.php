<?php

class LoginController extends FrontController {
	public function login() {

		if (count(Input::get())) {
			$rules = array(
					'username'    => 'required', 
					'password' => 'required'
				);

			$validator = Validator::make(Input::all(), $rules);

			if ($validator->fails()) {
				return Redirect::to('login')->withErrors($validator);
			} else {
				$data = array(
					'username' 	=> Input::get('username'),
					'password' 	=> Input::get('password')
				);
			}

			if (Auth::attempt($data)) {
				
				$id = Auth::user()->id;

    			Session::put('id', $id);

    			$cartModel = new CartModel();

    			$cart_id = $cartModel->getCartIdByUserId($id);

    			if(!$cart_id) {
    				$cart_id = $cartModel->createCartByUserId($id);
    			}

    			Session::put('cart_id', $cart_id);

				return Redirect::to('/')->with('message', 'Logged In');

			} else {	 	
				return Redirect::to('login');
			}
		}

		return View::make('pages.login');
	}
}
