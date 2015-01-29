<?php
class LogoutController extends FrontController {
	public function getLogout() {
   		Auth::logout();
    return Redirect::to('/');
	}
}