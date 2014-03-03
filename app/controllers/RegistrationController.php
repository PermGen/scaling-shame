<?php 

class RegistrationController extends BaseController {

    
    public function index() {
        $college_data=CollegeCourse::all();
     
       

        return View::make('frontend.user_registration.index')
        ->with('college_data',$college_data);

    }

    public function store(){
    	   $formData = array(
            'first-name'       => Input::get('first_name'),
            'middle-name'      => Input::get('middle_name'),
            'last-name'        => Input::get('last_name'),
            'email'            => Input::get('email'),
            'gender'           => Input::get('gender'),
            'birth-date'	     => Input::get('birth_date'),
            'course'           => Input::get('course'),
            'year-graduated'   => Input::get('year_graduated'),
            'civil-stat'	     => Input::get('civil_stat'),
            'address'		       => Input::get('address'),
            'company'		       => Input::get('company'),
            'company-address'  => Input::get('company_address'),
            'job-nature'	     => Input::get('job_nature'),
            'password'         => Input::get('password'),
            'confirm-password' => Input::get('confirm_password'),
            'id-number'        => Input::get('id_number')

        );


        $rules = array(
            'first-name'       => 'required|min:3',
            'last-name'        => 'required|min:3',
            'middle-name'      => 'required|min:3',
            'email'            => 'required|email|unique:users,email',
            'gender'           => 'required',
            'birth-date'	     => 'required',
            'course'           => 'required|min:5',
            'year-graduated'   => 'required',
            'civil-stat'	     => 'required|min:3',
            'address'		       => 'required|min:3',
            'company'		       => 'required|min:3',
            'company-address'  => 'required|min:3',
            'job-nature'	     => 'required|min:3',
            'password'         => 'required|min:4',
            'confirm-password' => 'required|same:password',
            'id-number'        => 'required|unique:users_info,id_number'
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

         $user_info=new UserInfo;
         $user_info->gender            =     $formData['gender'];
         $user_info->birth_date        =     $formData['birth-date'];
         $user_info->year_graduated    =     $formData['year-graduated'];
         $user_info->course            =     $formData['course'];
         $user_info->civil_stat        =     $formData['civil-stat'];
         $user_info->address           =     $formData['address'];       
         $user_info->company           =     $formData['company'];
         $user_info->company_address   =     $formData['company-address'];
         $user_info->job_nature        =     $formData['job-nature'];
         $user_info->id_number         =     $formData['id-number'];
         $user_info->save();


          Notification::success('Successfully Registered to Alumni');
          return Redirect::back();


          //save to user_info table





    }
}
