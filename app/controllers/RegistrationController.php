<?php

class RegistrationController extends FrontController {

	public function register() {

	$postData = Input::get();
	$model = new RegistrationModel(); 
	

	if (count($postData) > 1) {	
		$rules = array(
			'name' => 'required',
    		'email' => 'required',
    		'username' => 'required',
    		'password'  => 'required',
    		'address' => 'required',
    		'city' => 'required'
			);

		$validation = Validator::make($postData, $rules);

		$name = $postData['name'];
		$email = $postData['email'];
		$username = $postData['username'];

		$password = Hash::make($postData['password']);

		
		$address = $postData['address'];
		$city = $postData['city'];

		if ($validation->passes()) {

			try {

				$id_customer = $model->addCustomer($name, $email, $username, $password);
				$model->addAddress($address, $city, $id_customer);

				return Redirect::to('/')->with('message', 'Registred. Please login.');

			} catch (Exception $e) {
				
				
				$e->getTraceAsString();
				$e->getMessage();
				return 'There was a problem for inserting the customer...';
				
			}
		

		} 

		
	}
	
	return View::make('pages.registration');

	}
}