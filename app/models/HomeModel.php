<?php
class HomeModel{
public function getHomeProducts() {
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
		->where('product_category.id_category', '=', 6)
		->get(array('product_lang.name', 'product_lang.description', 'image.image', 'product.price', 'product.id_product', 'product_category.id_category'));
	}


}