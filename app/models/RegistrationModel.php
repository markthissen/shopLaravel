<?php
class RegistrationModel{
	public $asta_e_o_proprietate;

	public function addCustomer($name, $email, $username, $password) {
		return DB::table('customers')
		->insertGetId(array('name'=>$name, 'email'=>$email, 'username'=>$username, 'password'=>$password));
	}

	public function addAddress($address, $city, $id_customer) {
		$ceva = DB::table('addresses')
		->insert(array('address'=>$address, 'city'=>$city, 'id_customer'=>$id_customer));
		//var_dump($ceva); exit; 
	}
}