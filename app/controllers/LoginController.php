<?php

class LoginController extends BaseController {

    
    public function index() {

        
        return View::make('frontend.user_login.index');
    }
}
