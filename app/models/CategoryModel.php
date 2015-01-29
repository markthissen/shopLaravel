<?php
class CategoryModel {

	public function getAllCategories() {
		//query to display categories
		return DB::table('category_lang')->select('*')->where('id_category','!=',6)->get();
	}

	public function getCategoryId($category_name) {
		// fac o functie care primeste category name si imi returneaza category id
		$category_id= DB::table('category_lang')->select('id_category')->where('name','=',$category_name)->get();
		foreach ($category_id as $cat) {
			$category_id = $cat->id_category;
		}
		return $category_id; 

	}

}