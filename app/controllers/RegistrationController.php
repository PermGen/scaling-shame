<?php 




class RegistrationController extends BaseController {

    
    public function index() {

        
        return View::make('frontend.user_registration.index');
    }

    public function store(){
    	   $formData = array(
            'first-name'       => Input::get('first_name'),
            'middle-name'      => Input::get('middle_name'),
            'last-name'        => Input::get('last_name'),
            'email'            => Input::get('email'),
            'gender'           => Input::get('gender'),
            'birth-date'	   => Input::get('birth_date'),
            'course'           => Input::get('course'),
            'year-graduated'   => Input::get('year_graduated'),
            'civil-stat'	   => Input::get('civil_stat'),
            'address'		   => Input::get('address'),
            'company'		   => Input::get('company'),
            'company-address'  => Input::get('company_address'),
            'job-nature'	   => Input::get('job_nature'),
            'password'         => Input::get('password'),
            'confirm-password' => Input::get('confirm_password')
        );


        $rules = array(
            'first-name'       => 'required|min:3',
            'last-name'        => 'required|min:3',
            'middle-name'      => 'required|min:3',
            'email'            => 'required|email|unique:users,email',
            'gender'           => 'required',
            'birth-date'	   => 'required',
            'course'           => 'required|min:5',
            'year-graduated'   => 'required',
            'civil-stat'	   => 'required|min:3',
            'address'		   => 'required|min:3',
            'company'		   => 'required|min:3',
            'company-address'  => 'required|min:3',
            'job-nature'	   => 'required|min:3',
            'password'         => 'required|min:4',
            'confirm-password' => 'required|same:password'
        );


        $validation = Validator::make($formData, $rules);


        if ($validation->fails()) {

            return Redirect::back()->withErrors($validation)->withInput();
        	
        }
        //save to database
        //save to user table

         $user = Sentry::createUser(array(
            'email'      => $formData['email'],
            'password'   => $formData['password'],
            'first_name' => $formData['first-name'],
            'middle_name'=> $formData['middle-name'],
            'last_name'  => $formData['last-name'],
            'activated'  => 0
        ));

         

          //save to user_info table





    }
}
