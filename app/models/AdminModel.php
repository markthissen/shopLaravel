<?php
class AdminModel {
	public function checkAdmin() {
		return DB::table('customers')
		->where('isAdmin', '=', 1)
		->first();
	}

	public function countClients() {
		$clients = DB::table('customers')->count();
		return $clients;
	}

	public function countProducts() {
		$product = DB::table('product')->count();
		return $product; 
	}

	public function countAdmins() {
		$admins = DB::table('customers')->where('isAdmin', '=', 1)->count();
		return $admins; 
	}

	public function countCategories() {
		$categories = DB::table('category')->count(); 
		return $categories;
	}

	public function countOrders() {
		$orders = DB::table('orders')->count();
		return $orders;
	}

	public function displayAllCategories() {
		return DB::table('category_lang')
		->join('category', function($join) {
			$join->on('category_lang.id_category', '=', 'category.id_category');
		})
		->join('lang', function($join) {
			$join->on('category_lang.id_lang', '=', 'lang.id_lang');
		})
		->where('category_lang.id_category','!=',6)
		->where('category.is_deleted', '=', 0)
		->get(array('category_lang.name', 'category_lang.description', 'lang.language', 'category.active', 'category.date_add', 'category.date_upd', 'category_lang.id_category', 'category.is_deleted'));
	}

	public function displayAllUsers() {
		return DB::table('customers')
		->join('addresses', function($join) {
			$join->on('customers.id', '=', 'addresses.id_customer');
		})
		->get(array('customers.username', 'customers.name', 'customers.email', 'addresses.address', 'addresses.city'));
	}

	public function displayAllAdmins() {
		return DB::table('customers')
		->where('customers.isAdmin', '=', 1)
		->join('addresses', function($join) {
			$join->on('customers.id', '=', 'addresses.id_customer');
		})
		->get(array('customers.username', 'customers.name', 'customers.email', 'addresses.address', 'addresses.city'));
	}

	public function displayAllProducts() {
		return DB::table('product_lang')
		->join('product', function($join) {
			$join->on('product_lang.id_product', '=', 'product.id_product');
		})
		->join('lang', function($join) {
			$join->on('product_lang.id_lang', '=', 'lang.id_lang');
		})
		->get(array('product_lang.name', 'product_lang.description', 'lang.language', 'product.quantity', 'product.price', 'product.date_add', 'product.date_upd', 'product.active', 'product.id_category'));
	}

	public function displayAllOrders() {
		return DB::table('orders')
		->where('orders.is_deleted', '=', 0)
		->get(array('orders.id_order','orders.status', 'orders.date_created', 'orders.date_updated'));
	}

	public function createCategory($category) {
		return DB::table('category')
		->insertGetId(array('date_add'=>$category['date_add'], 'date_upd'=>$category['date_upd'], 'active'=>$category['active']));
	}

	public function createLangCategory($langcategory) {
	
		DB::table('category_lang')
		
		->insert(array('name'=>$langcategory['name'], 'description'=>$langcategory['description'], 'id_lang'=>$langcategory['language'], 'id_category' => $langcategory['id_category']));
	}

	public function updateCategory($active, $date_upd, $id_category) {
		return DB::table('category')
		->where('id_category', '=', $id_category)
		->update(array('active' => $active, 'date_upd' => $date_upd));
	}

	public function updateLangCategory($name, $description, $id_category) {
		return DB::table('category_lang')
		->where('id_category', '=', $id_category)
		->update(array('name'=>$name, 'description'=>$description));
	}

	public function remove($id_category) {
		DB::table('category')
		->where('category.id_category', '=', $id_category)
		->update(array('is_deleted' => 1));
	}

	public function displayOrderDetail($id_order) {
		return DB::table('orders')
		->leftJoin('customers', function($join) {
			$join->on('orders.id_customer', '=', 'customers.id');
		})	
		->leftJoin('order_detail', function($join) {
			$join->on('orders.id_order', '=', 'order_detail.id_order');
		})
		->leftJoin('addresses', function($join) {
			$join->on('order_detail.address_shipping', '=', 'addresses.id_address');
		})
		->where('orders.id_order', '=', $id_order)
		->get();
	}

	public function updateOrder($id_order, $status, $date_updated) {
		return DB::table('orders')
		->where('id_order', '=', $id_order)
		->update(array('status'=>$status, 'date_updated'=>$date_updated));
	}

	public function deleteOrder($id_order) {
		return DB::table('orders')
		->where('id_order', '=', $id_order)
		->update(array('is_deleted'=>1));
	}

}