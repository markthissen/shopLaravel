<?php
class AccountController extends BaseController
{
    public function getIndex() //account
    {
        return "This is the profile page.";
    }
    public function getLogin() //account/login
    {
        echo "This is the login form.";
    }
    public function getLogout() //account/logout
    {
        echo "This is the logout action.";
    }
}