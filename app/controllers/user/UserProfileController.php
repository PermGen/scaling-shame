<?php  
	/**
	* 
	*/
	class UserProfileController extends BaseController
	{
			
			public function showindex(){
			$messages=Message::where('from','=',Sentry::getUser()->id)
			->where('is_seen','=','0')
			->orderBy('is_seen')
			->get();
				return View::make('frontend.userprofile.index',compact('messages'));
			}
	
	}





 ?>