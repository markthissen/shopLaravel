<?php
class SearchController extends FrontController {
	public function search() {
		$post = Input::get();
		$model = new SearchModel(); 
		//var_dump($post); exit;
		
		$result = array();
		$search = $post['search']; 
		//var_dump($term); exit;

		$result = $model->search($search);
		//var_dump($model->search($search)); exit; 

		return View::make('pages.search')
		->with('search', $result);
		
	}

}