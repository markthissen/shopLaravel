<?php

class HomeController extends FrontController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showHomeProducts() 
	{
		$home = array();
		$home_model = new HomeModel();
		$home = $home_model->getHomeProducts();
		return View::make('pages.home')
				->with('home',$home);

		//return $view = View::make('pages.home')->nest('sidebar', 'includes.sidebar', $home);
	}
	
}
