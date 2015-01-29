<?php
class AjaxResponderController extends BaseController{
	public function savePersonalInfo(){
		
		$data = Input::get();
		$customer_model = new CustomerModel();

		if (count($data) > 1) {	
			$rules = array(
				'name' => 'required',
				'email' => 'required');
			
			$validation = Validator::make($data, $rules);

			$name = $data['name'];
			$email = $data['email'];

			if ($validation->passes()) {
				$myupdate = $customer_model->updateInfo($name, $email);

			} else {
				return Redirect::to('/profile')->withErrors($validation);
			}

		return json_encode($data);
		}
	}

	public function saveAddressInfo() {
		$data = Input::get();
		$customer_model = new CustomerModel();

		if (count($data) > 1) {	
			$rules = array(
				'address' => 'required',
				'city' => 'required');
			
			$validation = Validator::make($data, $rules);

			$address = $data['address'];
			$city = $data['city'];
			$id_address = $data['id_address'];


			if ($validation->passes()) {
				$myupdate = $customer_model->updateAddressInfo($id_address, $address, $city);

			} else {
				return Redirect::to('/profile')->withErrors($validation);
			}

		return json_encode($data);
		}
	}
}