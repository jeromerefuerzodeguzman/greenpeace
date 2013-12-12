<?php

class MessageController extends BaseController {

	public function home() {
		$list = Message::inbox();

		return View::make('home')
				->with('lists', $list);

	}

	public function messages($phones) {
		$conversations = Message::conversation($phones);

		/*$_phones = explode('-', $phones);
		$_from = $_phones['0'];
		$_to = $_phones['1'];


		$lists = Message::where('src', $_from)
			->where('dest', $_to)
			->orWhere(function($query) use ($_from, $_to) {
				$query->where('src', $_to)
                      ->where('dest',  $_from);
			})->get();

		//mark all as read
		foreach($lists as $list) {
			if($list->readflag == 0) {
				$list->mark_as_read();
			}
		}*/
		
		return View::make('messages')
				->with('phonenumber', $conversations->phone)
				->with('conversations', $conversations);
	}
}