<?php 
	/**
	* 
	*/
	class MessageController extends BaseController
	{
		
		public function showIndex()
		{   
			$messages=Message::where('from','=',Sentry::getUser()->id)
			->where('is_seen','=','0')
			->orderBy('is_seen')
			->get();
			return View::make('frontend.messages.inbox',compact('messages'));
		}
	}
 ?>