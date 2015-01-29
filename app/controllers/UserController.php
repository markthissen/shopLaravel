<?php 
class UserController extends BaseController {

    /**
     * Show the profile for the given user.
     */
    public function index()
    {
      return 'Welcome to laravel!';
    }

    public function showProfile($id)
    {
        // $user = User::find($id);
		echo '20';
        // return View::make('user.blade', array('id' => $id));
    }

}
?>