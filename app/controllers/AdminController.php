<?php
class AdminController extends BaseController{

	public function __construct() {
		
		//daca nu e pe pagina de login
		// si 
		// 1. nu e logat	
		// 2. nu e admin
		// il redirectezi pe pagina de login
		//isAdmin = 1

		//checkAdmin()->isAdmin == '1';

		$adminModel = new AdminModel();

		//var_dump($customerModel->checkAdmin()); 

		//if (!(Auth::check() && $customerModel->getCustomerDetails()[0]->name == '123a')) {
		
		if (!(Auth::check() && $adminModel->checkAdmin())) {
			echo Redirect::to('/noaccess'); exit;

		} elseif (!(Auth::check())) {
			header('Location: ' . URL::to('/') . '/login/');
			exit;
		}
	}

	public function showNoAccess() {

		return View::make('admin.noaccess');
	}

	public function dashboard()
	{
		$adminModel = new AdminModel();
	
		$clients = $adminModel->countClients(); 
		$products = $adminModel->countProducts();

		return View::make('admin.dashboard')
				->with('clients', $clients)
				->with('products', $products);
	}

	public function showCategories() {
		$adminModel = new AdminModel();
		$categories = $adminModel->countCategories();
		$allcategories = $adminModel->displayAllCategories();

		try {
			if(Input::get('deletecategory')!=null) {
				$checkboxes = Input::get('my_checkbox');
				$id_category = Input::get('id_category');

				if(!empty($checkboxes)) {
					foreach($checkboxes as $id_category_to_be_removed) {
						$adminModel->remove($id_category_to_be_removed);
					}
				}
			}
		} catch(Exception $e) {
			echo $e->getMessage();
		}


		try {

			if(Input::get('updatecategory')!=null) {
				$id_category = Input::get('id_category');
				$name = Input::get('name');
				$description = Input::get('description');
				$active = Input::get('active');
				$date_upd = Input::get('date_upd');

				for($i=0; $i<count($id_category); $i++) {
					$updatecategory = $adminModel->updateCategory($active[$i], $date_upd[$i], $id_category[$i]); 

					$updatelangcategory = $adminModel->updateLangCategory($name[$i], $description[$i], $id_category[$i]);

				}

			}

		} catch(Exception $e) {
			echo $e->getMessage();
		}

		return View::make('admin.categories')
			->with('categories', $categories)
			->with('allcategories', $allcategories)	;
		
	}

	public function showOrders() {
		$adminModel = new AdminModel();
		$orders = $adminModel->countOrders();
		$allorders = $adminModel->displayAllOrders();

		return View::make('admin.orders')
			->with('orders', $orders)
			->with('allorders', $allorders);
	}

	public function showUsers() {
		$adminModel = new AdminModel();
		$allusers = $adminModel->displayAllUsers();

		return View::make('admin.users')
			->with('allusers', $allusers);
	}

	public function showAdmins() {
		$adminModel = new AdminModel();
		$alladmins = $adminModel->displayAllAdmins();
		$admins = $adminModel->countAdmins();

		return View::make('admin.admins')
			->with('admins', $admins) 
			->with('alladmins', $alladmins);
	}

	public function showProducts() {
		$adminModel = new AdminModel();
		$allproducts = $adminModel->displayAllProducts();

		return View::make('admin.products')
			->with('allproducts', $allproducts);
	}

	public function createNewCategory() {
		$adminModel = new AdminModel();

		try {
			if (Input::get('newcategory')!=null) {
				$language = Input::get('language');
				$date_add = Input::get('date_add');
				$date_upd = Input::get('date_upd');
				$active = Input::get('active');
				$name = Input::get('name');
				$description = Input::get('description');

				// $new_category_array['language'] = $language;
				$new_category_array['date_add'] = $date_add;
				$new_category_array['date_upd']	= $date_upd;
				$new_category_array['active']	= $active;
				
				$new_lang_category_array['name'] = $name;
				$new_lang_category_array['description'] = $description;
				$new_lang_category_array['language'] = $language;

				$newcategory = $adminModel->createCategory($new_category_array);
				$new_lang_category_array['id_category'] = $newcategory;
				$newlangcategory = $adminModel->createLangCategory($new_lang_category_array);
			}


		} catch(Exception $e) {
			echo $e->getMessage();
			echo 'You cannot enter a new category';
		}

		return View::make('admin.newcategory')
			->with('newcategory', $newcategory)
			->with('newlangcategory', $newlangcategory);
	}

	public function viewOrderDetails() {
		//merge de la order 34
		$adminModel = new AdminModel();
		$id_order = Route::input('id_order');

		$orderdetails = $adminModel->displayOrderDetail($id_order);

	
		return View::make('admin.orderdetails')
			->with('id_order', $id_order)
			->with('orderdetails', $orderdetails);
	}

	public function updateOrder() {
		$adminModel = new AdminModel();
		$id_order = Route::input('id_order');
		try {
			if(Input::get('updateorder')!=null) {
				$status = Input::get('status');
				$date_updated = Input::get('date_updated');

				$updateorder = $adminModel->updateOrder($id_order, $status, $date_updated);	
			}
		}  catch(Exception $e) {
			echo $e->getMessage();
			echo 'You cannot update this order';
		}
		
		return View::make('admin.updateorder')
			->with('id_order', $id_order);
	}

	public function deleteOrder() {
		$adminModel = new AdminModel();
		$id_order = Route::input('id_order');

		try {
			if(Input::get('deleteorder')!=null) {
				$deleteorder = $adminModel->deleteOrder($id_order);
			}
		} catch(Exception $e) {
			echo $e->getMessage();
			echo 'You cannot delete this order';
		}
		


		return View::make('admin.deleteorder')
			->with('id_order', $id_order);

	}


	
}		
