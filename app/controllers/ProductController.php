<?php

class ProductController extends FrontController {
	public function showProductDetails() {
		$category_id = Route::input('category_id');
		$product_id = Route::input('product_id');
		$product_model = new ProductModel();
		$product = $product_model->getProductDetails($category_id, $product_id); //, $category_id);
		//var_dump($product); exit;
		return View::make('pages.product')
			->with('category_id',$category_id)
			->with('product_id',$product_id)
			->with('product',$product);
		
	}

}