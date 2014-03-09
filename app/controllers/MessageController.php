<?php 
	/**
	* 
	*/
	class MessageController extends BaseController
	{
		
		public function showindex()
		{   
			$messages=Message::where('user_to','=',Sentry::getUser()->id)			
			->orderBy('created_at')
			->get();

			return View::make('frontend.messages.inbox',compact('messages'));
		}

		public function showMessage($id)
		{
			$messages=Message::where('user_from','=',Sentry::getUser()->id)
			->where('message_id','=',$id);
			
			Message::where('user_to','=',Sentry::getUser()->id)
			->where('message_id','=',$id)
			->update(array('is_seen'=>1));
			return View::make('frontend.messages.mymessage',compact('messages'));
		}

		public function createNewMessage()
		{   $messages=Message::where('user_from','=',Sentry::getUser()->id)
			->where('is_seen','=','0')
			->orderBy('created_at')
			->get();

			$contacts=User::where('id','!=',Sentry::getUser()->id)->get();
			return View::make('frontend.messages.createnewmessage',compact('messages'))
			->with('contacts',$contacts);
		}

		public function sendNewMessage()
		{
			$messageTo=Input::get('sendTo');
			$messageFrom=Sentry::getUser()->id;
			$message=Input::get('message');

			$MessageModel=new Message;
			$MessageModel->user_from=$messageFrom;
			$MessageModel->user_to=$messageTo;
			$MessageModel->message=$message;
			$MessageModel->save();
			 Notification::success('Message Sent');
			return Redirect::back();
		}


		public function replyMessage($id)
		{
			$messageTo=Input::get('sendTo');
			$messageFrom=Sentry::getUser()->id;
			$message=Input::get('message');
			$messages=Message::find($id);
			return View::make('frontend.messages.replymessage',compact('messages'))
			->with("from",User::find($messages->user_from));



		}
		public function deletemessageconfirm($id)
		{
			$messages=Message::where('user_to','=',Sentry::getUser()->id)			
			->orderBy('created_at')
			->get();
			$message=Message::find($id);

			return View::make('frontend.messages.deletemessageconfirm',compact('messages'))
			->with('message',$message);
		}

		public function deleteMessage($id)
		{
			Notification::success('Message Deleted');
			Message::destroy($id);

			return Redirect::to('mymessages');


		}




	}
 ?>