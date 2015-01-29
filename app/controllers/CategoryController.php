<?php
class CategoryController extends FrontController {
	public function showProducts($category_name, $page = 1)
	{	
		//echo __FUNCTION__;
		

		// $page = Route::input('page_no');
		if(empty($page)) 
		{
			$page = 1;
		}

		$category = new CategoryModel();
		$category_id = $category->getCategoryId($category_name);

		//var_dump($category_id); exit; 

		$fiction = array();
		$product_model = new ProductModel();
		$category_products = $product_model->getCategoryProducts($category_id, $page);
		
		//$category_name = Route::input('category_name');

		$noOfPages = $product_model->getResults($category_id); 
		

//var_dump($category_products);
		
		return View::make('pages.fiction')
			->with('fiction',$category_products)
			->with('category_name',$category_name)
			//->with('category_id',$category_id)
			->with('noOfPages',$noOfPages);
	}

	

}