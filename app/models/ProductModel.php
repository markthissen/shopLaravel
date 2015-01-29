<?php 
class ProductModel{

	public function getCategoryProducts($id_category, $page = 1, $post_per_page = 6) {
		// var_dump('$id_category = '.$id_category);
		// var_dump('$page = '.$page);

		//return DB::table('product_lang')->select('*')->where('id_category','=',1)->get();
		return DB::table('product')
		->join('product_lang', function($join) {
			$join->on('product.id_product', '=', 'product_lang.id_product');
		})
		->join('image', function($join) {
			$join->on('product.id_product', '=', 'image.id_product');
		})
		->join('product_category', function($join) {
			$join->on('product.id_product', '=', 'product_category.id_product');
		})
		->where('product_lang.id_lang', '=', 1)
		->where('product_category.id_category', '=', $id_category)
		->limit($post_per_page)
		->offset(($page - 1) * $post_per_page)
		->get(array('product_lang.name', 'product_lang.description', 'image.image', 'product.price', 'product.id_product', 'product_category.id_category'));
	}

	public function getResults($id_category, $post_per_page = 6) {
	//public function getResults($id_category) {
		return ceil(DB::table('product')
		//return DB::table('product')
		->join('product_lang', function($join) {
			$join->on('product.id_product', '=', 'product_lang.id_product');
		})
		->join('image', function($join) {
			$join->on('product.id_product', '=', 'image.id_product');
		})
		->join('product_category', function($join) {
			$join->on('product.id_product', '=', 'product_category.id_product');
		})
		->where('product_lang.id_lang', '=', 1)
		->where('product_category.id_category', '=', $id_category)
		->count('product.id_product') / $post_per_page );
		//->count('product.id_product'); 
	}


	public function getProductDetails($id_category, $id_product) { 
		return DB::table('product')
		->join('product_lang', function($join) {
			$join->on('product.id_product', '=', 'product_lang.id_product');
		})
		->join('image', function($join) {
			$join->on('product.id_product', '=', 'image.id_product');
		})
		->join('product_category', function($join) {
			$join->on('product.id_product', '=', 'product_category.id_product');
		})
		->where('product_lang.id_lang', '=', 1)
		->where('product_category.id_category', '=', $id_category)
		->where('product.id_product', '=', $id_product)
		->get(array('product_lang.name', 'product_lang.description', 'image.image', 'product.price', 'product_category.id_category', 'product.id_product'));
	}

	

	//{{ Form::open(array('action'=> Url::action('ProductController@showAddToCart', ['category_id' => $category_id, 'product_id' => $product_id]))) }}



}