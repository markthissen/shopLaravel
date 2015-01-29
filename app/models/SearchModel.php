<?php
class SearchModel{
	public function search($search) {
		return DB::table('product_lang')
		->select('*')->where('name', 'LIKE', '%'.$search.'%')
		->join('image', function($join) {
			$join->on('product_lang.id_product', '=', 'image.id_product');
		})
		->join('product', function($join) {
			$join->on('product_lang.id_product', '=', 'product.id_product');
		})
		->get();
	}

}