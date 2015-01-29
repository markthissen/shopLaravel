<?php 

class FrontController extends BaseController {

	//protected $variable;
	
	public function __construct() {
		View::share('categories', $this->get_all_categories());

		if (Auth::check()) {
			View::share('cart_total_price', $this->get_cart_total_price());
			View::share('cart_total_qty', $this->get_cart_total_qty());
	   } else {
	   		//echo HTML::link('login', 'Please login');
	   		return Redirect::to('/login')->with('message', 'Please login');
	   }
		
		// front layout
		// admin controller o sa incarce admin layout
		//$this->get_items_sidebar();
	}


	function get_all_categories() {
		$categories = array();
		// load categories model, get categories from there
		$category_model = new CategoryModel();
		$categories = $category_model->getAllCategories();
		return $categories;
	}

	function get_fiction() {
		$fiction = array();
		$fiction_model = new ProductModel();
		$fiction = $fiction_model->getFiction();
		return $fiction;
	}

	function get_cart_total_price() {
		$price = 0;
		$price_model = new CartModel();
		$price = $price_model->getTotalPrice();
		return $price;
	}

	function get_cart_total_qty() {
		$qty = 0;
		$qty_model = new CartModel();
		$qty = $qty_model->getTotalQty();
		return $qty;
	}
}