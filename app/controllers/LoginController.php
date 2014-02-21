<?php

class LoginController extends BaseController {

    
    public function index() {

        
        return View::make('frontend.user_login.index');
    }

    public function postLogin(){
    	 $credentials = array(
            'email'    => Input::get('email'),
            'password' => Input::get('password')
        );

        $rememberMe = Input::get('rememberMe');

        try {

            if (!empty($rememberMe)) {
                $this->user = Sentry::authenticate($credentials, true);
            } else {
                $this->user = Sentry::authenticate($credentials, false);
            }

            if ($this->user) {
            	$user = Sentry::getUser();

              Event::fire('user.login', $this->user);
              return Redirect::to('userprofile');
             
            }
        } catch (Exception $e) {
            return Redirect::back()->withErrors(array('login' => $e->getMessage()));
        }
    }



    public function getLogout(){
    		Auth::logout();
    }
}
