<?php
class FictionController extends FrontController {
	public function showFiction()
	{	
		$fiction = array();
		$fiction_model = new ProductModel();
		$fiction = $fiction_model->getFiction();
		return View::make('pages.fiction')->with('fiction',$fiction);
	}
}