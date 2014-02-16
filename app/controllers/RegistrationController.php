<?php

class RegistrationController extends BaseController {

    
    public function index() {

        
        return View::make('frontend.user_registration.index');
    }
}
